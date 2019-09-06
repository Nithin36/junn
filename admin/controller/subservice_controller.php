<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$subservice_model=new subservice_model();
$file_class=new file_class();
//$subsubservice_model=new subsubservice_model();
if(isset($_POST["addsubservice"]))
{
   
     $status="";
 $num=$subservice_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_subservice.php?action=fail');

}

 else {

      $_POST=$subservice_model->escapestring_rows($_POST);
              $num=$subservice_model->insert_subservice($_POST);
             $id= mysql_insert_id(); 
               if(num!=0)
              {
                   header('location: ../add_subservice.php?action=fail');
              }
              else {
                   if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
             if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$subservice_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/subservice/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/subservice/',$dfile,245,'thumb');
               $file_class->cropThumbnailcreation('../../upload/subservice/',$dfile,150,'thumb2');
                   $_POST=$subservice_model->escapestring_rows($_POST);
              $num2=$subservice_model->update_subservice_image($id,$_POST);
         
        }
        }
    }
        header('location: ../add_subservice.php?action=sucess');
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
                                         $row=$subservice_model->get_subservice($_GET["del_id"]);
                                         if($row['image']!="")
                                         {    
                                         unlink('../../upload/subservice/thumb/'.$row['image']);
                                       unlink('../../upload/subservice/thumb2/'.$row['image']);
                                       unlink('../../upload/subservice/'.$row['image']);
                                         }
                                        
                                     
      //$r3=$subsubservice_model->del_subsubservice_subservice($_GET["del_id"]);                               
    $r=$subservice_model->del_subservice($_GET["del_id"]);
    
if($r!=1)
{
	header('location: ../list_subservice.php?delete=fail'.$url);
}
else
{
	header('location: ../list_subservice.php?delete=sucess'.$url);
}
}



if(isset($_POST["editsubservice"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$subservice_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_subservice.php?action=fail'.$id);

}

 else {
$id="&id=".$_POST['id'];

      
          $_POST=$subservice_model->escapestring_rows($_POST);
//          $_POST['name']=stripcslashes(nl2br($_POST['name']));
//           $_POST['description']=stripcslashes($_POST['description']);
//            $_POST['child']=stripcslashes(nl2br($_POST['child']));
//            $_POST['num']=stripcslashes(nl2br($_POST['num']));
    $j=$subservice_model->update_subservice($_POST);
  if(($j!=0)||($j!=1))
  {
        if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
             if($file_class->is_image($_FILES)=="yes")
        {
                    $row=$subservice_model->get_subservice($_POST['id']);
                      if($row['image']!="")
                    {
                                         unlink('../../upload/subservice/thumb/'.$row['image']);
                                       unlink('../../upload/subservice/thumb2/'.$row['image']);
                                       unlink('../../upload/subservice/'.$row['image']);
                    }                 
            $filename=$subservice_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/subservice/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/subservice/',$dfile,245,'thumb');
               $file_class->cropThumbnailcreation('../../upload/subservice/',$dfile,150,'thumb2');
                   $_POST=$subservice_model->escapestring_rows($_POST);
              $num2=$subservice_model->update_subservice_image($_POST['id'],$_POST);
         
        }
        }
    }
       header('location: ../edit_subservice.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_subservice.php?action=fail'.$id);
  } 

    

     
 
 
 
}

}
if(isset($_GET['service']))
{
    if(isset($_GET['subservice_id'])&&$_GET['subservice_id']!="")
    {
        $subservice_model->selectbox_subservice_service($_GET['service_id'],$_GET['subservice_id']);
    }
 else {
  
    $subservice_model->selectbox_subservice_service($_GET['service_id'],'');
 }
}    


ob_flush();
?>