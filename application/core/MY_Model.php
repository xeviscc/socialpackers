<?php
class MY_Model extends CI_Model
{
  public function __construct()
	{
		parent::__construct();
	}

  public function save($item){
    $data = $this->populateModel_DTO($item);
    $this->db->insert($this->getTableName(), $data);
    return $this->db->insert_id(); 
  }
  
  public function findById($id){
    $query = 'SELECT * FROM '.$this->getTableName().' WHERE ID='.$id;
    $result = $this->db->query($query);
         
    if ($result->num_rows() == 1)
    {
      return $this->populateDTO_Model($result->row_array());
    }
    return '';
  }
  
  public function update($item){
    $this->db->where('ID', $item->getId());
    $data = $this->populateModel_DTO($item);
    $this->db->update($this->getTableName(), $data); 
  }
  
  public function remove($id){
    $this->db->where('ID', $id);
    $this->db->delete($this->getTableName()); 
  }
  
  public function findAll(){
    $query = 'SELECT * FROM '.$this->getTableName();
    $item_list = $this->db->query($query);
    
    $result = array();    
    foreach ( $item_list->result_array() as $item ) {
      $result[]=clone $this->populateDTO_Model($item);
    }
    return $result;    
  }
  
  //Force Extending class to define this method
  public function populateModel_DTO($item) {
    throw Exception();
  }
  public function populateDTO_Model($array){
    throw Exception();
  }
  public function getTableName(){
    throw Exception();  
  }
}

/*
class user_dao extends aDAO
{
	public function __construct()
	{
		parent::__construct();
    $this->setTableName('USER');
	}
  
  //
  // CUSTOM DATA BASE QUERIES
  //        
  public function findByLogin($email, $pass){
    $query = "SELECT * FROM $this->_table_name WHERE EMAIL='$email' AND PASSWORD='$pass'";
    $result = $this->db->query($query);
         
    if ($result->num_rows() == 1)
    {
      return $this->populateDTO_Model($result->row_array());
    }
    return '';
  }
  
  public function findByEmail($email){
    $query = "SELECT * FROM $this->_table_name WHERE EMAIL='$email'";
    $result = $this->db->query($query);
         
    if ($result->num_rows() == 1)
    {
      return $this->populateDTO_Model($result->row_array());
    }
    return '';
  }

  //
  // IMPLEMENTATION OF ABSTRACT CLASSES
  //
  private function populateModel_DTO($item){
    $data = array(
                  //'id' => $item->getId(),
                  'name' => $item->getName(),
                  'middle_name' => $item->getMiddleName(),
                  'last_name' => $item->getLastName(),
                  'email' => $item->getEmail(),
                  'password' => $item->getPassword(),
                  'birth' => $item->getBirth(),
                  'about_me' => $item->getAboutMe(),
                  'reg_date' => $item->getRegDate(),
                  'description' => $item->getDescription(),
                  'what' => $item->getWhat(),
                  'picture' => $item->getPicture(),
                  'sex' => $item->getSex()
            );
    return $data;
  }
  
  private function populateDTO_Model($row){
    $this->load->model('user_dto');
    $this->user_dto->setId($row['id']);
    $this->user_dto->setName($row['name']);
    $this->user_dto->setMiddleName($row['middle_name']);
    $this->user_dto->setLastName($row['last_name']);
    $this->user_dto->setEmail($row['email']);
    $this->user_dto->setPassword($row['password']);
    $this->user_dto->setBirth($row['birth']);
    $this->user_dto->setAboutMe($row['about_me']);
    $this->user_dto->setRegDate($row['reg_date']);
    $this->user_dto->setDescription($row['description']);
    $this->user_dto->setWhat($row['what']);
    $this->user_dto->setPicture($row['picture']);
    $this->user_dto->setSex($row['sex']);                                             
    return $this->user_dto;
  }
}*/

?>