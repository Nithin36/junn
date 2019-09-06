<?php
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
$product_model=new product_model();
$producttype_model=new producttype_model();
$mainproducttype_model=new mainproducttype_model();        
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
<h1 class="page-header">Products</h1>
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
Products-Manage product Photos
</div>
<div class="panel-body">



<div class="panel-body">
<div class="row">
<div class="panel-body">

<?php
$nsql="";

if(isset($_POST['searchname']))
{

$nsql=" where product.name like '".trim($_POST['searchname'])."%'";
}
else  if(isset ($_GET['searchname']))
{

$_POST['searchname']=$_GET['searchname'];
$nsql=" where product.name like '".trim($_POST['searchname'])."%'";
}



$perpage=10;
$pgno = 1;
if(isset($_GET["pgno"])){
$pgno = intval($_GET["pgno"]);
}

$start=$product_model->start_page($pgno,$perpage);
$i=1;

 $pquery=" select product.*,(select noofitems from productsize where product_id=product.id) as noofitems, (select sum(productorder.noofitems) from productorder  where productorder.productid=product.id and productorder.orderstatus=1 and productorder.outofstock=0 ) as solditems from product ".$nsql."  order by num  ";
$result=$product_model->execute_pagenation_join_query($start,$perpage,$pquery);
$status="yes";
if($product_model->affectedselectedrows($pquery)==0)
{
$status="no";
}
if($status=="yes")
{
?>

<div class="table-responsive">
<div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
<div class="row">
    <form method="post" action="">   
<div class="col-sm-4"></div>
<div class="col-sm-4"><div id="dataTables-example_filter" class="dataTables_filter pull-right">
        <label>Search:<input type="text" class="form-control input-sm" name="searchname" placeholder="Name" aria-controls="dataTables-example"></label>
</div></div>
<div class="col-sm-4"><input type="submit" class="btn btn-outline btn-primary " name="search" value="submit"/>
              <?php
                                                
                                    if(isset($_POST['searchname']))
                                    {
                                        ?>
    <br/>
                                    <a href="list_product.php">List all Products</a><br/><br/><br/>
                                    <?php
                                       
                                    }
                                    else  if(isset ($_GET['searchname']))
                                    {
                                         ?>
                                    <br/>
                                   <a href="list_product.php">List all Products</a><br/><br/><br/>
                                    <?php
                                       
                                    }
                                            
                                            ?>
</div>
</form>
</div>
<table class="table table-striped table-bordered table-hover"  >
<thead>
<tr>
<th>#</th>
<th>Order</th>

<th>Name</th>
<th>Photo</th>
<th>No of Items</th>
<th>Sold Items</th>

<th><a href="" class="btn btn-warning">Status</a></th> 
<th><a href="" class="btn btn-default">Edit</a></th>
<th><a href="" class="btn btn-danger">Delete</a></th>
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
<td><?php echo $i;?></td>
<td><?php echo $row['num']; ?></td>

<td><?php echo $row['name']; ?></td>

<td>
<?php
if($row['photo']=="")
{
?>
<img src="../upload/products/download.png" height="50" width="50" alt=""/>
<?php                                           
}
else {


?>
<img src="../upload/products/<?php echo $row['photo']?>" height="50" width="50" alt=""/>
<?php
}
?>
</td>

<td><?php echo $row['noofitems'] ; ?></td>
<td><?php if($row['solditems']==null) echo "0"; else echo $row['solditems'] ; ?></td>
<td><?php if($row['status']==0) echo "Un publish"; else   echo "Publish"; ?></td>

<td><a href="edit_product.php?id=<?php echo $row['id'].$url; ?>" class="btn btn-default">Edit</a></td>
<td><a href="#" data-href="controller/product_controller.php?del_id=<?php echo $row['id'].$url; ?>" class="btn btn-danger" data-toggle="modal"  data-target="#confirm-delete">Delete</a></td>
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
if($product_model->affectedselectedrows($pquery)>$perpage)

{
                   if(isset($_POST['searchname']))
          {
               $pgurl="list_product.php?page=product&searchname=".$_POST['searchname'];
               $table=" product   ".$nsql;


			$subquery=" order by num  ";
          }
 else {
             $pgurl="list_product.php?page=product";

$table=" product   ";


$subquery="order by num ";
 }



$result2=$product_model->page_select_rows($table,$subquery);
$product_model->display_page_numbers($result2,$pgurl,$perpage,$pgno);
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
$("#type").load("controller/producttype_controller.php?main_id="+main_id);
}
}
$(document).ready(function(){
<?php
$product_model->Del_Lobibox();
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
/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

