<?php
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
$menu_model=new menu_model();
$submenu_model=new submenu_model();

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
Menus-Edit Sub menu
</div>
<div class="panel-body">
<div id="status">
    <?php
    
   // $submenu_model->action2();
    ?>
    
    
</div>

<div class="row">

<div class="col-lg-6" style=" width: 100%;">
 <?php
                                    if(isset($_GET['id']))
                                    {
                                        $row=$submenu_model->get_submenu($_GET['id']);
                                        //$row=$submenu_model->stripslahes_rows($row);
                                    ?>
    <form role="form" id="form" action="controller/submenu_controller.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
<!--<div class="form-group">
    <div class="alert alert-info"> Wants to add image url? . <a href="image.php">Click Here</a></div>
<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Image Url
</a>
</div>-->

        <div class="form-group">
                                            <label>Main Menu:</label>
                                            <select id="type" name="menu" class="form-control validate[required]"  >
                                              
                                                <?php
                                                $menu_model->selectbox_menu($row['menu']);
                                                ?>
                                            </select>
                                        </div>
   
<div class="form-group">
<label>Sub Menu Name*:</label>
<input name="name" type="text" id="name" class="form-control validate[required]" placeholder="Name" value="<?php echo $row['name'];?>">
</div>
        
        
             <div class="form-group">
<label>Description*:</label>
<textarea name="description" class="form-control" rows="20"  id="editor1" data-validation-engine="validate[required]" placeholder="Description" ><?php echo $row['description'];?></textarea>
</div>
    <div class="form-group">
                                            <label>Display*:</label>
                                            <select id="display" name="display" class="form-control" >
                                                <option value="">select</option>
                                                <option value="1" <?php if($row['display']==1){ ?> selected="selected" <?php } ?> >Management</option>
                                              <option value="2" <?php if($row['display']==2){ ?> selected="selected" <?php } ?> >Awards</option>
                                            </select>
                                        </div>
       <div class="form-group">
                                            <label>Order*:</label>
                                            <select id="order" name="num" class="form-control validate[required]" >
                                                <option value="">select</option>
                                                <?php
                                               $menu_model->order_selected($row['num']);
                                                ?>
                                            </select>
                                        </div> 

  
   
     
    
<input id="formbutton" name="editsubmenu" type="submit" value="Submit" class="btn btn-primary"/>

</form>
    
    
          <?php
                                    }
 else {
     ?>
                                    <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                               Invalid page
                            </div>  
      <?php                              
     
 }
 ?>
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
$submenu_model->Lobibox2();
?>

 

 $("#form").validationEngine({
        
        
             
    		});
         
    
    
    

 CKEDITOR.replace( 'editor1', {
filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
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

