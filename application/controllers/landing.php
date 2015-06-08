<?php
class landing extends MY_Controller {

  public function __construct()
	{
    parent::__construct();
	}
  
  public function view()
  {
    if($this->isLogged()){
      redirect('/main');
    } else {
      $this->load->helper(array('form', 'url'));
    	$this->load->view('landing/landing_home');
    }
    
		         
  }
  
  public function send()
  {

		$this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');    
   
    //Validate email;
    $this->form_validation->set_rules('newsletter_email', 'Email', 'required|valid_email');
    
    if ($this->form_validation->run() == FALSE)
    {
      $this->view();
		}
		else
		{
      //404 page
    	if ( !file_exists('application/views/landing/landing_send_ok.php')) { show_404(); }


      //DOCTRINE
      //If ok, we send it to save.
      $newsletter = new Entities\StNewsletter;
      $newsletter->setEmail($this->input->post('newsletter_email'));
      $newsletter->setHabilitated(1);
      
      // standard way in CodeIgniter to access a library in a controller: $this->library_name->member->memberFunction()
      // save the object to database, so that it can obtain its ID
      $this->doctrine->em->persist($newsletter);
      $this->doctrine->em->flush();
      
      //DOCTRINE
      
      /* OLD WAY
      $this->load->model('newsletter_dto');
      $this->newsletter_dto->setEmail($this->input->post('newsletter_email'));
      $this->newsletter_dto->setHabilitated(1);
      
      $this->load->model('newsletter_dao');
      $this->newsletter_dao->save($this->newsletter_dto);
      
      */
      
      $data['email'] = $this->input->post('newsletter_email');
    	$this->load->view('landing/landing_send_ok', $data);

		}
   
  }

}
?>