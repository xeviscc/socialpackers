<?php

class roadmaps_dao extends MY_Model//implements GenericDAO
{

  private $_table_name = 'ST_ROADMAPS';
      
	public function __construct()
	{
		parent::__construct();
	}
  
  public function findByIdUser($idUser){
    $query = "SELECT * FROM $this->_table_name WHERE ID_USER='$idUser'";
    $result = $this->db->query($query);
         
    if ($result->num_rows() == 1)
    {
      return $this->populateDTO_Model($result->row_array());
    }
    return '';
  }
  
  public function getTableName(){
    return $this->_table_name;
  }
  
  public function populateModel_DTO($item){
    $data = array(
                  //'id' => $item->getId(),
                  'id_user' => $item->getIdUser(),
                  'budget' => $item->getBudget()
            );
    return $data;
  }
  
  public function populateDTO_Model($row){
    $this->load->model('roadmaps_dto');
    $this->roadmaps_dto->setId($row['id']);
    $this->roadmaps_dto->setIdUser($row['id_user']);
    $this->roadmaps_dto->setBudget($row['budget']);
    
    return $this->roadmaps_dto;
  }
}

?>