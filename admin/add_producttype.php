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
Products-Add Sub Category
</div>
<div class="panel-body">
<div id="status">
<?php

// $producttype_model->action();
?>


</div>

<div class="row">


<div class="col-lg-6"  >

<form role="form" id="form" action="controller/producttype_controller.php" method="post" enctype="multipart/form-data">

<div class="form-group">
                                            <label>Category*:</label>
                                            <select id="main_id" name="main_id" class="form-control validate[required]" >
                                               
                                                <?php
                                                $mainproducttype_model->selectbox_mainproducttype('all');
                                                ?>
                                            </select>
                                        </div> 
<div class="form-group">
<label>Sub Category *:</label>
<input name="name" type="text" id="name" class="form-control validate[required]"  placeholder="Sub Category">
</div>


<input name="description" type="hidden" id="name" value="p">

<div class="form-group">
<label>Order*:</label>
<select id="order" name="num" class="form-control validate[required]" >
<option value="">select</option>
<?php
$producttype_model->order();
?>
</select>
</div>

<input id="formbutton" name="addproducttype" type="submit" value="Submit" class="btn btn-primary"/>

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
<!--<script src="ckeditor/ckeditor.js"></script>-->

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
$producttype_model->Lobibox();
?>

//CKEDITOR.replace( 'editor1', {
//filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
//filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
//filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
//filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
//filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
//filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
//});



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
/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

