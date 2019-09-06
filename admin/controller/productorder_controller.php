<?php
ob_start();

function __autoload($class_name) 

{

require_once "../model/".$class_name.".php";

}
$orderhistory_model =new orderhistory_model();
$forgot_model=new forgot_model();
if(isset($_POST["updatestatus"]))

{
$id="&oid=".$_POST['id'];
$status="";
$num=$orderhistory_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');
if($num!=0)
{
header('location: ../status_productorder.php?action=fail'.$id);
}
else {
$id="&oid=".$_POST['id'];
$_POST=$orderhistory_model->escapestring_rows($_POST);
$j=$orderhistory_model->update_orderhistory_withdispatch($_POST);
if(($j!=0)||($j!=1))
{
$row=$orderhistory_model->get_orderhistory($_POST['id']);
$courierno="";
$trackid="";   
$thead="";
$tbody="";
if(trim($row['courierno'])!="")
{
$courierno=$row['courierno']; 
$thead=$thead.'<th>Courier No</th>';
$tbody=$tbody.'<td>'.$row['courierno'].'</td>';
}
if(trim($row['trackid'])!="")
{
$trackid=$row['trackid']; 
$thead=$thead.'<th>Track Id</th>';
$tbody=$tbody.'<td>'.$row['trackid'].'</td>';
}
 $message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>


</head>

<body style="background-color:#e3e3e3;">
<?php

?>
<div class="cover" style="width:1000px; height:auto; margin:0 auto; ">

<table width="700" border="0" align="center"   cellspacing="0" cellpadding="2"  >
<tr>
<td height="79" bgcolor="#FFFFFF">
<img src="'.$orderhistory_model->get_path().'images/logo.png" style="padding-left:20px;" />

</td>
</tr>
<tr>
<td height="0" bgcolor="#000"></td>
</tr>
<tr>
<td bgcolor="#F0F0F0">
<p>Your order ('.$row['orderid'].') of product ('.$row['name'].'&nbsp;'.$row['pquantity'].'&nbsp; '.$row['sunit'].') is  '.$row['deliverystatus'].'</p>

<p style="margin-left:10px;">

<h3>Order Details</h3>

<table border="1">
<thead>
<tr>
<th>Order id</th>
<th>Photo</th>
<th>Product Title</th>
<th>No of items</th>
<th>Price</th>
<th>Total price</th>
<th>Status</th>
'.$thead.'
</tr>
</thead>
<tbody>
<tr>
<td>'.$row['orderid'].'</td>
<td><img style="height:100px; width: 100 px;" class="img-responsive" src="'.$orderhistory_model->get_path().'upload/products/thumb2/'.$row['photo'].'" /></td>
<td>'.$row['name'].'&nbsp;'.$row['pquantity'].'&nbsp; '.$row['sunit'].'<br/>
</td>
<td>'.$row['noofitems'].'
</td>
<td><i class="fa fa-rupee"></i>'.$row['price'] .'</td>
<td><i class=" fa fa-rupee"></i> '. $row['totalprice'] .'</td>
<td>'.$row['deliverystatus'].'</td>
'.$tbody.'
</tr>



</tbody>
</table>



<?php 
}


?> 


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
</html>';
$mail=$forgot_model->view_forgot2(1);
$subject = "Junaid Order (".$row['orderid'].") Details";

$headers  = 'From: noreply@junaidperfumes.in' . "\r\n";

$headers .= 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$to  = "".$mail."";

if (!mail($to, $subject, $message, $headers)) 

{ 

$status=0;

}

else {

$status=1;

}
header('location: ../status_productorder.php?action=sucess'.$id);

}       

else {
header('location: ../status_productorder.php?action=fail'.$id);
} 
}
}
?>