<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$projectphotos_model=new projectphotos_model();
$project_model=new project_model();
if(isset($_POST["addprojectphotos"]))
{
   
     $status="";
 $num=$projectphotos_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_projectphotos.php?action=fail');

}

 else {


  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$projectphotos_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/projectphotos/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/projectphotos/',$dfile,100,'thumb');
               $file_class->cropThumbnailcreation('../../upload/projectphotos/',$dfile,150,'thumb2');
                   $_POST=$projectphotos_model->escapestring_rows($_POST);
              $num=$projectphotos_model->insert_projectphotos($_POST);
              if(num!=0)
              {
                    header('location: ../add_projectphotos.php?action=fail');
              }
              else
              {
               header('location: ../add_projectphotos.php?action=sucess');
              }
        }
 else {
        header('location: ../add_projectphotos.php?action=fail');
 }
        }
         else {
      header('location: ../add_projectphotos.php?action=fail');
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
                                       
                                         $row=$projectphotos_model->get_projectphotos($_GET["del_id"]);
                                       if($row['photo']!="")
                                        {
                                       unlink('../../upload/projectphotos/thumb/'.$row['photo']);
                                       unlink('../../upload/projectphotos/thumb2/'.$row['photo']);
                                       unlink('../../upload/projectphotos/'.$row['photo']);
                                        }
    $r=$projectphotos_model->del_projectphotos($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_projectphotos.php?delete=fail'.$url);
}
else
{
	header('location: ../list_projectphotos.php?delete=sucess'.$url);
}
}



if(isset($_POST["editprojectphotos"]))
{
   
     $status="";
$num=$projectphotos_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_projectphotos.php?action=fail');

}

 else {
$id="&id=".$_POST['id'];

  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
              $row6=$projectphotos_model->get_projectphotos($_POST["id"]);
                                      
                                       unlink('../../upload/projectphotos/thumb/'.$row6['photo']);
                                       unlink('../../upload/projectphotos/thumb2/'.$row['photo']);
                                       unlink('../../upload/projectphotos/'.$row6['photo']);
            $filename=$projectphotos_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/projectphotos/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
              
               $file_class->cropThumbnailcreation('../../upload/projectphotos/',$dfile,100,'thumb');
               $file_class->cropThumbnailcreation('../../upload/projectphotos/',$dfile,150,'thumb2');
                   $_POST=$projectphotos_model->escapestring_rows($_POST);
              $num=$projectphotos_model->update_projectphotos2($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_projectphotos.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_projectphotos.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_projectphotos.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_projectphotos.php?action=fail'.$id);
 }
    }
     else {
     
          $_POST=$projectphotos_model->escapestring_rows($_POST);
    $j=$projectphotos_model->update_projectphotos($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_projectphotos.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_projectphotos.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}



ob_flush();
?>