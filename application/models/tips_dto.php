<?php
class tips_dto 
{
  
  private $_id;
  private $_id_user;
  private $_tip;
  private $_publication_date;
  private $_country_code;
  private $_categories;
  
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
  
  public function getTip(){
    return $this->_tip;
  }
  public function setTip($tip){
    $this->_tip = $tip;
  }

  public function getPublicationDate(){
    return $this->_publication_date;
  }
  public function setPublicationDate($publication_date){
    $this->_publication_date = $publication_date;
  }
  
  public function getCountryCode(){
    return $this->_country_code;
  }
  public function setCountryCode($country_code){
    $this->_country_code = $country_code;
  }
  
  public function getCategories(){
    return $this->_categories;
  }
  public function setCategories($categories){
    $this->_categories = $categories;
  }
}
?>
