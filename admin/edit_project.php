<?php
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
$project_model=new project_model();

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
<h1 class="page-header">Projects</h1>
</div>
<!--end page header -->
</div>
<div class="row">
<div class="col-lg-12">
    <?php 
include 'view/project_header.php';
?>
<!-- Form Elements -->
<div class="panel panel-default">
<div class="panel-heading">
Projects-Edit Project
</div>
<div class="panel-body">
<div id="status">
    <?php
    
    //$project_model->action2();
    ?>
    
    
</div>

<div class="row">

    <div class="col-lg-6" style="width:100%;" >
 <?php
                                    if(isset($_GET['id']))
                                    {
                                        $row=$project_model->get_project($_GET['id']);
                                       // $row=$project_model->stripslahes_rows($row);
                                    ?>
    <form role="form" id="form" action="controller/project_controller.php" method="post" enctype="multipart/form-data">

<!--<div class="form-group">
    <div class="alert alert-info"> Wants to add image url? . <a href="image.php">Click Here</a></div>
<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Image Url
</a>
</div>-->
                <div class="form-group">
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>"/>
<?php
if($row['photo']=="")
{
    ?>
    <img src="../upload/projects/download.png" height="100" width="100" alt=""/>
     <?php                                           
}
 else {
    

?>
    <img src="../upload/projects/<?php echo $row['photo']?>" height="100" width="100" alt=""/>
<?php
 }
?>
</div>
        
   
<div class="form-group">
<label>Project*:</label>
<input name="name" type="text" id="name" class="form-control validate[required]" placeholder="project" value="<?php echo $row['name'];?>">
</div>
        
        
            <div class="form-group">
<label>Client:</label>
<input name="client" type="text" id="client" class="form-control " value="<?php echo $row['client'];?>" placeholder="Client">
</div>
 <div class="form-group">
<label>Location:</label>
<input name="location" type="text" id="location" class="form-control" value="<?php echo $row['location'];?>" placeholder="Location">
</div> 
<!--<div class="form-group">
    <div class="alert alert-info"> Wants to add image url? . <a href="image.php">Click Here</a></div>
<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Image Url
</a>
</div>-->
 <div class="form-group">
                                            <label>Status:</label>
                                            <select id="status" name="status" class="form-control" >
                                                <option value="">select</option>
                                                <option value="Ongoing" <?php if($row['status']=="Ongoing"){ ?>  
                                                        selected="selected"
                                                        <?php
                                                }
                                                        ?>
                                                        >Ongoing</option>
                                                <option value="Completed"
                                                        <?php if($row['status']=="Completed"){ ?>  
                                                        selected="selected"
                                                        <?php
                                                }
                                                        ?>
                                                        >Completed</option>
                                              
                                            </select>
                                        </div>
          <div class="form-group">
<label>Description*:</label>
<textarea name="description" class="form-control" rows="20"  id="editor1" data-validation-engine="validate[required]" placeholder="Description" >
    
<?php echo $row['description'];?>
</textarea>
</div>

        <div class="form-group">
<label> Project Photo (should be 590 px * 320 px ):</label>
 <input type="file" name="file[]" class=""  id="img"/>
</div>
    <div class="form-group">
                                            <label>Order*:</label>
                                            <select id="order" name="num" class="form-control validate[required]" >
                                                <option value="">select</option>
                                                <?php
                                                $project_model->order_selected($row['num']);
                                                ?>
                                            </select>
                                        </div> 
     
    
<input id="formbutton" name="editproject" type="submit" value="Submit" class="btn btn-primary"/>

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
CKEDITOR.replace( 'editor1', {
filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
<?php
$project_model->Lobibox2();
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

