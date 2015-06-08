<?php
class roadmap extends MY_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->notLoggedToLogin();
    //Find list of countries.
    $data['country_list']=$this->doctrine->em->getRepository('Entities\StCountryName')
                              ->findByLocale($this->session->userdata('locale'));
    //Menu selection.                              
    $data['menu_item'] = 'roadmap';
    //Important to make $data visible on the view.
    $this->load->vars($data);
	}
  
	public function index()
	{
    
    $cFriendReq = array('toUser' => $this->session->userdata('id'), 'accepted' => false);
    $listFriendReq = $this->doctrine->em->getRepository('Entities\StFriends')->findBy($cFriendReq);
    $data['listFriendReq'] = $listFriendReq;
    
    $criteria = array('idUser' => $this->session->userdata('id'));
    $roadmap = $this->doctrine->em->getRepository('Entities\StRoadmaps')->findBy($criteria);
    
    //Create the roadmap the first time the user enters
    if(empty($roadmap)){
      $stroadmap = new Entities\StRoadmaps;
      $stroadmap->setIdUser($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
      $this->doctrine->em->persist($stroadmap);
      $this->doctrine->em->flush();
      $data['roadmapID'] = $stroadmap->getId();
    } else if (sizeof($roadmap)>1){
      $data['error_message']="There are some problems. Please contact the administrator."; 
    } else {
      $roadmap = $roadmap[0]; 
      
      $object['budget'] = $roadmap->getBudget();
      $object['total'] = $roadmap->getTime();
      $object['idDB'] = $roadmap->getId();
      $object['countries'] = array();
       
      $criteriaItem = array('idRoadmap' => $roadmap);
      $items = $this->doctrine->em->getRepository('Entities\StRoadmapItems')->findBy($criteriaItem);
      
      $counter = 0;
      foreach ($items as $it) {
        
        $country['budget'] = $it->getBudget();
        $country['code'] = $it->getCountryCode()->getCode();

        $criteriaCountryName = array('code' => $country['code'], 'locale' => $this->session->userdata('locale'));
        $countryName = $this->doctrine->em->getRepository('Entities\StCountryName')->findOneBy($criteriaCountryName);
        $country['name'] = $countryName->getName();
        
        $country['endDate'] = $it->getEndDate()->format('Y-m-d');
        $country['startDate'] = $it->getStartDate()->format('Y-m-d');
        $country['idDB'] = $it->getId();
        $object['countries']['country-'.$counter]=$country;
        $counter++;
        
               
      }
 
      $data['object'] = json_encode($object, JSON_FORCE_OBJECT); 
      $data['roadmapID'] = $roadmap->getId();
      
    }

    $data['user'] = $this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id'));
    
    $critItems = array("iduser" => $this->session->userdata('id'));
    $orderItems = array("date" => 'DESC');
    $data['items_list'] = $this->doctrine->em->getRepository('Entities\StItems')->findBy($critItems, $orderItems); 

    $relation_list = array();   
    foreach ($data['items_list'] as $item) {
      switch ($item->getType()->getType()) {
          case "COMMENT":
              $relation_list[$item->getId()] = $this->doctrine->em->find('Entities\StComments', $item->getIdObject());
              break;
          case "MULTIMEDIA":
              $relation_list[$item->getId()] = $this->doctrine->em->find('Entities\StComments', $item->getIdObject());
              break;
          case "WAYPOINT":
              $relation_list[$item->getId()] = $this->doctrine->em->find('Entities\StWaypoints', $item->getIdObject());
              break;
      }
    }
   
    $data['relation_list'] = $relation_list;
    $this->load->view('roadmap/roadmap_main',$data);
	}
  
  
  public function create(){
    
    $roadmap = json_decode($this->input->post('roadmap'),true);
    
    if($roadmap) {
      
      $stroadmap = new Entities\StRoadmaps;
      //If the roadmap already exists.
      if(isset($roadmap['idDB'])) {
        $criteria = array('id' => $roadmap['idDB'], 'idUser' => $this->session->userdata('id'));
        $stroadmap = $this->doctrine->em->getRepository('Entities\StRoadmaps')->findOneBy($criteria);
      } 
      
      $stroadmap->setIdUser($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));//ERROR SET A NON OBJECT?
      $stroadmap->setBudget($roadmap['budget']);
      $stroadmap->setTime($roadmap['total']);
      
      $this->doctrine->em->persist($stroadmap);
      $this->doctrine->em->flush();
      $roadmap['idDB']=strval($stroadmap->getId());
      
      //Loop for the countries. //The & is to make a reference, not a copy. This way we can modify it.
      foreach ($roadmap['countries'] as $countryKey => &$country) {
        //If the roadmap item already exists.
        $stroadmapitem = new Entities\StRoadmapItems;

        if(isset($country['idDB'])) {
          $stroadmapitem = $this->doctrine->em->find('Entities\StRoadmapItems', $country['idDB']);
        }

        $stroadmapitem->setStartDate(new \DateTime($country['startDate']));
        $stroadmapitem->setEndDate(new \DateTime($country['endDate']));
        $stroadmapitem->setIdRoadmap($stroadmap);
        $stroadmapitem->setBudget($country['budget']);
        
        $stroadmapitem->setCountryCode($this->doctrine->em->find('Entities\StCountries', $country['code']));
        if(array_key_exists('erased', $country) && $country['erased'] && $country['erased']=='true'){
          $this->doctrine->em->remove($stroadmapitem);
          $this->doctrine->em->flush();
          unset($roadmap['countries'][$countryKey]);
        } else {
          $this->doctrine->em->persist($stroadmapitem);
          $this->doctrine->em->flush();
          $country['idDB']=strval($stroadmapitem->getId());
        }
      }
      
      //Return (AJAX CALL) the roadmap modified with the ids generated
      echo json_encode($roadmap);
    } else {
      echo json_encode('FAIL');
    }
    
  }
  
  /*
	public function create()
	{
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');  
    $this->load->library('session');
    
    //$this->load->model('users_dao');
    $roadmap = new Entities\StRoadmap;
    
    
    $result=$this->users_dao->findByEmail($this->session->userdata('email'));
    
    
    
    
    if(empty($result)){
      echo "The user cannot be retrived.";
      redirect('/fail');
    }
  
    $this->load->model('projects_dto');
    //Get the id of the user.
    $this->projects_dto->setOrganizer($result->getId());
    $this->projects_dto->setName($this->input->post('name'));
    $this->projects_dto->setDescription($this->input->post('description'));
    
    // To protect MySQL injection (more detail about MySQL injection)
//    $myusername = stripslashes($myusername);
//    $mypassword = stripslashes($mypassword);
//    $myusername = mysql_real_escape_string($myusername);
//    $mypassword = mysql_real_escape_string($mypassword);

		//Upload the picture
    $dir_path = './uploads/'.$this->users_dto->getEmail();
    if (!is_dir($dir_path)) {
        mkdir($dir_path);
    }
    $config['upload_path'] = $dir_path; 
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '200';  //Size in Kb allowed
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
    
		if ( ! $this->upload->do_upload('picture'))
		{
			//$error = array('error' => $this->upload->display_errors());
			//$this->load->view('register/register_main', $error);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			//$this->load->view('upload_success', $data);
		}
  
    $this->load->model('projects_dao');
    $id_project=$this->projects_dao->save($this->projects_dto);
     
    //Prepare tasks.
    //$form = $this->input->post(NULL, TRUE);
    $form = $this->input->post();
    $task_array = array();
    if ($form){
      foreach ($form as $key => $value) {
        $pos = strpos($key, 'task');
        if($pos !== FALSE) {
          $tokens = explode("_", $key);
          $task_name = $tokens[0];
          $value_name = $tokens[1];
          $task_array[$task_name][$value_name] = $value;
        } 
      }
    }
    
    $this->load->model('tasks_dao');
    foreach($task_array as $task){
      $roadmap_item = new Entities\StRoadmapItem;
      $roadmap_item->SetCountry();
      $this->load->model('tasks_dto');
      $this->tasks_dto->setIdProject($id_project);
      $this->tasks_dto->setName($task['name']);
      $this->tasks_dto->setDescription($task['description']);
      $this->tasks_dto->setRequeriments($task['requeriments']);
      $this->tasks_dto->setReward($task['reward']);
      $this->tasks_dto->setStartDate($task['start-date']);
      $this->tasks_dto->setEndDate($task['end-date']);
      $this->tasks_dto->setStartSchedule($task['start-schedule']);
      $this->tasks_dto->setEndSchedule($task['end-schedule']);
      $this->tasks_dto->setNumUsersNeeded($task['num-users-needed']);

      $result=$this->tasks_dao->save($this->tasks_dto);
    }
    
    $this->doctrine->em->persist($roadmap);
    $this->doctrine->em->flush();

    //Go to successfully created.
    redirect('/main');
      
	}  */

}

?>