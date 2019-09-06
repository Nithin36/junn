<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller {

	/**
	 * Index service for this controller.
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


    
}
	public function index($id)
	{
	
	$data['service']=$this->service_model->get_service($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$id)));
        $data['servicegallery']=$this->service_model->get_service_gallery($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$id)));
         
	
		$this->load->view('service_view',$data);
		$this->load->view('includes/footer_view');
	}


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */