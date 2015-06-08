<?php
class privacy extends MY_Controller {

	public function __construct()
	{
    parent::__construct();
	}
  
	public function index($lang = 'ca')
	{
		$this->load->view('privacy/privacy_main');
	}
}
?>