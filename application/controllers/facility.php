<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facility extends CI_Controller {

	/**
	 * Index facility for this controller.
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

//$this->load->model('facility_model'); 
//$this->load->model('menu_model'); 
    
}
	public function index($id)
	{
	
	$data['facility']=$this->facility_model->get_facility($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$id)));
	
		
		$this->load->view('facility_view',$data);
		$this->load->view('includes/footer_view');
	}


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */