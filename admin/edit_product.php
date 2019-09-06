<?php
session_start();
if(isset($_SESSION['id']))
{

function __autoload($class_name) 
{
require_once "model/".$class_name.".php";

}
$product_model=new product_model();
$producttype_model=new producttype_model();
$mainproducttype_model=new mainproducttype_model();
$category_model=new category_model();
$brand_model=new brand_model();
$usertype_model=new usertype_model();
$sizename_model=new sizename_model();
$sizeunit_model=new sizeunit_model();
$productcategory_model=new productcategory_model();
$productsize_model=new productsize_model();
$fragrance_model=new fragrance_model();

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
<h1 class="page-header">Products</h1>
</div>
<!--end page header -->
</div>
<div class="row">
<div class="col-lg-12">
    <?php 
include 'view/producttype_header.php';
?>
<!-- Form Elements -->
<div class="panel panel-default">
<div class="panel-heading">
products-Edit product 
</div>
<div class="panel-body">
<div id="status">
    <?php
    
   // $product_model->action2();
    ?>
    
    
</div>

<div class="row">

<div class="col-lg-6" style=" width: 100%;" >
 <?php
                                    if(isset($_GET['id']))
                                    {
                                        $row=$product_model->get_product($_GET['id']);
                                        //$row=$product_model->stripslahes_rows($row);
                                    ?>
    <form role="form" id="form" action="controller/product_controller.php" method="post" enctype="multipart/form-data">
   <input type="hidden" name="sname" value="nill"/>
<!--<div class="form-group">
    <div class="alert alert-info"> Wants to add image url? . <a href="image.php">Click Here</a></div>
<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
Image Url
</a>
</div>-->
                <div class="form-group">
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>"/>
<?php
$row34=$productcategory_model->get_productcategory_product($_GET['id']);
$row35=$productsize_model->get_productsize_product($_GET['id']);
//print_r($row34);
if($row['photo']=="")
{
    ?>
    <img src="../upload/products/download.png" height="100" width="100" alt=""/>
     <?php                                           
}
 else {
    

?>
    <img src="../upload/products/<?php echo $row['photo']?>" height="100" width="100" alt=""/>
<?php
 }
?>
</div>
 
                    
                                        <div class="col-md-12">
                          <div class="form-group col-md-3">
                                            <label>User Type*:</label>
                                            <select id="usertype" name="usertype" class="form-control " data-validation-engine="validate[required]" >
                                            
                                                <?php
                                                     $usertype_model->selectbox_usertype($row['usertype']);
                                                ?>
                                            </select>
                                        </div> 
     <div class="form-group col-md-3">
                                            <label>Category(use ctrl key to multiple select )*:</label>
                                            <select multiple id="category" name="category[]" data-validation-engine="validate[required]" class="form-control" >
                                                
                                                  <?php
                                                $category_model->selectbox_childcategory_productcategory($row34);
                                           
                                                ?>
                                            </select>
                                        </div> 
        
             <div class="form-group col-md-3">
                                            <label>Brand*:</label>
                                            <select id="brand" name="brand" class="form-control "  >
                                            
                                             <?php
                                                     $brand_model->selectbox_brand($row['brand']);
                                                ?>
                                            </select>
                                        </div> 
                                            
                                             <div class="form-group col-md-3">
                                            <label>Fragrance*:</label>
                                            <select id="fragrance" name="fragrance" class="form-control "  >
                                            
                                                <?php
                                                     $fragrance_model->selectbox_fragrance($row['fragrance']);
                                                ?>
                                            </select>
                                        </div> 
                    </div>
        


<div class="col-md-12">
    <div class="form-group col-md-4">
<label>Product Title*:</label>
<input name="name" type="text" id="name" class="form-control " data-validation-engine="validate[required]" placeholder="Product Title" value="<?php echo $row['name'];?>">
</div>
         <div class="form-group col-md-4">
                                            <label>Order*:</label>
                                            <select id="order" name="num" data-validation-engine="validate[required]" class="form-control" >
                                                <option value="">select</option>
                                                <?php
                                                $producttype_model->order_selected($row['num']);
                                                ?>
                                            </select>
                                        </div>
  <div class="form-group col-md-4">
                                            <label>Publish*:</label>
                                            <select id="status" name="status" data-validation-engine="validate[required]" class="form-control " >
                                                <option value="">select</option>
                                              <option <?php if($row['status']==0) echo 'selected="selected"';?> value="0">Unpublish</option>
                                                  <option <?php if($row['status']==1) echo 'selected="selected"';?> value="1">Publish</option>
                                             
                                            </select>
                                        </div>
</div>


<div class="col-md-12">

<!--         <div class="form-group col-md-3">
                                            <label>Size name*:</label>
                                            <select id="sname" name="sname"  class="form-control" >
                                               
                                                <?php
                                                $sizename_model->selectbox_sizename($row35['sizename']);
                                                ?>
                                            </select>
                                        </div>-->
    
        <div class="form-group col-md-2">
<label>Quantity*:</label>
<input name="squantity" type="text" id="squantity" class="form-control " data-validation-engine="validate[required,custom[number]]" placeholder="Quantity" value="<?php echo $row35['quantity'] ?>">
</div>
    
   <div class="form-group col-md-2">
                                            <label>Size Unit*:</label>
                                            <select id="sunit" name="sunit" data-validation-engine="validate[required]" class="form-control" >
                                                
                                                <?php
                                                $sizeunit_model->selectbox_sizeunit($row35['sizeunit']);
                                                ?>
                                            </select>
                                        </div>
    
            <div class="form-group col-md-2">
<label>No of items*:</label>
<input name="noofitems" type="text" id="noofitems" class="form-control " data-validation-engine="validate[required,custom[onlyNumberSp]]" value="<?php echo $row35['noofitems']; ?>" placeholder="No of items">
</div>
    
     
        <div class="form-group col-md-2">
<label>Marked Price*:</label>
<input name="sprice" type="text" id="sprice" class="form-control " data-validation-engine="validate[required,custom[onlyNumberSp]" placeholder="Price" value="<?php echo $row35['price']; ?>">
</div>
     
        <div class="form-group col-md-2">
<label>Online Price*:</label>
<input name="soprice" type="text" id="soprice" class="form-control " data-validation-engine="validate[required,custom[onlyNumberSp]" placeholder="Price" value="<?php echo $row35['onlineprice']; ?>">
</div>
</div>

 <div class="col-md-12">
          <div class="form-group col-md-12">
<label>Description*:</label>
<textarea name="description" class="form-control" rows="20"  id="editor1" data-validation-engine="validate[required]" placeholder="Description" ><?php echo $row['description'];?></textarea>
</div>
              <div class="form-group col-md-12">
<label> Ingredients (optional):</label>
<textarea name="ingredients" class="form-control" rows="20"  id="editor2"  placeholder="Ingredients" ><?php echo $row['ingredients'];?></textarea>
</div>
              <div class="form-group col-md-12">
<label>How to use (optional):</label>
<textarea name="howtouse" class="form-control" rows="20"  id="editor3" placeholder="How to use" ><?php echo $row['howtouse'];?></textarea>
</div>
 </div>



         <div class="form-group">
             <label>Product Photo (height should be 234 px and width should be 234 px) *:</label><br>

 <input type="file" name="file[]" data-validation-engine="validate[custom[validateMIME[image/jpeg]]]"  id="image_file" >

</div>
   
  
    
<input id="formbutton" name="editproduct" type="submit" value="Submit" class="btn btn-primary"/>

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
<!--    <script src="js/jquery.Jcrop.min.js"></script>-->
    <script src="js/script.js"></script>
<script type="text/javascript"> 

window.id = '<?php echo $_SESSION['id']; ?>';
$(document).ready(function(){

<?php
$product_model->Lobibox2();
?>
CKEDITOR.replace( 'editor1', {
filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});

 CKEDITOR.replace( 'editor2', {
filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
 CKEDITOR.replace( 'editor3', {
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

