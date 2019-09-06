<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cases extends CI_Controller {

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

    
}
	public function index()
	{
$this->load->helper('url');
		
              $this->load->library('pagination');
			$this->load->model('case_model'); 

$config['base_url'] = base_url()."index.php/cases/cases";
$config['total_rows'] = $this->case_model->count_case();
$config['per_page'] = 4; 
$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
$config['full_tag_close'] = '</ul>';
$config['first_link'] = 'First';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';

$config['last_link'] = 'Last';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['next_link'] = 'Next Page';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = 'Previous Page';
$config['prev_tag_open'] = '<li >';
$config['prev_tag_close'] = '</li>';


$config['cur_tag_open'] ='<li class="active">';
$config['cur_tag_close'] = '</li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';



        $this->pagination->initialize($config);
            if($this->uri->segment(3)){
        $page = ($this->uri->segment(3)) ;
		
          }
        else{
               $page = 0;
        }
  $data["allcase"] = $this->case_model->pagination_select_case($config["per_page"], $page);
		
        $str_links = $this->pagination->create_links();
        $data["links"] = $str_links ;


	
		
		$this->load->view('case_view',$data);
		$this->load->view('includes/footer_view');
	}
        
        
        
public function viewcase($id)
	{
		$this->load->model('case_model'); 
	$data['case']=$this->case_model->get_case($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$id)));
	
	
		
		$this->load->view('singlecase_view',$data);
		$this->load->view('includes/footer_view');
	}
}

