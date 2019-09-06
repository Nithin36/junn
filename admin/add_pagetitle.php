<?php
ob_start();
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
//    require_once "model/pagetitle_model.php";
//     require_once "model/category_model.php";
//      require_once "model/district_model.php";
$pagetitle_model=new pagetitle_model();

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
<h1 class="page-header">Seo </h1>
</div>
<!--end page header -->
</div>
<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<?php 
include 'view/pagetitle_header.php';
?>
<div class="panel panel-default">
<div class="panel-heading">
Seo >> Page Title-Add  Page Title
</div>
<div class="panel-body">
<div id="status">
<?php

// $pagetitle_model->action();
?>


</div>

<div class="row">


<div class="col-lg-6"  >
<div class="alert alert-info">
                               Would like to add page description to the any Page of the site?
GO TO WEB SITE then copy and paste the url of the page to the url text field, Then set title,keywords, Meta Description of that Page.
                            </div>
<form role="form" id="form" action="controller/pagetitle_controller.php" method="post" enctype="multipart/form-data">


<div class="form-group">
<label>Title*:</label>
<input name="title" type="text" id="name" class="form-control validate[required]"  placeholder="Title">
</div>
<div class="form-group">
<label>Keyword*:</label>
<textarea name="keyword" id="keyword"  class="form-control validate[required]"  placeholder="Keywords" rows="10"></textarea>
</div>
<div class="form-group">
<label>Description*:</label>
<textarea name="description" id="description" class="form-control validate[required]"  placeholder="Description" rows="10"></textarea>
</div>
    <div class="form-group">
<label>Page url*:</label>
<textarea name="pageurl" id="pageurl" class="form-control validate[required]"  placeholder="PageUrl" rows="2"></textarea>
</div>




<input id="formbutton" name="addpagetitle" type="submit" value="Submit" class="btn btn-primary"/>

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
$pagetitle_model->Lobibox();
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

