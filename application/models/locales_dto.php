<?php
class locales_dto 
{
  
  private $_locale;
  private $_name;
  
  /**
   *
   */

  public function getId(){
    return $this->_id;
  }
  public function setId($id){
    $this->_id = $id;
  }
  public function getName(){
    return $this->_name;
  }
  public function setName($name){
    $this->_name = $name;
  }
}
?>