<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$location_model=new location_model();
$file_class=new file_class();
//$sublocation_model=new sublocation_model();
if(isset($_POST["addlocation"]))
{
   
     $status="";
 $num=$location_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_location.php?action=fail');

}

 else {

     // $_POST=$location_model->escapestring_rows($_POST);
              $num=$location_model->insert_location($_POST);
             $id= mysql_insert_id(); 
               if($num!=0)
              {
                    header('location: ../add_location.php?action=sucess');
                   
              }
              else {
                header('location: ../add_location.php?action=fail');  
       
 }
 
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
                                         $row=$location_model->get_location($_GET["del_id"]);
                                                               
    $r=$location_model->del_location($_GET["del_id"]);
    
if($r!=1)
{
	header('location: ../list_location.php?delete=fail'.$url);
}
else
{
	header('location: ../list_location.php?delete=sucess'.$url);
}
}



if(isset($_POST["editlocation"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$location_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_location.php?action=fail'.$id);

}

 else {
$id="&id=".$_POST['id'];

      
         // $_POST=$location_model->escapestring_rows($_POST);
//          $_POST['name']=stripcslashes(nl2br($_POST['name']));
//           $_POST['description']=stripcslashes($_POST['description']);
//            $_POST['child']=stripcslashes(nl2br($_POST['child']));
//            $_POST['num']=stripcslashes(nl2br($_POST['num']));
    $j=$location_model->update_location($_POST);
  if(($j!=0)||($j!=1))
  {
 
       header('location: ../edit_location.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_location.php?action=fail'.$id);
  } 

    

     
 
 
 
}

}



ob_flush();
?>