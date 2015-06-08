<?php
class tracker_dto 
{
  
  private $_id;
  private $_item_origin;
  private $_item_destiny;
  private $_track_date;
  private $_id_action;
  private $_isAutomatic;
  
  /**
   *
   */

  public function getId(){
    return $this->_id;
  }
  public function setId($id){
    $this->_id = $id;
  }

  public function getItemDestiny(){
    return $this->_item_origin;
  }
  public function setItemDestiny($item_origin){
    $this->_item_origin = $item_origin;
  }

  public function getItemDestiny(){
    return $this->_item_destiny;
  }
  public function setItemDestiny($item_destiny){
    $this->_item_destiny = $item_destiny;
  }

  public function getTrackDate(){
    return $this->_track_date;
  }
  public function setTrackDate($track_date){
    $this->_track_date = $track_date;
  }

  public function getIdAction(){
    return $this->_id_action;
  }
  public function setIdAction($id_action){
    $this->_id_action = $id_action;
  }
  
  public function isAutomatic(){
    return $this->_isAutomatic;
  }
  public function setAutomatic($isAutomatic){
    $this->_isAutomatic = $isAutomatic;
  }
?>