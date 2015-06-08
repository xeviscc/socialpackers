<?php
class actions_dto 
{
  
  private $_action;
  
  /**
   *
   */
  public function getAction(){
    return $this->_action;
  }
  public function setAction($action){
    $this->_action = $action;
  }
}
?>