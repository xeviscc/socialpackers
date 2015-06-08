<?php

class projects_dao extends MY_Model//implements GenericDAO
{

  private $_table_name = 'ST_PROJECTS';
      
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
                  'organizer' => $item->getOrganizer(),
                  'name' => $item->getName(),
                  'country_code' => $item->getCountryCode(),
                  'description' => $item->getDescription()
            );
    return $data;
  }
  
  public function populateDTO_Model($row){
    $this->load->model('projects_dto');
    $this->projects_dto->setId($row['id']);
    $this->projects_dto->setOrganizer($row['organizer']);
    $this->projects_dto->setName($row['name']);
    $this->projects_dto->setCountryCode($row['country_code']);
    $this->projects_dto->setDescription($row['description']);
    
    return $this->projects_dto;
  }
}

?>