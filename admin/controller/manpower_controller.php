<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$manpower_model=new manpower_model();
if(isset($_POST["viewmanpower"]))
{
     $_POST=$manpower_model->escapestring_rows($_POST);
    $row=$manpower_model->view_manpower($_POST);
print_r(json_encode($row));
    
}



if(isset($_POST["editmanpower"]))
{
   
     $status="";
 $num=$manpower_model->post_data_some_filled($_POST,'mobno,faxno,website,email');

 if($num!=0)
{
	$status="no";

}

 else {
     $_POST=$manpower_model->escapestring_rows($_POST);
    $j=$manpower_model->edit_manpower($_POST);
  if(($j!=0)||($j!=1))
  {
      $status="yes";
  }       
 else {
       $status="no";
  } 
}
$status2 = array("status"=>"$status");
  $_POST=$manpower_model->escapestring_rows($_POST);
$row=$manpower_model->view_manpower($_POST);
$row2=array_merge($row, $status2);
print_r(json_encode($row2));
}



if(isset($_POST["addmanpower"]))
{
   
     $status="";
 $num=$manpower_model->post_data_some_filled($_POST,'mobno,faxno,website,email');

 if($num!=0)
{
	$status="no";

}

 else {
     $_POST=$manpower_model->escapestring_rows($_POST);
    $j=$manpower_model->add_manpower($_POST);
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
                                        
    $r=$manpower_model->del_manpower($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_manpower.php?delete=fail'.$url);
}
else
{
	header('location: ../list_manpower.php?delete=sucess'.$url);
}
}
ob_flush();
?>