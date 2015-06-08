<?php
class country_name_dto 
{
  
  private $_code;
  private $_locale;
  private $_name;
  
  /**
   *
   */

  public function getCode(){
    return $this->_code;
  }
  public function setCode($code){
    $this->_code = $code;
  }
  
  public function getLocale(){
    return $this->_locale;
  }
  public function setLocale($locale){
    $this->_locale = $locale;
  }
  
  public function getName(){
    return $this->_name;
  }
  public function setName($name){
    $this->_name = $name;
  }
}
?>