<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

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
//$this->load->model('insert_model');
$status="no";
//$this->load->database();  
//$this->load->helper('url');

//$this->load->model('service_model'); 
//$this->load->model('menu_model'); 
    
}
	public function index($id)
	{
		//$this->load->model('hom_content_model'); 
			//$this->load->model('project_model'); 
			//$this->load->model('client_model'); 
			//$this->load->model('office_model'); 
			//$this->load->model('video_model'); 
//$this->library('MY_Encrypt');
   // $data['homecontent']=$this->hom_content_model->get_homecontent();
	//$data['servicelinks']=$this->service_model->get_service_links();
	$data['pagelinks']=$this->menu_model->get_menu_links();
	$data['servicelinks']=$this->service_model->get_service_links();
	$data['productlinks']=$this->product_model->get_product_links();
        $data['facilitylinks']=$this->facility_model->get_facility_links();
	$data['contactus']=$this->contactus_model->get_contactus_common(1);

	//$str=str_replace(array('-', '_', '~'), array('+', '/', '='),$id);
	
	//echo $this->encrypt->decode($str);
//echo $R=$this->encrypt->decode($id);
	$data['service']=$this->service_model->get_service($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$id)));
	//$data['homeprojects']=$this->project_model->get_project_limit(5);
	//$data['homeclient']=$this->client_model->get_client_limit(1);
	//$data['homeoffice']=$this->office_model->get_office_limit(1);
	//$data['homevideo']=$this->video_model->get_video_limit(1);
	$this->load->view('includes/header_view',$data);
		
		$this->load->view('service_view');
		$this->load->view('includes/footer_view');
	}

        
        public function address()
	{
	
        $data['allcontact']=$this->contactus_model->get_contactus();


		
		$this->load->view('contactus_view',$data);
		$this->load->view('includes/footer_view');
	}

        
        
        
             public function locationmap()
	{
		$this->load->model('locationmap_model'); 
	
        $data['locationmap']=$this->locationmap_model->get_locationmap();


		
		$this->load->view('locationmap_view',$data);
		$this->load->view('includes/footer_view');
	}
        
        
        
           public function enquiry()
	{
		$this->load->helper('url');

$this->load->helper('form');
$this->load->library('form_validation');
$config = Array(        

'mailtype'  => 'html'
);
$this->load->library('email',$config);
// $data['homecontent']=$this->hom_content_model->get_homecontent();
//$data['servicelinks']=$this->service_model->get_service_links();


$forgot=$this->contactus_model->get_forgot();
//$this->load->view('includes/header_view',$data);

// $this->load->view('upload_success', $data); 

$this->form_validation->set_rules('name', 'Name', 'required|trim|strip_tags');
$this->form_validation->set_rules('email', 'Email ', 'required|trim|strip_tags|valid_email');
$this->form_validation->set_rules('contactno', 'Contactno ', 'required|trim|strip_tags|numeric');
$this->form_validation->set_rules('subject', 'Subject', 'required|trim|strip_tags');
$this->form_validation->set_rules('details', 'Other details', 'required|trim|strip_tags');
$this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissable">', '</div>');
if ($this->form_validation->run() == FALSE)
{


$this->load->view('enquiry_view');

}
else {


$this->email->from(SERVERMAIL, ENQUIRYSUBJECT);
$this->email->to($forgot); 


$this->email->subject(ENQUIRYSUBJECT2);
$data3['post']=$this->input->post();
$body = $this->load->view('mail/enquiry_mail_view.php',$data3,true);
$this->email->message($body); 

if($this->email->send())
{

$data2['messages']= '<div class="alert alert-info alert-dismissable"> SucessFully Sent</div>';
$this->load->view('enquiry_view',$data2);

}
else {

$data2['messages']='<div class="alert alert-warning alert-dismissable"> Try after sometime</div>';
$this->load->view('enquiry_view',$data2);


}


}


$this->load->view('includes/footer_view');

 
	}
        
        
              public function quotation()
	{
$this->load->helper('url');

$this->load->helper('form');
$this->load->library('form_validation');
$config = Array(        

'mailtype'  => 'html'
);
$this->load->library('email',$config);
// $data['homecontent']=$this->hom_content_model->get_homecontent();
//$data['servicelinks']=$this->service_model->get_service_links();
$data['pagelinks']=$this->menu_model->get_menu_links();
$data['servicelinks']=$this->service_model->get_service_links();
$data['productlinks']=$this->product_model->get_product_links();
$data['facilitylinks']=$this->facility_model->get_facility_links();

$data['contactus']=$this->contactus_model->get_contactus_common(1);


$forgot=$this->contactus_model->get_forgot();
//$this->load->view('includes/header_view',$data);

// $this->load->view('upload_success', $data); 

$this->form_validation->set_rules('name', 'Name', 'required|trim|strip_tags');
$this->form_validation->set_rules('product', 'Product', 'required|trim|strip_tags');
$this->form_validation->set_rules('quantity', 'Quantity', 'required|trim|strip_tags');
$this->form_validation->set_rules('price', 'Price', 'required|trim|strip_tags');
$this->form_validation->set_rules('email', 'Email ', 'required|trim|strip_tags|valid_email');
$this->form_validation->set_rules('contactno', 'Contactno ', 'required|trim|strip_tags|numeric');
$this->form_validation->set_rules('details', 'Quotation details', 'required|trim|strip_tags');
$this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissable">', '</div>');
if ($this->form_validation->run() == FALSE)
{


$this->load->view('quotation_view');

}
else {


$this->email->from(SERVERMAIL, 'Jubail Pallet- Quotation');
$this->email->to($forgot); 


$this->email->subject('Quotation to Jubail Pallet');
$data3['post']=$this->input->post();
$body = $this->load->view('mail/quotation_mail_view.php',$data3,true);
$this->email->message($body); 

if($this->email->send())
{

$data2['messages']= '<div class="alert alert-info alert-dismissable"> SucessFully Submitted</div>';
$this->load->view('quotation_view',$data2);

}
else {

$data2['messages']='<div class="alert alert-warning alert-dismissable"> Try after sometime</div>';
$this->load->view('quotation_view',$data2);


}


}


$this->load->view('includes/footer_view');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */