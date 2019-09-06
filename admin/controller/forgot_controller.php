<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$forgot_model=new forgot_model();
$login_model=new login_model();
if(isset($_POST["viewforgot"]))
{
    
     $_POST=$forgot_model->escapestring_rows($_POST);
    $row=$forgot_model->view_forgot($_POST);
print_r(json_encode($row));
    
}



if(isset($_POST["editforgot"]))
{
   
     $status="";
 $num=$forgot_model->post_data_some_filled($_POST,'mobno,faxno,website,email');

 if($num!=0)
{
	$status="no";

}

 else {
     $_POST=$forgot_model->escapestring_rows($_POST);
    $j=$forgot_model->edit_forgot($_POST);
  if(($j!=0)||($j!=1))
  {
      $status="yes";
  }       
 else {
       $status="no";
  } 
}
$status2 = array("status"=>"$status");
  $_POST=$forgot_model->escapestring_rows($_POST);
$row=$forgot_model->view_forgot($_POST);
$row2=array_merge($row, $status2);
print_r(json_encode($row2));
}

if(isset($_POST["forgotpassword"]))
{
   
     $status="";
 $num=$forgot_model->post_data_some_filled($_POST,'mobno,faxno,website,email');

 if($num!=0)
{
	$status="no";

}

 else {
     $_POST=$forgot_model->escapestring_rows($_POST);
    $j=$forgot_model->get_forgotmail($_POST);
  if($j!="nill")
  {
     
      $row4=$login_model->get_login_password(2);
      if($login_model->send_forgotpassword_mail($j,$row4['username'],$row4['password2'])!=0)
      {       
          
      $status="yes";
      }
 else {
      
       $status="no";
      }
  }       
 else {
     
       $status="no";
  } 
}
$status2 = array("status"=>"$status");
print_r(json_encode($status2));
}

ob_flush();
?>