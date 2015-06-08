<?php
class login extends MY_Controller {

	private $_error;
  
  public function __construct()
	{
    parent::__construct();
    $this->load->library('session');
	}
         /*
	public function index()
	{
    if(isset($_error)){
      $data['error'] = $_error;
      $this->load->view('login/login', $data);
    } else {
      $this->load->view('login/login');
    }
    
	}  */

  public function checklogin(){
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->load->library('encrypt');  
    
    // username and password sent from form 
    $myusername=$this->input->post('myusername');
    $mypassword=$this->input->post('mypassword'); 
    
    // To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);
    $myusername = mysql_real_escape_string($myusername);
    $mypassword = mysql_real_escape_string($mypassword);
    
    $this->load->model('users_dao');
    //$result=$this->users_dao->findByLogin($myusername, $plain_password);
    //$result=$this->users_dao->findByLogin($myusername, $plain_password);
    $result=$this->users_dao->findByEmail($myusername);
      
    // If result matched $myusername and $mypassword, table row must be 1 row
    if(!empty($result)){
      $decoded_db_password = $this->encrypt->decode($result->getPassword());
      //If the passwords match it's OK.
      if($decoded_db_password==$mypassword){
        $newdata = array(
                     'username'  => $result->getName(),
                     'email'     => $result->getEmail(),
                     'id'        => $result->getId(),
                     'locale'    => 'EN-GB',
                     'logged_in' => TRUE
                 );
  
        $this->session->set_userdata($newdata);
        
        redirect('/main');
      } else {
        $_error = "Email/Password wrong.";
        redirect('/');      
      }
    }
    else {
      $_error = "Email/Password wrong.";
      //Go to try again.
      redirect('/');
      //$this->load->view('login/login', $data);
    }
  }

  public function logout(){
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('email');
    $this->session->set_userdata('logged_in', FALSE);
    $this->session->sess_destroy();

    redirect('/');
  }
  
  public function forgot_password(){
    echo "Forgot";
  }
}

?>