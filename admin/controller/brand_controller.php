<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$brand_model=new brand_model();
if(isset($_POST["addbrand"]))
{
   
     $status="";
 $num=$brand_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_brand.php?action=validate');

}

 else {


  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$brand_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/brands/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/brands/',$dfile,225,'thumb');
                 $file_class->cropThumbnailcreation('../../upload/brands/',$dfile,150,'thumb2');
                   $_POST=$brand_model->escapestring_rows($_POST);
              $num=$brand_model->insert_brand($_POST);
              if($num!=0)
              {
                    header('location: ../add_brand.php?action=sucess');
                 
              }
              else
              {
             header('location: ../add_brand.php?action=fail');
              }
        }
 else {
        header('location: ../add_brand.php?action=fail');
 }
        }
         else {
      header('location: ../add_brand.php?action=fail');
 }
    }
    
 else {
        $_POST=$brand_model->escapestring_rows($_POST);
              $num=$brand_model->insert_brand($_POST);
              if($num!=0)
              {
                   header('location: ../add_brand.php?action=sucess');
                 
              }
              else
              {
              header('location: ../add_brand.php?action=fail');
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
                                         $row=$brand_model->get_brand($_GET["del_id"]);
                                     
                                       unlink('../../upload/brands/thumb/'.$row['photo']);
                                        unlink('../../upload/brands/thumb2/'.$row['photo']);
                                       unlink('../../upload/brands/'.$row['photo']);
    $r=$brand_model->del_brand($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_brand.php?delete=fail'.$url);
}
else
{
	header('location: ../list_brand.php?delete=sucess'.$url);
}
}



if(isset($_POST["editbrand"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$brand_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_brand.php?action=validate'.$id);

}

 else {

  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
              $row6=$brand_model->get_brand($_POST["id"]);
                                      
                                       unlink('../../upload/brands/thumb/'.$row6['photo']);
                                         unlink('../../upload/brands/thumb2/'.$row6['photo']);
                                       unlink('../../upload/brands/'.$row6['photo']);
            $filename=$brand_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/brands/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
              
               $file_class->cropThumbnailcreation('../../upload/brands/',$dfile,225,'thumb');
               $file_class->cropThumbnailcreation('../../upload/brands/',$dfile,150,'thumb2');
                   $_POST=$brand_model->escapestring_rows($_POST);
              $num=$brand_model->update_brand2($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_brand.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_brand.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_brand.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_brand.php?action=fail'.$id);
 }
    }
     else {
     
          $_POST=$brand_model->escapestring_rows($_POST);
    $j=$brand_model->update_brand($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_brand.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_brand.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}



ob_flush();
?>