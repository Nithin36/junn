<?php
ob_start();
session_start();
function __autoload($class_name) 
{
require_once "model/".$class_name.".php";
}
$productorder_model=new productorder_model();
if(isset($_SESSION['id']))
{  
?>
<!DOCTYPE html>
<html>
<?php
include'view/head.php';
?>
<body>
<!--  wrapper -->
<div id="wrapper">
<?php
include'view/header.html';
include'view/navigation.html';
?>
<div id="page-wrapper">
<div class="row">
<!-- page header -->
<div class="col-lg-12">
<h1 class="page-header">Product Orders</h1>
</div>
<!--end page header -->
</div>
<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<?php 
include 'view/producttype_header.php';
?>

<div class="panel panel-default">
<div class="panel-heading">
Product Orders-Manage Product Orders
</div>
<div class="panel-body">



<div class="panel-body">
<div class="row">
<div class="panel-body">

<?php

$perpage=10;
$pgno = 1;
if(isset($_GET["pgno"])){
$pgno = intval($_GET["pgno"]);
}

$start=$productorder_model->start_page($pgno,$perpage);
$i=1;

 $pquery=" select  orderhistory.*,(select ordersstatus.name from ordersstatus where ordersstatus.id=orderhistory.status )as deliverystatus,productorder.orderid,(select name from product where id=orderhistory.pid) as pname,(select photo from product where id=orderhistory.pid) as pphoto,(select id from product where id=orderhistory.pid) as pid,(select CONCAT(fname,' ',lname) from customer where customer.id=orderhistory.cusid) as cname, orderhistory.email as cemail,orderhistory.mobno as cmobno,"
. " productorder.noofitems,productorder.price,productorder.totalprice from orderhistory "
. " left join productorder on productorder.id=orderhistory.oid  "
. " order by orderhistory.id desc  ";
$result=$productorder_model->execute_pagenation_join_query($start,$perpage,$pquery);
$status="yes";
if($productorder_model->affectedselectedrows($pquery)==0)
{
$status="no";
}
if($status=="yes")
{
?>
<div class="table-responsive">
<div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
<div class="row">

</div>
<table class="table table-striped table-bordered table-hover"  >
<thead>
<tr>

<th>Order id</th>
<th>Product Details</th>
<th>Customer details</th>
<th>Order Details</th>
<th>Status</th>
<th>Delivery Address</th>

</tr>
</thead>
<tbody>
<?php

$url="";
If(isset($_GET['page']))
{
$url=$url."&page=".$_GET['page'];
}

If(isset($_GET['pgno']))
{
$url=$url."&pgno=".$_GET['pgno'];
}
while($row=@mysql_fetch_array($result))
{
?>

<tr>
<td><?php echo $row['orderid']; ?></td>
<td>
<?php
if($row['pphoto']=="")
{
?>
<img src="../upload/products/download.png" height="50" width="50" alt=""/>
<?php                                           
}
else {


?>
<img src="../upload/products/<?php echo $row['pphoto']?>" height="50" width="50" alt=""/>
<?php
}
?>
<br/>
<?php echo $row['pname']; ?>
</td>


<td><?php echo $row['cname']."<br/>".$row['cemail']."<br/>".$row['cmobno']; ?></td>

<td><?php echo" Buyed Items :".$row['noofitems']; ?><br/><?php echo " Price :".$row['price']; ?><br/><?php echo " Total Price :".$row['totalprice']; ?></td>

<td><?php echo $row['deliverystatus']; ?><br/><a href="status_productorder.php?oid=<?php echo $row['id']; ?>">Click here to update status..</a></td>
<td><?php echo $row['address']; ?></td>


</tr>

<?php
$i=$i+1;
}
?>




</tbody>
</table>
</div>
</div>

<?php

}
else {
?><br/> 
<br/> 
<br/> 
<br/> 
<div class="alert alert-info alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
No List
</div>                       
<?php
}
?>


</div>
</div>
</div>



<div class="panel-body">
<div class="row">
<?php
if($status=="yes")
{
if($productorder_model->affectedselectedrows($pquery)>$perpage)

{
$pgurl="list_productorder.php?page=productorder";

$table=" orderhistory  ";


$subquery=" order by id desc ";
$result2=$productorder_model->page_select_rows($table,$subquery);
$productorder_model->display_page_numbers($result2,$pgurl,$perpage,$pgno);
}
}
//	
//   
?>
</div>








</div>

</div>
</div>
<!-- End Form Elements -->
</div>
</div>
</div>
<?php

?>
</div>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
</div>

<div class="modal-body">
<p>You are sure want to delete Image.</p>

<p class="debug-url"></p>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<a class="btn btn-danger btn-ok">Delete</a>
</div>
</div>
</div>
</div>

<!-- end wrapper -->

<!-- Core Scripts - Include with every page -->
<script src="assets/plugins/jquery-1.10.2.js"></script>
<script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
<script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="assets/plugins/pace/pace.js"></script>
<script src="assets/scripts/siminta.js"></script>
<script src="js/jquery.validationEngine.js"></script>
<script src="js/jquery.validationEngine-en.js"></script>
<script src="dist/js/lobibox.min.js"></script>
<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>-->
<link rel="stylesheet" href="dist/css/Lobibox.min.css"/>
<script>

$('#confirm-delete').on('show.bs.modal', function(e) {
var link = $(e.relatedTarget);
$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
//$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

// $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
});

</script>
<script type="text/javascript"> 
window.id = '<?php echo $_SESSION['id']; ?>';
function selectbox_subcategory(main_id)
{

if(main_id!="")
{
$("#type").load("controller/productordertype_controller.php?main_id="+main_id);
}
}
$(document).ready(function(){
<?php
$productorder_model->Del_Lobibox();
?>
$("#form").validationEngine({



});


});
</script>
</body>

</html>

<?php

}
else {
header('location: index.html');    
}


ob_flush();
?>