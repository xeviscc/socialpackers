<?php
class roadmaps_dto 
{

  private $_id;
  private $_id_user;
  private $_budget;
  
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
  public function getIdUser(){
    return $this->_id_user;
  }
  public function seIdUser($id_user){
    $this->_id_user = $id_user;
  }
  
  public function getBudget(){
    return $this->_budget;
  }
  public function setBudget($budget){
    $this->_budget = $budget;
  }

}
?>