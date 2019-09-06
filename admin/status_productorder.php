<?php

ob_start();

session_start();

if(isset($_SESSION['id']))

{



function __autoload($class_name) 

{

require_once "model/".$class_name.".php";



}

//    require_once "model/producttype_model.php";

//     require_once "model/category_model.php";

//      require_once "model/district_model.php";

$ordersstatus_model=new ordersstatus_model();
$orderhistory_model =new orderhistory_model();
//echo $_GET['oid'];
$row=$orderhistory_model->get_orderhistory($_GET['oid']);


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

Product Orders-Update Product Order status

</div>

<div class="panel-body">

<div id="status">

<?php



// $producttype_model->action();

?>





</div>



<div class="row">





<div class="col-lg-4" >


<div class="alert alert-info">
When you update the status. Notification mail sent to the customer..
</div>
<form role="form" id="form" action="controller/productorder_controller.php" method="post" enctype="multipart/form-data">
<input name="id" type="hidden"   value="<?php echo $row['id']; ?>">
<div class="form-group">

<label>Order id*:</label> <label><?php echo $row['orderid'] ?></label>



</div>
<div class="form-group">

<label>Order Status*:</label>

<select id="status" name="status" class="form-control validate[required]" >

<?php

$ordersstatus_model->selectbox_ordersstatus($row['status']);

?>

</select>

</div>
<div class="form-group">

<label>Courier no*:</label>

<input name="courierno" type="text" id="courierno" class="form-control" value="<?php echo $row['courierno']; ?>" placeholder="Courier no">

</div>

<div class="form-group">

<label>Track Id*:</label>

<input name="trackid" type="text" id="trackid" class="form-control" value="<?php echo $row['trackid']; ?>" placeholder="Track Id">

</div>




<input id="formbutton" name="updatestatus" type="submit" value="Submit" class="btn btn-primary"/>



</form>

</div>













</div>

</div>

</div>

<!-- End Form Elements -->

</div>

</div>











</div>



</div>

</div>

</div>

</div>



<!-- end wrapper -->



<!-- Core Scripts - Include with every page -->

<script src="assets/plugins/jquery-1.10.2.js"></script>

<!--     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> -->

<script src="assets/plugins/bootstrap/bootstrap.min.js"></script>

<script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

<script src="assets/plugins/pace/pace.js"></script>

<script src="assets/scripts/siminta.js"></script>

<script src="js/jquery.validationEngine.js"></script>

<script src="js/jquery.validationEngine-en.js"></script>

<script src="ckeditor/ckeditor.js"></script>



<!--<script src="js/jquery.form.js"></script>-->



<script>

// Replace the <textarea id="editor1"> with a CKEditor

// instance, using default configuration.

// CKEDITOR.replace( 'editor1' );

</script>

<script src="dist/js/lobibox.min.js"></script>

<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>-->

<link rel="stylesheet" href="dist/css/Lobibox.min.css"/>

<script type="text/javascript"> 



window.id = '<?php echo $_SESSION['id']; ?>';

$(document).ready(function(){



<?php

$orderhistory_model->update_Lobibox();

?>









$("#form").validationEngine({});

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

/* 

* To change this license header, choose License Headers in Project Properties.

* To change this template file, choose Tools | Templates

* and open the template in the editor.

*/



