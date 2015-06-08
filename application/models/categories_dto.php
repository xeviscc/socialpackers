<?php
class categories_dto 
{
  
  private $_category;
  private $_description;
  
  /**
   *
   */

  public function getCategory(){
    return $this->_category;
  }
  public function setCategory($category){
    $this->_category = $category;
  }
  
  public function getDescription(){
    return $this->_description;
  }
  public function setDescription($description){
    $this->_description = $description;
  }
}
?>