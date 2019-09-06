<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$equipment_model=new equipment_model();
if(isset($_POST["viewequipment"]))
{
     $_POST=$equipment_model->escapestring_rows($_POST);
    $row=$equipment_model->view_equipment($_POST);
print_r(json_encode($row));
    
}



if(isset($_POST["editequipment"]))
{
   
     $status="";
 $num=$equipment_model->post_data_some_filled($_POST,'mobno,faxno,website,email');

 if($num!=0)
{
	$status="no";

}

 else {
     $_POST=$equipment_model->escapestring_rows($_POST);
    $j=$equipment_model->edit_equipment($_POST);
  if(($j!=0)||($j!=1))
  {
      $status="yes";
  }       
 else {
       $status="no";
  } 
}
$status2 = array("status"=>"$status");
  $_POST=$equipment_model->escapestring_rows($_POST);
$row=$equipment_model->view_equipment($_POST);
$row2=array_merge($row, $status2);
print_r(json_encode($row2));
}



if(isset($_POST["addequipment"]))
{
   
     $status="";
 $num=$equipment_model->post_data_some_filled($_POST,'mobno,faxno,website,email');

 if($num!=0)
{
	$status="no";

}

 else {
     $_POST=$equipment_model->escapestring_rows($_POST);
    $j=$equipment_model->add_equipment($_POST);
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
                                        
    $r=$equipment_model->del_equipment($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_equipment.php?delete=fail'.$url);
}
else
{
	header('location: ../list_equipment.php?delete=sucess'.$url);
}
}
ob_flush();
?>