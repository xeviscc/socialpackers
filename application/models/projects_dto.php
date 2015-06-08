<?php
class projects_dto 
{
  
  private $_id;
  private $_organizer;
  private $_name;
  private $_country_code;
  private $_description;
  
  /**
   *
   */

  public function getId(){
    return $this->_id;
  }
  public function setId($id){
    $this->_id = $id;
  }

  public function getOrganizer(){
    return $this->_organizer;
  }
  public function setOrganizer($organizer){
    $this->_organizer = $organizer;
  }

  public function getName(){
    return $this->_name;
  }
  public function setName($name){
    $this->_name = $name;
  }
  
  public function getCountryCode(){
    return $this->_country_code;
  }
  public function setCountryCode($country_code){
    $this->_country_code = $country_code;
  }
  
  public function getDescription(){
    return $this->_description;
  }
  public function setDescription($description){
    $this->_description = $description;
  }
}
?>
