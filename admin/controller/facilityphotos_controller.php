<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$facilityphotos_model=new facilityphotos_model();
if(isset($_POST["addfacilityphotos"]))
{
   
     $status="";
 $num=$facilityphotos_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_facilityphotos.php?action=fail');

}

 else {


  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$facilityphotos_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/facilityphotos/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/facilityphotos/',$dfile,283,'thumb');
               $file_class->cropThumbnailcreation('../../upload/facilityphotos/',$dfile,150,'thumb2');
                   $_POST=$facilityphotos_model->escapestring_rows($_POST);
              $num=$facilityphotos_model->insert_facilityphotos($_POST);
              if(num!=0)
              {
                    header('location: ../add_facilityphotos.php?action=fail');
              }
              else
              {
               header('location: ../add_facilityphotos.php?action=sucess');
              }
        }
 else {
        header('location: ../add_facilityphotos.php?action=fail');
 }
        }
         else {
      header('location: ../add_facilityphotos.php?action=fail');
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
                                         $row=$facilityphotos_model->get_facilityphotos($_GET["del_id"]);
                                     
                                       unlink('../../upload/facilityphotos/thumb/'.$row['photo']);
                                       unlink('../../upload/facilityphotos/thumb2/'.$row['photo']);
                                       unlink('../../upload/facilityphotos/'.$row['photo']);
    $r=$facilityphotos_model->del_facilityphotos($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_facilityphotos.php?delete=fail'.$url);
}
else
{
	header('location: ../list_facilityphotos.php?delete=sucess'.$url);
}
}



if(isset($_POST["editfacilityphotos"]))
{
   
     $status="";
$num=$facilityphotos_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_facilityphotos.php?action=fail');

}

 else {
$id="&id=".$_POST['id'];

  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
              $row6=$facilityphotos_model->get_facilityphotos($_POST["id"]);
                                      
                                       unlink('../../upload/facilityphotos/thumb/'.$row6['photo']);
                                       unlink('../../upload/facilityphotos/thumb2/'.$row6['photo']);
                                       unlink('../../upload/facilityphotos/'.$row6['photo']);
            $filename=$facilityphotos_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/facilityphotos/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
              
               $file_class->cropThumbnailcreation('../../upload/facilityphotos/',$dfile,283,'thumb');
               $file_class->cropThumbnailcreation('../../upload/facilityphotos/',$dfile,150,'thumb2');
                   $_POST=$facilityphotos_model->escapestring_rows($_POST);
              $num=$facilityphotos_model->update_facilityphotos2($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_facilityphotos.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_facilityphotos.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_facilityphotos.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_facilityphotos.php?action=fail'.$id);
 }
    }
     else {
     
          $_POST=$facilityphotos_model->escapestring_rows($_POST);
    $j=$facilityphotos_model->update_facilityphotos($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_facilityphotos.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_facilityphotos.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}



ob_flush();
?>