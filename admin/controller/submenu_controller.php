<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
//$submenutype_model=new submenutype_model();
$submenu_model=new submenu_model();
if(isset($_POST["addsubmenu"]))
{
   
     $status="";
 $num=$submenu_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_submenu.php?action=validate');

}

 else {

$_POST=$submenu_model->escapestring_rows($_POST);
              $num=$submenu_model->insert_submenu($_POST);
              if(num!=0)
              {
                    header('location: ../add_submenu.php?action=fail');
              }
              else
              {
              header('location: ../add_submenu.php?action=sucess');
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
                                         $row=$submenu_model->get_submenu($_GET["del_id"]);
                                     
//                                      
    $r=$submenu_model->del_submenu($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_submenu.php?delete=fail'.$url);
}
else
{
	header('location: ../list_submenu.php?delete=sucess'.$url);
}
}



if(isset($_POST["editsubmenu"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$submenu_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_submenu.php?action=validate'.$id);

}

 else {


  
    
     
         // $_POST=$submenu_model->escapestring_rows($_POST);
    $j=$submenu_model->update_submenu($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_submenu.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_submenu.php?action=fail'.$id);
  } 
        
    
    

     
 
 
 
}

}



ob_flush();
?>