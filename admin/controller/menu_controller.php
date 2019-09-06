<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$menu_model=new menu_model();
$submenu_model=new submenu_model();
if(isset($_POST["addmenu"]))
{
   
     $status="";
 $num=$menu_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_menu.php?action=fail');

}

 else {

      $_POST=$menu_model->escapestring_rows($_POST);
              $num=$menu_model->insert_menu($_POST);
              if(num!=0)
              {
                    header('location: ../add_menu.php?action=fail');
              }
              else
              {
               header('location: ../add_menu.php?action=sucess');
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
                                         $row=$menu_model->get_menu($_GET["del_id"]);
                                     
      $r3=$submenu_model->del_submenu_menu($_GET["del_id"]);                               
    $r=$menu_model->del_menu($_GET["del_id"]);
    
if($r!=1)
{
	header('location: ../list_menu.php?delete=fail'.$url);
}
else
{
	header('location: ../list_menu.php?delete=sucess'.$url);
}
}



if(isset($_POST["editmenu"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$menu_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_menu.php?action=fail'.$id);

}

 else {
$id="&id=".$_POST['id'];

      
          //$_POST=$menu_model->escapestring_rows($_POST);
//          $_POST['name']=stripcslashes(nl2br($_POST['name']));
//           $_POST['description']=stripcslashes($_POST['description']);
//            $_POST['child']=stripcslashes(nl2br($_POST['child']));
//            $_POST['num']=stripcslashes(nl2br($_POST['num']));
    $j=$menu_model->update_menu($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_menu.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_menu.php?action=fail'.$id);
  } 

    

     
 
 
 
}

}



ob_flush();
?>