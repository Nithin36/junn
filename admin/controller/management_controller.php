<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$management_model=new management_model();
if(isset($_POST["addmanagement"]))
{
   
     $status="";
 $num=$management_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_management.php?action=fail');

}

 else {


  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$management_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/managements/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/managements/',$dfile,235,'thumb');
               $file_class->cropThumbnailcreation('../../upload/managements/',$dfile,150,'thumb2');
                   $_POST=$management_model->escapestring_rows($_POST);
              $num=$management_model->insert_management($_POST);
              if(num!=0)
              {
                    header('location: ../add_management.php?action=fail');
              }
              else
              {
               header('location: ../add_management.php?action=sucess');
              }
        }
 else {
        header('location: ../add_management.php?action=fail');
 }
        }
         else {
      header('location: ../add_management.php?action=fail');
 }
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
                                         $row=$management_model->get_management($_GET["del_id"]);
                                     
                                       unlink('../../upload/managements/thumb/'.$row['photo']);
                                       unlink('../../upload/managements/thumb2/'.$row['photo']);
                                       unlink('../../upload/managements/'.$row['photo']);
    $r=$management_model->del_management($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_management.php?delete=fail'.$url);
}
else
{
	header('location: ../list_management.php?delete=sucess'.$url);
}
}



if(isset($_POST["editmanagement"]))
{
   
     $status="";
$num=$management_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_management.php?action=fail');

}

 else {
$id="&id=".$_POST['id'];

  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
              $row6=$management_model->get_management($_POST["id"]);
                                      
                                       unlink('../../upload/managements/thumb/'.$row6['photo']);
                                       unlink('../../upload/managements/thumb2/'.$row6['photo']);
                                       unlink('../../upload/managements/'.$row6['photo']);
            $filename=$management_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/managements/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
              
               $file_class->cropThumbnailcreation('../../upload/managements/',$dfile,235,'thumb');
               $file_class->cropThumbnailcreation('../../upload/managements/',$dfile,150,'thumb2');
                   $_POST=$management_model->escapestring_rows($_POST);
              $num=$management_model->update_management2($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_management.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_management.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_management.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_management.php?action=fail'.$id);
 }
    }
     else {
     
          $_POST=$management_model->escapestring_rows($_POST);
    $j=$management_model->update_management($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_management.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_management.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}



ob_flush();
?>