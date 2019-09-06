<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$sizename_model=new sizename_model();
$file_class=new file_class();
//$subsizename_model=new subsizename_model();
if(isset($_POST["addsizename"]))
{
   
     $status="";
 $num=$sizename_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_sizename.php?action=fail');

}

 else {

     // $_POST=$sizename_model->escapestring_rows($_POST);
              $num=$sizename_model->insert_sizename($_POST);
             $id= mysql_insert_id(); 
               if($num!=0)
              {
                    header('location: ../add_sizename.php?action=sucess');
                   
              }
              else {
                header('location: ../add_sizename.php?action=fail');  
       
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
                                         $row=$sizename_model->get_sizename($_GET["del_id"]);
                                                               
    $r=$sizename_model->del_sizename($_GET["del_id"]);
    
if($r!=1)
{
	header('location: ../list_sizename.php?delete=fail'.$url);
}
else
{
	header('location: ../list_sizename.php?delete=sucess'.$url);
}
}



if(isset($_POST["editsizename"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$sizename_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_sizename.php?action=fail'.$id);

}

 else {
$id="&id=".$_POST['id'];

      
         // $_POST=$sizename_model->escapestring_rows($_POST);
//          $_POST['name']=stripcslashes(nl2br($_POST['name']));
//           $_POST['description']=stripcslashes($_POST['description']);
//            $_POST['child']=stripcslashes(nl2br($_POST['child']));
//            $_POST['num']=stripcslashes(nl2br($_POST['num']));
    $j=$sizename_model->update_sizename($_POST);
  if(($j!=0)||($j!=1))
  {
 
       header('location: ../edit_sizename.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_sizename.php?action=fail'.$id);
  } 

    

     
 
 
 
}

}



ob_flush();
?>