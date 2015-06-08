<?php

class users_dao extends MY_Model//implements GenericDAO
{

  private $_table_name = 'ST_USERS';
      
	public function __construct()
	{
		parent::__construct();
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
  
  public function getTableName(){
    return $this->_table_name;
  }
  
  public function populateModel_DTO($item){
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
                  'sex' => $item->getSex(),
                  'conf_token' => $item->getConfToken(),
                  'country_code' => $item->getCountryCode(),
                  'skills' => $item->getSkills()
            );
    return $data;
  }
  
  public function populateDTO_Model($row){
    $this->load->model('users_dto');
    $this->users_dto->setId($row['id']);
    $this->users_dto->setName($row['name']);
    $this->users_dto->setMiddleName($row['middle_name']);
    $this->users_dto->setLastName($row['last_name']);
    $this->users_dto->setEmail($row['email']);
    $this->users_dto->setPassword($row['password']);
    $this->users_dto->setBirth($row['birth']);
    $this->users_dto->setAboutMe($row['about_me']);
    $this->users_dto->setRegDate($row['reg_date']);
    $this->users_dto->setDescription($row['description']);
    $this->users_dto->setWhat($row['what']);
    $this->users_dto->setPicture($row['picture']);
    $this->users_dto->setSex($row['sex']);                                             
    $this->users_dto->setConfToken($row['conf_token']);
    $this->users_dto->setCountryCode($row['country_code']);
    $this->users_dto->setSkills($row['skills']);
    
    return $this->users_dto;
  }
}
     
/*     
class user_dao extends MY_Model
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
}       */
?>