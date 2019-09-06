<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$profile_model=new profile_model();
if(isset($_POST["addprofile"]))
{
   
     $status="";
 $num=$profile_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_profile.php?action=fail');

}

 else {


  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_doc($_FILES)=="yes")
        {
            $filename=$profile_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/profiles/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['doc']=$dfile;
          
             
                   $_POST=$profile_model->escapestring_rows($_POST);
              $num=$profile_model->insert_profile($_POST);
              if(num!=0)
              {
                    header('location: ../add_profile.php?action=fail');
              }
              else
              {
               header('location: ../add_profile.php?action=sucess');
              }
        }
 else {
        header('location: ../add_profile.php?action=fail');
 }
        }
         else {
      header('location: ../add_profile.php?action=fail');
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
                                         $row=$profile_model->get_profile($_GET["del_id"]);
                                     
                                   
                                       unlink('../../upload/profiles/'.$row['doc']);
    $r=$profile_model->del_profile($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_profile.php?delete=fail'.$url);
}
else
{
	header('location: ../list_profile.php?delete=sucess'.$url);
}
}



if(isset($_POST["editprofile"]))
{
   
     $status="";
$num=$profile_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_profile.php?action=fail');

}

 else {
$id="&id=".$_POST['id'];

  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_doc($_FILES)=="yes")
        {
              $row6=$profile_model->get_profile($_POST["id"]);
                                      
                              
                                       unlink('../../upload/profiles/'.$row6['doc']);
            $filename=$profile_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/profiles/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['doc']=$dfile;
              

                   $_POST=$profile_model->escapestring_rows($_POST);
              $num=$profile_model->update_profile2($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_profile.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_profile.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_profile.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_profile.php?action=fail'.$id);
 }
    }
     else {
     
          $_POST=$profile_model->escapestring_rows($_POST);
    $j=$profile_model->update_profile($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_profile.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_profile.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}



ob_flush();
?>