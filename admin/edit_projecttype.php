<?php
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
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
    <?php 
include 'view/project_header.php';
?>
<!-- Form Elements -->
<div class="panel panel-default">
<div class="panel-heading">
Projects-Edit Category
</div>
<div class="panel-body">
<div id="status">
    <?php
    
    //$projecttype_model->action2();
    ?>
    
    
</div>

<div class="row">

<div class="col-lg-6" >
 <?php
                                    if(isset($_GET['id']))
                                    {
                                        $row=$projecttype_model->get_projecttype($_GET['id']);
                                        $row=$projecttype_model->stripslahes_rows($row);
                                    ?>
    <form role="form" id="form" action="controller/projecttype_controller.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $row['id'] ?>"/>
<!--<div class="form-group">
    <div class="alert alert-info"> Wants to add image url? . <a href="image.php">Click Here</a></div>
<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Image Url
</a>
</div>-->
 
        
   
<div class="form-group">
<label>Category*:</label>
<input name="name" type="text" id="name" class="form-control validate[required]" placeholder="category" value="<?php echo $row['name'];?>">
</div>
        
        
            
<!--             <div class="form-group">
<label>Description*:</label>
<textarea name="description" class="form-control validate[required]" rows="20"  id="editor1" placeholder="Description" ><?php echo $row['description'];?></textarea>
</div>-->
<input name="description" type="hidden" id="description" value="<?php  echo $row['description']; ?>" />
   
    <div class="form-group">
                                            <label>Order*:</label>
                                            <select id="num" name="num" class="form-control validate[required]" >
                                                <option value="">select</option>
                                                <?php
                                                $projecttype_model->order_selected($row['num']);
                                                ?>
                                            </select>
                                        </div> 
     
    
<input id="formbutton" name="editprojecttype" type="submit" value="Submit" class="btn btn-primary"/>
<span style="display: none;" id="load"><i class="fa fa-spinner fa-spin"> </i>Saving Data Please wait...</span>

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
          
                var name=encodeURIComponent($('input[name=name]').val()) ;
               var num=$("#num option:selected").val();
                $('input[name=name]').val('') ;
              
                $("#num option").filter(function() {
                if ( $(this).val() == "" ) {

                    return true;
                }
             }).prop('selected', true);
   

      var dataString = 'editprojecttype=editprojecttype&num='+num+'&name='+name+'&id=<?php echo $_GET['id'];?>';
       $('#load').css('display','inline');
      $.ajax({
          
        type: "POST",
        url: "controller/projecttype_controller.php",
        data: dataString,
        success: function (data) {
           var json = $.parseJSON(data);
if(json.status=="yes")
{
     $('#load').css('display','none');
     $('input[name=name]').val(json.name) ;
              
                $("#num option").filter(function() {
                if ( $(this).val() ==json.num ) {

                    return true;
                }
             }).prop('selected', true);
     
    Lobibox.alert('success', {
                    msg: "Success Fully Edited.."
                });
    
}
else
{
    $('#load').css('display','none');
    $('input[name=name]').val(json.name) ;
              
                $("#num option").filter(function() {
                if ( $(this).val() ==json.num ) {

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
    })
    
    
    






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

