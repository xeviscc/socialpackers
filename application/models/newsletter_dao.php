<?php
class newsletter_dao extends CI_Model //implements GenericDAO
{

  private $_table_name = 'ST_NEWSLETTER';
  
	public function __construct()
	{
		parent::__construct();
	}
 
  public function save($item){
    $data = array(
              'email' => $item->getEmail(),
              'habilitated' => $item->getHabilitated()
            ); 
    $this->db->insert('ST_NEWSLETTER', $data);
  }
  
  public function update($item){         
  }
  
  public function findById($id){
//    $query = "SELECT * FROM ACTION_LIST WHERE ID=$id";
    $result = $this->db->query($query);
         
    if ($result->num_rows() > 0)
    {
      return $result;
    }
    return '';
  }
  
  public function remove($item){
  }
  
  public function findAll(){
//    $query = "SELECT * FROM ACTION_LIST";
    $result = $this->db->query($query);
    return $result;
  }
}
?>