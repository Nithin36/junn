<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$pagetitle_model=new pagetitle_model();
$product_model=new product_model();
if(isset($_POST["addpagetitle"]))
{
   
     $status="";
 $num=$pagetitle_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_pagetitle.php?action=validate');

}

 else {

$_POST=$pagetitle_model->escapestring_rows($_POST);
              $num=$pagetitle_model->insert_pagetitle($_POST);
              if(num!=0)
              {
                    header('location: ../add_pagetitle.php?action=fail');
              }
              else
              {
               header('location: ../add_pagetitle.php?action=sucess');
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
                                         
                                     
//                                       unlink('../../upload/pagetitles/thumb/'.$row['photo']);
//                                       unlink('../../upload/pagetitles/'.$row['photo']);
                                       
    $r=$pagetitle_model->del_pagetitle($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_pagetitle.php?delete=fail'.$url);
}
else
{
	header('location: ../list_pagetitle.php?delete=sucess'.$url);
}
}



if(isset($_POST["editpagetitle"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$pagetitle_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_pagetitle.php?action=validate'.$id);

}

 else {


  
    
     
          $_POST=$pagetitle_model->escapestring_rows($_POST);
    $j=$pagetitle_model->update_pagetitle($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_pagetitle.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_pagetitle.php?action=fail'.$id);
  } 
        
    
    

     
 
 
 
}

}


if(isset($_POST["editpagetitle2"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$pagetitle_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_defaultpagetitle.php?action=validate'.$id);

}

 else {


  
    
     
          $_POST=$pagetitle_model->escapestring_rows($_POST);
    $j=$pagetitle_model->update_pagetitle($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_defaultpagetitle.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_defaultpagetitle.php?action=fail'.$id);
  } 
        
    
    

     
 
 
 
}

}


ob_flush();
?>