<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$download_model=new download_model();
if(isset($_POST["adddownload"]))
{
   
     $status="";
 $num=$download_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_download.php?action=fail');

}

 else {


  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_doc($_FILES)=="yes")
        {
            $filename=$download_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/downloads/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['doc']=$dfile;
          
             
                   $_POST=$download_model->escapestring_rows($_POST);
              $num=$download_model->insert_download($_POST);
              if(num!=0)
              {
                    header('location: ../add_download.php?action=fail');
              }
              else
              {
               header('location: ../add_download.php?action=sucess');
              }
        }
 else {
        header('location: ../add_download.php?action=fail');
 }
        }
         else {
      header('location: ../add_download.php?action=fail');
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
                                         $row=$download_model->get_download($_GET["del_id"]);
                                     
                                   
                                       unlink('../../upload/downloads/'.$row['doc']);
    $r=$download_model->del_download($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_download.php?delete=fail'.$url);
}
else
{
	header('location: ../list_download.php?delete=sucess'.$url);
}
}



if(isset($_POST["editdownload"]))
{
   
     $status="";
$num=$download_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_download.php?action=fail');

}

 else {
$id="&id=".$_POST['id'];

  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_doc($_FILES)=="yes")
        {
              $row6=$download_model->get_download($_POST["id"]);
                                      
                              
                                       unlink('../../upload/downloads/'.$row6['doc']);
            $filename=$download_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/downloads/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['doc']=$dfile;
              

                   $_POST=$download_model->escapestring_rows($_POST);
              $num=$download_model->update_download2($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_download.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_download.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_download.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_download.php?action=fail'.$id);
 }
    }
     else {
     
          $_POST=$download_model->escapestring_rows($_POST);
    $j=$download_model->update_download($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_download.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_download.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}



ob_flush();
?>