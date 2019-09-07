
<?php

if(!empty($singleproduct))
{
$remaining=$singleproduct['noofitems']-$singleproduct['solditems'];
?>
<section id="feature">
<div class="container">
<div class=" wow fadeInDown center">
<!--				<h2><?php echo stripcslashes($singleproduct['name']); ?></h2>-->
<h2>Products</h2>
</div>

<div class=" wow fadeInDown">

<div class="blog col-md-12">
<div class="row">
<div class="col-md-4">
<img  class="img-responsive"  src="<?php echo base_url() ?>upload/products/thumb/<?php echo $singleproduct['photo']  ?>"  alt="" />
</div><!--/.col-md-8-->

<aside class="col-md-8 ">
<div class="widget categories">
<div class="col-sm-12 pull-left">
<h3><?php echo $singleproduct['name'];  ?> </h3>
<h2>  <del><i class=" fa fa-rupee"></i> <?php echo $singleproduct['price'];  ?></del>   <?php echo $singleproduct['onlineprice'];  ?> </h2>
<ul class="blog_archieve">
<li> <i class="fa fa-angle-double-right"></i>  Size        : <span ><?php echo $singleproduct['quantity'];  ?> <?php echo $singleproduct['sunit'];  ?> </span></a></li>
<?php if(trim($singleproduct['bname'])!="") {?> <li><i class="fa fa-angle-double-right"></i>  Brand        : <span><?php echo $singleproduct['bname'];  ?> </a></li><?php } ?>
<!--                                    <li><i class="fa fa-angle-double-right"></i>  Availability : <span><?php if($remaining>0) { echo $remaining; } else { echo "Out of stock"; } ?> </a></li>-->
</ul>
<!--<ul class="tag-cloud">
<li><a class="btn btn-xs " href="#"><?php echo $singleproduct['uname'];  ?></a></li>
</ul>-->
<form role="form" id="form1" action="" method="post">
<input type="hidden" name="pid" value="<?php echo $this->encrypt->encode($singleproduct['id']);?>"/>
<input type="hidden" name="uid" value="<?php echo $this->session->userdata('uniqueid'); ?>"/>
<?php if($remaining>0) { ?>
<input id="formbutton1" name="formbutton1" type="submit" value="Add to cart" class="btn btn-primary"/>
<?php }
else {
?>
<input id="formbutton1" disabled="disabled" name="formbutton1" type="submit" value="Out of stock" class="btn btn-primary"/>
<?php
}
?>
<span id="respose"></span>
</form>
</div>
</div><!--/.recent comments-->
</aside>
</div><!--/.row-->
</div>
    
<div class="col-md-12">
<h2></h2> 
<div class="tab-wrap">
<div class="media">
<div class="parrent pull-left">
<ul class="nav nav-tabs nav-stacked">
<?php if(trim($singleproduct['description'])!="") { ?><li class="active"><a href="#tab1" data-toggle="tab" class="analistic-02">Description</a></li><?php } ?>
<?php if(trim($singleproduct['ingredients'])!="") {?><li ><a href="#tab2" data-toggle="tab" class="tehnical">Ingredients</a></li> <?php } ?>
<?php if(trim($singleproduct['howtouse'])!="") {?>  <li class=""><a href="#tab3" data-toggle="tab" class="tehnical">How to use</a></li> <?php } ?>

</ul>
</div>

<div class="parrent media-body">
<div class="tab-content">
<?php if(trim($singleproduct['description'])!="") { ?>
<div class="tab-pane  active in" id="tab1">
<div class="media">
<!--                                           <div class="pull-left">
<img class="img-responsive" src="images/tab1.png">
</div>-->
<div class="media-body">
<?php echo $singleproduct['description'];  ?>
</div>
</div>
</div>
<?php } ?>
<?php if(trim($singleproduct['ingredients'])!="") { ?>
<div class="tab-pane" id="tab2">
<div class="media">

<div class="media-body">
<?php echo $singleproduct['ingredients'];  ?>
</div>
</div>
</div>
<?php } ?>
<?php if(trim($singleproduct['howtouse'])!="") { ?>
<div class="tab-pane" id="tab3">
<?php echo $singleproduct['howtouse'];  ?>
</div>
<?php } ?>
</div> <!--/.tab-content-->  
</div> <!--/.media-body--> 
</div> <!--/.media-->     
</div><!--/.tab-wrap-->               
</div>
</div>
</div><!--/.container-->
</section><!--/about-us-->



<div class="modal fade" id="cart1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel"></h4>
</div>
<div class="modal-body">
<p>Successfully added to the cart</p>
<p class="debug-url"></p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="cart2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel"></h4>
</div>
<div class="modal-body">
<p>This product is out of stock.</p>
<p class="debug-url"></p>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>

<div class="modal fade" id="cart3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel"></h4>
</div>
<div class="modal-body">
<p>your requested quantity of  this product is exceeded.</p>
<p class="debug-url"></p>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>

<?php

}
else
{
echo 'invalid Page';


}

?>