<?php
class tips extends MY_Controller {

	public function __construct()
	{
    parent::__construct();
    
        //Find list of countries.
        /*
    $locale = "en-gb";
    $locale_session = $this->session->userdata('locale'); 
    if( !empty($locale_session) ){
      $locale = $locale_session;
    }
    $data['country_list']=$this->doctrine->em->getRepository('Entities\StCountryName')
                              ->findByLocale($locale);
                              */
    
    //Menu selection.                              
    $data['menu_item'] = 'tips';
    //Important to make $data visible on the view.
    $this->load->vars($data);
	}
  
	public function index()
	{
    
    //Load Tips
    $data['tip_list']=$this->doctrine->em->getRepository('Entities\StTips')->findAll();
    
    //Load likes
    //$data['like_list']=$this->doctrine->em->getRepository('Entities\StLike')->findAll();
    /*$qb = $this->doctrine->em->createQueryBuilder();
    $data['like_list'] = $qb->select('l')
          ->from('Entities\StLike','l')
          ->groupBy('l.idTip')
          ->getQuery()
          ->getResult();
          */
    
    //Load Backpack
    $criteria = array('idUser' => $this->session->userdata('id'));
    $result = $this->doctrine->em->getRepository('Entities\StBackpack')->findBy($criteria);
    $data['backpack_list']= array();
    foreach($result as $bp){
      $data['backpack_list'][]=$bp->getIdTip();            
    }    
    
    $this->load->view('tips/tips_main',$data);
	}
  
  
  public function create()
	{
    $this->notLoggedToLogin();
    $criteria = array(
      "idUser" => $this->session->userdata('id'),
      "tip" => $this->input->post('tip'),
      "countryCode" => $this->input->post('country_code'),
      "categories" => $this->input->post('categories')
    );
    $exists = $this->doctrine->em->getRepository('Entities\StTips')->findOneBy($criteria);
    
    if(!$exists){
      $tips = new Entities\StTips;
        
      $tips->setIdUser($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
      $tips->setTip($this->input->post('tip'));
      $tips->setPublicationDate(new \DateTime("now"));
      $tips->setCountryCode($this->doctrine->em->find('Entities\StCountries', $this->input->post('country_code')));
      $tips->setCategories($this->input->post('categories'));
        
      $this->doctrine->em->persist($tips);
      $this->doctrine->em->flush();
      
      //TRACK THIS EVENT
      $item = new Entities\StItems;
      
      $item->setIdObject($tips->getId());
      $item->setDate((new \DateTime("now")));
      $item->setAction('CREATE');
      $item->setIdUser($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
      $item->setType($this->doctrine->em->find('Entities\StItemTypes', 'TIP'));
      $this->doctrine->em->persist($item);
      $this->doctrine->em->flush();
      //END TRACK THIS EVENT
    }

    //Find tips
    $data['tip_list']=$this->doctrine->em->getRepository('Entities\StTips')->findAll();

    $this->load->view('tips/tips_main',$data);
	}
  
  public function filter()
  {
    
    $criteria = array();
    $where = NULL;                  
    if($this->input->post('country_code')) {
      $criteria['countryCode'] = $this->input->post('country_code');
      $where = 't.countryCode = :countryCode'; 
    }
    if($this->input->post('categories')) {
      $criteria['categories'] = '%'.$this->input->post('categories').'%'; 
      if(isset($where)){ $where .= ' AND '; } 
      $where .= 't.categories LIKE :categories'; 
    }
    
    $qb = $this->doctrine->em->createQueryBuilder();
    
    if(!isset($where)) {
      $data['tip_list']=$this->doctrine->em->getRepository('Entities\StTips')->findAll();
    } else {
      $data['tip_list'] = $qb->select('t')
            ->from('Entities\StTips','t')
            ->where($where)
            ->setParameters($criteria)
            ->getQuery()
            ->getResult();
    }

    $this->load->view('tips/tips_main',$data);
  
  }
  
  
  public function like($idTip){
    $this->notLoggedToLogin();
    
    $like = new Entities\StLike;
    
    $like->setIdTip($this->doctrine->em->find('Entities\StTips', $idTip));
    $like->setIdUser($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
    
    $this->doctrine->em->persist($like);                   
    $this->doctrine->em->flush();
    
    redirect('tips');
  }
  
  public function favorite($idTip){
    $this->notLoggedToLogin();
    //Put it into backpack.
    
    if($idTip) {
      $criteria = array('idTip' => $idTip, 'idUser' => $this->session->userdata('id'));
      $exists = $this->doctrine->em->getRepository('Entities\StBackpack')->findOneBy($criteria);

      if(!isset($exists)){
        $backpack = new Entities\StBackpack;
        
        $backpack->setIdUser($this->doctrine->em->find('Entities\StUsers', $this->session->userdata('id')));
        $backpack->setIdTip($this->doctrine->em->find('Entities\StTips', $idTip));    
        
        $this->doctrine->em->persist($backpack);                   
        $this->doctrine->em->flush();
                 
      }
    }
    
    $this->index();
  }
  
  public function delete($idTip){
    $this->notLoggedToLogin();
    //Put it into backpack.
    
    if($idTip) {
      $criteria = array('idTip' => $idTip, 'idUser' => $this->session->userdata('id'));
      $backpack = $this->doctrine->em->getRepository('Entities\StBackpack')->findOneBy($criteria);

      if(isset($backpack)){
        
        $this->doctrine->em->remove($backpack);                   
        $this->doctrine->em->flush();
                 
      }
    }
    
    $this->index();
  }

}

?>