<?php

ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$vechile_model=new vechile_model();
if(isset($_POST["viewvechile"]))
{
     $_POST=$vechile_model->escapestring_rows($_POST);
    $row=$vechile_model->view_vechile($_POST);
print_r(json_encode($row));
    
}



if(isset($_POST["editvechile"]))
{
   
     $status="";
 $num=$vechile_model->post_data_some_filled($_POST,'mobno,faxno,website,email');

 if($num!=0)
{
	$status="no";

}

 else {
     $_POST=$vechile_model->escapestring_rows($_POST);
    $j=$vechile_model->edit_vechile($_POST);
  if(($j!=0)||($j!=1))
  {
      $status="yes";
  }       
 else {
       $status="no";
  } 
}
$status2 = array("status"=>"$status");
  $_POST=$vechile_model->escapestring_rows($_POST);
$row=$vechile_model->view_vechile($_POST);
$row2=array_merge($row, $status2);
print_r(json_encode($row2));
}



if(isset($_POST["addvechile"]))
{
   
     $status="";
 $num=$vechile_model->post_data_some_filled($_POST,'mobno,faxno,website,email');

 if($num!=0)
{
	$status="no";

}

 else {
     $_POST=$vechile_model->escapestring_rows($_POST);
    $j=$vechile_model->add_vechile($_POST);
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
                                        
    $r=$vechile_model->del_vechile($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_vechile.php?delete=fail'.$url);
}
else
{
	header('location: ../list_vechile.php?delete=sucess'.$url);
}
}
ob_flush();
?>