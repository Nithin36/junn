<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 
	 */
	 function __construct() {
parent::__construct();
//$this->load->model('insert_model');
$status="no";
//$this->load->database();  
//$this->load->helper('url');

//$this->load->model('service_model'); 
//$this->load->model('menu_model'); 
    
}
	public function index()
	{
           // $this->load->helper('text');
		$this->load->model('homemenu_model'); 
		$this->load->model('slider_model'); 
                $this->load->model('product_model'); 
                  $this->load->model('locationmap_model'); 

  $data['homecontent']=$this->homemenu_model->get_homecontent();
  $data['sliders']=$this->slider_model->get_sliders();
   $data['homeproducts']=$this->product_model->get_product_limit(4);
   $data['homelocationmap']=$this->locationmap_model->get_locationmap_common();
   
   //$data['homegallery']=$this->gallery_model->get_gallery_first();

	
      
        

	
      
	       $this->load->view('includes/slider_view',$data);
		$this->load->view('home_view',$data);
		$this->load->view('includes/footer_view');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */