<?php
ob_start();
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
//    require_once "model/slider_model.php";
//     require_once "model/category_model.php";
//      require_once "model/district_model.php";
$slider_model=new slider_model();

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
<h1 class="page-header">Sliders</h1>
</div>
<!--end page header -->
</div>
<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<?php 
include 'view/slider_header.php';
?>
<div class="panel panel-default">
<div class="panel-heading">
Sliders-Add Slider
</div>
<div class="panel-body">
<div id="status">
    <?php
    
    //$slider_model->action();
    ?>
    
    
</div>

<div class="row">

<div class="col-lg-6"   >

    <form role="form" id="form" action="controller/slider_controller.php" method="post" enctype="multipart/form-data" >
        
        
     <div class="form-group">
<label>Slider Name *:</label>
<input name="name" type="text" id="name" class="form-control validate[required]"  placeholder="slider">
</div>
        
        <input type="hidden" name="title2" value="s"/>
        <input type="hidden" name="title3" value="s"/>
      <div class="form-group">
        <label>Title1 *:</label>
<input name="title1" type="text" id="title1" class="form-control "  placeholder="Title1">
</div>
           <!--      <div class="form-group">
        <label>Title2 *:</label>
<input name="title2" type="text" id="title2" class="form-control "  placeholder="Title2">
</div>
               <div class="form-group">
        <label>Title3 *:</label>
<input name="title3" type="text" id="title3" class="form-control "  placeholder="Title3">
</div>-->
<!--<div class="form-group">
    <div class="alert alert-info"> Wants to add image url? . <a href="image.php">Click Here</a></div>
<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Image Url
</a>
</div>-->
        
        

        <div class="form-group">
<label> Main Slider Photo (should be 1400 * 730 px ):</label>
 <input type="file" name="file" class="validate[required]"   id="image_file" >
 
</div>
     <div class="form-group">
<label> Sub Slider Photo (should be 309 * 437 px ):</label>
 <input type="file" name="file2"   id="image_file2" >
 
</div>

  <div class="form-group">
<label>Description:</label>
<textarea name="description" id="description" class="form-control "  placeholder="Description" rows="10"></textarea>
</div>
  
    <div class="form-group">
<label>Read More link:</label>
<textarea name="readmore" id="readmore" class="form-control"  placeholder="PageUrl" rows="2"></textarea>
</div>  
     <div class="form-group">
                                            <label>Order*:</label>
                                            <select id="order" name="num" class="form-control validate[required]" >
                                                <option value="">select</option>
                                                <?php
                                                $slider_model->order();
                                                ?>
                                            </select>
                                        </div>
    
<input id="formbutton" name="addslider" type="submit" value="Submit" class="btn btn-primary"/>

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
$slider_model->Lobibox();
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
/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

