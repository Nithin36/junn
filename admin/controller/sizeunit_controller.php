<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$sizeunit_model=new sizeunit_model();
$file_class=new file_class();
//$subsizeunit_model=new subsizeunit_model();
if(isset($_POST["addsizeunit"]))
{
   
     $status="";
 $num=$sizeunit_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_sizeunit.php?action=fail');

}

 else {

     // $_POST=$sizeunit_model->escapestring_rows($_POST);
              $num=$sizeunit_model->insert_sizeunit($_POST);
             $id= mysql_insert_id(); 
               if($num!=0)
              {
                    header('location: ../add_sizeunit.php?action=sucess');
                   
              }
              else {
                header('location: ../add_sizeunit.php?action=fail');  
       
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
                                         $row=$sizeunit_model->get_sizeunit($_GET["del_id"]);
                                                               
    $r=$sizeunit_model->del_sizeunit($_GET["del_id"]);
    
if($r!=1)
{
	header('location: ../list_sizeunit.php?delete=fail'.$url);
}
else
{
	header('location: ../list_sizeunit.php?delete=sucess'.$url);
}
}



if(isset($_POST["editsizeunit"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$sizeunit_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_sizeunit.php?action=fail'.$id);

}

 else {
$id="&id=".$_POST['id'];

      
         // $_POST=$sizeunit_model->escapestring_rows($_POST);
//          $_POST['name']=stripcslashes(nl2br($_POST['name']));
//           $_POST['description']=stripcslashes($_POST['description']);
//            $_POST['child']=stripcslashes(nl2br($_POST['child']));
//            $_POST['num']=stripcslashes(nl2br($_POST['num']));
    $j=$sizeunit_model->update_sizeunit($_POST);
  if(($j!=0)||($j!=1))
  {
 
       header('location: ../edit_sizeunit.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_sizeunit.php?action=fail'.$id);
  } 

    

     
 
 
 
}

}



ob_flush();
?>