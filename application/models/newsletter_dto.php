<?php
class newsletter_dto 
{
  
  private $_id;
  private $_email;
  private $_habilitated;
  
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
  public function getEmail(){
    return $this->_email;
  }
  public function setEmail($email){
    $this->_email = $email;
  }

  public function getHabilitated(){
    return $this->_habilitated;
  }
  public function setHabilitated($habilitated){
    $this->_habilitated = $habilitated;
  }
}
?>