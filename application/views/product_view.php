<section id="about-us">
<div class="container">
<div class=" wow fadeInDown center">

<h2>Our Medicines</h2>
</div>

<div class="blog">
<div class="row">

<!--<aside class="col-md-3">


<div class="col-xs-12 col-md-12 col-sm-5">
<h2>Category</h2>
<div class="accordion">
<div class="panel-group" id="accordion1">
    <?php

if(!empty($allcategories))
{

?>
<div class="panel panel-default">
<div class="panel-heading active">
<h3 class="panel-title">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
Category
<i class="fa fa-angle-right pull-right"></i>
</a>
</h3>
</div>

<div id="collapseOne1" class="panel-collapse collapse in">
<div class="panel-body">
<div class="media accordion-inner">

<div class="media-body">
<ul class="blog_archieve">
    <?php
$i=0;
foreach ($allcategories as $category)
{
?>
    <li ><a <?php if(($this->router->fetch_class()=="product")&&($this->router->fetch_method()=="listproduct")&&($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$_GET['id']))==$category['id'])){ ?> style="color: #d4af37;"  <?php }?> href="<?php echo base_url() ?>index.php/product/listproduct/index?id=<?php echo str_replace(array('+', '/', '='), array('-', '_', '~'),$this->encrypt->encode($category['id'])); ?>"><?php echo $category['name']?> 
         
            </a></li>
<?php } ?>                                  
                                    <li><a href="#"><input type="checkbox" name="name" id="name"/> November 2013 <span class="pull-right">(32)</span></a></li>
                                    <li><a href="#"><input type="checkbox" name="name" id="name"/>October 2013 <span class="pull-right">(19)</span></a></li>
                                    <li><a href="#"><input type="checkbox" name="name" id="name"/> September 2013 <span class="pull-right">(08)</span></a></li>
                                </ul>
</div>
</div>
</div>
</div>
</div>
<?php
}
if(!empty($allusertypes))
{

?>
<div class="panel panel-default">
<div class="panel-heading active">
<h3 class="panel-title">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">
Gender
<i class="fa fa-angle-right pull-right"></i>
</a>
</h3>
</div>
<div id="collapseTwo1" class="panel-collapse collapse in">
<div class="panel-body">
<div class="media accordion-inner">

<div class="media-body">
<ul class="blog_archieve">
        <?php
$i=0;
foreach ($allusertypes as $usertype)
{
?>
     <li ><a <?php if(($this->router->fetch_class()=="product")&&($this->router->fetch_method()=="listproductgender")&&($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$_GET['id']))==$usertype['id'])){ ?> style="color: #d4af37;"  <?php }?> href="<?php echo base_url() ?>index.php/product/listproductgender/index?id=<?php echo str_replace(array('+', '/', '='), array('-', '_', '~'),$this->encrypt->encode($usertype['id'])); ?>"><?php echo $usertype['name']?>
         
            </a></li>
                                    <li><a href="#"><input type="checkbox" name="gender" id="gender"/> <?php echo $usertype['name'] ?><span class="pull-right">(97)</span></a></li>
<?php } ?>                                    
                                   
                                </ul>
</div>
</div>
</div>
</div>
</div>
<?php }
if(!empty($allfragrances))
{
?>
<div class="panel panel-default">
<div class="panel-heading active">
<h3 class="panel-title">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1">
Fragrance
<i class="fa fa-angle-right pull-right"></i>
</a>
</h3>
</div>
<div id="collapseThree1" class="panel-collapse collapse in">
<div class="panel-body">
<div class="media accordion-inner">

<div class="media-body">
<ul class="blog_archieve">
            <?php
$i=0;
foreach ($allfragrances as $fragrance)
{
?>
<li ><a <?php if(($this->router->fetch_class()=="product")&&($this->router->fetch_method()=="listproductfragrance")&&($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='),$_GET['id']))==$fragrance['id'])){ ?> style="color: #d4af37;"  <?php }?> href="<?php echo base_url() ?>index.php/product/listproductfragrance/index?id=<?php echo str_replace(array('+', '/', '='), array('-', '_', '~'),$this->encrypt->encode($fragrance['id'])); ?>"><?php echo $fragrance['name']?>
         
            </a></li>
   <?php } ?>                                  
                                </ul>
</div>
</div>
</div>
</div>
</div>
    
    <?php
}
    ?>
</div>/#accordion1
</div>
</div>


</aside> -->
<div class="col-md-12">
<?php
    
if(!empty($allproducts))
{
foreach ($allproducts as $product)
{
?> 
<div class="col-xs-12 col-sm-6 col-md-3">
<div class="recent-work-wrap">

<div class="single-shop-product">

<div class="product-upper">

<img class="promin2" src="<?php echo base_url() ?>upload/products/thumb/<?php echo $product['photo']  ?>" alt="">
</div>
<h2 class="mintitle"><a href=""><?php echo $product['name'];  ?> <?php echo $product['quantity'];  ?> <?php echo $product['sunit'];  ?></a></h2>
<ul class="tag-cloud">
<!--<li><a class="btn btn-xs" href="#"><?php echo $product['uname'];  ?></a></li>-->

</ul>
<div class="product-carousel-price">
<!--    <del><i class=" fa fa-rupee"></i> <?php echo $product['price'];  ?></del> -->
<ins><i class=" fa fa-rupee"></i> <?php echo $product['onlineprice'];  ?></ins> 
</div>  

<div class="product-option-shop">
<!--<div class="overlay">
<div class="recent-work-inner ">

<div class="col-md-12">
<div class="html-skill pull-left col-md-6 ">                                  
<p><em>95%</em></p>
<p>HTML</p>
</div>

<div class="html-skill pull-right col-md-6">                                  
<p><em>95%</em></p>
<p>HTML</p>
</div>
</div>
                                <h3><a href="#">Business theme</a> </h3>
<p>There are many variations of passages of Lorem Ipsum available, but the majority</p>
<a class="preview" href="images/portfolio/full/item1.png" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
</div> 
</div>-->
<a class="add_to_cart_button tit" href="<?php echo base_url()?>index.php/product/viewproduct/<?php echo str_replace(array('+', '/', '='), array('-', '_', '~'),$this->encrypt->encode($product['id']))?>"><i class=" fa fa-eye"></i> View Details</a>
</div>   

</div>
<!--                        <img class="img-responsive" src="images/portfolio/recent/item1.png" alt="">-->

</div>
</div>

<?php 
}
}
else
{
echo '  <br/> <div class="alert alert-info alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
No result
</div>  ';


}

?>  


</div><!--/.col-md-8-->
<?php echo $links ?> 

</div><!--/.row-->
</div>
</div>
</div><!--/.container-->
</section><!--/about-us-->

