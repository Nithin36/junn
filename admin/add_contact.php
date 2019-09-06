<?php
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
$login_model=new login_model();
$contact_model=new contact_model();
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
<h1 class="page-header">Contacts</h1>
</div>
<!--end page header -->
</div>
<div class="row">
<div class="col-lg-12">
                       <?php 
include 'view/contact_header.php';
?>
<!-- Form Elements -->
<div class="panel panel-default">
<div class="panel-heading">
Add-Address
</div>
<div class="panel-body">
<div id="status">
</div>

<div class="row">

<div class="col-lg-6" >

<form role="form" id="form" action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Name</label>
<input name="name" type="text" id="name" class="form-control" data-validation-engine="validate[required]"  placeholder="Name">
</div>
<div class="form-group">
<label>Address</label>
<textarea name="address" id="address" class="form-control " data-validation-engine="validate[required]" rows="5" cols="5" placeholder="Address"  ></textarea>
</div>
 <div class="form-group">
<label>Email</label>
<input name="email" type="text" id="email" class="form-control validate[required,custom[email]]" placeholder="Email">
</div>
     <div class="form-group">
<label>Telephone No:</label>
<input name="telno" type="text" id="telno" class="form-control" data-validation-engine="validate[required]" placeholder="Telephone No">
</div>

        <div class="form-group">
<label>Mobile No:</label>
<input name="mobno" type="text" id="mobno" class="form-control " placeholder="Mobile No">
</div>
    
          <div class="form-group">
<label>Fax No:</label>
<input name="faxno" type="text" id="faxno" class="form-control" placeholder="Fax No">
</div>
           <div class="form-group">
<label>Web site:</label>
<input name="website" type="text" id="website" class="form-control" placeholder="Web Site">
</div>
    
             <div class="form-group">

<label>Order*:</label>
                                            <select id="num" name="num" class="form-control"  data-validation-engine="validate[required]">
                                                <option value="">select</option>
                                                <?php
                                               $contact_model->order();
                                                ?>
                                            </select>
</div>
    
<input id="formbutton" name="editaboutus" type="submit" value="Submit" class="btn btn-primary"/>
<button type="reset" class="btn btn-success">Reset </button>

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

<script src="dist/js/lobibox.min.js"></script>
<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>-->
<link rel="stylesheet" href="dist/css/Lobibox.min.css"/>
<script>
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
// CKEDITOR.replace( 'editor1' );
</script>
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
               var name=$('input[name=name]').val() ;
 var mobno=$('input[name=mobno]').val() ;
    var faxno=$('input[name=faxno]').val() ;
   var telno= $('input[name=telno]').val() ;
    var email= $('input[name=email]').val() ;
    var website= $('input[name=website]').val() ;
    var num=$("#num option:selected").val();
   
var address=$('textarea#address').val();
      //var dataString = 'addcontact=addcontact&mobno='+mobno+'&faxno='+faxno+'&telno='+telno+'&email='+email+'&address='+address+'&num='+num+'&website='+website+'&name='+name+'';
      var dataString = { addcontact: 'addcontact', mobno: mobno, faxno: faxno , telno: telno , email: email , address: address , num: num, website: website , name: name };
      $.ajax({
          
        type: "POST",
        url: "controller/contact_controller.php",
        data: dataString,
        success: function (data) {
           var json = $.parseJSON(data);
if(json.status=="yes")
{
    $('input[name=name]').val('') ;
       $('input[name=mobno]').val('') ;
   $('input[name=faxno]').val('') ;
   $('input[name=telno]').val('') ;
    $('input[name=email]').val('') ;
     $('input[name=website]').val('') ;
    $('textarea#address').val('');
       Lobibox.alert('success', {
                    msg: "Success Fully Added.."
                });
    
}
else
{
    
     $('input[name=name]').val('') ;
       $('input[name=mobno]').val('') ;
   $('input[name=faxno]').val('') ;
   $('input[name=telno]').val('') ;
    $('input[name=email]').val('') ;
       $('input[name=website]').val('') ;
    $('textarea#address').val('');
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
/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

