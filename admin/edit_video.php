<?php
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
$video_model=new video_model();
$news_model=new news_model()
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
<h1 class="page-header">News</h1>
</div>
<!--end page header -->
</div>
<div class="row">
<div class="col-lg-12">
<!-- Form Elements -->
<?php 
include 'view/news_header.php';
?>
<div class="panel panel-default">
<div class="panel-heading">
Edit-Video
</div>
<div class="panel-body">
<div id="status">
</div>

<div class="row">

<div class="col-lg-6" >

<form role="form" id="form" action="" method="post" enctype="multipart/form-data">
<div class="form-group"> <iframe id="if"src="http://www.youtube.com/embed/WsFWhL4Y84Y" frameborder="0" allowfullscreen></iframe></div>
<div class="form-group">
<label>News And Events*:</label>
<select id="news" name="news" class="form-control validate[required]" >

<?php
$news_model->selectbox_news($row['news']);
?>
</select>
</div> 
<div class="form-group">
<label>Name</label>
<input name="name" type="text" id="name" class="form-control" data-validation-engine="validate[required]"  placeholder="Name">
</div>

<div class="form-group">
<label>Video Link (Go to you tube. Click the share link. Then select the embed map.Copy and paste the content of src attribute here )</label>
<textarea name="link" id="link" class="form-control " rows="3" cols="5" placeholder="Link"  ></textarea>
</div>

<div class="form-group">

<label>Order*:</label>
<select id="num" name="num" class="form-control"  data-validation-engine="validate[required]">
<option value="">select</option>
<?php
$video_model->order();
?>
</select>
</div>
<input id="formbutton" name="editaboutus" type="submit" value="Submit" class="btn btn-primary"/>
<span style="display: none;" id="load"><i class="fa fa-spinner fa-spin"> </i>Please wait...</span>
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

var dataString = 'viewvideo=viewvideo&id=<?php echo $_GET['id'];?>';
$.ajax({

type: "POST",
url: "controller/video_controller.php",
data: dataString,
success: function (data) {
var json = $.parseJSON(data);
if(json.id==<?php echo $_GET['id'];?>)
{
$('input[name=name]').val(json.name) ;
$('#if').attr('src', json.link);
$('textarea#link').val(json.link);
$('#num').val(json.num);
$('#news').val(json.news);
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
$("#load").css('display','inline');
var name=$('input[name=name]').val() ;
var num=$("#num option:selected").val();
var news=$("#news option:selected").val();

var link=$('textarea#link').val();
var dataString = 'editvideo=editvideo&link='+link+'&num='+num+'&news='+news+'&name='+name+'&id=<?php echo $_GET['id'];?>';
$.ajax({

type: "POST",
url: "controller/video_controller.php",
data: dataString,
success: function (data) {
var json = $.parseJSON(data);
if(json.status=="yes")
{
$('input[name=name]').val(json.name) ;
$('#if').attr('src', json.link);

$('textarea#link').val(json.link);
$('#num').val(json.num);
$('#news').val(json.news);
$("#load").css('display','none');
Lobibox.alert('success', {
msg: "Success Fully Edited.."
});

}
else
{
$('input[name=name]').val(json.name) ;


$('textarea#link').val(json.link);
$('#num').val(json.num);
$('#news').val(json.news);
$("#load").css('display','none');
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

