<?php
class not_found extends MY_Controller {

	public function __construct()
	{
    parent::__construct();
	}
  
	public function index()
	{
    $this->load->view('not_found/not_found');
	}
  
}

?>