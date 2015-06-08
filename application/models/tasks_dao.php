<?php

class tasks_dao extends MY_Model//implements GenericDAO
{

  private $_table_name = 'ST_TASKS';
      
	public function __construct()
	{
		parent::__construct();
	}
  
  public function getTableName(){
    return $this->_table_name;
  }
  
  public function populateModel_DTO($item){
    $data = array(
                  //'id' => $item->getId(),
                  'id_project' => $item->getIdProject(),                  
                  'name' => $item->getName(),
                  'description' => $item->getDescription(),
                  'requeriments' => $item->getRequeriments(),
                  'reward' => $item->getReward(),
                  'start_date' => $item->getStartDate(),
                  'end_date' => $item->getEndDate(),
                  'start_schedule' => $item->getStartSchedule(),                  
                  'end_schedule' => $item->getEndSchedule(),
                  'num_users_needed' => $item->getNumUsersNeeded(),
                  'skills' => $item->getSkills()
            );
    return $data;
  }
  
  public function populateDTO_Model($row){
    $this->load->model('tasks_dto');
    $this->tasks_dto->setId($row['id']);
    $this->tasks_dto->setIdProject($row['id_project']);
    $this->tasks_dto->setName($row['name']);
    $this->tasks_dto->setDescription($row['description']);
    $this->tasks_dto->setRequeriments($row['requeriments']);
    $this->tasks_dto->setReward($row['reward']);
    $this->tasks_dto->setStartDate($row['start_date']);
    $this->tasks_dto->setEndDate($row['end_date']);
    $this->tasks_dto->setStartSchedule($row['start_schedule']);
    $this->tasks_dto->setEndSchedule($row['end_schedule']);
    $this->tasks_dto->setNumUsersNeeded($row['num_users_needed']);
    $this->tasks_dto->setSkills($row['skills']);
    
    return $this->tasks_dto;
  }
}

?>