<?php
class terms extends MY_Controller {

	public function __construct()
	{
    parent::__construct();
	}
  
	public function index()
	{
		$this->load->view('terms/terms_main');
	}
}
?>