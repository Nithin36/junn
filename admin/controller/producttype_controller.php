<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$producttype_model=new producttype_model();
$product_model=new product_model();
if(isset($_POST["addproducttype"]))
{
   
     $status="";
 $num=$producttype_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_producttype.php?action=validate');

}

 else {

$_POST=$producttype_model->escapestring_rows($_POST);
              $num=$producttype_model->insert_producttype($_POST);
              if(num!=0)
              {
                    header('location: ../add_producttype.php?action=fail');
              }
              else
              {
               header('location: ../add_producttype.php?action=sucess');
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
                                         $row=$producttype_model->get_producttype($_GET["del_id"]);
                                     
//                                       unlink('../../upload/producttypes/thumb/'.$row['photo']);
//                                       unlink('../../upload/producttypes/'.$row['photo']);
                                       $product_model->del_productphoto_producttype($_GET["del_id"]);
                                      $r2=$product_model->del_product_producttype($_GET["del_id"]);
    $r=$producttype_model->del_producttype($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_producttype.php?delete=fail'.$url);
}
else
{
	header('location: ../list_producttype.php?delete=sucess'.$url);
}
}



if(isset($_POST["editproducttype"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$producttype_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_producttype.php?action=validate'.$id);

}

 else {


  
    
     
          $_POST=$producttype_model->escapestring_rows($_POST);
    $j=$producttype_model->update_producttype($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_producttype.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_producttype.php?action=fail'.$id);
  } 
        
    
    

     
 
 
 
}

}

if(isset($_GET["main_id"]))
{
  $producttype_model->selectbox_producttype_main_id($_GET["main_id"]);
}


ob_flush();
?>