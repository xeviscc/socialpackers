<?php
class comments extends MY_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->notLoggedToLogin();
	}
  
  public function saveText(){
    $comment = json_decode($this->input->post('obj'), true);
    if($comment) {
      $this->saveStComment($comment['idItem'], $comment['comment'], 'COMMENT');
      echo json_encode('OK');
    } else {
      echo 'FAIL';
    }
  }
  
  public function saveReply(){
    $comment = json_decode($this->input->post('obj'), true);
    if($comment) {
      $com = $this->saveStComment($comment['idItem'], $comment['comment'], $comment['type'],'REPLY');
      echo $this->json_encode_comment($com);
      
    } else {
      echo 'FAIL';
    }
  }
  
  
  public function uploadFiles(){
   $this->load->library('upload');
   $this->load->helper(array('form', 'url'));
   
   $error = 0;
   $keys = array();
   
   foreach($_FILES as $key => $a){
    $keys[] = $key;
   }
   
   $this->total_count_of_files = count($keys);
   /*Because here we are adding the "$_FILES['userfile']['name']" which increases the count, and for next loop it raises an exception, And also If we have different types of fileuploads */
   for($i=0; $i<$this->total_count_of_files; $i++)
   {
  
     $_FILES['userfile']['name']    = $_FILES[$keys[$i]]['name'];
     $_FILES['userfile']['type']    = $_FILES[$keys[$i]]['type'];
     $_FILES['userfile']['tmp_name'] = $_FILES[$keys[$i]]['tmp_name'];
     $_FILES['userfile']['error']       = $_FILES[$keys[$i]]['error'];
     $_FILES['userfile']['size']    = $_FILES[$keys[$i]]['size'];
  
     $config['file_name']     = rand().rand().rand().rand();
     
     //Check if user folder exists 
     $link_path = '/uploads/u'.str_pad($this->session->userdata('id'), 15, "0", STR_PAD_LEFT); 
     $dir_path = '.'.$link_path;
     if (!is_dir($dir_path)) {
         mkdir($dir_path);
     }
     //Check if roadmap folder exists
     $link_path =$link_path.'/r'.str_pad($this->input->post('idItem'), 15, "0", STR_PAD_LEFT);
     $dir_path = '.'.$link_path;
     if (!is_dir($dir_path)) {
         mkdir($dir_path);
     }
     
     
     $config['upload_path']   = $dir_path; 
     $config['allowed_types'] = 'jpg|jpeg|gif|png';
     $config['max_size']      = '0';
     $config['overwrite']     = FALSE;
  
    $this->upload->initialize($config);
  
    if($this->upload->do_upload()){
      $data_picture = $this->upload->data(); // Returns information about your uploaded file.
      $picture_name = $data_picture['raw_name'].$data_picture['file_ext']; // Here it is
      $file_name = $link_path.'/'.$picture_name;
    } else {
      $error += 1;
    }
    
    $this->saveStComment($this->input->post('idItem'), $file_name, 'MULTIMEDIA');
    
    
   }
   if($error > 0){ echo FALSE; }else{ echo TRUE; }
  
  }
  
  function saveStComment($idItem, $comment, $type, $type_item='COMMENT'){
    $com = new Entities\StComments;
  
    $com->setIdItem($idItem);
    $com->setComment($comment);
    $com->setidUser($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
    $com->setDate((new \DateTime("now")));
    $com->setType($this->doctrine->em->find('Entities\StItemTypes', $type));
    $com->setApproved(true);
    
    $this->doctrine->em->persist($com);
    $this->doctrine->em->flush();
    
    //TRACK THIS EVENT
    $item = new Entities\StItems;
    
    $item->setIdObject($com->getId());
    $item->setDate((new \DateTime("now")));
    $item->setAction('CREATE');
    $item->setIdUser($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
    $item->setType($this->doctrine->em->find('Entities\StItemTypes', $type_item));
    $this->doctrine->em->persist($item);
    $this->doctrine->em->flush();
    //END TRACK THIS EVENT
    
    return $com;
    
  }
  
  function json_encode_comment($com){
    return '{'.
      '"id" : "'.$com->getId().'",'.
      '"idItem" : "'.$com->getIdItem().'",'.
      '"comment" : "'.$com->getComment().'",'. 
      '"username" : "'.$com->getIdUser()->getName().'",'.
      '"url" : "'.site_url("user/detail/".$com->getIdUser()->getId()).'",'.      
      '"idDate" : "'.$com->getDate()->format("Y-m-d").'",'.
      '"idType" : "'.$com->getType()->getType().'",'.
      '"picture" : "'.$com->getIdUser()->getPicture().'"'.
    '}';   
  }
  

}

?>