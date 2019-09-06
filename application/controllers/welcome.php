<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
$this->load->helper('url');

$this->load->model('service_model'); 
$this->load->model('menu_model'); 
    
}
	public function index()
	{
		//$this->load->model('hom_content_model'); 
			//$this->load->model('project_model'); 
			//$this->load->model('client_model'); 
			//$this->load->model('office_model'); 
			//$this->load->model('video_model'); 

   // $data['homecontent']=$this->hom_content_model->get_homecontent();
	$data['servicelinks']=$this->service_model->get_service_links();
	$data['pagelinks']=$this->menu_model->get_menu_links();
	//$data['homeprojects']=$this->project_model->get_project_limit(5);
	//$data['homeclient']=$this->client_model->get_client_limit(1);
	//$data['homeoffice']=$this->office_model->get_office_limit(1);
	//$data['homevideo']=$this->video_model->get_video_limit(1);
		$this->load->view('welcome_message',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */