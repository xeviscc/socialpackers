<?php
class friends_dto 
{
  
  private $_id;
  private $_from_user;
  private $_to_user;
  
  /**
   *
   */

  public function getId(){
    return $this->_id;
  }
  public function setId($id){
    $this->_id = $id;
  }

  /**
   *
   */
  public function getFromUser(){
    return $this->_from_user;
  }
  public function setFromUser($from_user){
    $this->_from_user = $from_user;
  }

  public function getToUser(){
    return $this->_to_user;
  }
  public function setToUser($to_user){
    $this->_to_user = $to_user;
  }
}
?>