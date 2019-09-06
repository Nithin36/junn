<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resources extends CI_Controller {

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
	public function downloads()
	{
$this->load->helper('url');
		
              $this->load->library('pagination');
			$this->load->model('download_model'); 

$config['base_url'] = base_url()."index.php/resources/downloads";
$config['total_rows'] = $this->download_model->count_download();
$config['per_page'] = 12; 
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
  $data["alldownload"] = $this->download_model->pagination_select_download($config["per_page"], $page);
		
        $str_links = $this->pagination->create_links();
        $data["links"] = $str_links ;


	
		
		$this->load->view('download_view',$data);
		$this->load->view('includes/footer_view');
	}
        
        public function manpowers()
	{
$this->load->helper('url');
		
              $this->load->library('pagination');
			$this->load->model('manpower_model'); 

$config['base_url'] = base_url()."index.php/resources/manpowers";
$config['total_rows'] = $this->manpower_model->count_manpower();
$config['per_page'] = 12; 
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
  $data["allmanpower"] = $this->manpower_model->pagination_select_manpower($config["per_page"], $page);
		
        $str_links = $this->pagination->create_links();
        $data["links"] = $str_links ;


	
		
		$this->load->view('manpower_view',$data);
		$this->load->view('includes/footer_view');
	}

        
            public function equipments()
	{
$this->load->helper('url');
		
              $this->load->library('pagination');
			$this->load->model('equipment_model'); 

$config['base_url'] = base_url()."index.php/resources/equipments";
$config['total_rows'] = $this->equipment_model->count_equipment();
$config['per_page'] = 12; 
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
  $data["allequipment"] = $this->equipment_model->pagination_select_equipment($config["per_page"], $page);
		
        $str_links = $this->pagination->create_links();
        $data["links"] = $str_links ;


	
		
		$this->load->view('equipment_view',$data);
		$this->load->view('includes/footer_view');
	}
        
        
               public function vechiles()
	{
$this->load->helper('url');
		
              $this->load->library('pagination');
			$this->load->model('equipment_model'); 

$config['base_url'] = base_url()."index.php/resources/vechiles";
$config['total_rows'] = $this->equipment_model->count_equipment();
$config['per_page'] = 12; 
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
  $data["allvechile"] = $this->equipment_model->pagination_select_equipment($config["per_page"], $page);
		
        $str_links = $this->pagination->create_links();
        $data["links"] = $str_links ;


	
		
		$this->load->view('vechile_view',$data);
		$this->load->view('includes/footer_view');
	}
}

