<?php
class main extends MY_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->notLoggedToLogin();
    
    //Find list of countries.
    /*$locale = "en-gb";
    $locale_session = $this->session->userdata('locale'); 
    if( !empty($locale_session) ){
      $locale = $locale_session;
    }
    $data['country_list']=$this->doctrine->em->getRepository('Entities\StCountryName')
                              ->findByLocale($locale);
                              */
    //Item menu.                              
    $data['menu_item'] = 'main';
    $this->load->vars($data);
	}
  
	public function index()
	{
    /*
    //GET FRIENDS
    //Load my friends
    $qb = $this->doctrine->em->createQueryBuilder();
    $criteria = array('accepted' => TRUE, 'toUser' => $this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
    $friends_from=$this->doctrine->em->getRepository('Entities\StFriends')->findBy($criteria);
    $criteria2 = array('accepted' => TRUE, 'fromUser' => $this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
    $friends_to=$this->doctrine->em->getRepository('Entities\StFriends')->findBy($criteria2);

    
    //GET ALL WAYPOINTS AND COMMENTS TO FRIENDS
    $friends_list = array();   
    $waypoints_list = array();
    $comments_roadmap_list = array();
    foreach ($friends_from as $f) {
      $friends_list[]=$f->getFromUser();
      
      //TESTING
      //Get waypoints
      $critWaypoints = array("idUser" => $f->getFromUser()->getId());
      $resultsWp = $this->doctrine->em->getRepository('Entities\StWaypoints')->findBy($critWaypoints);
      $waypoints_list = array_merge($waypoints_list, $resultsWp);
      //Get status
      $critComments = array("idUser" => $f->getFromUser()->getId()); //Filter for idRoadmap too... idItem!!
      $resultsCmm = $this->doctrine->em->getRepository('Entities\StComments')->findBy($critComments);
      $comments_roadmap_list = array_merge($comments_roadmap_list, $resultsCmm);    
      //TESTING  

      
    }
    foreach ($friends_to as $f) {
      $friends_list[]=$f->getToUser();
      
      //TESTING
      //Get waypoints
      $critWaypoints = array("idUser" => $f->getToUser()->getId());
      $resultsWp = $this->doctrine->em->getRepository('Entities\StWaypoints')->findBy($critWaypoints);
      $waypoints_list = array_merge($waypoints_list, $resultsWp);
      //Get status
      $critComments = array("idUser" => $f->getToUser()->getId()); //Filter for idRoadmap too... idItem!!
      $resultsCmm = $this->doctrine->em->getRepository('Entities\StComments')->findBy($critComments);
      $comments_roadmap_list = array_merge($comments_roadmap_list, $resultsCmm);    
      //TESTING  

    }
    
    $data['waypoints_list']=$waypoints_list;
    $data['comments_roadmap_list']=$comments_roadmap_list;
    $data['friends_list']=$friends_list;
   */
   
   //GET ALL CONTENT ON ITEMS
   $qb = $this->doctrine->em->createQueryBuilder();
   $items_list = $qb->select('it')
      ->from('Entities\StItems','it')
      ->orderBy('it.date','DESC')
      ->getQuery()
      ->getResult();
    
   $data['items_list'] = $items_list;
            
   //$items_list = $this->doctrine->em->getRepository('Entities\StItems')->findAll();
   $relation_list = array();
   $comments_list = array();   
   foreach ($items_list as $item) {
      switch ($item->getType()->getType()) {
          case "TIP":
              $relation_list[$item->getId()] = $this->doctrine->em->find('Entities\StTips', $item->getIdObject());
              break;
          case "COMMENT":
              $relation_list[$item->getId()] = $this->doctrine->em->find('Entities\StComments', $item->getIdObject());
              break;
          case "MULTIMEDIA":
              $relation_list[$item->getId()] = $this->doctrine->em->find('Entities\StComments', $item->getIdObject());
              break;
          case "WAYPOINT":
              $relation_list[$item->getId()] = $this->doctrine->em->find('Entities\StWaypoints', $item->getIdObject());
              break;
          case "PROJECT":
              $relation_list[$item->getId()] = $this->doctrine->em->find('Entities\StProjects', $item->getIdObject());
              break;
          case "REPLY":
              $com = $this->doctrine->em->find('Entities\StComments', $item->getIdObject());
              if(!isset($comments_list[$com->getIdItem().$com->getType()->getType()])) { $comments_list[$com->getIdItem()] = array(); }
              $comments_list[$com->getIdItem().$com->getType()->getType()][] = $com;
              break;
      }
   }
   
   $data['relation_list'] = $relation_list;
   $data['comments_list'] = $comments_list;
   
   $this->load->view('main/main', $data);
 	}

	public function view()
	{
    //Search for links for the left column
    
    //Search for feeds and order them by date.
    
    //Search for ads for the right column
    
    //Load the view.
    $this->load->view('project/project_main', $data);
	}
  
  public function publish(){
    //Validate the form values and publish it.
    $this->load->view('project/publish_ok');
  
  }
  public function search($country){
    if($country == null) {
      $country = "Spain"; //TODO: Get country depending on the IP.
    }
  
    echo "Searching projects that fits something";
  
  }
  
}

?>