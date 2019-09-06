<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Placeorder extends CI_Controller {


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


$this->load->helper('url');
$this->load->model('product_model'); 
$this->load->model('productorder_model'); 
$this->load->model('customer_model'); 
$this->load->model('customerdelivery_model');
$arr=$this->productorder_model->noofitems_productorder2($this->encrypt->decode($this->session->userdata('cusid')));
if($arr['noofitems']!=0 )
{ 
if(($this->session->userdata('cusid'))) {
$data['customerdetail']=$this->customer_model->get_customer($this->encrypt->decode($this->session->userdata('cusid')));    
$data['productorders']=$this->productorder_model->getall_productorder2($this->encrypt->decode($this->session->userdata('cusid')));
if(($this->session->userdata('conform'))) {
    $data['deliverydetails']=$this->customerdelivery_model->get_customerdelivery($this->encrypt->decode($this->session->userdata('cusid')));
}
 else {
    $data['deliverydetails']=$this->customer_model->get_customer($this->encrypt->decode($this->session->userdata('cusid')));
}

}
else {
$data['productorders']=array();
$data['deliverydetails']=array();
}


$this->load->view('placeorder_view',$data);
$this->load->view('includes/footer_view');
}
 else {
    redirect('product/viewcart');
}
}



function customerregisterresponse()
{


$this->load->helper('url');

$this->load->helper('form');
$this->load->library('form_validation');
$this->load->model('productorder_model');
$this->load->model('product_model');
$this->load->model('customer_model');

//$this->load->view('includes/header_view',$data);

// $this->load->view('upload_success', $data); 

$this->form_validation->set_rules('fname', 'First name', 'required|trim|strip_tags');
$this->form_validation->set_rules('lname', 'Last name', 'required|trim|strip_tags');
$this->form_validation->set_rules('email', 'Email ', 'required|trim|strip_tags|valid_email');
$this->form_validation->set_rules('contactno', 'Contactno ', 'required|trim|strip_tags|numeric');
$this->form_validation->set_rules('country', 'Country', 'required|trim|strip_tags');
$this->form_validation->set_rules('location', 'Location', 'required|trim|strip_tags');
$this->form_validation->set_rules('city', 'city', 'required|trim|strip_tags');
$this->form_validation->set_rules('zipcode', 'pincode', 'required|trim|strip_tags');
$this->form_validation->set_rules('address', 'Address', 'required|trim|strip_tags');
$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
$this->form_validation->set_rules('repassword', 'Re-enter Password', 'required|min_length[6]');
$this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissable">', '</div>');
if ($this->form_validation->run() == FALSE)
{
echo validation_errors();
//$data['pagelinks']=$this->menu_model->get_menu_links();
//          $data['locationmap']=$this->locationmap_model->get_locationmap_limit(1);
//          $data['homecontacts']=$this->contactus_model->get_contactus_limit(2);
//          $data['cartlist']=$this->productorder_model->noofitems_productorder($this->encrypt->decode($this->session->userdata('uniqueid')));
//	$this->load->view('includes/header_view',$data);
//$this->load->view('conformaddress_view');
//$this->load->view('includes/footer_view');
}
elseif($this->customer_model->check_customeremail($this->input->post('email')))
{
echo '<div class="alert alert-warning alert-dismissable"> Sign up failed</div>';
echo '<div class="alert alert-warning alert-dismissable"> Email id you entered is already exit. Please signup with another mail id </div>';

}
else {

$data = array(
'fname' => $this->input->post('fname'),
'lname' => $this->input->post('lname'),    
'address' => $this->input->post('address'),
'mobno' => $this->input->post('contactno'),
'email' => $this->input->post('email'),
'daddress' => $this->input->post('daddress'),
'country' => $this->input->post('country'),     
'city' => $this->input->post('city'),
'location' => $this->input->post('location'), 
'pincode' => $this->input->post('zipcode'),
'password' => md5($this->input->post('password')),
'password2' => base64_encode($this->input->post('repassword'))
);
$cusid=$this->customer_model->insert_customer($data);
if($cusid!=0)
{
echo '<div class="alert alert-info alert-dismissable"> Sucessfully Registered</div>';

//    $data2 = array(
//
//'cusid' => $cusid,  
//'orderstatus' => 1          
//);
//  if($this->productorder_model->update_productorder_custid($data2,$this->encrypt->decode($this->session->userdata('uniqueid'))))
//  {
//       
//     $status=1; 
//     $data['productorders2']=$this->productorder_model->getall_productorder3($this->encrypt->decode($this->session->userdata('uniqueid')));
//     
//foreach ( $data['productorders2'] as $productorder2)
//{
// 
//    if( $productorder2['pnoofitems']>$productorder2['solditems'])
//    {
//        $outofstock=0;
//    }
//    elseif( $productorder2['pnoofitems']==$productorder2['solditems'])
//    {
//        $outofstock=0;
//    }
// else {
//        $outofstock=1;
//    }
//            $data3 = array(
//
//'noofitems' => $productorder2['solditems'],
//'outofstock' => $outofstock                 
//);
//$this->productorder_model->update_productorder2($data3,$productorder2['id']);
//  
//             
//             
//         
//        
//    
//}
//
//
////redirect('product/ordersuccess');
//
//  }
// $this->session->set_userdata('uniqueid', $this->encrypt->encode('uni'.$this->product_model->generate_serial(8)));  
//  $this->session->set_userdata('cusid', $this->encrypt->encode($cusid));  
}
else {
echo '<div class="alert alert-info alert-dismissable"> Try after Sometime...</div>';
}

}

}




public function customerloginresponse()
{
//print_r($_POST);
//$this->load->helper('url');
$this->load->model('customer_model'); 
$this->load->helper('form');
$this->load->library('form_validation');


$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

if ($this->form_validation->run()== FALSE)
{
//  echo "nithin";
echo validation_errors();
$status=3;
//$this->load->view('enquiry_view');

}
else {
$data3=$this->customer_model->get_customerlogin($this->input->post('email'),$this->input->post('password'));



if(count($data3)!=0)
{

$this->session->set_userdata('cusid', $this->encrypt->encode($data3['id']));  
 
$data2 = array(

'cusid' => $data3['id']   
);
$this->productorder_model->update_productorder_custid($data2,$this->encrypt->decode($this->session->userdata('uniqueid')));
$this->session->unset_userdata('uniqueid');
 $this->session->set_userdata('uniqueid', $this->encrypt->encode('uni'.$this->product_model->generate_serial(8))); 
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


public function customerloginresponse2()
{
// echo "nithin2";
//print_r($_POST);
//$this->load->helper('url');
$this->load->model('customer_model'); 
$this->load->helper('form');
$this->load->library('form_validation');


$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

if ($this->form_validation->run()== FALSE)
{
//  echo "nithin";
//echo validation_errors();
$status=3;
//$this->load->view('enquiry_view');

}
else {
$data3=$this->customer_model->get_customerlogin($this->input->post('email'),$this->input->post('password'));



if(count($data3)!=0)
{
$this->session->set_userdata('cusid', $this->encrypt->encode($data3['id']));  
 
$data2 = array(

'cusid' => $data3['id']   
);
$this->productorder_model->update_productorder_custid($data2,$this->encrypt->decode($this->session->userdata('uniqueid')));
$this->session->unset_userdata('uniqueid');
 $this->session->set_userdata('uniqueid', $this->encrypt->encode('uni'.$this->product_model->generate_serial(8))); 
$status=2;
//$this->session->set_userdata('cusid', $this->encrypt->encode($data3['id']));  
//$this->session->unset_userdata('uniqueid');
// $this->session->set_userdata('uniqueid', $this->encrypt->encode('uni'.$this->product_model->generate_serial(8))); 
}
else {
$status=1;
}
$data = array('status' => $status);
echo json_encode($data);

}


//$this->load->view('includes/footer_view');


}

public function conformresponse_old()
{
$this->load->helper('url');

$this->load->helper('form');
$this->load->library('form_validation');
$this->load->model('customerdelivery_model');
$this->load->model('productorder_model');
//$this->load->model('customer_model');

//$this->load->view('includes/header_view',$data);

// $this->load->view('upload_success', $data); 


$this->form_validation->set_rules('email', 'Email ', 'required|trim|strip_tags|valid_email');
$this->form_validation->set_rules('contactno', 'Contactno ', 'required|trim|strip_tags|numeric');
$this->form_validation->set_rules('country', 'Country', 'required|trim|strip_tags');
$this->form_validation->set_rules('location', 'Location', 'required|trim|strip_tags');
$this->form_validation->set_rules('city', 'city', 'required|trim|strip_tags');
$this->form_validation->set_rules('zipcode', 'pincode', 'required|trim|strip_tags');
$this->form_validation->set_rules('address', 'Address', 'required|trim|strip_tags');

$this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissable">', '</div>');
if ($this->form_validation->run() == FALSE)
{
echo validation_errors();
//$data['pagelinks']=$this->menu_model->get_menu_links();
//          $data['locationmap']=$this->locationmap_model->get_locationmap_limit(1);
//          $data['homecontacts']=$this->contactus_model->get_contactus_limit(2);
//          $data['cartlist']=$this->productorder_model->noofitems_productorder($this->encrypt->decode($this->session->userdata('uniqueid')));
//	$this->load->view('includes/header_view',$data);
//$this->load->view('conformaddress_view');
//$this->load->view('includes/footer_view');
}
else {

$data = array(
  
'address' => $this->input->post('address'),
'mobno' => $this->input->post('contactno'),
'email' => $this->input->post('email'),
'country' => $this->input->post('country'),     
'city' => $this->input->post('city'),
'location' => $this->input->post('location'), 
'pincode' => $this->input->post('zipcode'),
'cusid' => $this->encrypt->decode($this->session->userdata('cusid'))   

);

 $status=0;
if(!$this->session->userdata('conform'))
{
    $status=1;
$deliveryid=$this->customerdelivery_model->insert_customerdelivery($data);
if($deliveryid!=0)
{
    $data2 = array(

'conform' => 1  
);
$this->productorder_model->update_productorder_withcustid($data2,$this->encrypt->decode($this->session->userdata('cusid')));
   $this->session->set_userdata('conform', '1'); 
//echo '<div class="alert alert-info alert-dismissable"> Sucessfully Registered</div>';

 
}


}
 else {
      $status=1;
$this->customerdelivery_model->update_customerdelivery($data,$this->encrypt->decode($this->session->userdata('cusid')));
}
}
 $data = array('status' => $status);
echo json_encode($data);
    
}

public function conformresponse()
{
// print_r($_POST);
$this->load->helper('url');

$this->load->helper('form');
$this->load->library('form_validation');
$this->load->model('customerdelivery_model');
$this->load->model('productorder_model');
//$this->load->model('customer_model');

//$this->load->view('includes/header_view',$data);

// $this->load->view('upload_success', $data); 


$this->form_validation->set_rules('email', 'Email ', 'required|trim|strip_tags|valid_email');
$this->form_validation->set_rules('contactno', 'Contactno ', 'required|trim|strip_tags|numeric');
$this->form_validation->set_rules('country', 'Country', 'required|trim|strip_tags');
$this->form_validation->set_rules('location', 'Location', 'required|trim|strip_tags');
$this->form_validation->set_rules('city', 'city', 'required|trim|strip_tags');
$this->form_validation->set_rules('zipcode', 'pincode', 'required|trim|strip_tags');
$this->form_validation->set_rules('address', 'Address', 'required|trim|strip_tags');

$this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissable">', '</div>');
if ($this->form_validation->run() == FALSE)
{
echo validation_errors();
//$data['pagelinks']=$this->menu_model->get_menu_links();
//          $data['locationmap']=$this->locationmap_model->get_locationmap_limit(1);
//          $data['homecontacts']=$this->contactus_model->get_contactus_limit(2);
//          $data['cartlist']=$this->productorder_model->noofitems_productorder($this->encrypt->decode($this->session->userdata('uniqueid')));
//	$this->load->view('includes/header_view',$data);
//$this->load->view('conformaddress_view');
//$this->load->view('includes/footer_view');
}
else {

$data = array(

'address' => $this->input->post('address'),
'mobno' => $this->input->post('contactno'),
'email' => $this->input->post('email'),
'country' => $this->input->post('country'),     
'city' => $this->input->post('city'),
'location' => $this->input->post('location'), 
'pincode' => $this->input->post('zipcode'),
'cusid' => $this->encrypt->decode($this->session->userdata('cusid'))   

);

$status=0;
if(!$this->session->userdata('conform'))
{

$cusdelivery=$this->customerdelivery_model->get_customerdelivery($this->encrypt->decode($this->session->userdata('cusid')));

if(empty($cusdelivery))
{
$status=1;
$deliveryid=$this->customerdelivery_model->insert_customerdelivery($data);
if($deliveryid!=0)
{
$data2 = array(

'conform' => 1  
);
$this->productorder_model->update_productorder_withcustid($data2,$this->encrypt->decode($this->session->userdata('cusid')));
$this->session->set_userdata('conform', '1'); 
//echo '<div class="alert alert-info alert-dismissable"> Sucessfully Registered</div>';


}
}
else {
$status=1;
$this->customerdelivery_model->update_customerdelivery($data,$this->encrypt->decode($this->session->userdata('cusid')));
$this->session->set_userdata('conform', '1'); 
}

}
else {
$status=1;
$this->customerdelivery_model->update_customerdelivery($data,$this->encrypt->decode($this->session->userdata('cusid')));
}
}
$data = array('status' => $status);
echo json_encode($data);

}

public function conformorderhistory()
{
$this->load->helper('url');

$this->load->helper('form');
$this->load->library('form_validation');
$this->load->model('productorder_model');
$data = array(
'orderhistory' => 1 
);
$this->productorder_model->update_productorder_withcustid($data,$this->encrypt->decode($this->session->userdata('cusid')));
   $this->session->set_userdata('orderhistory', '1'); 
 $status=1;
 $data = array('status' => $status);
echo json_encode($data); 
}


function sucessorder_old()
{
    $this->load->model('productorder_model');
    
    if(($this->session->userdata('cusid'))) {
        $data = array(
'orderstatus' => 1 
);
$this->productorder_model->update_productorder_withcustid($data,$this->encrypt->decode($this->session->userdata('cusid')));
    $this->load->view('sucessorder_view');
$this->load->view('includes/footer_view');
    }
 else {
       redirect(base_url().'index.php/home/home/');
 }
}


function sucessorder()
{ 
$this->load->model('productorder_model');
$this->load->model('orderhistory_model');

if(($this->session->userdata('cusid'))) {
$orderhistory=$this->productorder_model->get_productorder_history($this->encrypt->decode($this->session->userdata('cusid')));
$time1 = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

$orderdate=$time1->format('Y-m-d h:i:s');
$date1=  explode(' ',$orderdate );
if(!empty($orderhistory))
{
foreach ($orderhistory as $history)
{
$data3 = array(
'country' => $history['country'],
'city' => $history['city'],
'location' => $history['location'],
'mobno' => $history['mobno'],     
'email' => $history['email'],
'pincode' => $history['pincode'], 
'address' => $history['address'],
'cusid' => $this->encrypt->decode($this->session->userdata('cusid')),
'pid' => $history['pid'],
'oid' => $history['poid'],
'status'=>1,    
'ohdate' => $orderdate         
);
$this->orderhistory_model->insert_orderhistory($data3);


//$this->load->model('customer_model'); 
//$data['deliverydetails']=$history;
//$data['customerdetails']=$this->customer_model->get_customer($this->encrypt->decode($this->session->userdata('cusid')));
//$data['productorder']=$this->productorder_model->get_productorder5($history['poid']);
//
//$config = Array(        
//
//'mailtype'  => 'html'
//);
//$this->load->library('email',$config);
//// $data['homecontent']=$this->hom_content_model->get_homecontent();
////$data['servicelinks']=$this->service_model->get_service_links();
//
//
//$forgot=$this->contactus_model->get_forgot();
//$this->email->from(SERVERMAIL, CUSTOMERORDER);
//$this->email->to($forgot); 
//
//$this->email->subject(ENQUIRYSUBJECT2);
//
//echo $body = $this->load->view('mail/orderseller_mail_view.php',$data,true);
//$this->email->message($body); 
//$this->email->send(FALSE);
//$this->email->print_debugger(array('headers', 'subject', 'body'));

//
//$this->email->from(SERVERMAIL, SELLERORDER);
//$this->email->to($data['deliverydetails']['email']); 
//
//
//$this->email->subject(SELLERORDER2);
//
//echo $body = $this->load->view('mail/ordercustomer_mail_view.php',$data,true);
//$this->email->message($body); 
//$this->email->send();
}
}
$data = array(
'orderstatus' => 1 
);
$this->productorder_model->update_productorder_withcustid($data,$this->encrypt->decode($this->session->userdata('cusid')));

$this->session->unset_userdata('conform');
$this->session->unset_userdata('orderhistory');
redirect(base_url().'index.php/placeorder/sucessorderview/');
}
else {
redirect(base_url().'index.php/home/home/');
}
}

function sucessorderview()
{ 
if(($this->session->userdata('cusid'))) {

$this->load->view('sucessorder_view');
$this->load->view('includes/footer_view');
}
else {
redirect(base_url().'index.php/home/home/');
}
}


function failureorder()
{
    if(($this->session->userdata('cusid'))) {
    $this->load->view('failureorder_view',$data);
$this->load->view('includes/footer_view');
    }
 else {
       redirect(base_url().'index.php/home/home/');
 }
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

$this->form_validation->set_rules('email', 'Email ', 'required|trim|strip_tags|valid_email');

if ($this->form_validation->run()== FALSE)
{

echo validation_errors();


}
else {
   // $data3['post']=array();
$data3['post']=$this->customer_model->get_customerdetails_withemail($this->input->post('email'));
//print_r($data3);
//echo $data3['post']['email'];
if(!empty($data3['post']))
{
$this->email->from(SERVERMAIL, FORGOTSUBJECT);
$this->email->to($data3['post']['email']); 


$this->email->subject(FORGOTSUBJECT2);
$body = $this->load->view('mail/forgot_mail_view.php',$data3,true);

$this->email->message($body); 

if($this->email->send())
{

echo '<div class="alert alert-info alert-dismissable"> Password is sent to your mail. check your mail...</div>';


}
else 
{
echo '<div class="alert alert-warning alert-dismissable"> Email id is not found.. </div>';
}
}
else {
echo '<div class="alert alert-warning alert-dismissable"> Email id is not found.. </div>';
}
}
}
function payonline()
{
    $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
array("X-Api-Key:6ad02bfaf46dd0133d3c7ce7a20c7418",
"X-Auth-Token:298fae5a4401f0a5d79a38897d2fa41e"));
$payload = Array(
    'purpose' => 'TEST',
    'amount' => '20',
    'phone' => '2233445566',
    'buyer_name' => 'Hishore Nath',
    'redirect_url' => 'http://www.junaidperfumes.in/gateway/success.php',
    'send_email' => false,
    'webhook' => '',
    'send_sms' => true,
    'email' => 'foo@example.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

$json_decode=json_decode($response,true);
echo $long_url=$json_decode['payment_request']['longurl'];
}


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */