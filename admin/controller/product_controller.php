<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$product_model=new product_model();
$productcategory_model=new productcategory_model();
$productsize_model=new productsize_model();
if(isset($_POST["addproduct"]))
{
   
     $status="";
 $num=$product_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_product.php?action=validate');

}

 else {

$arr=$_POST['category'];
  
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
            $filename=$product_model->get_server_datetime();
          
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/products/");
            // $ret=$file_class->CropImageFile($_POST['w'],$_POST['h'],$_POST['x1'],$_POST['y1'],'../../upload/products/',$_FILES);
// $count=count($ret);
           // $ret=$file_class->file_upload($_FILES,$filename,"../../upload/products/");
 $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
               $_POST['photo']=$dfile;
          
               $file_class->cropThumbnailcreation('../../upload/products/',$dfile,234,'thumb');
                 $file_class->cropThumbnailcreation('../../upload/products/',$dfile,200,'thumb2');
                   $_POST=$product_model->escapestring_rows($_POST);
              $num=$product_model->insert_product($_POST);
              
              if($num!=0)
              {
                  $pid=mysql_insert_id();
                   for($i=0;$i<count($arr);$i++) {
        
      $num=$productcategory_model->insert_productcategory( $arr[$i],$pid);
      }
                   $num=$productsize_model->insert_productsize($_POST,$pid);
                  header('location: ../add_product.php?action=sucess');
                   
              }
              else
              {
                header('location: ../add_product.php?action=fail');
              }
        }
 else {
        header('location: ../add_product.php?action=fail');
 }
        }
         else {
      header('location: ../add_product.php?action=fail');
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
                                         $row=$product_model->get_product($_GET["del_id"]);
                                     
                                       unlink('../../upload/products/thumb/'.$row['photo']);
                                        unlink('../../upload/products/thumb2/'.$row['photo']);
                                       unlink('../../upload/products/'.$row['photo']);
    $r=$product_model->del_product($_GET["del_id"]);
if($r!=1)
{
          $productcategory_model->del_productcategory_product($_GET["del_id"]);
                  
          $productsize_model->del_productsize_product($_GET["del_id"]);
	header('location: ../list_product.php?delete=fail'.$url);
}
else
{
	header('location: ../list_product.php?delete=sucess'.$url);
}
}



if(isset($_POST["editproduct"]))
{
   
     $status="";
$num=$product_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_product.php?action=fail');

}

 else {
$id="&id=".$_POST['id'];
$arr=$_POST['category'];
print_r($_POST);
  if($file_class->check_filearray_empty($_FILES)=="no")
    {
        $file="yes";
         
  
       
        if($file_class->is_image($_FILES)=="yes")
        {
//            if((trim($_POST['w'])!="")&&(trim($_POST['h'])!="")&&(trim($_POST['x1'])!="")&&(trim($_POST['y1'])!=""))
//            {
              $row6=$product_model->get_product($_POST["id"]);
                                      
                                       unlink('../../upload/products/thumb/'.$row6['photo']);
                                         unlink('../../upload/products/thumb2/'.$row6['photo']);
                                       unlink('../../upload/products/'.$row6['photo']);
            $filename=$product_model->get_server_datetime();
            print_r($_FILES);
             $ret=$file_class->file_upload($_FILES,$filename,"../../upload/products/");
          // $ret=$file_class->CropImageFile($_POST['w'],$_POST['h'],$_POST['x1'],$_POST['y1'],'../../upload/products/',$_FILES);
 echo $count=count($ret);
	if($count!=0)
        {
               $dfile= $file_class->store_uploaded_file_name($ret);
            echo   $_POST['photo']=$dfile;
              
               $file_class->cropThumbnailcreation('../../upload/products/',$dfile,234,'thumb');
               $file_class->cropThumbnailcreation('../../upload/products/',$dfile,200,'thumb2');
                   $_POST=$product_model->escapestring_rows($_POST);
              $num=$product_model->update_product2($_POST);
              if(($num!=0)||($num!=1))
              {
                     $productcategory_model->del_productcategory_product($_POST['id']);
                  for($i=0;$i<count($arr);$i++) {
        
      $num=$productcategory_model->insert_productcategory( $arr[$i],$_POST['id']);
      }
                  $productsize_model->del_productsize_product($_POST['id']);
                       $num=$productsize_model->insert_productsize($_POST,$_POST['id']);
                  
                  header('location: ../edit_product.php?action=sucess'.$id);
              }
              else
              {
             header('location: ../edit_product.php?action=fail'.$id);
              }
        }
 else {
      // header('location: ../edit_product.php?action=fail'.$id);
 }
       // }
//        else {
//              $_POST=$product_model->escapestring_rows($_POST);
//    $j=$product_model->update_product($_POST);
//  if(($j!=0)||($j!=1))
//  {
//                   $productcategory_model->del_productcategory_product($_POST['id']);
//                  for($i=0;$i<count($arr);$i++) {
//        
//      $num=$productcategory_model->insert_productcategory( $arr[$i],$_POST['id']);
//      }
//                  $productsize_model->del_productsize_product($_POST['id']);
//                       $num=$productsize_model->insert_productsize($_POST,$_POST['id']);
//    // header('location: ../edit_product.php?action=sucess'.$id);
//  }       
// else {
//    // header('location: ../edit_product.php?action=fail'.$id);
//  }  
//     
// }
        }
 
    }
     else {
     
          $_POST=$product_model->escapestring_rows($_POST);
    $j=$product_model->update_product($_POST);
  if(($j!=0)||($j!=1))
  {
  
      $productcategory_model->del_productcategory_product($_POST['id']);
      
        for($i=0;$i<count($arr);$i++) {
        
      $num=$productcategory_model->insert_productcategory( $arr[$i],$_POST['id']);
      }
        $productsize_model->del_productsize_product($_POST['id']);
        $num=$productsize_model->insert_productsize($_POST,$_POST['id']);
     header('location: ../edit_product.php?action=sucess'.$id);
  }       
 else {
    header('location: ../edit_product.php?action=fail'.$id);
  } 
        
    }
    
 
}

}

ob_flush();
?>