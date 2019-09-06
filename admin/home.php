<?php
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
$login_model=new login_model();
?>
<!DOCTYPE html>
<html>

<?php include'view/head.php'; ?>

<body>
<!--  wrapper -->
<div id="wrapper">
<?php
include'view/header.html';
include'view/navigation.html'; 
?>
<div id="page-wrapper">

<div class="row">
<!-- Page Header -->
<div class="col-lg-12">
<h1 class="page-header">Welcome Admin</h1>
<div class="col-lg-12">
<div class="alert alert-info">
<i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b>Admin </b>


</div>
<div class="panel-group" id="accordion">
    

    
    

<!--    <div class="panel panel-default">
<div class="panel-heading">
    <h4 class="panel-title">
      <i class="fa fa-maxcdn  fa-fw "></i>
        <a  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-1"> Menus <i  class="fa fa-plus collape-plus"></i></a></h4>
</div>
<div id="collapse-1" class="panel-collapse collapse">
<div class="panel-body">
<p>
    <a class="btn btn-outline btn-primary" href="add_menu.php">Add Menu</a>
    <a  class="btn btn-outline btn-primary" href="list_menu.php">Manage Menus</a>
     <a class="btn btn-outline btn-primary" href="add_submenu.php">Add Sub Menu</a>
    <a  class="btn btn-outline btn-primary" href="list_submenu.php">Manage Sub Menus</a>
     <a  class="btn btn-outline btn-primary" href="edit_homemenu.php">Home Menu</a>
    
</p>
</div>
</div>
</div>-->
    
    
    
<!-- <div class="panel panel-default">
<div class="panel-heading">
    <h4 class="panel-title">
        <i class="fa fa-users fa-fw"></i>
        <a  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-3"> Seo <i  class="fa fa-plus collape-plus"></i></a></h4>
</div>
<div id="collapse-3" class="panel-collapse collapse">
<div class="panel-body">
<p>
    <button type="button" class="btn btn-info">Page Title</button><br/><br/>
    <a class="btn btn-outline btn-primary" href="add_pagetitle.php">Add Page Title</a>
    <a  class="btn btn-outline btn-primary" href="list_pagetitle.php">Manage Page Titles</a>
    <a  class="btn btn-outline btn-primary" href="edit_defaultpagetitle.php">Default Page Title</a>
    
</p>
</div>
</div>
</div>-->

<!--    <div class="panel panel-default">
<div class="panel-heading">
    <h4 class="panel-title">
        <i class="fa fa-spinner fa-fw"></i>
        <a  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-4"> Sliders <i  class="fa fa-plus collape-plus"></i></a></h4>
</div>
<div id="collapse-4" class="panel-collapse collapse">
<div class="panel-body">
<p>
    <a class="btn btn-outline btn-primary" href="add_slider.php">Add slider</a>
    <a  class="btn btn-outline btn-primary" href="list_slider.php">Manage Sliders</a>
    
</p>
</div>
</div>
</div>-->
    
    
<!--<div class="panel panel-default">
<div class="panel-heading">
    <h4 class="panel-title">
        <i class="fa fa-user fa-fw"></i>
        <a  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-5"> Clients <i  class="fa fa-plus collape-plus"></i></a></h4>
</div>
<div id="collapse-5" class="panel-collapse collapse">
<div class="panel-body">
<p>
    <a class="btn btn-outline btn-primary" href="add_client.php">Add Client</a>
    <a  class="btn btn-outline btn-primary" href="list_client.php">Manage Clients</a>
    
</p>
</div>
</div>
</div>-->
    
<!--    
    <div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
    <i class="fa fa-bitbucket-square fa-fw"></i>
    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-6"> Brands <i class="fa fa-plus collape-plus"></i></a></h4>
</div>
<div id="collapse-6" class="panel-collapse collapse">
<div class="panel-body">
<p>
    <a class="btn btn-outline btn-primary" href="add_brand.php">Add Brand</a>
    <a class="btn btn-outline btn-primary" href="list_brand.php">Manage Brands</a>

    
</p>
</div>
</div>
</div>-->
    
<!--    <div class="panel panel-default">
<div class="panel-heading">
    <h4 class="panel-title">
        <i class="fa fa-building-o fa-fw"></i>
        <a  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-7"> Companies <i  class="fa fa-plus collape-plus"></i></a></h4>
</div>
<div id="collapse-7" class="panel-collapse collapse">
<div class="panel-body">
<p>
    <a class="btn btn-outline btn-primary" href="add_company.php">Add Company</a>
    <a  class="btn btn-outline btn-primary" href="list_company.php">Manage Companies</a>
    
</p>
</div>
</div>
</div>
    -->
    
<!--     <div class="panel panel-default">
<div class="panel-heading">
    <h4 class="panel-title"><i class="fa fa-picture-o  fa-fw"></i><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-8">Gallery <i class="fa fa-plus collape-plus"></i></a></h4>
</div>
<div id="collapse-8" class="panel-collapse collapse">
<div class="panel-body">
<p>

    <a class="btn btn-outline btn-primary"href="add_gallery.php">Add Gallery Photo</a>
    <a class="btn btn-outline btn-primary" href="list_gallery.php">Manage Gallery Photos</a>
   
   
    
</p>
</div>
</div>
</div>-->
    
<!--     <div class="panel panel-default">
<div class="panel-heading">
    <h4 class="panel-title"><i class="fa fa-star-o  fa-fw"></i><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-8">Products <i class="fa fa-plus collape-plus"></i></a></h4>
</div>
<div id="collapse-8" class="panel-collapse collapse">
<div class="panel-body">
<p>

    <a class="btn btn-outline btn-primary"href="add_producttype.php">Add Product</a>
    <a class="btn btn-outline btn-primary" href="list_producttype.php">Manage Products</a>
    <a class="btn btn-outline btn-primary" href="add_product.php">Add Product Photo</a>
    <a class="btn btn-outline btn-primary" href="list_product.php">Manage Product Photos</a>
   
    
</p>
</div>
</div>
</div>-->
    
<!--       <div class="panel panel-default">
<div class="panel-heading">
    <h4 class="panel-title"><i class="fa fa-suitcase  fa-fw"></i><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-91">Services <i class="fa fa-plus collape-plus"></i></a></h4>
</div>
<div id="collapse-91" class="panel-collapse collapse">
<div class="panel-body">
<p>

    <a class="btn btn-outline btn-primary"href="add_service.php">Add Service</a>
    <a class="btn btn-outline btn-primary" href="list_service.php">Manage Services</a>
     <a class="btn btn-outline btn-primary"href="add_serviceicon.php">Add Service Icon</a>
    <a class="btn btn-outline btn-primary" href="list_serviceicon.php">Manage Service Icons</a>
   
   
    
</p>
</div>
</div>
</div>-->
       
<!--    <div class="panel panel-default">
<div class="panel-heading">
    <h4 class="panel-title">
        <i class="fa fa-envelope-o fa-fw"></i>
        <a  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-9"> Contacts <i  class="fa fa-plus collape-plus"></i></a></h4>
</div>
<div id="collapse-9" class="panel-collapse collapse">
<div class="panel-body">
<p>
    <a class="btn btn-outline btn-primary" href="add_contact.php">Add Contact</a>
    <a  class="btn btn-outline btn-primary" href="list_contact.php">Manage Contacts</a>
    
</p>
</div>
</div>
</div>-->

    
    
  
    
    
<!--                 <div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><i class="fa fa-gears  fa-fw"></i><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-10">Account Settings<i class="fa fa-plus collape-plus"></i></a></h4>
</div>
<div id="collapse-10" class="panel-collapse collapse">
<div class="panel-body">
<p>
    <a class="btn btn-outline btn-primary" href="password.php">Change Password</a>
    <a class="btn btn-outline btn-primary" href="controller/session_controller.php">LogOut</a>
    
   
    
</p>
</div>
</div>
</div>-->


    
</div>
</div>
</div>
<!--End Page Header -->
</div>



</div>







</div>

</div>
<!-- end wrapper -->

<!-- Core Scripts - Include with every page -->
<script src="assets/plugins/jquery-1.10.2.js"></script>
<script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
<script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="assets/plugins/pace/pace.js"></script>
<script src="assets/scripts/siminta.js"></script>
<script src="js/jquery.validationEngine.js"></script>
<script src="js/jquery.validationEngine-en.js"></script>
<script type="text/javascript"> 
window.id = '<?php echo $_SESSION['id']; ?>';
$(document).ready(function(){



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

