<?php
class skills_dto 
{
  
  private $_skill;
  private $_description;
  
  /**
   *
   */
  public function getSkill(){
    return $this->_skill;
  }
  public function setSkill($skill){
    $this->_skill = $skill;
  }
  public function getDescription(){
    return $this->_description;
  }
  public function setDescription($description){
    $this->_description = $description;
  }

}
?>