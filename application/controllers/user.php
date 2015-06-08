<?php
class user extends MY_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->notLoggedToLogin();
    $data['menu_item'] = 'user';
    $this->load->vars($data);
	}
  
	public function index($filtered_list=NULL)
	{
    //Load my friends
    $qb = $this->doctrine->em->createQueryBuilder();
    $criteria = array('accepted' => TRUE, 'toUser' => $this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
    $friends_list=$this->doctrine->em->getRepository('Entities\StFriends')->findBy($criteria);
    /*
    $friends_list = array();   
    foreach ($friends_from as $f) {
      $friends_list[]=$f->getFromUser();
    }*/
    /*
    $friends_list = $qb->select('f')
       ->from('Entities\StFriends', 'f')
       ->where(//$qb->expr()->orX(
//           $qb->expr()->eq('f.from_user', $this->session->userdata('id'))//,
          $qb->expr()->eq('f.to_user', $this->session->userdata('id')//)
       ))
       ->andWhere($qb->expr()->eq('f.accepted', TRUE))
       ->getQuery()
       ->getResult();
        */
    //Load all users
    if(empty($filtered_list)) {
      $data['users_list']=$this->doctrine->em->getRepository('Entities\StUsers')->findAll();
    } else {
      $data['users_list']=$filtered_list;
    }
    
    $data['friends_list']=$friends_list;

    $this->load->view('user/user_main', $data);
	}

  
  public function filter(){
    //TODO: Save filter
    //$data['filter']
    $criteria = array('full_name' => '%'.$this->input->post('full_name').'%' );
    $where = NULL;
    //Check country in roadmap!!
    /*
    if($this->input->post('country')) {
      $criteria['countryCode'] = $this->input->post('country');
      $where = 'p.countryCode = :countryCode'; 
    }                           */

    $qb = $this->doctrine->em->createQueryBuilder();
    
    //$criteria['validated']=TRUE;
    //if(isset($where)){ $where .= ' AND '; }
    $user_list = $qb->select('u')
          ->from('Entities\StUsers','u')
          ->where($qb->expr()->like(
                  $qb->expr()->concat(
                    'u.name', 
                    $qb->expr()->concat( 
                       $qb->expr()->concat($qb->expr()->literal(' '), 'u.middleName'),
                       $qb->expr()->concat($qb->expr()->literal(' '), 'u.lastName')
                    )
                  ),
                  ':full_name'))
          ->setParameters($criteria)
          ->getQuery()
          ->getResult();
  

    //Load view
    $this->index($user_list);
  
  }
  
  
  function detail($idUser){
    //Check if they are friends
    if($idUser){
      $data['u'] = $this->doctrine->em->find('Entities\StUsers', $idUser);
      
      
      /*
      
        CHECK IT
      
      
      */
      $criteria = array('idUser' => $idUser);
      $roadmap = $this->doctrine->em->getRepository('Entities\StRoadmaps')->findBy($criteria);
      
      //Check the user profile
      if(empty($roadmap) || sizeof($roadmap)>1){
        $data['error_message']="The user does not have a roadmap yet";
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
        $data['object'] = json_encode($object); 
        $data['roadmapID'] = $roadmap->getId();
        
      }

      
      $this->load->view('user/user_detail', $data);      
    } else {
      redirect('users');
    }    
  }
  
  
  
}

?>