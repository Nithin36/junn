<?php
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
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
    <?php 
include 'view/slider_header.php';
?>
<!-- Form Elements -->
<div class="panel panel-default">
<div class="panel-heading">
Sliders-Edit Slider
</div>
<div class="panel-body">
<div id="status">
    <?php
    
    //$slider_model->action2();
    ?>
    
    
</div>

<div class="row">

<div class="col-lg-6"  >
 <?php
                                    if(isset($_GET['id']))
                                    {
                                        $row=$slider_model->get_slider($_GET['id']);
                                        $row=$slider_model->stripslahes_rows($row);
                                    ?>
    <form role="form" id="form" action="controller/slider_controller.php" method="post" enctype="multipart/form-data">

<!--<div class="form-group">
    <div class="alert alert-info"> Wants to add image url? . <a href="image.php">Click Here</a></div>
<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Image Url
</a>
</div>-->
                <div class="form-group">
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>"/>
    <label>Main Slider Photo:</label>
<?php
if($row['photo']=="")
{
    ?>
    <img src="../upload/sliders/download.png" height="100" width="100" alt=""/>
     <?php                                           
}
 else {
    

?>
    <img src="../upload/sliders/thumb/<?php echo $row['photo']?>" height="100" width="100" alt=""/>
<?php
 }
?>
</div>
        
        <div class="form-group">
            <label>&nbsp;Sub Slider Photo:</label>
<?php
if($row['photo2']=="")
{
    ?>
    <img src="../upload/sliders2/download.png" height="100" width="100" alt=""/>
     <?php                                           
}
 else {
    

?>
    <img src="../upload/sliders2/<?php echo $row['photo2']?>" height="100" width="100" alt=""/>
<?php
 }
?>
</div>
<div class="form-group">
<label>Slider Name*:</label>
<input name="name" type="text" id="name" class="form-control validate[required]" placeholder="slider" value="<?php echo $row['name'];?>">
</div>
        
      <div class="form-group">
        <label>Title1 *:</label>
        <input name="title1" type="text" id="title1" value="<?php echo $row['title1'];?>" class="form-control "  placeholder="Title1">
</div>
        <input type="hidden" name="title2" value="s"/>
        <input type="hidden" name="title3" value="s"/>
     

        <div class="form-group">
<label> Main slider Photo (should be 1400 * 730 px ):</label>
 <input type="file" name="file" class=""  id="img"/>
</div>
        <div class="form-group">
<label> Sub slider Photo (should be 309 * 437 px ):</label>
 <input type="file" name="file2" class=""  id="img"/>
</div>
<!--<input type="hidden" name="description" value="s"/>
<input type="hidden" name="readmore" value="s"/>
<input type="hidden" name="description" value="s"/>-->
<div class="form-group">
<label>Description:</label>
<textarea name="description" id="description" class="form-control "  placeholder="Description" rows="10"><?php echo $row['description'];?></textarea>
</div>
     <div class="form-group">
<label>Read More link:</label>
<textarea name="readmore" id="readmore" class="form-control"  placeholder="PageUrl" rows="2"><?php echo $row['readmore'];?></textarea>
</div> 
    <div class="form-group">
                                            <label>Order*:</label>
                                            <select id="order" name="num" class="form-control validate[required]" >
                                                <option value="">select</option>
                                                <?php
                                                $slider_model->order_selected($row['num']);
                                                ?>
                                            </select>
                                        </div> 
     
    
<input id="formbutton" name="editslider" type="submit" value="Submit" class="btn btn-primary"/>

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
$slider_model->Lobibox2();
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

