<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

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

     $this->load->helper('text');
}
	public function index()
	{
$this->load->helper('url');
		
              $this->load->library('pagination');
			$this->load->model('customer_model'); 

$config['base_url'] = base_url()."index.php/customer/customer";
$config['total_rows'] = $this->customer_model->count_customer();
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
  $data["allcustomers"] = $this->customer_model->pagination_select_customer($config["per_page"], $page);
		
        $str_links = $this->pagination->create_links();
        $data["links"] = $str_links ;


	
		
		$this->load->view('customer_view',$data);
		$this->load->view('includes/footer_view');
	}
        
        function customerlogin()
        {
            
		$this->load->view('customerlogin_view');
		$this->load->view('includes/footer_view');
        }
        
           function customerregisterresponse()
        {
              
                $this->load->model('customer_model'); 
                
            $this->load->helper('form');
            $this->load->helper('date');
            $config = Array(        

'mailtype'  => 'html'
);
            $this->load->library('email',$config);
           
$this->load->library('form_validation');
$this->form_validation->set_rules('name', 'Name', 'required|trim|strip_tags');
$this->form_validation->set_rules('country', 'Country ', 'required|trim|strip_tags');
$this->form_validation->set_rules('city', 'Near by city ', 'required|trim|strip_tags');
$this->form_validation->set_rules('location', 'Location', 'required|trim|strip_tags');
$this->form_validation->set_rules('email3', 'Email ', 'required|trim|strip_tags|valid_email');
$this->form_validation->set_rules('telno', 'Telephone number', 'required|trim|strip_tags|numeric');
$this->form_validation->set_rules('mobno', 'Mobile No ', 'required|trim|strip_tags|numeric');
$this->form_validation->set_rules('address', 'Address', 'required|trim|strip_tags');
$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
$this->form_validation->set_rules('password2', 'Re-enter Password', 'required|min_length[6]');
$this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissable">', '</div>');
if ($this->form_validation->run()== FALSE)
{
         echo '<div class="alert alert-warning alert-dismissable"> Try after sometime</div>';
echo validation_errors();

//$this->load->view('enquiry_view');

}
elseif($this->customer_model->check_customeremail($this->input->post('email3')))
{
       echo '<div class="alert alert-warning alert-dismissable"> registration failed</div>';
          echo '<div class="alert alert-warning alert-dismissable"> Email id you registered is already registered. Please registered with another mail id </div>';
    
}
else {
      $time1 = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

 $regtime=$time1->format('Y-m-d h:i:s');
  $data = array(
'name' => $this->input->post('name'),
'country' => $this->input->post('country'),
'city' => $this->input->post('city'),
'location' => $this->input->post('location'),
'email' => $this->input->post('email3'),
'telno' => $this->input->post('telno'),      
'mobno' => $this->input->post('mobno'),
'address' => $this->input->post('address'), 
'password' => md5($this->input->post('password')),
'password2' => base64_encode($this->input->post('password')),      
'registeredby' =>1, 
'registerdate' =>$regtime    
);
  
 if($this->customer_model->insert_customer($data))
 {
//    echo $this->db->insert_id();
//    $data3['post']=$this->customer_model->insert_customer($data);
//     $this->email->from(SERVERMAIL, ENQUIRYSUBJECT);
//$this->email->to($forgot); 
//
//
//$this->email->subject(ENQUIRYSUBJECT2);
//
//$body = $this->load->view('mail/enquiry_mail_view.php',$data3,true);
//$this->email->message($body); 
//
//if($this->email->send())
//{
//
//echo '<div class="alert alert-info alert-dismissable"> SucessFully Sent</div>';
////$this->load->view('enquiry_view',$data2);
//
//}
//else {
//
//echo '<div class="alert alert-warning alert-dismissable"> Try after sometime</div>';
////$this->load->view('applyjob_view',$data2);
//
//
//}
     
    
     echo '<div class="alert alert-info alert-dismissable"> SucessFully Submitted </div>';
 }
 else {
     echo '<div class="alert alert-warning alert-dismissable"> Try after sometime</div>';
 }
}

//		$this->load->view('customerlogin_view');
//		$this->load->view('includes/footer_view');
        }
        
        
                            public function forgotpasswordresponse()
	{
		//$this->load->helper('url');
$this->load->model('customer_model'); 
$this->load->helper('form');
$this->load->library('form_validation');
$config = Array(        

'mailtype'  => 'html'
);
$this->load->library('email',$config);
// $data['homecontent']=$this->hom_content_model->get_homecontent();
//$data['servicelinks']=$this->service_model->get_service_links();



//$this->load->view('includes/header_view',$data);

// $this->load->view('upload_success', $data); 
       
$this->form_validation->set_rules('email4', 'Email ', 'required|trim|strip_tags|valid_email');

if ($this->form_validation->run()== FALSE)
{
    
echo validation_errors();

//$this->load->view('enquiry_view');

}
else {
$data3=$this->customer_model->get_customer_email($this->input->post('email4'));

$this->email->from(SERVERMAIL, FORGOTSUBJECT);
$this->email->to($data3['email']); 


$this->email->subject(FORGOTSUBJECT2);
$data3['post']=$data3;
$body = $this->load->view('mail/forgot_mail_view.php',$data3,true);
$this->email->message($body); 

if($this->email->send())
{

echo '<div class="alert alert-info alert-dismissable"> Password is sent to your mail. check your mail...</div>';
//$this->load->view('enquiry_view',$data2);

}
else {

echo '<div class="alert alert-warning alert-dismissable"> Email id is not found.. </div>';
//$this->load->view('applyjob_view',$data2);


}


}


//$this->load->view('includes/footer_view');

 
	}
        
        
        
                            public function loginresponse()
	{
                                //print_r($_POST);
		//$this->load->helper('url');
$this->load->model('customer_model'); 
$this->load->helper('form');
$this->load->library('form_validation');
 
       
$this->form_validation->set_rules('email2', 'Email ', 'required|trim|valid_email');
$this->form_validation->set_rules('password3', 'Password', 'required|min_length[6]');

if ($this->form_validation->run()== FALSE)
{
  //  echo "nithin";
echo validation_errors();

//$this->load->view('enquiry_view');

}
else {
$data3=$this->customer_model->get_customerlogin($this->input->post('email2'),$this->input->post('password3'));



if(count($data3)!=0)
{
$this->session->set_userdata('username', $data3['name']);    
$this->session->set_userdata('userid',$data3['id']); 
$this->session->set_userdata('usertype','customer'); 
//echo '<div class="alert alert-info alert-dismissable">please Wait redirecting.</div>';
//$this->load->view('enquiry_view',$data2);
// redirect(base_url().'index.php/customer/customerlogin/');
$status=2;
}
else {
$status=1;
//echo '<div class="alert alert-warning alert-dismissable"> Un authorised to login</div>';
//$this->load->view('applyjob_view',$data2);


}
 $data = array('status' => $status);
 echo json_encode($data);

}


//$this->load->view('includes/footer_view');

 
	}
        
        
        
           function customerhome()
        {
            if(($this->session->userdata('cusid'))) {
                $this->load->model('customer_model'); 
                $data['profile']=$this->customer_model->get_customer($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$this->session->userdata('cusid'))));
		$this->load->view('includes/customerhomeheader_view');
               
                
                $this->load->view('customerprofile_view',$data);
                 $this->load->view('includes/customerhomefooter_view');
		$this->load->view('includes/footer_view');
            }
 else {
       redirect(base_url().'index.php/home/home/');
 }
        }
        
        
               function customeredit()
        {
            if(($this->session->userdata('cusid'))) {
                $this->load->model('customer_model'); 
                		
            $this->load->helper('form');
        
           
$this->load->library('form_validation');
             $data['profile']=$this->customer_model->get_customer($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$this->session->userdata('cusid'))));
		$this->load->view('includes/customerhomeheader_view');
               
                
                $this->load->view('editcustomer_view',$data);
                 $this->load->view('includes/customerhomefooter_view');
		$this->load->view('includes/footer_view');
            }
 else {
       redirect(base_url().'index.php/home/home/');
 }
        }
        
        
           function customereditresponse()
        {
               if(($this->session->userdata('userid'))&&($this->session->userdata('username'))&&($this->session->userdata('usertype'))) {
                $this->load->model('customer_model'); 
                 
		
            $this->load->helper('form');
        
           
$this->load->library('form_validation');
$this->load->view('includes/customerhomeheader_view');
              
$this->form_validation->set_rules('name', 'Name', 'required|trim|strip_tags');
$this->form_validation->set_rules('country', 'Country ', 'required|trim|strip_tags');
$this->form_validation->set_rules('city', 'Near by city ', 'required|trim|strip_tags');
$this->form_validation->set_rules('location', 'Location', 'required|trim|strip_tags');

$this->form_validation->set_rules('telno', 'Telephone number', 'required|trim|strip_tags|numeric');
$this->form_validation->set_rules('mobno', 'Mobile No ', 'required|trim|strip_tags|numeric');
$this->form_validation->set_rules('address', 'Address', 'required|trim|strip_tags');

$this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissable">', '</div>');
if ($this->form_validation->run()== FALSE)
{

 $data['profile']=$this->customer_model->get_customer($this->session->userdata('userid'));
    $this->load->view('editcustomer_view',$data);

//$this->load->view('enquiry_view');

}
else {
    if(trim($this->input->post('email2')!=""))
    {
         $email=$this->input->post('email2');
    }
 else {
          $email=$this->input->post('email');
    }
  $data = array(
'name' => $this->input->post('name'),
'country' => $this->input->post('country'),
'city' => $this->input->post('city'),
'location' => $this->input->post('location'),
'email' => $email,
'telno' => $this->input->post('telno'),      
'mobno' => $this->input->post('mobno'),
'address' => $this->input->post('address')
    
);
  

  $this->customer_model->update_customer($data,$this->session->userdata('userid'));
 

      $data['profile']=$this->customer_model->get_customer($this->session->userdata('userid'));
      $data['messages']= '<div class="alert alert-info alert-dismissable"> SucessFully Edited</div>';
    $this->load->view('editcustomer_view',$data);
    
 
 

  }

     $this->load->view('includes/customerhomefooter_view');
     $this->load->view('includes/footer_view');
        }
         else {
       redirect(base_url().'index.php/customer/customerlogin/');
 }
}


       function customerchangepasswordresponse()
        {
               if(($this->session->userdata('userid'))&&($this->session->userdata('username'))&&($this->session->userdata('usertype'))) {
                $this->load->model('customer_model'); 
                 
		
            $this->load->helper('form');
        
           
$this->load->library('form_validation');
 //$this->load->view('customerchangepassword_view',$data);
              $this->load->view('includes/customerhomeheader_view');
$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
$this->form_validation->set_rules('password2', 'Re-enter Password', 'required|min_length[6]');


$this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissable">', '</div>');
if ($this->form_validation->run()== FALSE)
{


    $this->load->view('customerchangepassword_view',$data);

//$this->load->view('enquiry_view');

}
else {
  
  $data = array(

'password' => md5($this->input->post('password')),
'password2' => base64_encode($this->input->post('password'))      
    
);
  

  $this->customer_model->update_customer($data,$this->session->userdata('userid'));
 
      $data['messages']= '<div class="alert alert-info alert-dismissable"> Password sucessfully changed </div>';
    $this->load->view('customerchangepassword_view',$data);
    
 
 

  }

     $this->load->view('includes/customerhomefooter_view');
     $this->load->view('includes/footer_view');
        }
         else {
       redirect(base_url().'index.php/customer/customerlogin/');
 }
}

             function customerchangepassword()
        {
           if(($this->session->userdata('cusid'))) {
                $this->load->model('customer_model'); 
                		
            $this->load->helper('form');
        
           
$this->load->library('form_validation');
                $data['profile']=$this->customer_model->get_customer($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$this->session->userdata('cusid'))));
		$this->load->view('includes/customerhomeheader_view');
               
                
                $this->load->view('customerchangepassword_view',$data);
                 $this->load->view('includes/customerhomefooter_view');
		$this->load->view('includes/footer_view');
            }
 else {
       redirect(base_url().'index.php/customer/customerlogin/');
 }
        }
        
        
             function customerproject()
        {
            if(($this->session->userdata('userid'))&&($this->session->userdata('username'))&&($this->session->userdata('usertype'))) {
                $this->load->model('customer_model'); 
                		
          
              
		$this->load->view('includes/customerhomeheader_view');
               $this->load->helper('url');
		
              $this->load->library('pagination');
			$this->load->model('customer_model'); 

$config['base_url'] = base_url()."index.php/customer/customerproject";
$config['total_rows'] = $this->customer_model->count_customerproject($this->session->userdata('userid'));
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
  $data["allcustomerprojects"] = $this->customer_model->pagination_select_customerproject($config["per_page"],$page,$this->session->userdata('userid'));
		
        $str_links = $this->pagination->create_links();
        $data["links"] = $str_links ;

                
                $this->load->view('customerproject_view',$data);
                 $this->load->view('includes/customerhomefooter_view');
		$this->load->view('includes/footer_view');
            }
 else {
       redirect(base_url().'index.php/home/home/');
 }
        }
        
        
        
                    function customerlogout()
        {
           
               $this->session->unset_userdata('cusid');
            $this->session->unset_userdata('conform');
 $this->session->unset_userdata('uniqueid');
  $this->session->unset_userdata('orderhistory');
 $this->session->set_userdata('uniqueid', $this->encrypt->encode('uni'.$this->product_model->generate_serial(8))); 
       redirect(base_url().'index.php/home/home/');
 
        }
        
                       function customersingleproject($id)
        {
            if(($this->session->userdata('userid'))&&($this->session->userdata('username'))&&($this->session->userdata('usertype'))) {
                $this->load->model('customer_model'); 
                		
            $this->load->helper('form');
        
           
$this->load->library('form_validation');
                $data['project']=$this->customer_model->get_customerproject($id);
		$this->load->view('includes/customerhomeheader_view');
               
                
                $this->load->view('singlecustomerproject_view',$data);
                 $this->load->view('includes/customerhomefooter_view');
		$this->load->view('includes/footer_view');
            }
 else {
       redirect(base_url().'index.php/customer/customerlogin/');
 }
        }
        
        
             function customerprojectstatus($project)
        {
            if(($this->session->userdata('userid'))&&($this->session->userdata('username'))&&($this->session->userdata('usertype'))) {
                $this->load->model('customer_model'); 
                $data['allworkstatus']=$this->customer_model->get_customerprojectstatus($project);
		$this->load->view('includes/customerhomeheader_view');
               
                
                $this->load->view('customerprojectstatus_view',$data);
                 $this->load->view('includes/customerhomefooter_view');
		$this->load->view('includes/footer_view');
            }
 else {
       redirect(base_url().'index.php/customer/customerlogin/');
 }
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */