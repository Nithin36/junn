<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$serviceicon_model=new serviceicon_model();
if(isset($_POST["addserviceicon"]))
{
   
     $status="";
 $num=$serviceicon_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_serviceicon.php?action=fail');

}

 else {


  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$serviceicon_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/serviceicons/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/serviceicons/',$dfile,245,'thumb');
               $file_class->cropThumbnailcreation('../../upload/serviceicons/',$dfile,150,'thumb2');
                   $_POST=$serviceicon_model->escapestring_rows($_POST);
              $num=$serviceicon_model->insert_serviceicon($_POST);
              if(num!=0)
              {
                   header('location: ../add_serviceicon.php?action=fail');
              }
              else
              {
               header('location: ../add_serviceicon.php?action=sucess');
              }
        }
 else {
        header('location: ../add_serviceicon.php?action=fail');
 }
        }
         else {
      header('location: ../add_serviceicon.php?action=fail');
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
                                         $row=$serviceicon_model->get_serviceicon($_GET["del_id"]);
                                      if($row['photo']!="")
                                         { 
                                       unlink('../../upload/serviceicons/thumb/'.$row['photo']);
                                       unlink('../../upload/serviceicons/thumb2/'.$row['photo']);
                                       unlink('../../upload/serviceicons/'.$row['photo']);
                                         }
    $r=$serviceicon_model->del_serviceicon($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_serviceicon.php?delete=fail'.$url);
}
else
{
	header('location: ../list_serviceicon.php?delete=sucess'.$url);
}
}



if(isset($_POST["editserviceicon"]))
{
   
     $status="";
$num=$serviceicon_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_serviceicon.php?action=fail');

}

 else {
$id="&id=".$_POST['id'];

  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
              $row6=$serviceicon_model->get_serviceicon($_POST["id"]);
                                      
                                       unlink('../../upload/serviceicons/thumb/'.$row6['photo']);
                                       unlink('../../upload/serviceicons/thumb2/'.$row['photo']);
                                       unlink('../../upload/serviceicons/'.$row6['photo']);
            $filename=$serviceicon_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/serviceicons/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
              
               $file_class->cropThumbnailcreation('../../upload/serviceicons/',$dfile,245,'thumb');
               $file_class->cropThumbnailcreation('../../upload/serviceicons/',$dfile,150,'thumb2');
                   $_POST=$serviceicon_model->escapestring_rows($_POST);
              $num=$serviceicon_model->update_serviceicon2($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_serviceicon.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_serviceicon.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_serviceicon.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_serviceicon.php?action=fail'.$id);
 }
    }
     else {
     
          $_POST=$serviceicon_model->escapestring_rows($_POST);
    $j=$serviceicon_model->update_serviceicon($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_serviceicon.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_serviceicon.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}



ob_flush();
?>