<?php
class roadmap_items_dto 
{

  private $_id;
  private $_id_roadmap;
  private $_start_date;
  private $_end_date;
  private $_country_code;
  
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
  public function getIdRoadmap(){
    return $this->_id_roadmap;
  }
  public function setIdRoadmap($id_roadmap){
    $this->_id_roadmap = $id_roadmap;
  }
  
  public function getStartDate(){
    return $this->_start_date;
  }
  public function setStartDate($start_date){
    $this->_start_date = $start_date;
  }
  
  public function getEndDate(){
    return $this->_end_date;
  }
  public function setEndDate($end_date){
    $this->_end_date = $end_date;
  }
  
  public function getIdCountry(){
    return $this->_country_code;
  }
  public function setIdCountry($country_code){
    $this->_country_code = $country_code;
  }
}
?>