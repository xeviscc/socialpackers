<?php
class privacy_level_dto 
{
  
  private $_id;
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
  public function getPrivacyLevel(){
    return $this->_privacy_level;
  }
  public function setPrivacyLevel($privacy_level){
    $this->_privacy_level = $privacy_level;
  }
}
?>