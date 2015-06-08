<?php

class roadmap_items_dao extends MY_Model//implements GenericDAO
{

  private $_table_name = 'ST_ROADMAP_ITEMS';
      
	public function __construct()
	{
		parent::__construct();
	}
 
  private function populateModel_DTO($item){
    $data = array(
                  //'id' => $item->getId(),
                  'id_roadmap' => $item->getIdRoadmap(),
                  'start_date' => $item->getStartDate(),
                  'end_date' => $item->getEndDate(),
                  'country_code' => $item->getCountryCode()                  
            );
    return $data;
  }
  
  private function populateDTO_Model($row){
    $this->load->model('roadmap_items_dto');
    $this->roadmap_items_dto->setId($row['id']);
    $this->roadmap_items_dto->setIdRoadmap($row['id_roadmap']);
    $this->roadmap_items_dto->setStartDate($row['start_date']);
    $this->roadmap_items_dto->setEndDate($row['end_date']);
    $this->roadmap_items_dto->setCountryCode($row['country_code']);
    
    return $this->roadmap_items_dto;
  }
}

?>