<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$partner_model=new partner_model();
if(isset($_POST["addpartner"]))
{
   
     $status="";
 $num=$partner_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_partner.php?action=fail');

}

 else {


  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$partner_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/partners/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/partners/',$dfile,235,'thumb');
               $file_class->cropThumbnailcreation('../../upload/partners/',$dfile,150,'thumb2');
                   $_POST=$partner_model->escapestring_rows($_POST);
              $num=$partner_model->insert_partner($_POST);
              if(num!=0)
              {
                    header('location: ../add_partner.php?action=fail');
              }
              else
              {
               header('location: ../add_partner.php?action=sucess');
              }
        }
 else {
        header('location: ../add_partner.php?action=fail');
 }
        }
         else {
      header('location: ../add_partner.php?action=fail');
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
                                         $row=$partner_model->get_partner($_GET["del_id"]);
                                     
                                       unlink('../../upload/partners/thumb/'.$row['photo']);
                                       unlink('../../upload/partners/thumb2/'.$row['photo']);
                                       unlink('../../upload/partners/'.$row['photo']);
    $r=$partner_model->del_partner($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_partner.php?delete=fail'.$url);
}
else
{
	header('location: ../list_partner.php?delete=sucess'.$url);
}
}



if(isset($_POST["editpartner"]))
{
   
     $status="";
$num=$partner_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_partner.php?action=fail');

}

 else {
$id="&id=".$_POST['id'];

  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
              $row6=$partner_model->get_partner($_POST["id"]);
                                      
                                       unlink('../../upload/partners/thumb/'.$row6['photo']);
                                       unlink('../../upload/partners/thumb2/'.$row6['photo']);
                                       unlink('../../upload/partners/'.$row6['photo']);
            $filename=$partner_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/partners/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
              
               $file_class->cropThumbnailcreation('../../upload/partners/',$dfile,235,'thumb');
               $file_class->cropThumbnailcreation('../../upload/partners/',$dfile,150,'thumb2');
                   $_POST=$partner_model->escapestring_rows($_POST);
              $num=$partner_model->update_partner2($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_partner.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_partner.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_partner.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_partner.php?action=fail'.$id);
 }
    }
     else {
     
          $_POST=$partner_model->escapestring_rows($_POST);
    $j=$partner_model->update_partner($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_partner.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_partner.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}



ob_flush();
?>