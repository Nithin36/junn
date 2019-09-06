<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$projecttype_model=new projecttype_model();
$project2_model= new project2_model();
if(isset($_POST["addprojecttype"]))
{
   
     $status="";
 $num=$projecttype_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	$status="no";

}

 else {

$_POST=$projecttype_model->escapestring_rows($_POST);
              $num=$projecttype_model->insert_projecttype($_POST);
              if(num!=0)
              {
                    $status="no";
              }
              else
              {
               $status="yes";
              }
 $status2 = array("status"=>"$status");
 

print_r(json_encode($status2));
}

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
                                     
                                    
                                $project2_model->del_project_type($_GET["del_id"]);
                                       
                                     // $r2=$product_model->del_product_projecttype($_GET["del_id"]);
    $r=$projecttype_model->del_projecttype($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_projecttype.php?delete=fail'.$url);
}
else
{
	header('location: ../list_projecttype.php?delete=sucess'.$url);
}
}



if(isset($_POST["editprojecttype"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$projecttype_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	$status="no";

}

 else {


  
    
     
          $_POST=$projecttype_model->escapestring_rows($_POST);
    $j=$projecttype_model->update_projecttype($_POST);
  if(($j!=0)||($j!=1))
  {
      $status="yes";
  }       
 else {
    $status="no";
  } 

}
$status2 = array("status"=>"$status");
  $_POST=$projecttype_model->escapestring_rows($_POST);
$row=$projecttype_model->get_projecttype($_POST['id']);
$row2=array_merge($row, $status2);
print_r(json_encode($row2));
}



ob_flush();
?>