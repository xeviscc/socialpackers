<?php
class waypoint extends MY_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->notLoggedToLogin();
	}
  
  public function save(){
    $position = json_decode($this->input->post('coords'),true);
    
    if($position) {
      $wp = new Entities\StWaypoints;
      
      $wp->setIdUser($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
      $wp->setLatitude($position['latitude']);
      $wp->setLongitude($position['longitude']);
      $wp->setCheckinDate((new \DateTime("now")));
      
      $this->doctrine->em->persist($wp);
      $this->doctrine->em->flush();
      
      //TRACK THIS EVENT
      $item = new Entities\StItems;
      
      $item->setIdObject($wp->getId());
      $item->setDate((new \DateTime("now")));
      $item->setAction('CREATE');
      $item->setIdUser($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
      $item->setType($this->doctrine->em->find('Entities\StItemTypes', 'WAYPOINT'));
      $this->doctrine->em->persist($item);
      $this->doctrine->em->flush();
      //END TRACK THIS EVENT
      
      echo json_encode($position);
    } else {
      echo 'FAIL';
    }
  }
  

}

?>