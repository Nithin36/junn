<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {


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

$this->load->library('pagination');
$this->load->model('product_model'); 
$this->load->model('usertype_model'); 
$this->load->model('category_model'); 
$this->load->model('fragrance_model');

$config['base_url'] = base_url()."index.php/product/product";
$config['total_rows'] = $this->product_model->count_product();
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
$data["allproducts"] = $this->product_model->pagination_select_product($config["per_page"], $page);
$data["allcategories"] = $this->product_model->get_products_category();	
$data["allusertypes"] = $this->usertype_model->get_usertype_all();
$data["allfragrances"] = $this->fragrance_model->get_fragrance_all();
$str_links = $this->pagination->create_links();
$data["links"] = $str_links ;



$this->load->view('product_view',$data);
$this->load->view('includes/footer_view');
}
public function listproducttitle()
{
   
    
$title=$_GET['title'];
    
if(trim($title)!="")
{
$this->load->helper('url');

$this->load->library('pagination');
$this->load->model('product_model'); 
$this->load->model('usertype_model'); 
$this->load->model('category_model'); 
$this->load->model('fragrance_model'); 
$data["allcategories"] = $this->category_model->get_categories_all();
$data["allusertypes"] = $this->usertype_model->get_usertype_all();
$data["allfragrances"] = $this->fragrance_model->get_fragrance_all();

$config['base_url'] = base_url()."index.php/product/listproducttitle/index?title=".$_GET['title'];
$config['total_rows'] = $this->product_model->count_producttitle($title);


$limit=12;
$config['per_page'] = $limit; 
$config['use_page_numbers'] = TRUE;
$config['page_query_string'] = TRUE;
$config['enable_query_strings'] = TRUE;
$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
$config['full_tag_close'] = '</ul>';
$config['first_link'] = 'First';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';

$config['last_link'] = 'Last';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['next_link'] = 'Next ';
$config['next_tag_open'] = ' <li>';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = 'Previous ';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';


$config['cur_tag_open'] ='<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></span>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';


$this->pagination->initialize($config);

//        
$offset = 0;
if (!empty($_GET['per_page'])) {
$pageNo = $_GET['per_page'];
$offset = ($pageNo - 1) * $limit;
}
$data["allproducts"] = $this->product_model->pagination_select_producttitle($limit,$offset,$title);
//$data['selectcategory']=$this->product_model->get_productsubcategory($id) ;


$data["links"] = $this->pagination->create_links();
//= explode('&nbsp;', $str_links);




$this->load->view('product_view',$data);
$this->load->view('includes/footer_view');
}
 else {
       redirect(base_url()."index.php/product/product"); 
}
}

public function listproduct()
{
   
    
$id=$this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$_GET['id']));
    

$this->load->helper('url');

$this->load->library('pagination');
$this->load->model('product_model'); 
$this->load->model('usertype_model'); 
$this->load->model('category_model'); 
$this->load->model('fragrance_model'); 
$data["allcategories"] = $this->category_model->get_categories_all();
$data["allusertypes"] = $this->usertype_model->get_usertype_all();
$data["allfragrances"] = $this->fragrance_model->get_fragrance_all();
$config['base_url'] = base_url()."index.php/product/listproduct/index?id=".$_GET['id'];
$config['total_rows'] = $this->product_model->count_product2($id);


$limit=12;
$config['per_page'] = $limit; 
$config['use_page_numbers'] = TRUE;
$config['page_query_string'] = TRUE;
$config['enable_query_strings'] = TRUE;
$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
$config['full_tag_close'] = '</ul>';
$config['first_link'] = 'First';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';

$config['last_link'] = 'Last';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['next_link'] = 'Next ';
$config['next_tag_open'] = ' <li>';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = 'Previous ';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';


$config['cur_tag_open'] ='<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></span>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';


$this->pagination->initialize($config);

//        
$offset = 0;
if (!empty($_GET['per_page'])) {
$pageNo = $_GET['per_page'];
$offset = ($pageNo - 1) * $limit;
}
$data["allproducts"] = $this->product_model->pagination_select_product2($limit,$offset,$id);
//$data['selectcategory']=$this->product_model->get_productsubcategory($id) ;


$data["links"] = $this->pagination->create_links();
//= explode('&nbsp;', $str_links);




$this->load->view('product_view',$data);
$this->load->view('includes/footer_view');
}

public function listproductgender()
{
   
    
$id=$this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$_GET['id']));
    

$this->load->helper('url');

$this->load->library('pagination');
$this->load->model('product_model'); 
$this->load->model('usertype_model'); 
$this->load->model('category_model'); 
$this->load->model('fragrance_model'); 
$data["allcategories"] = $this->category_model->get_categories_all();
$data["allusertypes"] = $this->usertype_model->get_usertype_all();
$data["allfragrances"] = $this->fragrance_model->get_fragrance_all();
$config['base_url'] = base_url()."index.php/product/listproductgender/index?id=".$_GET['id'];
$config['total_rows'] = $this->product_model->count_productgender($id);


$limit=12;
$config['per_page'] = $limit; 
$config['use_page_numbers'] = TRUE;
$config['page_query_string'] = TRUE;
$config['enable_query_strings'] = TRUE;
$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
$config['full_tag_close'] = '</ul>';
$config['first_link'] = 'First';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';

$config['last_link'] = 'Last';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['next_link'] = 'Next ';
$config['next_tag_open'] = ' <li>';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = 'Previous ';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';


$config['cur_tag_open'] ='<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></span>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';


$this->pagination->initialize($config);

//        
$offset = 0;
if (!empty($_GET['per_page'])) {
$pageNo = $_GET['per_page'];
$offset = ($pageNo - 1) * $limit;
}
$data["allproducts"] = $this->product_model->pagination_select_productgender($limit,$offset,$id);
//$data['selectcategory']=$this->product_model->get_productsubcategory($id) ;


$data["links"] = $this->pagination->create_links();
//= explode('&nbsp;', $str_links);




$this->load->view('product_view',$data);
$this->load->view('includes/footer_view');
}

public function listproductfragrance()
{
   
    
$id=$this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$_GET['id']));
    

$this->load->helper('url');

$this->load->library('pagination');
$this->load->model('product_model'); 
$this->load->model('usertype_model'); 
$this->load->model('category_model'); 
$this->load->model('fragrance_model'); 
$data["allcategories"] = $this->category_model->get_categories_all();
$data["allusertypes"] = $this->usertype_model->get_usertype_all();
$data["allfragrances"] = $this->fragrance_model->get_fragrance_all();
$config['base_url'] = base_url()."index.php/product/listproductfragrance/index?id=".$_GET['id'];
$config['total_rows'] = $this->product_model->count_productfragrance($id);


$limit=12;
$config['per_page'] = $limit; 
$config['use_page_numbers'] = TRUE;
$config['page_query_string'] = TRUE;
$config['enable_query_strings'] = TRUE;
$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
$config['full_tag_close'] = '</ul>';
$config['first_link'] = 'First';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';

$config['last_link'] = 'Last';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$config['next_link'] = 'Next ';
$config['next_tag_open'] = ' <li>';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = 'Previous ';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';


$config['cur_tag_open'] ='<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></span>';

$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';


$this->pagination->initialize($config);

//        
$offset = 0;
if (!empty($_GET['per_page'])) {
$pageNo = $_GET['per_page'];
$offset = ($pageNo - 1) * $limit;
}
$data["allproducts"] = $this->product_model->pagination_select_productfragrance($limit,$offset,$id);
//$data['selectcategory']=$this->product_model->get_productsubcategory($id) ;


$data["links"] = $this->pagination->create_links();
//= explode('&nbsp;', $str_links);




$this->load->view('product_view',$data);
$this->load->view('includes/footer_view');
}


public function viewproduct($pid)
{
$this->load->model('product_model');
$data['singleproduct']=$this->product_model->get_product_single($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$pid)));
$this->load->view('singleproduct_view',$data);
$this->load->view('includes/footer_view');
}

public function sellproduct()
{
    
    	$this->load->helper('url');

$this->load->helper('form');
$this->load->library('form_validation');
$this->load->model('product_model');

$this->load->view('sellproduct_view');
$this->load->view('includes/footer_view');
}
public function addtocartresponse()
{
    $status=0;
$this->load->model('product_model'); 
$this->load->model('productorder_model'); 
$this->load->helper('form');
$this->load->library('form_validation');
$this->form_validation->set_rules('pid', 'pid ', 'required');


if ($this->form_validation->run()== FALSE)
{
echo validation_errors();
}
else {
$data3['singleproduct']=$this->product_model->get_product_single($this->encrypt->decode($this->input->post('pid')));
//print_r($data3['singleproduct']);
//check out of stock condition
if(($data3['singleproduct']['noofitems']!=$data3['singleproduct']['solditems'])&&($data3['singleproduct']['noofitems']>$data3['singleproduct']['solditems']))
{
// check any product in the cart....
    $noofrows=0;
    if($this->session->userdata('cusid'))
{

$noofrows=$this->productorder_model->check_productorder2($this->encrypt->decode($this->input->post('pid')),$this->encrypt->decode($this->session->userdata('cusid')));
}
 else {
  $noofrows=$this->productorder_model->check_productorder($this->encrypt->decode($this->input->post('pid')),$this->encrypt->decode($this->session->userdata('uniqueid')));
}
if($noofrows!=0)
{
        if($this->session->userdata('cusid'))
{
  $data3['singleproductorder']=$this->productorder_model->get_productorder4($this->encrypt->decode($this->input->post('pid')),$this->encrypt->decode($this->session->userdata('cusid')));          
}
 else {
    $data3['singleproductorder']=$this->productorder_model->get_productorder2($this->encrypt->decode($this->input->post('pid')),$this->encrypt->decode($this->session->userdata('uniqueid')));
}
//$data3['singleproductorder']=$this->productorder_model->get_productorder2($this->encrypt->decode($this->input->post('pid')),$this->encrypt->decode($this->session->userdata('uniqueid')));
if(($data3['singleproduct']['noofitems']!=$data3['singleproductorder']['noofitems'])&&($data3['singleproduct']['noofitems']>$data3['singleproductorder']['noofitems']))
{
$noofitems= $data3['singleproductorder']['noofitems']+1;
$totalprize=$noofitems*$data3['singleproduct']['onlineprice'];
$time1 = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$cusid=0;
if($this->session->userdata('cusid'))
{
$cusid=$this->encrypt->decode($this->session->userdata('cusid'));
}
$orderdate=$time1->format('Y-m-d h:i:s');
$data = array(
'uniqueid' => $this->encrypt->decode($this->session->userdata('uniqueid')),
'cusid' => $cusid,
'orderid' => 'ord'.$this->product_model->generate_serial(10),
'productid' => $this->encrypt->decode($this->input->post('pid')),
'producttitle' => $data3['singleproduct']['name'],
'noofitems' => $noofitems,
'price' => $data3['singleproduct']['onlineprice'],     
'totalprice' => $totalprize,
'orderstatus' => 0, 
'outofstock' => 0,       
'orderdate' =>$orderdate   
);
if($this->session->userdata('cusid'))
{
if($this->productorder_model->update_productorder3($data,$this->encrypt->decode($this->input->post('pid')),$this->encrypt->decode($this->session->userdata('cusid'))))
{
$status=2;
}   
else {
$status=0;
}
}
 else {
    if($this->productorder_model->update_productorder($data,$this->encrypt->decode($this->input->post('pid')),$this->encrypt->decode($this->session->userdata('uniqueid'))))
{
$status=2;
}   
else {
$status=0;
}
}
}
else {
$status=4;
}

}
else {
$time1 = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

$orderdate=$time1->format('Y-m-d h:i:s');
$cusid=0;
if($this->session->userdata('cusid'))
{
$cusid=$this->encrypt->decode($this->session->userdata('cusid'));
}
$data = array(
'uniqueid' => $this->encrypt->decode($this->session->userdata('uniqueid')),
'cusid' => $cusid,   
'orderid' => 'ord'.$this->product_model->generate_serial(10),
'productid' => $this->encrypt->decode($this->input->post('pid')),
'producttitle' => $data3['singleproduct']['name'],
'noofitems' => 1,
'price' => $data3['singleproduct']['onlineprice'],     
'totalprice' => $data3['singleproduct']['onlineprice'],
'orderstatus' => 0, 
'outofstock' => 0,       
'orderdate' =>$orderdate   
);

if($this->productorder_model->insert_productorder($data))
{
$status=1;
}
else {
$status=0;
}
}
}
else {
$status=3;
}

}
//$data3['cartlist']=$this->productorder_model->noofitems_productorder($this->encrypt->decode($this->session->userdata('uniqueid')));
if($this->session->userdata('cusid'))
{
$data3['cartlist']=$this->productorder_model->noofitems_productorder2($this->encrypt->decode($this->session->userdata('cusid')));     
}
else {
$data3['cartlist']=$this->productorder_model->noofitems_productorder($this->encrypt->decode($this->session->userdata('uniqueid'))); 

}
$data = array('status' => $status,'noofitems'=>$data3['cartlist']['noofitems']);
echo json_encode($data);

}
public function addtocartresponseold()
{
//print_r($_POST);
//$this->load->helper('url');
$this->load->model('product_model'); 
$this->load->model('productorder_model'); 
$this->load->helper('form');
$this->load->library('form_validation');


$this->form_validation->set_rules('pid', 'pid ', 'required');


if ($this->form_validation->run()== FALSE)
{
//  echo "nithin";
echo validation_errors();

//$this->load->view('enquiry_view');

}
else {
$data3['singleproduct']=$this->product_model->get_product_single($this->encrypt->decode($this->input->post('pid')));
//print_r($data3['singleproduct']);
//check out of stock condition
if(($data3['singleproduct']['noofitems']!=$data3['singleproduct']['solditems'])&&($data3['singleproduct']['noofitems']>$data3['singleproduct']['solditems']))
{
// check any product in the cart....
if($this->productorder_model->check_productorder($this->encrypt->decode($this->input->post('pid')),$this->encrypt->decode($this->session->userdata('uniqueid')))!=0 )
{
$data3['singleproductorder']=$this->productorder_model->get_productorder2($this->encrypt->decode($this->input->post('pid')),$this->encrypt->decode($this->session->userdata('uniqueid')));
if(($data3['singleproduct']['noofitems']!=$data3['singleproductorder']['noofitems'])&&($data3['singleproduct']['noofitems']>$data3['singleproductorder']['noofitems']))
{
$noofitems= $data3['singleproductorder']['noofitems']+1;
$totalprize=$noofitems*$data3['singleproduct']['onlineprice'];
$time1 = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$cusid=0;
if($this->session->userdata('cusid'))
{
    $cusid=$this->encrypt->decode($this->session->userdata('cusid'));
}
$orderdate=$time1->format('Y-m-d h:i:s');
$data = array(
'uniqueid' => $this->encrypt->decode($this->session->userdata('uniqueid')),
'cusid' => $cusid,
'orderid' => 'ord'.$this->product_model->generate_serial(10),
'productid' => $this->encrypt->decode($this->input->post('pid')),
'producttitle' => $data3['singleproduct']['name'],
'noofitems' => $noofitems,
'price' => $data3['singleproduct']['onlineprice'],     
'totalprice' => $totalprize,
'orderstatus' => 0, 
'outofstock' => 0,       
'orderdate' =>$orderdate   
);
if( $this->productorder_model->update_productorder($data,$this->encrypt->decode($this->input->post('pid')),$this->encrypt->decode($this->session->userdata('uniqueid'))))
{
$status=2;
}   
else {
$status=0;
}
}
else {
$status=4;
}

}
else {
$time1 = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

$orderdate=$time1->format('Y-m-d h:i:s');
$cusid=0;
if($this->session->userdata('cusid'))
{
    $cusid=$this->encrypt->decode($this->session->userdata('cusid'));
}
$data = array(
'uniqueid' => $this->encrypt->decode($this->session->userdata('uniqueid')),
'cusid' => $cusid,   
'orderid' => 'ord'.$this->product_model->generate_serial(10),
'productid' => $this->encrypt->decode($this->input->post('pid')),
'producttitle' => $data3['singleproduct']['name'],
'noofitems' => 1,
'price' => $data3['singleproduct']['onlineprice'],     
'totalprice' => $data3['singleproduct']['onlineprice'],
'orderstatus' => 0, 
'outofstock' => 0,       
'orderdate' =>$orderdate   
);

if($this->productorder_model->insert_productorder($data))
{
$status=1;
}
else {
$status=0;
}
}
}
else {
$status=3;
}

}
//$data3['cartlist']=$this->productorder_model->noofitems_productorder($this->encrypt->decode($this->session->userdata('uniqueid')));
          if($this->session->userdata('cusid'))
{
         $data3['cartlist']=$this->productorder_model->noofitems_productorder2($this->encrypt->decode($this->session->userdata('cusid')));     
          }
 else {
      $data3['cartlist']=$this->productorder_model->noofitems_productorder($this->encrypt->decode($this->session->userdata('uniqueid'))); 
     
 }
$data = array('status' => $status,'noofitems'=>$data3['cartlist']['noofitems']);
echo json_encode($data);




//$this->load->view('includes/footer_view');


}

public function viewcart()
{
$this->load->model('product_model');
if($this->session->userdata('cusid'))
{
   $data['productorders']=$this->productorder_model->getall_productorder2($this->encrypt->decode($this->session->userdata('cusid')));
}
 else {
    $data['productorders']=$this->productorder_model->getall_productorder($this->encrypt->decode($this->session->userdata('uniqueid')));
}

$this->load->view('viewcart_view',$data);
$this->load->view('includes/footer_view');
}


public function addtocartresponse2()
{
$this->load->model('product_model'); 
$this->load->model('productorder_model'); 
$this->load->helper('form');
$this->load->library('form_validation');
$this->form_validation->set_rules('sid', 'sid ', 'required');
$this->form_validation->set_rules('oid', 'oid ', 'required');
if ($this->form_validation->run()== FALSE)
{
echo validation_errors();
}
else {
 //get single product order with single id    
$data3['singleproductorder']=$this->productorder_model->get_productorder3($this->encrypt->decode($this->input->post('oid')));
$select= $data3['singleproductorder']['pnoofitems']-$data3['singleproductorder']['solditems'];

if(($select==0)||($select<0))
{
$status=2;
}
else {

$totalprize=$this->input->post('sid')*$data3['singleproductorder']['onlineprice'];
$time1 = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

$orderdate=$time1->format('Y-m-d h:i:s');
$cusid=0;
if($this->session->userdata('cusid'))
{
    $cusid=$this->encrypt->decode($this->session->userdata('cusid'));
}
$data = array(
'noofitems' => $this->input->post('sid'),
'cusid' => $cusid,    
'price' => $data3['singleproductorder']['onlineprice'],     
'totalprice' => $totalprize,
'orderdate' =>$orderdate   
);
//update the single product in the cart...
if( $this->productorder_model->update_productorder2($data,$this->encrypt->decode($this->input->post('oid'))))
{
$status=1;
}   
else {
$status=0;
}
// checking out of stock and calculate total price....

$data3['singleproductorder2']=$this->productorder_model->get_productorder3($this->encrypt->decode($this->input->post('oid')));
if($this->session->userdata('cusid'))
{
    $data['productorders2']=$this->productorder_model->getall_productorder2($this->encrypt->decode($this->session->userdata('cusid')));
}
 else {
    $data['productorders2']=$this->productorder_model->getall_productorder($this->encrypt->decode($this->session->userdata('uniqueid')));
}

$tot=0;
foreach ( $data['productorders2'] as $productorder2)
{
$select2= $productorder2['pnoofitems']-$productorder2['solditems'];
if(($select2!=0)&&($select2>0))
{
$tot=$tot+$productorder2['totalprice'];  
}
}
$stock="in stock";
$select3= $data3['singleproductorder']['pnoofitems']-$data3['singleproductorder']['solditems'];
if(($select3==0)||($select3<0))
{
$select3=0;
$stock="out of stock";
}
}


}
//      $data3['cartlist']=$this->productorder_model->noofitems_productorder($this->encrypt->decode($this->session->userdata('uniqueid')));
$data = array('status' => $status,'totalprice' => $data3['singleproductorder2']['totalprice'],'wholeamount' => $tot,'stockitems' => $select3,'stockstatus' => $stock);
echo json_encode($data);




//$this->load->view('includes/footer_view');


}


public function deleteorderresponse()
{
//print_r($_POST);
//$this->load->helper('url');
$this->load->model('product_model'); 
$this->load->model('productorder_model'); 
$this->load->helper('form');
$this->load->library('form_validation');


$this->form_validation->set_rules('did', 'did ', 'required');




if ($this->form_validation->run()== FALSE)
{
//  echo "nithin";
echo validation_errors();

//$this->load->view('enquiry_view');

}
else {

if( $this->productorder_model->delete_productorder($this->encrypt->decode($this->input->post('did'))))
{
$status=1;
}   
else {
$status=0;
}


$data['productorders2']=$this->productorder_model->getall_productorder($this->encrypt->decode($this->session->userdata('uniqueid')));
$tot=0;
foreach ( $data['productorders2'] as $productorder2)
{


$select2= $productorder2['pnoofitems']-$productorder2['solditems'];
if(($select2!=0)&&($select2>0))
{
$tot=$tot+$productorder2['totalprice'];  
}

}



}
//      $data3['cartlist']=$this->productorder_model->noofitems_productorder($this->encrypt->decode($this->session->userdata('uniqueid')));
$data = array('status' => $status,'wholeamount' => $tot);
echo json_encode($data);




//$this->load->view('includes/footer_view');


}
public function conformorder()
{
$this->load->helper('url');

$this->load->helper('form');
$this->load->library('form_validation');
$this->load->model('product_model');
//		$data['productorders']=$this->productorder_model->getall_productorder($this->encrypt->decode($this->session->userdata('uniqueid')));
$this->load->view('conformaddress_view');
$this->load->view('includes/footer_view');
}

public function conformorderresponse()
{
		$this->load->helper('url');

$this->load->helper('form');
$this->load->library('form_validation');
$this->load->model('productorder_model');
$this->load->model('product_model');
$this->load->model('customer_model');

//$this->load->view('includes/header_view',$data);

// $this->load->view('upload_success', $data); 

$this->form_validation->set_rules('name', 'Name', 'required|trim|strip_tags');
$this->form_validation->set_rules('email', 'Email ', 'required|trim|strip_tags|valid_email');
$this->form_validation->set_rules('contactno', 'Contactno ', 'required|trim|strip_tags|numeric');
$this->form_validation->set_rules('country', 'Country', 'required|trim|strip_tags');
$this->form_validation->set_rules('location', 'Location', 'required|trim|strip_tags');
$this->form_validation->set_rules('city', 'city', 'required|trim|strip_tags');
$this->form_validation->set_rules('pincode', 'pincode', 'required|trim|strip_tags');
$this->form_validation->set_rules('address', 'Address', 'required|trim|strip_tags');
$this->form_validation->set_rules('daddress', 'Delivery Address', 'required|trim|strip_tags');
$this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissable">', '</div>');
if ($this->form_validation->run() == FALSE)
{
    
$data['pagelinks']=$this->menu_model->get_menu_links();
          $data['locationmap']=$this->locationmap_model->get_locationmap_limit(1);
          $data['homecontacts']=$this->contactus_model->get_contactus_limit(2);
          $data['cartlist']=$this->productorder_model->noofitems_productorder($this->encrypt->decode($this->session->userdata('uniqueid')));
	$this->load->view('includes/header_view',$data);
$this->load->view('conformaddress_view');
$this->load->view('includes/footer_view');
}
else {

$data = array(
'name' => $this->input->post('name'),
'address' => $this->input->post('address'),
'mobno' => $this->input->post('contactno'),
'email' => $this->input->post('email'),
'daddress' => $this->input->post('daddress'),
'country' => $this->input->post('country'),     
'city' => $this->input->post('city'),
'location' => $this->input->post('location'), 
'pincode' => $this->input->post('pincode') 
);
 $cusid=$this->customer_model->insert_customer($data);
if($cusid!=0)
{
    
    $data2 = array(

'cusid' => $cusid,  
'orderstatus' => 1          
);
  if($this->productorder_model->update_productorder_custid($data2,$this->encrypt->decode($this->session->userdata('uniqueid'))))
  {
       
     $status=1; 
     $data['productorders2']=$this->productorder_model->getall_productorder3($this->encrypt->decode($this->session->userdata('uniqueid')));
     
foreach ( $data['productorders2'] as $productorder2)
{
 
    if( $productorder2['pnoofitems']>$productorder2['solditems'])
    {
        $outofstock=0;
    }
    elseif( $productorder2['pnoofitems']==$productorder2['solditems'])
    {
        $outofstock=0;
    }
 else {
        $outofstock=1;
    }
            $data3 = array(

'noofitems' => $productorder2['solditems'],
'outofstock' => $outofstock                 
);
$this->productorder_model->update_productorder2($data3,$productorder2['id']);
  
             
             
         
        
    
}

 $this->session->set_userdata('uniqueid', $this->encrypt->encode('uni'.$this->product_model->generate_serial(8)));  
  $this->session->set_userdata('cusid', $this->encrypt->encode($cusid));  
//redirect('product/ordersuccess');

  }

}


}


//$this->load->view('includes/footer_view');


}

function ordersuccess()
{
    $this->load->model('customer_model'); 
    $data['customerdetails']=$this->customer_model->get_customer($this->encrypt->decode($this->session->userdata('cusid')));
    $data['productorders']=$this->productorder_model->getall_productorder2($this->encrypt->decode($this->session->userdata('cusid')));
    
$config = Array(        

'mailtype'  => 'html'
);
$this->load->library('email',$config);
// $data['homecontent']=$this->hom_content_model->get_homecontent();
//$data['servicelinks']=$this->service_model->get_service_links();


$forgot=$this->contactus_model->get_forgot();
$this->email->from(SERVERMAIL, CUSTOMERORDER);
$this->email->to($forgot); 

$this->email->subject(ENQUIRYSUBJECT2);

$body = $this->load->view('mail/orderseller_mail_view.php',$data,true);
$this->email->message($body); 
$this->email->send();


$this->email->from(SERVERMAIL, SELLERORDER);
$this->email->to($data['customerdetails']['email']); 


$this->email->subject(SELLERORDER2);

$body = $this->load->view('mail/ordercustomer_mail_view.php',$data,true);
$this->email->message($body); 
$this->email->send();
//if($this->email->send())
//{
//
//
//
//}
//else {
//
//
//
//
//}
    $this->load->view('ordersucess_view',$data);
    $this->load->view('includes/footer_view');
}


function printorder()
{
    $this->load->model('customer_model'); 
    $this->load->model('productorder_model');
    $data['customerdetails']=$this->customer_model->get_customer($this->encrypt->decode($this->session->userdata('cusid')));
    $data['productorders']=$this->productorder_model->getall_productorder2($this->encrypt->decode($this->session->userdata('cusid')));
    $this->load->view('printorder_view',$data);

}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */