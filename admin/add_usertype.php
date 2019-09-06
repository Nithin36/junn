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
<h1 class="page-header">Product Settings</h1>
</div>
<!--end page header -->
</div>
<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<?php 
include 'view/productsettings_header.php';
?>
<div class="panel panel-default">
<div class="panel-heading">
User Types-Add User Type
</div>
<div class="panel-body">
<div id="status">
<?php

// $producttype_model->action();
?>


</div>

<div class="row">


<div class="col-lg-6" style=" width: 100%;" >

<form role="form" id="form" action="controller/usertype_controller.php" method="post" enctype="multipart/form-data">


<div class="form-group">
<label>Usertype Name*:</label>
<input name="name" type="text" id="name" class="form-control" data-validation-engine="validate[required]" placeholder="usertype Name">
</div>


        <div class="form-group">
<label>usertype Icon (should be 270*393 px ):</label>
 <input type="file" name="file[]"  id="image_file" >
 
</div>

<input id="formbutton" name="addusertype" type="submit" value="Submit" class="btn btn-primary"/>

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
$producttype_model->Lobibox();
?>

CKEDITOR.replace( 'editor1', {
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

