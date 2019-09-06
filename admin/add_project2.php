<?php
ob_start();
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
//    require_once "model/project_model.php";
//     require_once "model/category_model.php";
//      require_once "model/district_model.php";
$project2_model=new project2_model();
$projecttype_model=new projecttype_model();

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
<!-- Form Elements -->
<?php 
include 'view/project_header.php';
?>
<div class="panel panel-default">
<div class="panel-heading">
Projects-Add Project
</div>
<div class="panel-body">
<div id="status">
    <?php
    
    //$project_model->action();
    ?>
    
    
</div>

<div class="row">

<div class="col-lg-6" style=" width: 100%;"  >

    <form role="form" id="form" action="controller/project_controller.php" method="post" enctype="multipart/form-data" >
        
            
     <div class="form-group">
                                            <label>Category*:</label>
                                            <select id="projecttype" name="projecttype" class="form-control" data-validation-engine="validate[required]"  >
                                                <option value="">select</option>
                                                <?php
                                                $projecttype_model->selectbox_projecttype('all');
                                                ?>
                                            </select>
                                        </div>
    
     <div class="form-group">
<label>Project*:</label>
<input name="name" type="text" id="name" class="form-control"  data-validation-engine="validate[required]" placeholder="Project">
</div>
            <div class="form-group">
<label>Client:</label>
<input name="client" type="text" id="client" class="form-control " data-validation-engine="validate[required]" placeholder="Client">
</div>   

    <div class="form-group">
<label>Plant:</label>
<input name="plant" type="text" id="Plant" class="form-control " data-validation-engine="validate[required]" placeholder="Plant">
</div>   
        
<!--<div class="form-group">
    <div class="alert alert-info"> Wants to add image url? . <a href="image.php">Click Here</a></div>
<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Image Url
</a>
</div>-->
     <div class="form-group">
                                            <label>Status:</label>
                                            <select id="stat" name="status" class="form-control" data-validation-engine="validate[required]" >
                                                <option value="">select</option>
                                                <option value="Ongoing">Ongoing</option>
                                                <option value="Completed">Completed</option>
                                              
                                            </select>
                                        </div>
         
    
     <div class="form-group">
                                            <label>Order*:</label>
                                            <select id="num" name="num" class="form-control" data-validation-engine="validate[required]"  >
                                                <option value="">select</option>
                                                <?php
                                                $project2_model->order();
                                                ?>
                                            </select>
                                        </div>
    
<input id="formbutton" name="addproject" type="submit" value="Submit" class="btn btn-primary"/>
<span style="display: none;" id="load"><i class="fa fa-spinner fa-spin"> </i>Saving Data Please wait...</span>

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


 $("#form").validationEngine({
        
        
             
    		});
                           $('#formbutton').click(function(e){
         e.preventDefault();

         //if invalid do nothing
         if(!$("#form").validationEngine('validate')){
         return false;
          }
          else
          {  
           
               var name=encodeURIComponent($('input[name=name]').val());
               var client=encodeURIComponent($('input[name=client]').val());
               var plant=encodeURIComponent($('input[name=plant]').val()) ;
               var status=$("#stat option:selected").val();
               
               var num=$("#num option:selected").val();
               var projecttype=$("#projecttype option:selected").val();
                $('input[name=name]').val('') ;
               $('input[name=client]').val('') ;
                $('input[name=plant]').val('') ;
              
                $("#num option").filter(function() {
           if ( $(this).val() == "" ) {
               return true;
            }
         }).prop('selected', true);
         
            $("#stat option").filter(function() {
           if ( $(this).val() == "" ) {
               return true;
            }
         }).prop('selected', true);
            $("#projecttype option").filter(function() {
           if ( $(this).val() == "" ) {
               return true;
            }
         }).prop('selected', true);

      var dataString = 'addproject=addproject&num='+num+'&name='+name+'&plant='+plant+'&status='+status+'&projecttype='+projecttype+'&client='+client;
      $('#load').css('display','inline');
      $.ajax({
          
        type: "POST",
        url: "controller/project2_controller.php",
        data: dataString,
        success: function (data) {
           var json = $.parseJSON(data);
if(json.status=="yes")
{
    $('#load').css('display','none');
   
  
       Lobibox.alert('success', {
                    msg: "Success Fully Added.."
                });
    
}
else
{
    $('#load').css('display','none');
      $('input[name=name]').val('') ;
      $('input[name=client]').val('') ;
               
                $('input[name=plant]').val('') ;
              
                $("#num option").filter(function() {
           if ( $(this).val() == "" ) {
               return true;
            }
         }).prop('selected', true);
         
            $("#stat option").filter(function() {
           if ( $(this).val() == "" ) {
               return true;
            }
         }).prop('selected', true);
            $("#projecttype option").filter(function() {
           if ( $(this).val() == "" ) {
               return true;
            }
         }).prop('selected', true);

     
     Lobibox.alert('error', {
                    msg: "  Try After Some Time.."
                });
}
          }
          ,
	error: function() 
		{
		}
      });
      return false;
  }
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

