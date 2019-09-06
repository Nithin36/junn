<?php
ob_start();
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
//    require_once "model/product_model.php";
//     require_once "model/category_model.php";
//      require_once "model/district_model.php";
$product_model=new product_model();
$producttype_model=new producttype_model();
$mainproducttype_model=new mainproducttype_model();
$category_model=new category_model();
$brand_model=new brand_model();
$usertype_model=new usertype_model();
$sizename_model=new sizename_model();
$sizeunit_model=new sizeunit_model();
$fragrance_model=new fragrance_model();



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
products-Add product
</div>
<div class="panel-body">
<div id="status">
<?php

//$product_model->action();
?>


</div>

<div class="row">

<div class="col-lg-12"  >

<form role="form" id="form" action="controller/product_controller.php" method="post" enctype="multipart/form-data" >
<!--        <input type="hidden" id="x1" name="x1" />
<input type="hidden" id="y1" name="y1" />
<input type="hidden" id="x2" name="x2" />
<input type="hidden" id="y2" name="y2" />
<input type="hidden" id="w" name="w" />
<input type="hidden" id="h" name="h" />-->
<div class="col-md-12">
<div class="form-group col-md-3">
<label>User Type*:</label>
<select id="usertype" name="usertype" class="form-control " data-validation-engine="validate[required]" >

<?php
     $usertype_model->selectbox_usertype("all");
?>
</select>
</div> 
<div class="form-group col-md-3">
<label>Category<br/>(use ctrl key to multiple select )*:</label>
<select multiple id="category" name="category[]" data-validation-engine="validate[required]" class="form-control" >

<?php
$category_model->selectbox_childcategory("all");

?>
</select>
</div> 

<div class="form-group col-md-3">
<label>Brand*:</label>
<select id="brand" name="brand" class="form-control "  >

<?php
     $brand_model->selectbox_brand("all");
?>
</select>
</div> 

<div class="form-group col-md-3">
<label>Fragrance*:</label>
<select id="fragrance" name="fragrance" class="form-control "  >

<?php
     $fragrance_model->selectbox_fragrance("all");
?>
</select>
</div> 
</div>



<div class="col-md-12">
<div class="form-group col-md-4">
<label>Product Title*:</label>
<input name="name" type="text" id="name" class="form-control " data-validation-engine="validate[required]" placeholder="Product Title">
</div>
<div class="form-group col-md-4">
<label>Order*:</label>
<select id="order" name="num" data-validation-engine="validate[required]" class="form-control" >
<option value="">select</option>
<?php
$producttype_model->order();
?>
</select>
</div>
<div class="form-group col-md-4">
<label>Publish*:</label>
<select id="status" name="status" data-validation-engine="validate[required]" class="form-control " >
<option value="">select</option>
 <option value="0">Unpublish</option>
  <option value="1">Publish</option>

</select>
</div>
</div>


<div class="col-md-12">
<input type="hidden" name="sname" value="nill"/>


<div class="form-group col-md-2">
<label>Quantity*:</label>
<input name="squantity" type="text" id="squantity" class="form-control " data-validation-engine="validate[required,custom[number]]" placeholder="Quantity">
</div>

<div class="form-group col-md-2">
<label>Size Unit*:</label>
<select id="sunit" name="sunit" data-validation-engine="validate[required]" class="form-control" >

<?php
$sizeunit_model->selectbox_sizeunit('all');
?>
</select>
</div>

<div class="form-group col-md-2">
<label>No of items*:</label>
<input name="noofitems" type="text" id="noofitems" class="form-control " data-validation-engine="validate[required,custom[onlyNumberSp]]" placeholder="No of items">
</div>


<div class="form-group col-md-2">
<label>Marked Price*:</label>
<input name="sprice" type="text" id="sprice" class="form-control " data-validation-engine="validate[required,custom[onlyNumberSp]" placeholder="Price">
</div>

<div class="form-group col-md-2">
<label>Online Price*:</label>
<input name="soprice" type="text" id="soprice" class="form-control " data-validation-engine="validate[required,custom[onlyNumberSp]" placeholder="Online Price">
</div>
</div>

<div class="col-md-12">
<div class="form-group col-md-12">
<label>Description*:</label>
<textarea name="description" class="form-control" rows="20"  id="editor1" data-validation-engine="validate[required]" placeholder="Description" ></textarea>
</div>
<div class="form-group col-md-12">
<label> Ingredients (optional):</label>
<textarea name="ingredients" class="form-control" rows="20"  id="editor2"  placeholder="Ingredients" ></textarea>
</div>
<div class="form-group col-md-12">
<label>How to use (optional):</label>
<textarea name="howtouse" class="form-control" rows="20"  id="editor3" placeholder="How to use" ></textarea>
</div>
</div>



<div class="form-group">
<label>Product Photo (height should be 234 px and width should be 234 px) *:</label>

<input type="file" name="file[]" data-validation-engine="validate[required,custom[validateMIME[image/jpeg]]]"  id="image_file">

</div>


<input id="formbutton" name="addproduct" type="submit" value="Submit" class="btn btn-primary"/>

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

<!--    <script src="js/jquery.Jcrop.min.js"></script>-->
<script src="js/script.js"></script>
<script type="text/javascript"> 




window.id = '<?php echo $_SESSION['id']; ?>';
$(document).ready(function(){


<?php
$product_model->Lobibox();
?>
CKEDITOR.replace( 'editor1', {
filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});

CKEDITOR.replace( 'editor2', {
filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKEDITOR.replace( 'editor3', {
filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
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

