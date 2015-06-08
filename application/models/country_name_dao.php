<?php

class country_name_dao extends MY_Model//implements GenericDAO
{

  private $_table_name = 'ST_COUNTRY_NAME';
      
	public function __construct()
	{
		parent::__construct();
	}
 
  public function findByLocale($locale){
    $query = "SELECT * FROM $this->_table_name WHERE LOCALE='$locale'";
    $item_list = $this->db->query($query);
         
    $result = array();    
    foreach ( $item_list->result_array() as $item ) {
      $result[]=clone $this->populateDTO_Model($item);
    }
    return $result;   
  }
  
  public function getTableName(){
    return $this->_table_name;
  }
  
  public function populateModel_DTO($item){
    $data = array(
                  'code' => $item->getCode(),
                  'locale' => $item->getLocale(),
                  'name' => $item->getName()
            );
    return $data;
  }
  
  public function populateDTO_Model($row){
    $this->load->model('country_name_dto');
    $this->country_name_dto->setCode($row['code']);
    $this->country_name_dto->setLocale($row['locale']);
    $this->country_name_dto->setName($row['name']);
    
    return $this->country_name_dto;
  }
}

?>