<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$country_model=new country_model();
$file_class=new file_class();
//$subcountry_model=new subcountry_model();
if(isset($_POST["addcountry"]))
{
   
     $status="";
 $num=$country_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_country.php?action=fail');

}

 else {

     // $_POST=$country_model->escapestring_rows($_POST);
              $num=$country_model->insert_country($_POST);
             $id= mysql_insert_id(); 
               if($num!=0)
              {
                    header('location: ../add_country.php?action=sucess');
                   
              }
              else {
                header('location: ../add_country.php?action=fail');  
       
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
                                         $row=$country_model->get_country($_GET["del_id"]);
                                                               
    $r=$country_model->del_country($_GET["del_id"]);
    
if($r!=1)
{
	header('location: ../list_country.php?delete=fail'.$url);
}
else
{
	header('location: ../list_country.php?delete=sucess'.$url);
}
}



if(isset($_POST["editcountry"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$country_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_country.php?action=fail'.$id);

}

 else {
$id="&id=".$_POST['id'];

      
         // $_POST=$country_model->escapestring_rows($_POST);
//          $_POST['name']=stripcslashes(nl2br($_POST['name']));
//           $_POST['description']=stripcslashes($_POST['description']);
//            $_POST['child']=stripcslashes(nl2br($_POST['child']));
//            $_POST['num']=stripcslashes(nl2br($_POST['num']));
    $j=$country_model->update_country($_POST);
  if(($j!=0)||($j!=1))
  {
 
       header('location: ../edit_country.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_country.php?action=fail'.$id);
  } 

    

     
 
 
 
}

}



ob_flush();
?>