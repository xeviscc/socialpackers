<?php
class items_dto 
{
  
  private $_id;
  private $_type;
  
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
  public function getType(){
    return $this->_type;
  }
  public function setType($type){
    $this->_type = $type;
  }

}
?>