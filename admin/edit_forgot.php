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
<h1 class="page-header">Change Email</h1>
</div>
<!--end page header -->
</div>
<div class="row">
<div class="col-lg-12">

<!-- Form Elements -->
<div class="panel panel-default">
<div class="panel-heading">
Change Email
</div>
<div class="panel-body">
<div id="status">
</div>

<div class="row">

<div class="col-lg-6" >

<form role="form" id="form" action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Email(all enquires will send to this mail)*</label>
<input name="email" type="text" id="email" class="form-control" data-validation-engine="validate[required]"  placeholder="Email">
</div>

<input id="formbutton" name="editaboutus" type="submit" value="Submit" class="btn btn-primary"/>


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

var dataString = 'viewforgot=viewforgot&id=<?php echo $_GET['id'];?>';
$.ajax({

type: "POST",
url: "controller/forgot_controller.php",
data: dataString,
success: function (data) {
var json = $.parseJSON(data);
if(json.id==<?php echo $_GET['id'];?>)
{
 $('input[name=email]').val(json.email) ;
} 
else
{
$("#status").html('<div class="alert alert-danger alert-dismissable" id="fail" >'
+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
+'Try After Some Time </div>'
);
}
}
,
error: function() 
{
}
});
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
var email=$('input[name=email]').val() ;
  var dataString = 'editforgot=editforgot&email='+email+'&id=<?php echo $_GET['id'];?>';
$.ajax({

type: "POST",
url: "controller/forgot_controller.php",
data: dataString,
success: function (data) {
var json = $.parseJSON(data);
if(json.status=="yes")
{
$('input[name=email]').val(json.email) ;

Lobibox.alert('success', {
msg: "Success Fully Changed.."
});
}
else
{

$('input[name=email]').val(json.email) ;

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

