<?php
class city_list_dto 
{
  
  private $_id;
  private $_country;
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

  public function getCountry(){
    return $this->_country;
  }
  public function setCountry($country){
    $this->_country = $country;
  }

  public function getName(){
    return $this->_name;
  }
  public function setName($name){
    $this->_name = $name;
  }
}
?>