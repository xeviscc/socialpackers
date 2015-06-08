<?php
class tasks_dto 
{
  
  private $_id;
  private $_id_project;
  private $_name;
  private $_description;
  private $_requeriments;
  private $_reward;
  private $_start_date;
  private $_end_date;
  private $_start_schedule;
  private $_end_schedule;
  private $_num_users_needed;
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

  public function getIdProject(){
    return $this->_id_project;
  }
  public function setIdProject($id_project){
    $this->_id_project = $id_project;
  }

  public function getName(){
    return $this->_name;
  }
  public function setName($name){
    $this->_name = $name;
  }

  public function getDescription(){
    return $this->_description;
  }
  public function setDescription($description){
    $this->_description = $description;
  }
  
  public function getRequeriments(){
    return $this->_requeriments;
  }
  public function setRequeriments($requeriments){
    $this->_requeriments = $requeriments;
  }

  public function getReward(){
    return $this->_reward;
  }
  public function setReward($reward){
    $this->_reward = $reward;
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

  public function getStartSchedule(){
    return $this->_start_schedule;
  }
  public function setStartSchedule($start_schedule){
    $this->_start_schedule = $start_schedule;
  }
  
  public function getEndSchedule(){
    return $this->_end_schedule;
  }
  public function setEndSchedule($end_schedule){
    $this->_end_schedule = $end_schedule;
  }

  public function getNumUsersNeeded(){
    return $this->_num_users_needed;
  }
  public function setNumUsersNeeded($num_users_needed){
    $this->_num_users_needed = $num_users_needed;
  }
  
  public function getSkills(){
    return $this->_skills;
  }
  public function setSkills($skills){
    $this->_skills = $skills;
  }
}
?>