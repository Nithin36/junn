<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$usertype_model=new usertype_model();
$file_class=new file_class();
//$subusertype_model=new subusertype_model();
if(isset($_POST["addusertype"]))
{
   
     $status="";
 $num=$usertype_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_usertype.php?action=fail');

}

 else {

     // $_POST=$usertype_model->escapestring_rows($_POST);
              $num=$usertype_model->insert_usertype($_POST);
             $id= mysql_insert_id(); 
               if(num!=0)
              {
                   header('location: ../add_usertype.php?action=fail');
              }
              else {
                   if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
             if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$usertype_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/usertype/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/usertype/',$dfile,245,'thumb');
               $file_class->cropThumbnailcreation('../../upload/usertype/',$dfile,150,'thumb2');
                   $_POST=$usertype_model->escapestring_rows($_POST);
              $num2=$usertype_model->update_usertype_image($id,$_POST);
         
        }
        }
    }
        header('location: ../add_usertype.php?action=sucess');
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
                                         $row=$usertype_model->get_usertype($_GET["del_id"]);
                                         if($row['image']!="")
                                         {    
                                         unlink('../../upload/usertype/thumb/'.$row['image']);
                                       unlink('../../upload/usertype/thumb2/'.$row['image']);
                                       unlink('../../upload/usertype/'.$row['image']);
                                         }
                                        
                                     
      //$r3=$subusertype_model->del_subusertype_usertype($_GET["del_id"]);                               
    $r=$usertype_model->del_usertype($_GET["del_id"]);
    
if($r!=1)
{
	header('location: ../list_usertype.php?delete=fail'.$url);
}
else
{
	header('location: ../list_usertype.php?delete=sucess'.$url);
}
}



if(isset($_POST["editusertype"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$usertype_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_usertype.php?action=fail'.$id);

}

 else {
$id="&id=".$_POST['id'];

      
         // $_POST=$usertype_model->escapestring_rows($_POST);
//          $_POST['name']=stripcslashes(nl2br($_POST['name']));
//           $_POST['description']=stripcslashes($_POST['description']);
//            $_POST['child']=stripcslashes(nl2br($_POST['child']));
//            $_POST['num']=stripcslashes(nl2br($_POST['num']));
    $j=$usertype_model->update_usertype($_POST);
  if(($j!=0)||($j!=1))
  {
        if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
             if($file_class->is_image($_FILES)=="yes")
        {
                    $row=$usertype_model->get_usertype($_POST['id']);
                    if($row['image']!="")
                    {
                                         unlink('../../upload/usertype/thumb/'.$row['image']);
                                       unlink('../../upload/usertype/thumb2/'.$row['image']);
                                       unlink('../../upload/usertype/'.$row['image']);
                    }                  
            $filename=$usertype_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/usertype/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/usertype/',$dfile,245,'thumb');
               $file_class->cropThumbnailcreation('../../upload/usertype/',$dfile,150,'thumb2');
                   $_POST=$usertype_model->escapestring_rows($_POST);
              $num2=$usertype_model->update_usertype_image($_POST['id'],$_POST);
         
        }
        }
    }
       header('location: ../edit_usertype.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_usertype.php?action=fail'.$id);
  } 

    

     
 
 
 
}

}



ob_flush();
?>