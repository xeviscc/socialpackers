<?php
class register extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

	}
       /*
	public function index()
	{
    $data['logged_in'] = FALSE;
  	$this->load->view('register/register_main', $data);
	}  */

  public function submit()
	{
    $this->load->helper(array('form', 'url'));
    $this->load->library(array('form_validation','encrypt','session'));
    
    $this->load->model('users_dao');
    
    $email = $this->input->post('email');
    
    $result=$this->users_dao->findByEmail($email);
    if(!empty($result)){
      //echo "The user already exists.";
      redirect('/forgot-password');
    } else {
  
      $encrypted_password = $this->encrypt->encode($this->input->post('password'));
  
      $this->load->model('users_dto');
      
      $this->users_dto->setEmail($email);
      $this->users_dto->setPassword($encrypted_password);
      
      //Generate token to confirm email
      $conf_token = md5(uniqid($email, true));
      $this->send_email_confirmation($email, $conf_token);
      
      $this->users_dto->setConfToken($conf_token);
    
      $result=$this->users_dao->save($this->users_dto);

      $newdata = array(
             'username'  => $this->users_dto->getName(),
             'email'     => $this->users_dto->getEmail(),
             'id'        => $result,
             'locale'    => 'EN-GB',
             'logged_in' => TRUE
         );

      $this->session->set_userdata($newdata);
      
      //Check their preferences.
      redirect('/profile');
    }  
	}
  
  public function submit_f()
	{
    $response = json_decode($this->input->post('response'),true);
    
    $user = $this->doctrine->em->getRepository('Entities\StUsers')->findOneBy(array('email' => $response['email']));
    $return_value = 'OK';
    
    if(!empty($user)){
      //Check if the idFacebook is the same as is in the database.
      if($user->getIdFacebook() == $response['id']) {
        //Fill the data
        $username_db=$user->getName();
        $email_db=$user->getEmail();
        $id_db=$user->getId();
      } else {
        $return_value = 'FAIL';
      }        
    } else {
  
      $user = new Entities\StUsers; 
      
      if(array_key_exists('name', $response)) { $user->setName($response['name']); }
      if(array_key_exists('middle_name', $response)) { $user->setMiddleName($response['middle_name']); }
      if(array_key_exists('last_name', $response)) { $user->setLastName($response['last_name']); }
      if(array_key_exists('email', $response)) { $user->setEmail($response['email']); }
      //$user->setPassword($this->input->post('id'));
      if(array_key_exists('id', $response)) { $user->setIdFacebook($response['id']); }
      //Converting date from facebook
      if(array_key_exists('birth', $response)) { 
        $date = explode("/", $response['birth']);
        $unixtime = mktime(0, 0, 0, $date[0], $date[1], $date[2]);
        $user->setBirth(date("Y-m-d H:i:s", $unixtime));
       }
      if(array_key_exists('about_me', $response)) { $user->setAboutMe($response['about_me']); }
      if(array_key_exists('description', $response)) { $user->setDescription($response['description']); }
      if(array_key_exists('sex', $response)) { $user->setSex($response['sex']); }                  
      $user->setPicture('https://graph.facebook.com/'.$response['id'].'/picture?type=large');

      // To protect MySQL injection (more detail about MySQL injection)
  //    $myusername = stripslashes($myusername);
  //    $mypassword = stripslashes($mypassword);
  //    $myusername = mysql_real_escape_string($myusername);
  //    $mypassword = mysql_real_escape_string($mypassword);
  /*
      $img = file_get_contents('https://graph.facebook.com/'.$fid.'/picture?type=large');
      $file = dirname(__file__).'/avatar/'.$fid.'.jpg';
      file_put_contents($file, $img);
    */
  
      $this->doctrine->em->persist($user);
      $this->doctrine->em->flush();

      //Fill the data      
      $username_db=$user->getName();
      $email_db=$user->getEmail();
      $id_db=$user->getId();
    }


    $newdata = array(
           'username'  => $username_db,
           'email'     => $email_db,
           'id'        => $id_db,
           'locale'    => 'EN-GB',
           'logged_in' => TRUE
       );

    $this->session->set_userdata($newdata);
    
    //TODO: Check their preferences to redirect the user.
    echo json_encode($return_value);
	}
  
  private function send_email_confirmation($email, $conf_token) {
    $this->load->library('email');
    
    $config['charset'] = 'utf-8';
  	$config['wordwrap'] = TRUE;
	  $config['mailtype'] = 'html';
    $config['protocol'] = 'sendmail';
    
    $this->email->initialize($config);

    $this->email->from('admin@socialpackers.com', 'SocialPackers Team');
    $this->email->to($email);
    
    $link = 'http://socialpackers.net/register/confirm/p?t='.$conf_token.'&m='.$email; 
   
    $this->email->subject('Confirm your registration: SocialPackers');
    $this->email->message('Please, click on the link to confirm your registration. <br><br> <a href="'.$link.'">Confirm registration to SocialPackers</a><br><br> Thank you! <br> SocialPackers Team');
    
    $this->email->send();
    
  }
  
  //socialpackers.com/register/confirm/p?t=b6eb5e1c9133cf124e09ede71e0e838cm=t@t.com
  public function confirm($param){
    if(!$this->startsWith($param, 'p')) {    
      //Invalid URL
      //TODO: Show a message.
      echo "Error on confirmation";
      //redirect('/invalid-url');
    } else {
      //Valid URL
      //Get params from URL
      $t = $this->input->get('t');
      $m = $this->input->get('m'); 

      //Find the user
      $criteria = array("email" => $m);
      $result = $this->doctrine->em->getRepository('Entities\StUsers')->findOneBy($criteria);
      //If the user exists.
      if(!empty($result)){
        //Validate the token.
        if($t==$result->getConfToken()) {
          
          $result->setConfToken(NULL);
          
          $this->doctrine->em->persist($result);
          $this->doctrine->em->flush();
          echo "Thank you to confirm";
          //redirect('/confirmed');
        }
      } else {
        //TODO: Show a message.
        echo "Error on confirmation";
        //redirect('/error-page');
      }   
  
    }
  }
  
  function startsWith($haystack, $needle)
  {
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
  }
	
  /*
  public function submit_old()
	{
  
    $this->load->helper(array('form', 'url'));
    $this->load->library(array('form_validation','encrypt','session'));  
    
    $this->load->model('users_dao');
    
    $email = $this->input->post('email');
    
    $result=$this->users_dao->findByEmail($email);
    if(!empty($result)){
      echo "The user already exists.";
      redirect('/forgot-password');
    } else {
  
      $encrypted_password = $this->encrypt->encode($this->input->post('password'));
  
      $this->load->model('users_dto');
      
      $this->users_dto->setName($this->input->post('name'));
      $this->users_dto->setMiddleName($this->input->post('middle_name'));
      $this->users_dto->setLastName($this->input->post('last_name'));
      $this->users_dto->setEmail($email);
      $this->users_dto->setPassword($encrypted_password);
      $this->users_dto->setBirth($this->input->post('birth'));
      $this->users_dto->setAboutMe($this->input->post('about_me'));
      $this->users_dto->setDescription($this->input->post('description'));
      $this->users_dto->setWhat($this->input->post('what'));
      //$this->users_dto->setPicture($picture_name); //Setted after uploading the file.
      $this->users_dto->setSex($this->input->post('sex'));
      
      // To protect MySQL injection (more detail about MySQL injection)
  //    $myusername = stripslashes($myusername);
  //    $mypassword = stripslashes($mypassword);
  //    $myusername = mysql_real_escape_string($myusername);
  //    $mypassword = mysql_real_escape_string($mypassword);
  
  		//Upload the picture
      $dir_path = './uploads/'.$this->users_dto->getEmail();
      if (!is_dir($dir_path)) {
          mkdir($dir_path);
      }
      $config['upload_path'] = $dir_path; 
  		$config['allowed_types'] = 'gif|jpg|png';
  		$config['max_size']	= '200';  //Size in Kb allowed
  		$config['max_width']  = '1024';
  		$config['max_height']  = '768';
  
  		$this->load->library('upload', $config);
      
  		if ( $this->upload->do_upload('picture'))
  		{
  			$data_picture = $this->upload->data(); // Returns information about your uploaded file.
        $picture_name = $data_picture['raw_name'].$data_picture['file_ext']; // Here it is
        $this->users_dto->setPicture($dir_path.$picture_name);
  		}
    
      
      $result=$this->users_dao->save($this->users_dto);
      //redirect('/login');
      $newdata = array(
             'username'  => $this->users_dto->getName(),
             'email'     => $this->users_dto->getEmail(),
             'id'        => $this->users_dto->getId(),
             'locale'    => 'EN-GB',
             'logged_in' => TRUE
         );

      $this->session->set_userdata($newdata);
      
      //Check their preferences.
      redirect('/main');
    }  
	} */
}

?>
