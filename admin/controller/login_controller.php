<?php
ob_start();

session_start();
 function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
//require_once "../model/login_model.php";
$login_model=new login_model();



/* login */
if(isset($_POST["login"]))
{
//echo base64_decode('YWRtaW5uMzY=');
   $status="";
 $num=$login_model->post_data_all_filled($_POST);
 if(($_POST['username']=="Username/Email")||($_POST['password']=="Password"))
 {
    $status="no";
     
 }
else if($num!=0)
{
	$status="no";

}
else if($login_model->minimum_String($_POST['password'],"6")=="no")
{
	
	$status="no";
}

else if($login_model->check_login($_POST,'admin')!=0)
{
	
	 $status="yes";
        $_SESSION['id']=$login_model->get_loginid($_POST,'admin');
}
 else {
    $status="no";
}

$status2 = array("status"=>"$status");
print_r(json_encode($status2));

}


/* change password */
if(isset($_POST["changepassword"]))
{
   
   $status="";
 $num=$login_model->post_data_all_filled($_POST);

 if($num!=0)
{
	$status="no";

}
else if($login_model->minimum_String($_POST['password'],"6")=="no")
{
	
	$status="no";
}
else if($login_model->check_strings_match($_POST['password'],$_POST['password2'])=='no')
{
   $status="no";

}

else if(($login_model->update_password($_POST)!=0)&&($login_model->update_password($_POST)!=1))
{
	
	 $status="yes";
        
}
 else {
    $status="no";
}

$status2 = array("status"=>"$status");
print_r(json_encode($status2));

}


/* view profile */
if(isset($_POST["viewprofile"]))
{
$row=$login_model->view_login_profile($_POST);
print_r(json_encode($row));

}

/* edit login profile */
if(isset($_POST["editprofile"]))
{
    print_r($_POST);
     $status="";
 $num=$login_model->post_data_all_filled($_POST);

 if($num!=0)
{
	$status="no";

}
else if($login_model->validate_email($_POST['email'])=="no") {
    $status="no";
}
 else {
     
  if(($login_model->edit_login_profile($_POST)!=0)||($login_model->edit_login_profile($_POST)!=1))
  {
      $status="yes";
  }       
 else {
       $status="no";
  } 
}
$status2 = array("status"=>"$status");
$row=$login_model->view_login_profile($_POST);
$row2=array_merge($row, $status2);
print_r(json_encode($row2));

}
ob_flush();
?>