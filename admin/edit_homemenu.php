<?php
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
$menu_model=new menu_model();
$homemenu_model=new homemenu_model();

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
<h1 class="page-header">Menus</h1>
</div>
<!--end page header -->
</div>
<div class="row">
<div class="col-lg-12">
    <?php 
include 'view/menu_header.php';
?>
<!-- Form Elements -->
<div class="panel panel-default">
<div class="panel-heading">
Menus-Edit Home Menu
</div>
<div class="panel-body">
<div id="status">
    <?php
    
   // $homemenu_model->action2();
    ?>
    
    
</div>

<div class="row">

<div class="col-lg-6">
 <?php
                                   
                                        $row=$homemenu_model->get_homemenu(1);
                                        $row=$homemenu_model->stripslahes_rows($row);
                                    ?>
    <form role="form" id="form" action="controller/homemenu_controller.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        
<!--<div class="form-group">
    <div class="alert alert-info"> Wants to add image url? . <a href="image.php">Click Here</a></div>
<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Image Url
</a>
</div>-->
<div class="form-group">
<label>Home Title1*:</label>
<input name="title1" type="text" id="title1" class="form-control validate[required]" placeholder="Home Title1" value="<?php echo $row['title1'];?>">
</div>

<!--<div class="form-group">
<label>Home Title2*:</label>
<input name="title2" type="text" id="title2" class="form-control validate[required]" placeholder="Home Title2" value="<?php echo $row['title2'];?>">
</div>-->
<input name="name" type="hidden" id="name" class="form-control " placeholder="product" value="<?php echo $row['name'];?>">     
    <div class="form-group">
<label>Read More Link*:</label>
<input name="readmore" type="text" id="readmore" class="form-control validate[required]" placeholder="product" value="<?php echo $row['readmore'];?>">
</div>    
             <div class="form-group">
<label>Description*:</label>
<textarea name="description" class="form-control" rows="10"  id="editor1" data-validation-engine="validate[required]" placeholder="Description" ><?php echo $row['description'];?></textarea>
</div>
<input name="title2" type="hidden" value="<?php echo $row['title2'];?>">
<!--            <div class="form-group">
<label>Photo gallery Description*:</label>
<textarea name="title2" class="form-control" rows="10"  id="title2" data-validation-engine="validate[required]" placeholder="Photo gallery Description" ><?php echo $row['title2'];?></textarea>
</div>-->

  
   
     
    
<input id="formbutton" name="edithomemenu" type="submit" value="Submit" class="btn btn-primary"/>

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
$homemenu_model->Lobibox2();
?>

 

 $("#form").validationEngine({
        
        
             
    		});
         
    
    
    
//
// CKEDITOR.replace( 'editor1', {
//filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
//filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
//filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
//filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
//filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
//filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
//});




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

