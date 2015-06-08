<?php
class privacy_item_dto 
{
  
  private $_id;
  private $_id_item;
  private $_privacy_level;
  
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
  public function getIdItem(){
    return $this->_id_item;
  }
  public function setIdItem($id_item){
    $this->_id_item = $id_item;
  }

  public function getPrivacyLevel(){
    return $this->_privacy_level;
  }
  public function setPrivacyLevel($privacy_level){
    $this->_privacy_level = $privacy_level;
  }
}
?>