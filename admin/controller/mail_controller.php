<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$commonoperation=new commonoperation();

$severmail="suggestions@abetterchange.com";
//$severmail="enquiry@uniquehousekeepers.com";
$severmail2="booking@uniquehousekeepers.com";







if(isset($_POST['enquiry']))
{
   
    $status="";
     $_POST=$commonoperation->escapestring_rows($_POST);
    $to = $_POST['smail'];
$subject = "TTC Jubail";

$headers  = 'From:'.$severmail.''. "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$txt='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>


</head>

<body style="background-color:#e3e3e3;">
<div class="cover" style="width:1000px; height:auto; margin:0 auto; ">

<table width="700" border="0" align="center"   cellspacing="0" cellpadding="2"  >
  <tr>
    <td height="79" bgcolor="#FFFFFF">
    <img src="'.$commonoperation->get_path().'images/logo.png" style="padding-left:20px;" />
    
    </td>
  </tr>
  <tr>
    <td height="0" bgcolor="#000">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0">
        
    <p style="margin-left:10px;">
     <table>
     <tr><td>Name</td><td>:</td><td>'.$_POST['name'].'</td> </tr>
     <tr><td></td><td></td><td></td> </tr>
    <tr><td>Email</td><td>:</td><td>'.$_POST['email'].' </td> </tr>  
      <tr><td></td><td></td><td></td> </tr>   
    <tr><td>Subject</td><td>:</td><td>'.$_POST['subject'].'</td> </tr>  
     <tr><td></td><td></td><td></td> </tr>    


  
    <tr><td>Message</td><td>:</td><td>'.$_POST['message'].'</td> </tr>      
  
      </table>    
    

</p>
      </td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#eee">
    
    
    
     <p style="color:#575757; line-height:21px; text-align:justify; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; 
font-size:13px;"></a><br />
 This is system generated Mail. Please do not reply to this message.</p>
    
    
    </td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#eee">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#eee">
   
    
    </td>
  </tr>
</table>
 



</div>


</body>
</html>


';

if($commonoperation->post_data_some_filled($_POST,'address,zipcode,website'))
{
     $status="notfilled";
//    header('location:../index.php?page=accountmgmt&subpage=employer&tab=1&element=listemployer&msg=sucess&msg_id='.$_POST['msg_id']);
}
else if(@mail($to,$subject,$txt,$headers))
{
     $status="yes";
//    header('location:../index.php?page=accountmgmt&subpage=employer&tab=1&element=listemployer&msg=sucess&msg_id='.$_POST['msg_id']);
}

else{
 $status="no";
// header('location:../index.php?page=accountmgmt&subpage=employer&tab=1&element=listemployer&msg=fail&msg_id='.$_POST['msg_id']);
}
$status2 = array("status"=>"$status");

print_r(json_encode($status2));
}


if(isset($_POST['enquiry2']))
{
   
    $status="";
     $_POST=$commonoperation->escapestring_rows($_POST);
    $to = $_POST['smail'];
$subject = "Unique House Keepers Online Booking";

$headers  = 'From:'.$severmail2.''. "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$txt='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>


</head>

<body style="background-color:#e3e3e3;">
<div class="cover" style="width:1000px; height:auto; margin:0 auto; ">

<table width="700" border="0" align="center"   cellspacing="0" cellpadding="2"  >
  <tr>
    <td height="79" bgcolor="#FFFFFF">
    <img src="'.$commonoperation->get_path().'images/unique-house-keepers.png" style="padding-left:20px;" />
    
    </td>
  </tr>
  <tr>
    <td height="0" bgcolor="#8fbe38">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0">
        
    <p style="margin-left:10px;">
     <table>
     <tr><td>Name</td><td>:</td><td>'.$_POST['name'].'</td> </tr>
     <tr><td></td><td></td><td></td> </tr>
    <tr><td>Email</td><td>:</td><td>'.$_POST['email'].' </td> </tr>  
      <tr><td></td><td></td><td></td> </tr>   
    <tr><td>Contact No</td><td>:</td><td>'.$_POST['contact'].'</td> </tr>  
     <tr><td></td><td></td><td></td> </tr>    
       <tr><td>Location</td><td>:</td><td>'.$_POST['cityinput'].'</td> </tr>  
     <tr><td></td><td></td><td></td> </tr> 
     
  <tr><td>Requested Service</td><td>:</td><td>'.$_POST['service'].'</td> </tr>  
     <tr><td></td><td></td><td></td> </tr> 
  <tr><td>Address</td><td>:</td><td>'.$_POST['address'].'</td> </tr>  
     <tr><td></td><td></td><td></td> </tr> 
    <tr><td>City</td><td>:</td><td>'.$_POST['cityinput'].' </td> </tr>  
        <tr><td></td><td></td><td></td> </tr> 
 
  
    <tr><td>Other Details</td><td>:</td><td>'.$_POST['comment'].'</td> </tr>      
  
      </table>    
    

</p>
      </td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#008330">
    
    
    
     <p style="color:#575757; line-height:21px; text-align:justify; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; 
font-size:13px;"></a><br />
 This is system generated Mail. Please do not reply to this message.</p>
    
    
    </td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#008330">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#008330">
   
    
    </td>
  </tr>
</table>
 



</div>


</body>
</html>


';

if($commonoperation->post_data_some_filled($_POST,'address,zipcode,website'))
{
     $status="notfilled";
//    header('location:../index.php?page=accountmgmt&subpage=employer&tab=1&element=listemployer&msg=sucess&msg_id='.$_POST['msg_id']);
}
else if(@mail($to,$subject,$txt,$headers))
{
     $status="yes";
//    header('location:../index.php?page=accountmgmt&subpage=employer&tab=1&element=listemployer&msg=sucess&msg_id='.$_POST['msg_id']);
}

else{
 $status="no";
// header('location:../index.php?page=accountmgmt&subpage=employer&tab=1&element=listemployer&msg=fail&msg_id='.$_POST['msg_id']);
}
$status2 = array("status"=>"$status");

print_r(json_encode($status2));
}


ob_flush();
?>