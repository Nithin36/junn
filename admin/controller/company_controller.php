<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$company_model=new company_model();
if(isset($_POST["addcompany"]))
{
   
     $status="";
 $num=$company_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_company.php?action=fail');

}

 else {


  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$company_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/companys/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/companys/',$dfile,235,'thumb');
               $file_class->cropThumbnailcreation('../../upload/companys/',$dfile,150,'thumb2');
                   $_POST=$company_model->escapestring_rows($_POST);
              $num=$company_model->insert_company($_POST);
              if(num!=0)
              {
                    header('location: ../add_company.php?action=fail');
              }
              else
              {
               header('location: ../add_company.php?action=sucess');
              }
        }
 else {
        header('location: ../add_company.php?action=fail');
 }
        }
         else {
      header('location: ../add_company.php?action=fail');
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
                                         $row=$company_model->get_company($_GET["del_id"]);
                                     
                                       unlink('../../upload/companys/thumb/'.$row['photo']);
                                       unlink('../../upload/companys/thumb2/'.$row['photo']);
                                       unlink('../../upload/companys/'.$row['photo']);
    $r=$company_model->del_company($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_company.php?delete=fail'.$url);
}
else
{
	header('location: ../list_company.php?delete=sucess'.$url);
}
}



if(isset($_POST["editcompany"]))
{
   
     $status="";
$num=$company_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_company.php?action=fail');

}

 else {
$id="&id=".$_POST['id'];

  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
              $row6=$company_model->get_company($_POST["id"]);
                                      
                                       unlink('../../upload/companys/thumb/'.$row6['photo']);
                                       unlink('../../upload/companys/thumb2/'.$row['photo']);
                                       unlink('../../upload/companys/'.$row6['photo']);
            $filename=$company_model->get_server_datetime();
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/companys/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
              
               $file_class->cropThumbnailcreation('../../upload/companys/',$dfile,235,'thumb');
               $file_class->cropThumbnailcreation('../../upload/companys/',$dfile,150,'thumb2');
                   $_POST=$company_model->escapestring_rows($_POST);
              $num=$company_model->update_company2($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_company.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_company.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_company.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_company.php?action=fail'.$id);
 }
    }
     else {
     
          $_POST=$company_model->escapestring_rows($_POST);
    $j=$company_model->update_company($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_company.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_company.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}



ob_flush();
?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
