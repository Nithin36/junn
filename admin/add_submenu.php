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
$submenu_model=new submenu_model();
$menu_model=new menu_model();

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
<!-- Form Elements -->
<?php 
include 'view/menu_header.php';
?>
<div class="panel panel-default">
<div class="panel-heading">
Menus-Add Sub Menu
</div>
<div class="panel-body">
<div id="status">
    <?php
    
    //$submenu_model->action();
    ?>
    
    
</div>

<div class="row">

<div class="col-lg-6" style=" width: 100%;" >

    <form role="form" id="form" action="controller/submenu_controller.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
                                            <label>Main Menu:</label>
                                            <select id="type" name="menu" class="form-control " data-validation-engine="validate[required]"onchange="view_people(this.value)" >
                                              
                                                <?php
                                                $menu_model->selectbox_menu('all');
                                                ?>
                                            </select>
                                        </div>
        
     <div class="form-group">
<label>Sub Menu Name*:</label>
<input name="name" type="text" id="name" class="form-control " data-validation-engine="validate[required]"  placeholder="Sub Menu Name">
</div>
<!--<div class="form-group">
    <div class="alert alert-info"> Wants to add image url? . <a href="image.php">Click Here</a></div>
<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Image Url
</a>
</div>-->
        
            <div class="form-group">
<label>Description*:</label>
<textarea name="description" class="form-control" rows="20"  id="editor1" data-validation-engine="validate[required]" placeholder="Description" ></textarea>
</div>
  <div class="form-group">
                                            <label>Display*:</label>
                                            <select id="display" name="display" class="form-control" >
                                                <option value="">select</option>
                                              <option value="1">Management</option>
                                              <option value="2">Awards</option>
                                            </select>
                                        </div>
       <div class="form-group">
                                            <label>Order*:</label>
                                            <select id="order" name="num" class="form-control " data-validation-engine="validate[required]" >
                                                <option value="">select</option>
                                                <?php
                                               $menu_model->order();
                                                ?>
                                            </select>
                                        </div>
    
    
<input id="formbutton" name="addsubmenu" type="submit" value="Submit" class="btn btn-primary"/>

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
$submenu_model->Lobibox();
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

