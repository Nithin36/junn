<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$slider_model=new slider_model();
if(isset($_POST["addslider"]))
{
   
     $status="";
 $num=$slider_model->post_data_some_filled($_POST,'mobno,email,title1,title2,title3');

 if($num!=0)
{
	 header('location: ../add_slider.php?action=fail');

}

 else {


  
  if($file_class->check_file_empty($_FILES['file'])=="no")
    {
        $file="yes";
         
       
        echo "<br/>";
       
        if($file_class->is_image_single($_FILES['file'])=="yes")
        {
            $filename=$slider_model->get_server_datetime();
             $ret=$file_class->file_upload_single($_FILES['file'],$filename,"../../upload/sliders/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/sliders/',$dfile,1700,'thumb');
               $file_class->cropThumbnailcreation('../../upload/sliders/',$dfile,150,'thumb2');
                   $_POST=$slider_model->escapestring_rows($_POST);
                   
                   
                   //$num=$slider_model->insert_slider($_POST);
                   
              if($file_class->check_file_empty($_FILES['file2'])=="no")
    {
             echo "nithin";       
        $file="yes";
         
 // $num=$slider_model->insert_slider($_POST);
       
        if($file_class->is_image_single($_FILES['file2'])=="yes")
        {
            $filename2=$slider_model->get_server_datetime();
             $ret2=$file_class->file_upload_single($_FILES['file2'],$filename2,"../../upload/sliders2/");
 $count2=count($ret2);
	if($count2!=0)
        {
               $dfile2= $file_class->store_uploaded_file_name($ret2);
               $_POST['photo2']=$dfile2;
          
               $file_class->cropThumbnailcreation('../../upload/sliders2/',$dfile2,1700,'thumb');
               $file_class->cropThumbnailcreation('../../upload/sliders2/',$dfile2,150,'thumb2');
                   
                   
                   
                   
                   
                   
                                   $_POST=$slider_model->escapestring_rows($_POST);   
                                   $num=$slider_model->insert_slider2($_POST);
        }
        }
    }
    
 else {
        $num=$slider_model->insert_slider($_POST);
    }
                   
              
              if(num!=0)
              {
                   header('location: ../add_slider.php?action=fail');
              }
              else
              {
               header('location: ../add_slider.php?action=sucess');
              }
        }
 else {
        header('location: ../add_slider.php?action=fail');
 }
        }
         else {
     header('location: ../add_slider.php?action=fail');
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
                                         $row=$slider_model->get_slider($_GET["del_id"]);
                                      //print_r($row);
                                       unlink('../../upload/sliders/thumb/'.$row['photo']);
                                       unlink('../../upload/sliders/thumb2/'.$row['photo']);
                                       unlink('../../upload/sliders/'.$row['photo']);
                                       if(trim($row['photo2']!=""))
                                       {
                                                  unlink('../../upload/sliders/thumb/'.$row['photo2']);
                                       unlink('../../upload/sliders/thumb2/'.$row['photo2']);
                                       unlink('../../upload/sliders/'.$row['photo2']);
                                       }
    $r=$slider_model->del_slider($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_slider.php?delete=fail'.$url);
}
else
{
	header('location: ../list_slider.php?delete=sucess'.$url);
}
}







if(isset($_POST["editslider"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$slider_model->post_data_some_filled($_POST,'mobno,title1,title2,title3');

 if($num!=0)
{
	 header('location: ../edit_slider.php?action=fail'.$id);;

}

 else {


  if(($file_class->check_file_empty($_FILES['file'])=="no")&&($file_class->check_file_empty($_FILES['file2'])=="no"))
    {
        $file="yes";
         
  
       
        if(($file_class->is_image_single($_FILES['file'])=="yes")&&($file_class->is_image_single($_FILES['file2'])=="yes"))
        {
              $row6=$slider_model->get_slider($_POST["id"]);
                                      if($row6['photo2']!=" ")
                                      {
                                       unlink('../../upload/sliders2/thumb/'.$row6['photo2']);
                                       unlink('../../upload/sliders2/thumb2/'.$row6['photo2']);
                                       unlink('../../upload/sliders2/'.$row6['photo2']);
                                      }
                                       unlink('../../upload/sliders/thumb/'.$row6['photo']);
                                       unlink('../../upload/sliders/thumb2/'.$row6['photo']);
                                       unlink('../../upload/sliders/'.$row6['photo']);
            $filename=$slider_model->get_server_datetime();
             $filename2=$slider_model->get_server_datetime();
             $ret=$file_class->file_upload_single($_FILES['file'],$filename,"../../upload/sliders/");
             $ret2=$file_class->file_upload_single($_FILES['file2'],$filename2,"../../upload/sliders2/");
 $count=count($ret);
  $count2=count($ret2);
	if(($count!=0)&&($count2!=0))
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
                  $dfile2= $file_class->store_uploaded_file_name($ret2);
               $_POST['photo2']=$dfile2;
               $file_class->cropThumbnailcreation('../../upload/sliders/',$dfile,1700,'thumb');
               $file_class->cropThumbnailcreation('../../upload/sliders/',$dfile,150,'thumb2');
                   $file_class->cropThumbnailcreation('../../upload/sliders2/',$dfile,1700,'thumb');
               $file_class->cropThumbnailcreation('../../upload/sliders2/',$dfile,150,'thumb2');
                   $_POST=$slider_model->escapestring_rows($_POST);
              $num=$slider_model->update_slider4($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_slider.php?action=sucess'.$id);
              }
              else
              {
             // header('location: ../edit_slider.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_slider.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_slider.php?action=fail'.$id);
 }
    }
 else if($file_class->check_file_empty($_FILES['file'])=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image_single($_FILES['file'])=="yes")
        {
              $row6=$slider_model->get_slider($_POST["id"]);
                                      
                                       unlink('../../upload/sliders/thumb/'.$row6['photo']);
                                       unlink('../../upload/sliders/thumb2/'.$row6['photo']);
                                       unlink('../../upload/sliders/'.$row6['photo']);
            $filename=$slider_model->get_server_datetime();
             $ret=$file_class->file_upload_single($_FILES['file'],$filename,"../../upload/sliders/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
              
               $file_class->cropThumbnailcreation('../../upload/sliders/',$dfile,1700,'thumb');
               $file_class->cropThumbnailcreation('../../upload/sliders/',$dfile,150,'thumb2');
                   $_POST=$slider_model->escapestring_rows($_POST);
              $num=$slider_model->update_slider2($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_slider.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_slider.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_slider.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_slider.php?action=fail'.$id);
 }
    }
    
    else if($file_class->check_file_empty($_FILES['file2'])=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image_single($_FILES['file2'])=="yes")
        {
              $row6=$slider_model->get_slider($_POST["id"]);
                                      if($row6['photo2']!="")
                                      {
                                       unlink('../../upload/sliders2/thumb/'.$row6['photo2']);
                                       unlink('../../upload/sliders2/thumb2/'.$row6['photo2']);
                                       unlink('../../upload/sliders2/'.$row6['photo2']);
                                      }
            $filename2=$slider_model->get_server_datetime();
             $ret2=$file_class->file_upload_single($_FILES['file2'],$filename2,"../../upload/sliders2/");
 $count2=count($ret2);
	if($count2!=0)
        {
               $dfile2= $file_class->store_uploaded_file_name($ret2);
               $_POST['photo2']=$dfile2;
              
               $file_class->cropThumbnailcreation('../../upload/sliders2/',$dfile2,1700,'thumb');
               $file_class->cropThumbnailcreation('../../upload/sliders2/',$dfile2,150,'thumb2');
                   $_POST=$slider_model->escapestring_rows($_POST);
              $num=$slider_model->update_slider3($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_slider.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_slider.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_slider.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_slider.php?action=fail'.$id);
 }
    }
     else {
     
          $_POST=$slider_model->escapestring_rows($_POST);
    $j=$slider_model->update_slider($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_slider.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_slider.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}



if(isset($_POST["editslider2"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$slider_model->post_data_some_filled($_POST,'mobno,title1,title2,title3');

 if($num!=0)
{
	 header('location: ../edit_slider.php?action=fail'.$id);;

}

 else {
 if($file_class->check_file_empty($_FILES['file'])=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image_single($_FILES['file'])=="yes")
        {
              $row6=$slider_model->get_slider($_POST["id"]);
                                      
                                       unlink('../../upload/sliders/thumb/'.$row6['photo']);
                                   
                                       unlink('../../upload/sliders/'.$row6['photo']);
            $filename=$slider_model->get_server_datetime();
             $ret=$file_class->file_upload_single($_FILES['file'],$filename,"../../upload/sliders/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
              
               $file_class->cropThumbnailcreation('../../upload/sliders/',$dfile,1700,'thumb');
               $file_class->cropThumbnailcreation('../../upload/sliders/',$dfile,150,'thumb2');
                   $_POST=$slider_model->escapestring_rows($_POST);
              $num=$slider_model->update_slider2($_POST);
              if((num!=0)||(num!=1))
              {
                   header('location: ../edit_slider.php?action=sucess'.$id);
              }
              else
              {
              header('location: ../edit_slider.php?action=fail'.$id);
              }
        }
 else {
       header('location: ../edit_slider.php?action=fail'.$id);
 }
        }
         else {
     header('location: ../edit_slider.php?action=fail'.$id);
 }
    }
    

     else {
     
          $_POST=$slider_model->escapestring_rows($_POST);
    $j=$slider_model->update_slider($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_slider.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_slider.php?action=fail'.$id);
  } 
        
    }
    

     
 
 
 
}

}

ob_flush();
?>