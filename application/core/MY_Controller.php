<?php

class MY_Controller extends CI_Controller {



  public function __construct()

	{

    parent::__construct();

    //Check the user 

    $data['logged_in']=$this->isLogged();

    

    //Find list of countries.

    $locale = "en-gb";

    $locale_session = $this->session->userdata('locale'); 

    if( !empty($locale_session) ){

      $locale = $locale_session;

    }

    $data['country_list']=$this->doctrine->em->getRepository('Entities\StCountryName')->findByLocale($locale);

    

    $this->load->vars($data);

    

    //Common files

    $this->lang->load('all');

	}

  

  public function isLogged(){

    return $this->session->userdata('logged_in');

  }

  

  public function notLoggedToLogin(){

    //If the user is not logged, send it to login screen.

    if(!$this->isLogged()) {

      redirect('/');

    } 

  }

}

?>