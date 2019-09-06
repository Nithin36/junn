<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$locationmap_model=new locationmap_model();
$product_model=new product_model();
if(isset($_POST["addlocationmap"]))
{
   
     $status="";
 $num=$locationmap_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_locationmap.php?action=validate');

}

 else {

$_POST=$locationmap_model->escapestring_rows($_POST);
              $num=$locationmap_model->insert_locationmap($_POST);
              if(num!=0)
              {
                    header('location: ../add_locationmap.php?action=fail');
              }
              else
              {
               header('location: ../add_locationmap.php?action=sucess');
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
                                         $row=$locationmap_model->get_locationmap($_GET["del_id"]);
                                     
//                                       unlink('../../upload/locationmaps/thumb/'.$row['photo']);
//                                       unlink('../../upload/locationmaps/'.$row['photo']);
                                      // $product_model->del_productphoto_locationmap($_GET["del_id"]);
                                      //$r2=$product_model->del_product_locationmap($_GET["del_id"]);
    $r=$locationmap_model->del_locationmap($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_locationmap.php?delete=fail'.$url);
}
else
{
	header('location: ../list_locationmap.php?delete=sucess'.$url);
}
}



if(isset($_POST["editlocationmap"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$locationmap_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_locationmap.php?action=validate'.$id);

}

 else {


  
    
     
          $_POST=$locationmap_model->escapestring_rows($_POST);
    $j=$locationmap_model->update_locationmap($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_locationmap.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_locationmap.php?action=fail'.$id);
  } 
        
    
    

     
 
 
 
}

}



ob_flush();
?>