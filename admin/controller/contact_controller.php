<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$contact_model=new contact_model();
if(isset($_POST["viewcontact"]))
{
     $_POST=$contact_model->escapestring_rows($_POST);
    $row=$contact_model->view_contact($_POST);
print_r(json_encode($row));
    
}



if(isset($_POST["editcontact"]))
{
   
     $status="";
 $num=$contact_model->post_data_some_filled($_POST,'mobno,faxno,website,email');

 if($num!=0)
{
	$status="no";

}

 else {
     $_POST=$contact_model->escapestring_rows($_POST);
    $j=$contact_model->edit_contact($_POST);
  if(($j!=0)||($j!=1))
  {
      $status="yes";
  }       
 else {
       $status="no";
  } 
}
$status2 = array("status"=>"$status");
  $_POST=$contact_model->escapestring_rows($_POST);
$row=$contact_model->view_contact($_POST);
$row2=array_merge($row, $status2);
print_r(json_encode($row2));
}



if(isset($_POST["addcontact"]))
{
   
     $status="";
 $num=$contact_model->post_data_some_filled($_POST,'mobno,faxno,website,email');

 if($num!=0)
{
	$status="no";

}

 else {
     $_POST=$contact_model->escapestring_rows($_POST);
    $j=$contact_model->add_contact($_POST);
  if(($j!=0)||($j!=1))
  {
      $status="yes";
  }       
 else {
       $status="no";
  } 
}
$status2 = array("status"=>"$status");
 

print_r(json_encode($status2));
}



if(isset($_GET["del_id"]))
{
      $url="";
                                        If(isset($_GET['page']))
                                        {
                                            $url=$url."&page=".$_GET['page'];
                                        }
                                        
                                         If(isset($_GET['pgno']))
                                        {
                                             $url=$url."&pgno=".$_GET['pgno'];
                                        }
                                        
    $r=$contact_model->del_contact($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_contact.php?delete=fail'.$url);
}
else
{
	header('location: ../list_contact.php?delete=sucess'.$url);
}
}
ob_flush();
?>