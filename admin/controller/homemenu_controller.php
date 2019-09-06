<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
//$homemenutype_model=new homemenutype_model();
$homemenu_model=new homemenu_model();






if(isset($_POST["edithomemenu"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$homemenu_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_homemenu.php?action=validate'.$id);

}

 else {


  
    
     
          $_POST=$homemenu_model->escapestring_rows($_POST);
    $j=$homemenu_model->update_homemenu($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_homemenu.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_homemenu.php?action=fail'.$id);
  } 
        
    
    

     
 
 
 
}

}



ob_flush();
?>