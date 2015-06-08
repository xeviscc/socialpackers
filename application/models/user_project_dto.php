<?php
class user_project_dto 
{
  
  private $_id;
  private $_id_user;
  private $_id_project;
  private $_id_task;
  private $_approved;
  
  /**
   *
   */

  public function getId(){
    return $this->_id;
  }
  public function setId($id){
    $this->_id = $id;
  }

  public function getIdUser(){
    return $this->_id_user;
  }
  public function setIdUser($id_user){
    $this->_id_user = $id_user;
  }

  public function getIdProject(){
    return $this->_id_project;
  }
  public function setIdProject($id_project){
    $this->_id_project = $id_project;
  }
  
  public function getIdTask(){
    return $this->_id_task;
  }
  public function setIdTask($id_task){
    $this->_id_task = $id_task;
  }
  
  public function getApproved(){
    return $this->_approved;
  }
  public function setApproved($approved){
    $this->_approved = $approved;
  }
}
?>
