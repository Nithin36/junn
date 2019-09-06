<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$awards_model=new awards_model();
if(isset($_POST["addawards"]))
{
   
     $status="";
 $num=$awards_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_awards.php?action=fail');

}

 else {


  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$awards_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/awards/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/awards/',$dfile,235,'thumb');
               $file_class->cropThumbnailcreation('../../upload/awards/',$dfile,150,'thumb2');
                   $_POST=$awards_model->escapestring_rows($_POST);
              $num=$awards_model->insert_awards($_POST);
              if(num!=0)
              {
                    header('location: ../add_awards.php?action=fail');
              }
              else
              {
               header('location: ../add_awards.php?action=sucess');
              }
        }
 else {
        header('location: ../add_awards.php?action=fail');
 }
        }
         else {
      header('location: ../add_awards.php?action=fail');
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
                                         $row=$awards_model->get_awards($_GET["del_id"]);
                                     
                                       unlink('../../upload/awards/thumb/'.$row['photo']);
                                       unlink('../../upload/awards/thumb2/'.$row['photo']);
                                       unlink('../../upload/awards/'.$row['photo']);
    $r=$awards_model->del_awards($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_awards.php?delete=fail'.$url);
}
else
{
	header('location: ../list_awards.php?delete=sucess'.$url);
}
}



if(isset($_POST["editawards"]))
{
   
     $status="";
$num=$awards_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_awards.php?action=fail');

}

 else {
$id="&id=".$_POST['id'];

  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
              $row6=$awards_model->get_awards($_POST["id"]);
                                      
                                       unlink('../../upload/awards/thumb/'.$row6['photo']);
                                       unlink('../../upload/awards/thumb2/'.$row6['photo']);
                                       unlink('../../upload/awards/'.$row6['photo']);
            $filename=$awards_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/awards/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
              
               $file_class->cropThumbnailcreation('../../upload/awards/',$dfile,235,'thumb');
               $file_class->cropThumbnailcreation('../../upload/awards/',$dfile,150,'thumb2');
                   $_POST=$awards_model->escapestring_rows($_POST);
              $num=$awards_model->update_awards2($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_awards.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_awards.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_awards.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_awards.php?action=fail'.$id);
 }
    }
     else {
     
          $_POST=$awards_model->escapestring_rows($_POST);
    $j=$awards_model->update_awards($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_awards.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_awards.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}



ob_flush();
?>