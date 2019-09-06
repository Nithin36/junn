<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$client_model=new client_model();
if(isset($_POST["addclient"]))
{
   
     $status="";
 $num=$client_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_client.php?action=fail');

}

 else {


  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$client_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/clients/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/clients/',$dfile,235,'thumb');
               $file_class->cropThumbnailcreation('../../upload/clients/',$dfile,150,'thumb2');
                   $_POST=$client_model->escapestring_rows($_POST);
              $num=$client_model->insert_client($_POST);
              if(num!=0)
              {
                    header('location: ../add_client.php?action=fail');
              }
              else
              {
               header('location: ../add_client.php?action=sucess');
              }
        }
 else {
        header('location: ../add_client.php?action=fail');
 }
        }
         else {
      header('location: ../add_client.php?action=fail');
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
                                         $row=$client_model->get_client($_GET["del_id"]);
                                     
                                       unlink('../../upload/clients/thumb/'.$row['photo']);
                                       unlink('../../upload/clients/thumb2/'.$row['photo']);
                                       unlink('../../upload/clients/'.$row['photo']);
    $r=$client_model->del_client($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_client.php?delete=fail'.$url);
}
else
{
	header('location: ../list_client.php?delete=sucess'.$url);
}
}



if(isset($_POST["editclient"]))
{
   
     $status="";
$num=$client_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_client.php?action=fail');

}

 else {
$id="&id=".$_POST['id'];

  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
              $row6=$client_model->get_client($_POST["id"]);
                                      
                                       unlink('../../upload/clients/thumb/'.$row6['photo']);
                                       unlink('../../upload/clients/thumb2/'.$row6['photo']);
                                       unlink('../../upload/clients/'.$row6['photo']);
            $filename=$client_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/clients/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
              
               $file_class->cropThumbnailcreation('../../upload/clients/',$dfile,235,'thumb');
               $file_class->cropThumbnailcreation('../../upload/clients/',$dfile,150,'thumb2');
                   $_POST=$client_model->escapestring_rows($_POST);
              $num=$client_model->update_client2($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_client.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_client.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_client.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_client.php?action=fail'.$id);
 }
    }
     else {
     
          $_POST=$client_model->escapestring_rows($_POST);
    $j=$client_model->update_client($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_client.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_client.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}



ob_flush();
?>