<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$service_model=new service_model();
$file_class=new file_class();
//$subservice_model=new subservice_model();
if(isset($_POST["addservice"]))
{
   
     $status="";
 $num=$service_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_service.php?action=fail');

}

 else {

     // $_POST=$service_model->escapestring_rows($_POST);
              $num=$service_model->insert_service($_POST);
             $id= mysql_insert_id(); 
               if(num!=0)
              {
                   header('location: ../add_service.php?action=fail');
              }
              else {
                   if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
             if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$service_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/service/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/service/',$dfile,245,'thumb');
               $file_class->cropThumbnailcreation('../../upload/service/',$dfile,150,'thumb2');
                   $_POST=$service_model->escapestring_rows($_POST);
              $num2=$service_model->update_service_image($id,$_POST);
         
        }
        }
    }
        header('location: ../add_service.php?action=sucess');
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
                                         $row=$service_model->get_service($_GET["del_id"]);
                                         if($row['image']!="")
                                         {    
                                         unlink('../../upload/service/thumb/'.$row['image']);
                                       unlink('../../upload/service/thumb2/'.$row['image']);
                                       unlink('../../upload/service/'.$row['image']);
                                         }
                                        
                                     
      //$r3=$subservice_model->del_subservice_service($_GET["del_id"]);                               
    $r=$service_model->del_service($_GET["del_id"]);
    
if($r!=1)
{
	header('location: ../list_service.php?delete=fail'.$url);
}
else
{
	header('location: ../list_service.php?delete=sucess'.$url);
}
}



if(isset($_POST["editservice"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$service_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_service.php?action=fail'.$id);

}

 else {
$id="&id=".$_POST['id'];

      
         // $_POST=$service_model->escapestring_rows($_POST);
//          $_POST['name']=stripcslashes(nl2br($_POST['name']));
//           $_POST['description']=stripcslashes($_POST['description']);
//            $_POST['child']=stripcslashes(nl2br($_POST['child']));
//            $_POST['num']=stripcslashes(nl2br($_POST['num']));
    $j=$service_model->update_service($_POST);
  if(($j!=0)||($j!=1))
  {
        if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
             if($file_class->is_image($_FILES)=="yes")
        {
                    $row=$service_model->get_service($_POST['id']);
                    if($row['image']!="")
                    {
                                         unlink('../../upload/service/thumb/'.$row['image']);
                                       unlink('../../upload/service/thumb2/'.$row['image']);
                                       unlink('../../upload/service/'.$row['image']);
                    }                  
            $filename=$service_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/service/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/service/',$dfile,245,'thumb');
               $file_class->cropThumbnailcreation('../../upload/service/',$dfile,150,'thumb2');
                   $_POST=$service_model->escapestring_rows($_POST);
              $num2=$service_model->update_service_image($_POST['id'],$_POST);
         
        }
        }
    }
       header('location: ../edit_service.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_service.php?action=fail'.$id);
  } 

    

     
 
 
 
}

}



ob_flush();
?>