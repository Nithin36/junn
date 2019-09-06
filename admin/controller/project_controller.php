<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$project_model=new project_model();
$projectphotos_model=new projectphotos_model();

if(isset($_POST["addproject"]))
{
   
     $status="";
 $num=$project_model->post_data_some_filled($_POST,'client,status,mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_project.php?action=fail');

}

 else {


  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$project_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/projects/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/projects/',$dfile,265,'thumb');
               $file_class->cropThumbnailcreation('../../upload/projects/',$dfile,150,'thumb2');
                   $_POST=$project_model->escapestring_rows($_POST);
              $num=$project_model->insert_project($_POST);
              if(num!=0)
              {
                    header('location: ../add_project.php?action=fail');
              }
              else
              {
               header('location: ../add_project.php?action=sucess');
              }
        }
 else {
        header('location: ../add_project.php?action=fail');
 }
        }
         else {
      header('location: ../add_project.php?action=fail');
 }
    }
 
 else {
     $num=$project_model->insert_project2($_POST);
              if(num!=0)
              {
                    header('location: ../add_project.php?action=fail');
              }
              else
              {
               header('location: ../add_project.php?action=sucess');
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
                                         $row=$project_model->get_project($_GET["del_id"]);
                                      $projectphotos_model->del_projectphotos_project_photo($_GET["del_id"]);
                                        if($row['photo']!="")
                                        {
                                       unlink('../../upload/projects/thumb/'.$row['photo']);
                                       unlink('../../upload/projects/thumb2/'.$row['photo']);
                                       unlink('../../upload/projects/'.$row['photo']);
                                        }
                                       $projectphotos_model->del_projectphotos_project($_GET["del_id"]);
    $r=$project_model->del_project($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_project.php?delete=fail'.$url);
}
else
{
	header('location: ../list_project.php?delete=sucess'.$url);
}
}



if(isset($_POST["editproject"]))
{
    $id="&id=".$_POST['id'];
   
     $status="";
$num=$project_model->post_data_some_filled($_POST,'client,status,mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_project.php?action=fail'.$id);

}

 else {


  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
              $row6=$project_model->get_project($_POST["id"]);
                                      
                                       unlink('../../upload/projects/thumb/'.$row6['photo']);
                                       unlink('../../upload/projects/thumb2/'.$row6['photo']);
                                       unlink('../../upload/projects/'.$row6['photo']);
            $filename=$project_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/projects/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
              
               $file_class->cropThumbnailcreation('../../upload/projects/',$dfile,110,'thumb');
               $file_class->cropThumbnailcreation('../../upload/projects/',$dfile,150,'thumb2');
                   $_POST=$project_model->escapestring_rows($_POST);
              $num=$project_model->update_project($_POST);
              if(($num!=0)||($num!=1))
              {
                   header('location: ../edit_project.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_project.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_project.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_project.php?action=fail'.$id);
 }
    }
     else {
     
          $_POST=$project_model->escapestring_rows($_POST);
    $j=$project_model->update_project2($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_project.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_project.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}



ob_flush();
?>