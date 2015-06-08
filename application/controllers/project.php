<?php
class project extends MY_Controller {

	public function __construct()
	{
    parent::__construct();
    
    //Find list of countries.
    $locale = "en-gb";
    $locale_session = $this->session->userdata('locale'); 
    if( !empty($locale_session) ){
      $locale = $locale_session;
    }
    $data['country_list']=$this->doctrine->em->getRepository('Entities\StCountryName')
                              ->findByLocale($locale);
    //Menu selection. 
    $data['menu_item'] = 'project';
    $this->load->vars($data);
	}
  
	public function index($id_project=NULL, $filtered_list=NULL)
	{
    if(isset($id_project)){ $data['active_proj']=$id_project; }
    //Load all projects
    if(empty($filtered_list)) {
      $criteria = array('validated' => TRUE);
      $data['all_project_list']=$this->doctrine->em->getRepository('Entities\StProjects')->findBy($criteria);
    } else {
      $data['all_project_list']=$filtered_list;
    }
    
    //Load my projects
    $criteria = array('organizer' => $this->session->userdata('id'));
    $data['project_list']=$this->doctrine->em->getRepository('Entities\StProjects')->findBy($criteria);
    
    //Load all tasks for owned projects
    foreach($data['project_list'] as $proj){
      $criteria = array('idProject' => $proj->getId());
      $data['tasks'][$proj->getId()]=$this->doctrine->em->getRepository('Entities\StTasks')->findBy($criteria);
    }
    
    //Load all requests for porjects
    foreach($data['project_list'] as $proj){
      $criteria = array('idProject' => $proj->getId(), 'approved' => FALSE);
      $data['userProject'][$proj->getId()]=$this->doctrine->em->getRepository('Entities\StUserProject')->findBy($criteria);
    }

    //Load all projects I subscribed
    $criteria = array('idUser' => $this->session->userdata('id'), 'approved' => TRUE);
    $useProjList = $this->doctrine->em->getRepository('Entities\StUserProject')->findBy($criteria);
    $data['subscribed_project_list'] = array();
    foreach($useProjList as $up){
      $data['subscribed_project_list'][] = $up->getIdProject();    
    }

    $this->load->view('project/project_main', $data);
	}

	public function create()
	{
    $this->notLoggedToLogin();
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');  
      
    $project = new Entities\StProjects;

    $project->setOrganizer($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
    $project->setName($this->input->post('name'));
    $project->setDescription($this->input->post('description'));
    $project->setCountryCode($this->input->post('country_code'));
    $project->setValidated(false);
    
    // To protect MySQL injection (more detail about MySQL injection)
//    $myusername = stripslashes($myusername);
//    $mypassword = stripslashes($mypassword);
//    $myusername = mysql_real_escape_string($myusername);
//    $mypassword = mysql_real_escape_string($mypassword);

		//Upload the picture
    $link_path = '/uploads/u'.str_pad($this->session->userdata('id'), 15, "0", STR_PAD_LEFT); 
    $dir_path = '.'.$link_path;
    if (!is_dir($dir_path)) {
        mkdir($dir_path);
    }
    
    //First saving to get the id for the pictures
    $this->doctrine->em->persist($project);
    $this->doctrine->em->flush();
    
    //Check if project folder exists
    $link_path =$link_path.'/p'.str_pad($project->getId(), 15, "0", STR_PAD_LEFT);
    $dir_path = '.'.$link_path;
    if (!is_dir($dir_path)) {
       mkdir($dir_path);
    }
     
    $config['upload_path'] = $dir_path; 
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '0';  //Size in Kb allowed
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';

		$this->load->library('upload', $config);
    

		if ( $this->upload->do_upload('picture'))
		{
			$data_picture = $this->upload->data(); // Returns information about your uploaded file.
      $picture_name = $data_picture['raw_name'].$data_picture['file_ext']; // Here it is
      $project->setPicture($link_path.'/'.$picture_name);
		}
  
    $this->doctrine->em->persist($project);
    $this->doctrine->em->flush();
     
    //Prepare tasks.
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
    
    foreach($task_array as $task){
      $tasks = new Entities\StTasks;
      
      $tasks->setIdProject($project);
      $tasks->setName($task['name']);
      $tasks->setDescription($task['description']);
      $tasks->setRequeriments($task['requeriments']);
      $tasks->setReward($task['reward']);
      $tasks->setStartDate(new \DateTime($task['start-date']));
      $tasks->setEndDate(new \DateTime($task['end-date']));
      $tasks->setStartSchedule($task['start-schedule']);
      $tasks->setEndSchedule($task['end-schedule']);
      $tasks->setNumUsersNeeded($task['num-users-needed']);

      $this->doctrine->em->persist($tasks);
      $this->doctrine->em->flush();
    }


    //Go to successfully created.
    $this->index($project->getId());
      
	}
           /*
  public function search($country = 'UK'){
    if($country == null) {
      $country = "ES"; //TODO: Get country depending on the IP.
    }
    
    $criteria = array('validated' => true);
    $data['project_list']=$this->doctrine->em->getRepository('Entities\StProjects')->findBy($criteria);
    
    $this->load->view('project/project_search', $data);
    
    //echo 'Are you in '.$this->visitor_country().'?'; // Output Coutry name [Ex: United States]
  
  }
   */
  
  public function signup($project_id = '0'){
    $this->notLoggedToLogin();
    $criteria = array('idUser' => $this->session->userdata('id'), 'idProject' => $project_id);
    $userProj = $this->doctrine->em->getRepository('Entities\StUserProject')->findBy($criteria);
    
    if(empty($userProj)){
      $userProj = new Entities\StUserProject;
    
      $userProj->setIdUser($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
      $userProj->setIdProject($this->doctrine->em->find('Entities\StProjects', $project_id));
      $userProj->setApproved(FALSE);
      
      $this->doctrine->em->persist($userProj);
      $this->doctrine->em->flush();
    }    
    $this->index();
  }
  
  public function publish($project_id = '0'){
    $this->notLoggedToLogin();
    $criteria = array('organizer' => $this->session->userdata('id'), 'id' => $project_id);
    $project = $this->doctrine->em->getRepository('Entities\StProjects')->findOneBy($criteria);
    
    if(!empty($project)){
      $project->setPublished(TRUE);
      
      $this->doctrine->em->persist($project);
      $this->doctrine->em->flush();
    }    
    $this->index($project->getId());
  }
  
  
  public function filter(){
    //Save filter
    //$data['filter']
    
    /*
    //First get all projects from country
    $criteria = array('countryCode' => $this->input->post('country'));
    $project_list = $this->doctrine->em->getRepository('Entities\StProjects')->findBy($criteria);
    
    //Find tasks
    $criteria = array('countryCode' => $this->input->post('country'));
    $project_list = $this->doctrine->em->getRepository('Entities\StTasks')->findBy($criteria);   
    */
    
    
    //OLD
    $criteria = array();
    $where = NULL;
    
    if($this->input->post('country')) {
      $criteria['countryCode'] = $this->input->post('country');
      $where = 'p.countryCode = :countryCode'; 
    }
    if($this->input->post('start_date')) {
      $aux = new \DateTime($this->input->post('start_date'));
      $criteria['start'] = $this->input->post('start_date');//$this->input->post('start_date');//$aux->format('Y-m-d'); 
      if(isset($where)){ $where .= ' AND '; } 
      $where .= 't.startDate >= :start'; 
      
    }
    if($this->input->post('end_date')) {
      $aux =  new \DateTime($this->input->post('end_date')); 
      $criteria['end'] = $this->input->post('end_date');//$this->input->post('end_date');//$aux->format('Y-m-d'); 
      if(isset($where)){ $where .= ' AND '; } 
      $where .= 't.endDate >= :end'; 
    }
    /*print_r($where);
    print_r("<br>");
    print_r($criteria);   */
    
    $qb = $this->doctrine->em->createQueryBuilder();
    
    if(!isset($where)) {
      $criteria = array('validated' => TRUE);
      $project_list=$this->doctrine->em->getRepository('Entities\StProjects')->findBy($criteria);
    } else {
      $criteria['validated']=TRUE;
      if(isset($where)){ $where .= ' AND '; }
      $where .= 'p.validated = :validated';
      $project_list = $qb->select('p')
            ->from('Entities\StProjects','p')
            ->leftJoin('Entities\StTasks','t','WITH',$qb->expr()->eq('p.id','t.idProject'))
            ->where($where)
            ->setParameters($criteria)
            ->distinct('p')
            ->getQuery()
            ->getResult();
    }

    //Load view
    $this->index(NULL,$project_list);
  
  }
  
  function visitor_country()
  {
      $client  = @$_SERVER['HTTP_CLIENT_IP'];
      $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
      $remote  = $_SERVER['REMOTE_ADDR'];
      $result  = "Unknown";
      if(filter_var($client, FILTER_VALIDATE_IP))
      {
          $ip = $client;
      }
      elseif(filter_var($forward, FILTER_VALIDATE_IP))
      {
          $ip = $forward;
      }
      else
      {
          $ip = $remote;
      }
  
      $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
  
      //Go to database to check for code $ip_data->geoplugin_countryCode
      //This way we can have language support also.
      if($ip_data && $ip_data->geoplugin_countryName != null)
      {
          $result = $ip_data->geoplugin_countryName;
      }
  
      return $result;
  }
  
  
  public function modify()
	{
    $this->notLoggedToLogin();
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');  
      
    //$project = new Entities\StProjects;
    $project = $this->doctrine->em->find('Entities\StProjects', $this->input->post('id'));
    
    if(!empty($project)){
      //ON modify set published and validated to false (Reset the proces)
      $project->setPublished(FALSE);
      $project->setValidated(FALSE);
      
      
      $project->setName($this->input->post('name'));
      $project->setDescription($this->input->post('description'));
      $project->setCountryCode($this->input->post('country'));
      
  		//Upload the picture
      $link_path = '/uploads/u'.str_pad($this->session->userdata('id'), 15, "0", STR_PAD_LEFT); 
      $dir_path = '.'.$link_path;
      if (!is_dir($dir_path)) {
          mkdir($dir_path);
      }
      
      //Check if project folder exists
      $link_path =$link_path.'/p'.str_pad($this->input->post('id'), 15, "0", STR_PAD_LEFT);
      $dir_path = '.'.$link_path;
      if (!is_dir($dir_path)) {
         mkdir($dir_path);
      }
       
      $config['upload_path'] = $dir_path; 
  		$config['allowed_types'] = 'gif|jpg|png';
  		$config['max_size']	= '0';  //Size in Kb allowed
  		//$config['max_width']  = '1024';
  		//$config['max_height']  = '768';
  
  		$this->load->library('upload', $config);
      
  
  		if ( $this->upload->do_upload('picture'))
  		{
  			$data_picture = $this->upload->data(); // Returns information about your uploaded file.
        $picture_name = $data_picture['raw_name'].$data_picture['file_ext']; // Here it is
        $project->setPicture($link_path.'/'.$picture_name);
  		}
    
      $this->doctrine->em->persist($project);
      $this->doctrine->em->flush();
      
      //MODIFYING THE TASKS
      
      //Prepare tasks.
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
      
      foreach($task_array as $task){
        $tasks = new Entities\StTasks;        
        if(array_key_exists('id', $task)) {
          $tasks = $this->doctrine->em->find('Entities\StTasks', $task['id']);
        }
        
        $tasks->setIdProject($project);
        $tasks->setName($task['name']);
        $tasks->setDescription($task['description']);
        $tasks->setRequeriments($task['requeriments']);
        $tasks->setReward($task['reward']);
        $tasks->setStartDate(new \DateTime($task['start-date']));
        $tasks->setEndDate(new \DateTime($task['end-date']));
        $tasks->setStartSchedule($task['start-schedule']);
        $tasks->setEndSchedule($task['end-schedule']);
        $tasks->setNumUsersNeeded($task['num-users-needed']);
  
        $this->doctrine->em->persist($tasks);
        $this->doctrine->em->flush();
      }
    }

    //Go to successfully created.
    redirect('project/index/'.$project->getId());
        
    // To protect MySQL injection (more detail about MySQL injection)
//    $myusername = stripslashes($myusername);
//    $mypassword = stripslashes($mypassword);
//    $myusername = mysql_real_escape_string($myusername);
//    $mypassword = mysql_real_escape_string($mypassword);
      
	}
  
  function declineRequest(){
    $this->notLoggedToLogin();
    $idRequest = $this->input->post('idRequest');
    if($idRequest) {
      $userProject = $this->doctrine->em->find('Entities\StUserProject', $idRequest);
      
      $this->doctrine->em->remove($userProject);
      $this->doctrine->em->flush();
      echo 'OK';
    } else {
      echo 'FAIL';
    }
  }
  
  function acceptRequest(){
    $this->notLoggedToLogin();
    $idRequest = $this->input->post('idRequest');
    if($idRequest) {
      $userProject = $this->doctrine->em->find('Entities\StUserProject', $idRequest);
      $userProject->setApproved(TRUE);
      
      $this->doctrine->em->persist($userProject);
      $this->doctrine->em->flush();
            
      echo 'OK';
    } else {
      echo 'FAIL';
    }
  }
  
  function more($idProject){
    if($idProject){
      $project = $this->doctrine->em->find('Entities\StProjects', $idProject);
      if(isset($project) && $project->getValidated()){
        $data['project']=$project;
        
        //Load all tasks for owned projects
        $criteria = array('idProject' => $idProject);
        $data['tasks']=$this->doctrine->em->getRepository('Entities\StTasks')->findBy($criteria);
        
        $this->load->view('project/project_detail', $data);      
      } else {
        redirect('project');
      }
    } else {
      redirect('project');
    }    
  }
  
  /**
   *  ONLY ADMIN
   */   
  public function admin()
	{
    $this->notLoggedToLogin();
    //Check if it is admin!!
    if($this->session->userdata('email')!="xeviscc@gmail.com"){
      redirect('projects');
    }
     
    
    //Load projects published and not validated
    $criteria = array('published' => TRUE, 'validated' => FALSE);
    $data['project_list']=$this->doctrine->em->getRepository('Entities\StProjects')->findBy($criteria);
    
    //Load all tasks for projects to validate
    foreach($data['project_list'] as $proj){
      $criteria = array('idProject' => $proj->getId());
      $data['tasks'][$proj->getId()]=$this->doctrine->em->getRepository('Entities\StTasks')->findBy($criteria);
    }
    
    $data['menu_item'] = 'proj_admin';
    $this->load->view('project/admin_view', $data);
	}
  
  public function validate($project_id = '0'){
    $this->notLoggedToLogin();
    //Check if it is admin!!
    if($this->session->userdata('email')!="xeviscc@gmail.com"){
      redirect('projects');
    } 
    
    $project = $this->doctrine->em->find('Entities\StProjects', $project_id);
    
    if(!empty($project)){
      $project->setValidated(TRUE);
      
      $this->doctrine->em->persist($project);
      $this->doctrine->em->flush();
    }    
    
    //TRACK THIS EVENT
    $item = new Entities\StItems;
    
    $item->setIdObject($project->getId());
    $item->setDate((new \DateTime("now")));
    $item->setAction('PUBLISHED');
    $item->setIdUser($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
    $item->setType($this->doctrine->em->find('Entities\StItemTypes', 'PROJECT'));
    $this->doctrine->em->persist($item);
    $this->doctrine->em->flush();
    //END TRACK THIS EVENT
    
    $this->admin();
  }
  
 public function denial($project_id = '0'){
    $this->notLoggedToLogin();
    //Check if it is admin!!
    if($this->session->userdata('email')!="xeviscc@gmail.com"){
      redirect('projects');
    } 
    
    $project = $this->doctrine->em->find('Entities\StProjects', $project_id);
    
    if(!empty($project)){
      $project->setPublished(FALSE);
      
      $this->doctrine->em->persist($project);
      $this->doctrine->em->flush();
    }    
    
    $this->admin();
  }
  
  //UTIL
  public function getCountryName($countryCode=NULL){
    if(isset($countryCode)){
        foreach($data['country_list'] as  $country){
            if($countryCode == $country->getCode()->getCode()){
                return $country->getName();
            }
        }
    }
      
        
  }
  
  
  
}

?>