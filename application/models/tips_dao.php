<?php

class tips_dao extends MY_Model//implements GenericDAO
{

  private $_table_name = 'ST_TIPS';
      
	public function __construct()
	{
		parent::__construct();
	}
  
  /**
   * CUSTOM FUNCTIONS HERE
   */
   
  public function searchByExample($item) {
    //$limit = 10;
    //$offset = 20;
    
    //echo var_dump($this->populateModel_DTO($item) );
    $data = array();
    if($item->getCountryCode()){$data['country_code']=$item->getCountryCode();}
/*    $tokens = explode(";",$item->getCategories());
    foreach ( $tokens as $cat ) {
      echo '<span class="category">'.$cat.'</span>';
    }*/
    if($item->getCategories()){$data['categories']=$item->getCategories();}
    
    
    $item_list = $this->db->get_where($this->_table_name, $data);
    
    //$item_list = $this->db->query($query);
    //echo $item_list->num_rows();
    //echo var_dump($item_list->row_array());
     
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
    $data = array();
    if($item->getIdUser()){$data['id_user']=$item->getIdUser();}
    if($item->getTip()){$data['tip']=$item->getTip();}
    if($item->getPublicationDate()){$data['publication_date']=$item->getPublicationDate();}
    if($item->getCountryCode()){$data['country_code']=$item->getCountryCode();}
    if($item->getCategories()){$data['categories']=$item->getCategories();}
  
                  /*
    $data = array(
                  //'id' => $item->getId(),
                  'id_user' => $item->getIdUser(),
                  'tip' => $item->getTip(),                  
                  'publication_date' => $item->getPublicationDate(),
                  'country_code' => $item->getCountryCode(),
                  'categories' => $item->getCategories()
            );  */
            
    return $data;
  }
  
  public function populateDTO_Model($row){
    $this->load->model('tips_dto');
    $this->tips_dto->setId($row['id']);
    $this->tips_dto->setIdUser($row['id_user']);
    $this->tips_dto->setTip($row['tip']);
    $this->tips_dto->setPublicationDate($row['publication_date']);
    $this->tips_dto->setCountryCode($row['country_code']);
    $this->tips_dto->setCategories($row['categories']);
    return $this->tips_dto;
  }
  
}

?>