<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$facility_model=new facility_model();
$facilityphotos_model=new facilityphotos_model();
if(isset($_POST["addfacility"]))
{
   
     $status="";
 $num=$facility_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_facility.php?action=fail');

}

 else {

      $_POST=$facility_model->escapestring_rows($_POST);
              $num=$facility_model->insert_facility($_POST);
              if(num!=0)
              {
                    header('location: ../add_facility.php?action=fail');
              }
              else
              {
               header('location: ../add_facility.php?action=sucess');
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
                                         $row=$facility_model->get_facility($_GET["del_id"]);
                                     
     $r3=$facilityphotos_model->del_facilityphotos_facility($_GET["del_id"]); 
       $facilityphotos_model->del_facilityphotos_facility_photo($_GET["del_id"]); 
    $r=$facility_model->del_facility($_GET["del_id"]);
    
if($r!=1)
{
	header('location: ../list_facility.php?delete=fail'.$url);
}
else
{
	header('location: ../list_facility.php?delete=sucess'.$url);
}
}



if(isset($_POST["editfacility"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$facility_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_facility.php?action=fail'.$id);

}

 else {
$id="&id=".$_POST['id'];

      
          $_POST=$facility_model->escapestring_rows($_POST);
//          $_POST['name']=stripcslashes(nl2br($_POST['name']));
//           $_POST['description']=stripcslashes($_POST['description']);
//            $_POST['child']=stripcslashes(nl2br($_POST['child']));
//            $_POST['num']=stripcslashes(nl2br($_POST['num']));
    $j=$facility_model->update_facility($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_facility.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_facility.php?action=fail'.$id);
  } 

    

     
 
 
 
}

}



ob_flush();
?>