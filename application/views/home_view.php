

    <section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
               <h2 class="tcolor"><?php echo $homecontent['title1'] ?></h2>
                <p class="lead tcolor"><?php echo $homecontent['description'] ?></p>
            </div>

            <!--<div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-bullhorn"></i>
                            <h2>Fresh and Clean</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div>/.col-md-4

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-comments"></i>
                            <h2>Retina ready</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div>/.col-md-4

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-cloud-download"></i>
                            <h2>Easy to customize</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
                        </div>
                    </div>/.col-md-4
                
                </div>/.services
            </div>--><!--/.row-->    
            <div class="btn-more"><a href="<?php echo $homecontent['readmore'] ?>">VIEW MORE</a></div>
        </div><!--/.container-->
    </section>
<?php



if(!empty($homeproducts))

{

?>
<div class="product-area">
 
        <div class="container">
        <div class="center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                <h2>OUR MEDICINES</h2>
            </div>
            <div class="row">
                
  <?php

foreach ($homeproducts as $homeproduct)

{

?>

<div class="col-md-3 col-sm-6">

<div class="single-shop-product">

<div class="product-upper">

<img  class="promin" src="<?php echo base_url() ?>upload/products/thumb/<?php echo $homeproduct['photo']  ?>" alt="">

</div>

<h2 class="mintitle"><a href=""><?php echo $homeproduct['name'];  ?> <?php echo $homeproduct['quantity'];  ?> <?php echo $homeproduct['sunit'];  ?></a></h2>

<div class="product-carousel-price">

<ins><i class=" fa fa-rupee"></i> <?php echo $homeproduct['onlineprice'];  ?></ins> 

</div>  



<div class="product-option-shop">



<a class="add_to_cart_button tit" href="<?php echo base_url()?>index.php/product/viewproduct/<?php echo str_replace(array('+', '/', '='), array('-', '_', '~'),$this->encrypt->encode($homeproduct['id']))?>"><i class=" fa fa-eye"></i> View Details</a>

</div>                       

</div>

</div>

<?php

}

?>
                
            </div>
           <div class="btn-more"><a href="<?php echo base_url()?>index.php/product/product/">VIEW MORE</a></div>  
            
            
        </div>
    </div>

<?php

}

?>


 
 
<!--<section id="bottom">
        <div class="container">
        <div class="row">
       
        <div class="col-md-7 col-sm-6">
                   <?php
                  if(!empty($homelocationmap))
                  {
                  ?>
          <iframe src="<?php echo $homelocationmap['code'] ?>" width="" height="" frameborder="0" style="border:0; width:100%; height:250px" allowfullscreen></iframe>
<?php }
                  
                  ?>
         </div>
         <div class="col-md-5 col-sm-6">
         <div class="col-md-3">
          <img src="<?php echo base_url(); ?>images/location.png" width="100" height="100">
           </div>
             <div class="col-md-7">
                          <?php
                  if(!empty($homecontacts))
                  {
                  ?>
                 <ul>
                     <li><i class="fa fa-map-marker"></i> <?php if(trim($homecontacts['name'])!=" ") echo $homecontacts['name'] ?></li>
          <li><?php if(trim($homecontacts['address'])!=" ") echo $homecontacts['address'] ?></li>
         
     <li><?php if(trim($homecontacts['email'])!=" ") echo $homecontacts['email'] ?></li>
         <li><?php if(trim($homecontacts['telno'])!=" ") echo $homecontacts['telno'] ?></li>
       

      </ul>  
                  <?php }
                  
                  ?>
   </div>
        </div>
        
          </div>

   
      </div>
    </section>-->

































