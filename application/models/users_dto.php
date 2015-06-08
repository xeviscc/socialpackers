<?php
class users_dto 
{
  
  private $_id;
  private $_name;
  private $_middle_name;
  private $_last_name;
  private $_email;
  private $_password;
  private $_birth;
  private $_about_me;
  private $_reg_date;
  private $_description;
  private $_what;
  private $_picture;
  private $_sex;
  private $_conf_token;
  private $_country_code;
  private $_skills;
  
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
  
  public function getMiddleName(){
    return $this->_middle_name;
  }
  public function setMiddleName($middle_name){
    $this->_middle_name = $middle_name;
  }
  
  public function getLastName(){
    return $this->_last_name;
  }
  public function setLastName($last_name){
    $this->_last_name = $last_name;
  }
  
  public function getEmail(){
    return $this->_email;
  }
  public function setEmail($email){
    $this->_email = $email;
  }
  
  public function getPassword(){
    return $this->_password;
  }
  public function setPassword($password){
    $this->_password = $password;
  }
  
  public function getBirth(){
    return $this->_birth;
  }
  public function setBirth($birth){
    $this->_birth = $birth;
  }
  
  public function getAboutMe(){
    return $this->_about_me;
  }
  public function setAboutMe($about_me){
    $this->_about_me = $about_me;
  }
  
  public function getRegDate(){
    return $this->_reg_date;
  }
  public function setRegDate($reg_date){
    $this->_reg_date = $reg_date;
  }
  
  public function getDescription(){
    return $this->_description;
  }
  public function setDescription($description){
    $this->_description = $description;
  }
  
  public function getWhat(){
    return $this->_what;
  }
  public function setWhat($what){
    $this->_what = $what;
  }
  
  public function getPicture(){
    return $this->_picture;
  }
  public function setPicture($picture){
    $this->_picture = $picture;
  }
  
  public function getSex(){
    return $this->_sex;
  }
  public function setSex($sex){
    $this->_sex = $sex;
  }
  
  public function getConfToken(){
    return $this->_conf_token;
  }
  public function setConfToken($conf_token){
    $this->_conf_token = $conf_token;
  }
  
  public function getCountryCode(){
    return $this->_country_code;
  }
  public function setCountryCode($country_code){
    $this->_country_code = $country_code;
  }
  
  public function getSkills(){
    return $this->_skills;
  }
  public function setSkills($skills){
    $this->_skills = $skills;
  }
}
?>