<?php
class social_organization_dto 
{
  
  private $_id;
  private $_name;
  private $_description;
  private $_about_me;
  private $_email;
  private &_country_code;
  private $_stars;
  private $_id_founder;
  private $_logo;
  private $_isNPO;
  
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
  public function getName(){
    return $this->_name;
  }
  public function setName($name){
    $this->_name = $name;
  }

  public function getDescription(){
    return $this->_description;
  }
  public function setDescription($description){
    $this->_description = $description;
  }

  public function getAboutMe(){
    return $this->_about_me;
  }
  public function setAboutMe($about_me){
    $this->_about_me = $about_me;
  }

  public function getEmail(){
    return $this->_email;
  }
  public function setEmail($email){
    $this->_email = $email;
  }

  public function getCountryCode(){
    return $this->_country_code;
  }
  public function seCountryCode($country_code){
    $this->_country_code = $country_code;
  }
  
  public function getStars(){
    return $this->_stars;
  }
  public function setStars($stars){
    $this->_stars = $stars;
  }
  
  public function getIdFounder(){
    return $this->_id_founder;
  }
  public function setIdFounder($id_founder){
    $this->_id_founder = $id_founder;
  }

  public function getLogo(){
    return $this->_logo;
  }
  public function setLogo($logo){
    $this->_logo = $logo;
  }
  
  public function isNPO(){
    return $this->_isNPO;
  }
  public function setNPO($isNPO){
    $this->_isNPO = $isNPO;
  }
}            
?>