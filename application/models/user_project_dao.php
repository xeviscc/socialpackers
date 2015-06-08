<?php

class user_project_dao extends MY_Model//implements GenericDAO
{

  private $_table_name = 'ST_USER_PROJECT';
      
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
                  'id_user' => $item->getIdUser(),
                  'id_project' => $item->getIdProject(),
                  'id_task' => $item->getIdTask(),
                  'approved' => $item->getApproved()
            );
    return $data;
  }
  
  public function populateDTO_Model($row){
    $this->load->model('user_project_dto');
    $this->user_project_dto->setId($row['id']);
    $this->user_project_dto->setIdUser($row['id_user']);
    $this->user_project_dto->setIdProject($row['id_project']);
    $this->user_project_dto->setIdTask($row['id_task']);
    $this->user_project_dto->setApproved($row['approved']);
    
    return $this->user_project_dto;
  }
}

?>