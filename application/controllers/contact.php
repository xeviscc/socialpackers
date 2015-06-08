<?php
class contact extends MY_Controller {

	public function __construct()
	{
    parent::__construct();
	}
  
	public function index()
	{
		$this->load->view('contact/contact_main');
	}
  
	public function submit()
	{
    $this->load->library('email');

    $this->email->from($this->input->post('email'), $this->input->post('name'));
    $this->email->to('xeviscc@gmail.com');
   
    $this->email->subject('Suggestion/Comment SockialPackers.com');
    $this->email->message($this->input->post('description'));	
    
    $this->email->send();
    
		$this->load->view('contact/contact_send_ok');
	}
}
?>