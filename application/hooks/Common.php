<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller {

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

public function common_data()
{
if($this->router->fetch_class()!="underconstruction")   
{
    $this->load->helper('text');
$this->load->helper('file');
$this->load->helper('directory');
$files = directory_map('./upload/',1);
$basefiles=directory_map('./',1);
//print_r($basefiles);
function deleteFiles($target)
{
if(is_dir($target)){
$files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned

foreach( $files as $file )
{
deleteFiles( $file );      
}
if(is_dir($target)!="")
{
rmdir($target);
}

} elseif(is_file($target)) {

unlink( $target ); 

}
}

$farray = array("php","js","PHP","JS");
$farray2 = array("brands","gallerys","news","products","projects","sliders","sliders2","usertype");
$farray3 = array("thumb","thumb2");
$farray4 = array("admin","application","css","fonts","images","js","system","upload","index.php","ckfinder","nbproject","zohoverify");
//$files = get_filenames('upload/');
foreach ($basefiles as $basefile)
{
if (!in_array($basefile,$farray4))
{
$extmain = pathinfo($basefile, PATHINFO_EXTENSION);
if(!($extmain)=="")
{
$basedirectory=''.$basefile;
unlink($basedirectory);      

}
else {
$basedirectory=''.$basefile;

$sfiles = glob($basefile.'/*'); // get all file names

foreach($sfiles as $sfile){ // iterate files
if(is_file($sfile))
unlink( $sfile);
else {
deleteFiles($sfile);
}
}
deleteFiles($basedirectory);  

}

}
}
foreach ($files as $file)
{
$extmain = pathinfo($file, PATHINFO_EXTENSION);
if(!($extmain)=="")
{
if (in_array($extmain,$farray))
{

$directory2='upload/'.$file;
unlink($directory2);
}
}
else {
if (!in_array($file,$farray2))
{
$directory2='upload/'.$file;
$sfiles = glob('upload/'.$file.'/*'); // get all file names

foreach($sfiles as $sfile){ // iterate files
if(is_file($sfile))
unlink( $sfile);
else {
deleteFiles($sfile);
}

}

deleteFiles($directory2);
}
else 
{
$directory2='./upload/'.$file.'/';
$subfiles = directory_map($directory2,1);


foreach ($subfiles as $subfile)
{
$ext = pathinfo($subfile, PATHINFO_EXTENSION);

if(($ext)=="")
{
if (!in_array($subfile,$farray3))
{

$directory3='upload/'.$file.'/'.$subfile;

$sfiles = glob('upload/'.$file.'/'.$subfile.'/*');
//print_r($sfiles);
// get all file names
foreach($sfiles as $sfile){ // iterate files
if(is_file($sfile))
unlink($sfile);
else {
deleteFiles($sfile);
}

}
deleteFiles($directory3);
}
else 
{
$directory3='./upload/'.$file.'/'.$subfile.'/';
$subfiles2 = directory_map($directory3,1);
foreach ($subfiles2 as $subfile2)
{
$ext = pathinfo($subfile2, PATHINFO_EXTENSION);

if(($ext)=="")
{
$directory4= 'upload/'.$file.'/'.$subfile.'/'.$subfile2;
$sfiles = glob('upload/'.$file.'/'.$subfile.'/'.$subfile2.'/*');
//print_r($sfiles);
// get all file names
foreach($sfiles as $sfile){ // iterate files
if(is_file($sfile))
unlink($sfile);
else {
deleteFiles($sfile);
}

}
deleteFiles($directory4);
}
else {
if (in_array($ext,$farray))
{
$directory4= 'upload/'.$file.'/'.$subfile.'/'.$subfile2;
unlink($directory4);
}
}
}
}
}
else {
if (in_array($ext,$farray))
{
$directory3='upload/'.$file.'/'.$subfile;
unlink($directory3);
}
}
}
}

}

}

$this->load->library('session');

$this->load->helper('text');

if(!$this->session->userdata('uniqueid'))
{
$this->session->set_userdata('uniqueid', $this->encrypt->encode('uni'.$this->product_model->generate_serial(8)));  
}
$page = array("addtocartresponse","addtocartresponse2","deleteorderresponse","conformorderresponse","printorder","customerregisterresponse","customerloginresponse","customerloginresponse2","conformresponse","conformorderhistory","forgotpasswordresponse","sucessorder");

if (!in_array($this->router->fetch_method(),$page))
{
$data['pagelinks']=$this->menu_model->get_menu_links();

$data['locationmap']=$this->locationmap_model->get_locationmap_limit(1);
$data['homecontacts']=$this->contactus_model->get_contactus_common();
$data['categories']=$this->category_model->get_category_limit(10);
if($this->session->userdata('cusid'))
{
$data['cartlist']=$this->productorder_model->noofitems_productorder2($this->encrypt->decode($this->session->userdata('cusid')));     
}
else {
$data['cartlist']=$this->productorder_model->noofitems_productorder($this->encrypt->decode($this->session->userdata('uniqueid'))); 

}
$this->load->view('includes/header_view',$data);
}
//
}

}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */