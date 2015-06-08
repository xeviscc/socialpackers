<?php
class friends extends MY_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->notLoggedToLogin();
	}
  
  public function request(){
    $idUser = json_decode($this->input->post('idUser'),true);
    
    if($idUser) {
      //Check if the request already exists:
      $cFriendReq = array('toUser' => $idUser, 'fromUser' => $this->session->userdata('id'));
      $friends = $this->doctrine->em->getRepository('Entities\StFriends')->findOneBy($cFriendReq);
      
      if(!isset($friends)) {
        $friends = new Entities\StFriends;                                 
        $friends->setToUser($this->doctrine->em->find('Entities\StUsers', $idUser));
        $friends->setFromUser($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
        $friends->setReqDate((new \DateTime("now")));
        $friends->setAccepted(false);
        
        $this->doctrine->em->persist($friends);
        $this->doctrine->em->flush();
      }
      
      echo json_encode('OK');
    } else {
      echo 'FAIL';
    }
  }
  
  public function accept(){
    $idUser = json_decode($this->input->post('idUser'),true);
    
    if($idUser) {
      $friends = new Entities\StFriends;
                          
      //Check if the request already exists:
      $cFriendReq = array('toUser' => $this->session->userdata('id'), 'fromUser' => $idUser);
      $friends = $this->doctrine->em->getRepository('Entities\StFriends')->findOneBy($cFriendReq);
      
      if($friends) {                                 
        $friends->setAccepted(true);
        
        $this->doctrine->em->persist($friends);
        $this->doctrine->em->flush();
        
        //Create the asociation in the other hand.
        $other_side_friend = new Entities\StFriends;
        $other_side_friend->setFromUser($this->doctrine->em->find('Entities\StUsers', $idUser)); 
        $other_side_friend->setToUser($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
        $other_side_friend->setReqDate((new \DateTime("now")));        
        $other_side_friend->setAccepted(TRUE);
      }
      
      echo json_encode('OK');
    } else {
      echo 'FAIL';
    }
  }
  
  public function decline(){
    $idUser = json_decode($this->input->post('idUser'),true);
    
    if($idUser) {
      
      $cFriendReq = array('toUser' => $this->session->userdata('id'), 'fromUser' => $idUser);
      $friends = $this->doctrine->em->getRepository('Entities\StFriends')->findOneBy($cFriendReq);
      $this->doctrine->em->remove($friends);
      $this->doctrine->em->flush();
      
      echo json_encode('OK');
    } else {
      echo 'FAIL';
    }
  }
  

}

?>