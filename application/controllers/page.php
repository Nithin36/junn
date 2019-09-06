<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

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
	public function index($id)
	{
		
	$data['page']=$this->menu_model->get_menu($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$id)));

	
		
		$this->load->view('page_view',$data);
		$this->load->view('includes/footer_view');
	}

public function subpage($id)
	{
		
	$data['page']=$this->menu_model->get_submenu($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$id)));
	//$data['homeprojects']=$this->project_model->get_project_limit(5);
	//$data['homeclient']=$this->client_model->get_client_limit(1);
	//$data['homeoffice']=$this->office_model->get_office_limit(1);
	//$data['homevideo']=$this->video_model->get_video_limit(1);
		if($data['page']['display']==1)
        {
    $this->load->library('pagination');
			
	 
      $this->load->model('management_model'); 
     // echo $R=$this->management_model->count_management();
$config['base_url'] = base_url()."index.php/page/subpage";
$config['total_rows'] = $this->management_model->count_management();
$config['per_page'] = 12; 
$config['full_tag_open'] = '<div id="pagination">';
$config['full_tag_close'] = '</div>';
$config['first_link'] = 'First';
$config['first_tag_open'] = '<span class="page-num" >';
$config['first_tag_close'] = '</span>';

$config['last_link'] = 'Last';
$config['last_tag_open'] = '<span class="page-num" >';
$config['last_tag_close'] = '</span>';

$config['next_link'] = 'Next ';
$config['next_tag_open'] = ' <span class="next-page" >';
$config['next_tag_close'] = '</span>';

$config['prev_link'] = 'Previous ';
$config['prev_tag_open'] = '<span class="next-page" >';
$config['prev_tag_close'] = '</span>';


$config['cur_tag_open'] ='<span class="current page-num">';
$config['cur_tag_close'] = '</span>';

$config['num_tag_open'] = '<span class="page-num" >';
$config['num_tag_close'] = '</span>';

//echo $config['total_rows'] ;

        $this->pagination->initialize($config);
            if($this->uri->segment(4)){
        $page2 = ($this->uri->segment(4)) ;
		
          }
        else{
               $page2 = 0;
        }
       
  $data["allmanagement"] = $this->management_model->pagination_select_management($config["per_page"], $page2);
        }
        
        	if($data['page']['display']==2)
        {
    $this->load->library('pagination');
			
	 
      $this->load->model('awards_model'); 
$config['base_url'] = base_url()."index.php/page/subpage";
$config['total_rows'] = $this->awards_model->count_awards();
$config['per_page'] = 12; 
$config['full_tag_open'] = '<div id="pagination">';
$config['full_tag_close'] = '</div>';
$config['first_link'] = 'First';
$config['first_tag_open'] = '<span class="page-num" >';
$config['first_tag_close'] = '</span>';

$config['last_link'] = 'Last';
$config['last_tag_open'] = '<span class="page-num" >';
$config['last_tag_close'] = '</span>';

$config['next_link'] = 'Next ';
$config['next_tag_open'] = ' <span class="next-page" >';
$config['next_tag_close'] = '</span>';

$config['prev_link'] = 'Previous ';
$config['prev_tag_open'] = '<span class="next-page" >';
$config['prev_tag_close'] = '</span>';


$config['cur_tag_open'] ='<span class="current page-num">';
$config['cur_tag_close'] = '</span>';

$config['num_tag_open'] = '<span class="page-num" >';
$config['num_tag_close'] = '</span>';



        $this->pagination->initialize($config);
            if($this->uri->segment(3)){
        $page = ($this->uri->segment(3)) ;
		
          }
        else{
               $page = 0;
        }
  $data["allawards"] = $this->awards_model->pagination_select_awards($config["per_page"], $page);
        }
		
		$this->load->view('page_view',$data);
		$this->load->view('includes/footer_view');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */