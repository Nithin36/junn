<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$video_model=new video_model();
if(isset($_POST["viewvideo"]))
{
     $_POST=$video_model->escapestring_rows($_POST);
    $row=$video_model->view_video($_POST);
print_r(json_encode($row));
    
}



if(isset($_POST["editvideo"]))
{
   
     $status="";
 $num=$video_model->post_data_some_filled($_POST,'mobno,faxno,website,email');

 if($num!=0)
{
	$status="no";

}

 else {
     $_POST=$video_model->escapestring_rows($_POST);
    $j=$video_model->edit_video($_POST);
  if(($j!=0)||($j!=1))
  {
      $status="yes";
  }       
 else {
       $status="no";
  } 
}
$status2 = array("status"=>"$status");
  $_POST=$video_model->escapestring_rows($_POST);
$row=$video_model->view_video($_POST);
$row2=array_merge($row, $status2);
print_r(json_encode($row2));
}



if(isset($_POST["addvideo"]))
{
   
     $status="";
 $num=$video_model->post_data_some_filled($_POST,'mobno,faxno,website,email');

 if($num!=0)
{
	$status="no";

}

 else {
     $_POST=$video_model->escapestring_rows($_POST);
    $j=$video_model->add_video($_POST);
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
                                        
    $r=$video_model->del_video($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_video.php?delete=fail'.$url);
}
else
{
	header('location: ../list_video.php?delete=sucess'.$url);
}
}
ob_flush();
?>