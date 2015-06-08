<?php
class profile extends MY_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->notLoggedToLogin();
                             
    $data['menu_item'] = 'profile';
    $this->load->vars($data);
	}
  
	public function index()
	{
    $this->load->library('session');
    
    $this->load->model('users_dao');
    $result=$this->users_dao->findByEmail($this->session->userdata('email'));
    
    if(empty($result)){
      echo "Not found";   
    } else {
      $data = array(
                    'id' => $result->getId(),
                    'name' => $result->getName(),
                    'middle_name' => $result->getMiddleName(),
                    'last_name' => $result->getLastName(),
                    'email' => $result->getEmail(),
                    //'password' => $result->getPassword(),
                    'birth' => $result->getBirth(),
                    'about_me' => $result->getAboutMe(),
                    'reg_date' => $result->getRegDate(),
                    'description' => $result->getDescription(),
                    'what' => $result->getWhat(),
                    'picture' => $result->getPicture(),
                    'sex' => $result->getSex()
              );

      
      $this->load->view('profile/profile', $data);
    }  
	}

  public function modify()
	{
  
    $this->load->helper(array('form', 'url'));
    $this->load->library(array('form_validation','encrypt','session'));  
    
    $user = $this->doctrine->em->find('Entities\StUsers', $this->input->post('id'));
    
    if(!empty($user)){

      if($this->input->post('name')) { $user->setName($this->input->post('name')); }
      if($this->input->post('middle_name')) { $user->setMiddleName($this->input->post('middle_name')); }
      if($this->input->post('last_name')) { $user->setLastName($this->input->post('last_name')); }
      if($this->input->post('id')) { $user->setEmail($this->input->post('email')); }
      //if($this->input->post('id')) { $user->setPassword($this->input->post('id')); }
      //if($this->input->post('id')) { $user->setIdFacebook($response['id']); }
      //Converting date from facebook
      if($this->input->post('birth')) { 
        //$date = explode("/", $this->input->post('birth'));
        //$unixtime = mktime(0, 0, 0, $date[0], $date[1], $date[2]);
        //$user->setBirth(date("Y-m-d H:i:s", $unixtime));
        $user->setBirth(new \DateTime($this->input->post('birth')));
         
      }
      if($this->input->post('about_me')) { $user->setAboutMe($this->input->post('about_me')); }
      if($this->input->post('description')) { $user->setDescription($this->input->post('description')); }
      if($this->input->post('what')) { $user->setWhat($this->input->post('what')); }
      if($this->input->post('sex')) { $user->setSex($this->input->post('sex')); }
      
        
      // To protect MySQL injection (more detail about MySQL injection)
  //    $myusername = stripslashes($myusername);
  //    $mypassword = stripslashes($mypassword);
  //    $myusername = mysql_real_escape_string($myusername);
  //    $mypassword = mysql_real_escape_string($mypassword);
          
      //Upload the picture
      $link_path = '/uploads/u'.str_pad($this->session->userdata('id'), 15, "0", STR_PAD_LEFT); 
      $dir_path = '.'.$link_path;
      if (!is_dir($dir_path)) {
          mkdir($dir_path);
      }
      $config['upload_path'] = $dir_path; 
  		$config['allowed_types'] = 'gif|jpg|png';
  		$config['max_size']	= '0';  //Size in Kb allowed
  		//$config['max_width']  = '1024';
  		//$config['max_height']  = '768';
  
  		$this->load->library('upload', $config);
      
  		if ($this->upload->do_upload('picture'))
  		{
  			$data_picture = $this->upload->data(); // Returns information about your uploaded file.
        $picture_name = $data_picture['raw_name'].$data_picture['file_ext']; // Here it is
        $user->setPicture($link_path.'/'.$picture_name);
  		}
      
      $this->doctrine->em->persist($user);
      $this->doctrine->em->flush();
      
    } else {
      echo "error";
      return "ERROR";
    }
    
    //TODO: Decide where to go after update de profile  
    redirect('/profile');
	}
  
}

?>