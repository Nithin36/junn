<?php
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
$job_model=new job_model();

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
<h1 class="page-header">jobs</h1>
</div>
<!--end page header -->
</div>
<div class="row">
<div class="col-lg-12">
    <?php 
include 'view/job_header.php';
?>
<!-- Form Elements -->
<div class="panel panel-default">
<div class="panel-heading">
jobs-Edit job
</div>
<div class="panel-body">
<div id="status">
    <?php
    
    //$job_model->action2();
    ?>
    
    
</div>

<div class="row">

<div class="col-lg-6" style=" width: 100%;">
 <?php
                                    if(isset($_GET['id']))
                                    {
                                        $row=$job_model->get_job($_GET['id']);
                                        //$row=$job_model->stripslahes_rows($row);
                                    ?>
    <form role="form" id="form" action="controller/job_controller.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $row['id'] ?>"/>
<!--<div class="form-group">
    <div class="alert alert-info"> Wants to add image url? . <a href="image.php">Click Here</a></div>
<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Image Url
</a>
</div>-->
 
        
   
<div class="form-group">
<label>job Name*:</label>
<input name="name" type="text" id="name" class="form-control validate[required]" placeholder="job" value="<?php echo $row['name'];?>">
</div>

<!--<div class="form-group">
<label>job*:</label>
<input name="salary" type="text" id="salary" class="form-control validate[required]" placeholder="Salary" value="<?php echo $row['salary'];?>">
</div>
<div class="form-group">
<label>Job Type*:</label>
<input name="type" type="text" id="type" class="form-control" data-validation-engine="validate[required]" value="<?php echo $row['type'];?>" placeholder="Job Type">
</div>
    <div class="form-group">
<label>Location*:</label>
<input name="location" type="text" id="location" class="form-control" data-validation-engine="validate[required]" value="<?php echo $row['location'];?>"  placeholder="Location">
</div>
      <div class="form-group">
<label>Post Date*:</label>
<input name="pdate" type="text" id="pdate" class="form-control" data-validation-engine="validate[required]" value="<?php echo $row['pdate']; ?>" placeholder="Post Date">
</div>
         <div class="form-group">
<label>Last Date*:</label>
<input name="ldate" data-role="date" type="text" id="ldate" class="form-control" data-validation-engine="validate[required]" value="<?php echo $row['ldate']; ?>" placeholder="Last Date">
</div>
<div class="form-group">
<label>vacancies*:</label>
<select id="vacancies" name="vacancies" class="form-control" data-validation-engine="validate[required]">
<option value="">select</option>
<?php
$job_model->order_selected($row['vacancies']);
?>
</select>
</div>
      <div class="form-group">
<label>Qualification*:</label>
<textarea name="qualification" class="form-control" rows="20"  id="qualification" data-validation-engine="validate[required]" placeholder="Description" ><?php echo $row['description']; ?></textarea>
</div>
       <div class="form-group">
<label>Experience*:</label>
<textarea name="experience" class="form-control" rows="20"  id="experience" data-validation-engine="validate[required]" placeholder="Description" ><?php echo $row['description']; ?></textarea>
</div>
        <div class="form-group">
<label>Key skills*:</label>
<textarea name="keyskill" class="form-control" rows="20"  id="keyskill" data-validation-engine="validate[required]" placeholder="Description" ><?php echo $row['description']; ?></textarea>
</div>-->
        
          <div class="form-group">
<label>Description*:</label>
<textarea name="description" class="form-control" rows="20"  id="editor1" data-validation-engine="validate[required]" placeholder="Description" ><?php echo $row['description']; ?></textarea>
</div> 
            
<!--             <div class="form-group">
<label>Description*:</label>
<textarea name="description" class="form-control validate[required]" rows="20"  id="editor1" placeholder="Description" ><?php echo $row['description'];?></textarea>
</div>-->
<!-- <div class="form-group">
<label>Sub job</label>
<label class="radio-inline">
                                    <input type="radio" name="child" id="optionsRadiosInline1" value="0" <?php if($row['child']==0) { ?> checked="" <?php } ?>>Disabled
</label>
<label class="radio-inline">
    <input type="radio" name="child" id="optionsRadiosInline2" value="1" <?php if($row['child']==1) { ?> checked="" <?php } ?> >Enabled
</label>

</div>-->
   
    <div class="form-group">
                                            <label>Order*:</label>
                                            <select id="order" name="num" class="form-control validate[required]" >
                                                <option value="">select</option>
                                                <?php
                                               $job_model->order_selected($row['num']);
                                                ?>
                                            </select>
                                        </div> 
     
    
<input id="formbutton" name="editjob" type="submit" value="Submit" class="btn btn-primary"/>

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
<script src="js/foundation-datepicker.js"></script>
<script src="js/foundation-datepicker.js"></script>

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
$('#pdate').fdatepicker({
					format: 'dd-mm-yyyy',
					disableDblClickSelection: true
				});
                                $('#ldate').fdatepicker({
					format: 'dd-mm-yyyy',
					disableDblClickSelection: true
				});
window.id = '<?php echo $_SESSION['id']; ?>';
$(document).ready(function(){
<?php
$job_model->Lobibox2();
?>
CKEDITOR.replace( 'editor1', {
filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKEDITOR.replace( 'qualification', {
filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});



CKEDITOR.replace( 'experience', {
filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});


CKEDITOR.replace( 'keyskill', {
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
/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

