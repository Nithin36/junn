<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$mainproducttype_model=new mainproducttype_model();
$producttype_model=new producttype_model();
$product_model=new product_model();
if(isset($_POST["addmainproducttype"]))
{
   
     $status="";
 $num=$mainproducttype_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_mainproducttype.php?action=validate');

}

 else {

$_POST=$mainproducttype_model->escapestring_rows($_POST);
              $num=$mainproducttype_model->insert_mainproducttype($_POST);
              if(num!=0)
              {
                    header('location: ../add_mainproducttype.php?action=fail');
              }
              else
              {
               header('location: ../add_mainproducttype.php?action=sucess');
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
                                         $row=$mainproducttype_model->get_mainproducttype($_GET["del_id"]);
                                         $product_model->del_productphoto_main($_GET["del_id"]);
                                          $product_model->del_product_main($_GET["del_id"]);
                                     $producttype_model->del_producttype_main($_GET["del_id"]);
                                    
                                
                                       
                                     // $r2=$product_model->del_product_mainproducttype($_GET["del_id"]);
    $r=$mainproducttype_model->del_mainproducttype($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_mainproducttype.php?delete=fail'.$url);
}
else
{
	header('location: ../list_mainproducttype.php?delete=sucess'.$url);
}
}



if(isset($_POST["editmainproducttype"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$mainproducttype_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_mainproducttype.php?action=validate'.$id);

}

 else {


  
    
     
          $_POST=$mainproducttype_model->escapestring_rows($_POST);
    $j=$mainproducttype_model->update_mainproducttype($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_mainproducttype.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_mainproducttype.php?action=fail'.$id);
  } 
        
    
    

     
 
 
 
}

}



ob_flush();
?>