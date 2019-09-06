<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends CI_Controller {

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


}
public function index()
{
$this->load->helper('url');

$this->load->library('pagination');
$this->load->model('job_model'); 

$config['base_url'] = base_url()."index.php/job/job";
$config['total_rows'] = $this->job_model->count_job();
$config['per_page'] = 12; 
$config['full_tag_open'] = '<ul class="pagination-box animate-effect anim-section">';
$config['full_tag_close'] = '</ul>';
$config['first_link'] = 'First';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';

$config['last_link'] = 'Last';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['next_link'] = 'Next';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = 'Previous';
$config['prev_tag_open'] = '<li >';
$config['prev_tag_close'] = '</li>';


$config['cur_tag_open'] ='<li class="active">';
$config['cur_tag_close'] = '</a></li>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';



$this->pagination->initialize($config);
if($this->uri->segment(3)){
$page = ($this->uri->segment(3)) ;

}
else{
$page = 0;
}
$data["alljobs"] = $this->job_model->pagination_select_job($config["per_page"], $page);

$str_links = $this->pagination->create_links();
$data["links"] = $str_links ;




$this->load->view('jobs_view',$data);
$this->load->view('includes/footer_view');
}


public function applyjob($jobtitle=" ")
{
$this->load->helper('url');

$this->load->helper('form');
$this->load->library('form_validation');
$this->load->model('job_model'); 


$data['jobtitle']=$jobtitle;




$this->load->view('applyjob_view',$data);
$this->load->view('includes/footer_view');
}   



public function submitapplication($jobtitle=" ")
{
$this->load->helper('url');


$this->load->model('job_model'); 
//$this->load->model('office_model'); 
//$this->load->model('video_model'); 

$this->load->helper('form');
$this->load->library('form_validation');
$config = Array(        

'mailtype'  => 'html'
);
$this->load->library('email',$config);



$data['contactus']=$this->contactus_model->get_contactus_common(1);


$forgot=$this->contactus_model->get_forgot();


$config['upload_path']   = './upload/resume/'; 
$config['allowed_types'] = 'doc|docx|pdf'; 
$config['file_name'] = $this->encrypt->encode($_FILES["attachresume"]['name']);
$config['max_size'] = "1024000"; 
$this->load->library('upload', $config);

if ( ! $this->upload->do_upload('attachresume')) {
$error = array('error' => $this->upload->display_errors('<div class="alert alert-warning alert-dismissable">', '</div>'));


$this->load->view('applyjob_view',$error);

}

else { 
$data = $this->upload->data();
$file=$data['raw_name'].$data['file_ext'];
$_POST['file']=$file;
// $this->load->view('upload_success', $data); 
$this->form_validation->set_rules('post_applied', 'Post Applied For', 'required|trim|strip_tags');
$this->form_validation->set_rules('name', 'Name', 'required|trim|strip_tags');
$this->form_validation->set_rules('age', ' Age ', 'required|trim|strip_tags');
$this->form_validation->set_rules('gender', 'Gender', 'required|trim|strip_tags');
$this->form_validation->set_rules('email', 'Email ', 'required|trim|strip_tags|valid_email');
$this->form_validation->set_rules('contactno', 'Contactno ', 'required|trim|strip_tags|numeric');
$this->form_validation->set_rules('nationality', 'Nationality', 'required|trim|strip_tags');
$this->form_validation->set_rules('passport', 'Passport Details', 'required|trim|strip_tags');
$this->form_validation->set_rules('iqamadetails', ' YourIqama details', 'required|trim|strip_tags');
$this->form_validation->set_rules('iquamastat', ' Iquama status', 'required|trim|strip_tags');
$this->form_validation->set_rules('resume', 'Experience details', 'required|trim|strip_tags');
$this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissable">', '</div>');
if ($this->form_validation->run() == FALSE)
{


$this->load->view('applyjob_view');

}
else {


$this->email->from(SERVERMAIL, JOBSUBJECT);
$this->email->to($forgot); 


$this->email->subject(JOBSUBJECT2);
$data3['post']=$this->input->post();
$body = $this->load->view('mail/jobapply_mail_view.php',$data3,true);
$this->email->message($body); 

if($this->email->send())
{

$data2['messages']= '<div class="alert alert-info alert-dismissable"> SucessFully Submitted</div>';
$this->load->view('applyjob_view',$data2);

}
else {

$data2['messages']='<div class="alert alert-warning alert-dismissable"> Try after sometime</div>';
$this->load->view('applyjob_view',$data2);


}


}
} 

$this->load->view('includes/footer_view');

}  
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */