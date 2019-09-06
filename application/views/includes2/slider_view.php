     <?php
        if($sliders)
        {
?>

<section id="main-slider" class="no-margin">
        <div class="carousel slide">
<!--            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>-->
            <div class="carousel-inner">
   <?php
            $i=1;
            foreach ($sliders as $slider)
{
                                                                       
        ?>
                <div class="item <?php if($i==1){?> active <?php } ?>" style="background-image: url(<?php echo base_url(); ?>upload/sliders/<?php echo $slider['photo']; ?>)">
                    <div class="container">
                        <div class="row slide-margin">
                            <?php if(trim($slider['photo2'])!=""){ ?>
                               <div class="col-sm-4 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="<?php echo base_url(); ?>upload/sliders2/<?php echo $slider['photo2']; ?>" class="img-responsive">
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1"><?php if(trim($slider['title1'])!="") echo $slider['title1']; ?></h1>
                                   <h2 class="animation animated-item-2"><?php if(trim($slider['description'])!=""){ ?> <?php  echo $slider['description']; ?> <?php }?></h2>
                                    <?php if(trim($slider['readmore'])!=""){ ?>  <a class="btn-slide animation animated-item-3" href="<?php  echo $slider['readmore']; ?>">Read More</a><?php }?>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <?php
                $i++;
}
                ?>

<!--                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            

                            
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
                                    <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
                                    <a class="btn-slide animation animated-item-3" href="#">Read More</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>/.item

                <div class="item" style="background-image: url(images/slider/bg2.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                        
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
                                    <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
                                    <a class="btn-slide animation animated-item-3" href="#">Read More</a>
                                </div>
                            </div>

                            

                        </div>
                    </div>
                </div>/.item

                <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                        
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
                                    <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
                                    <a class="btn-slide animation animated-item-3" href="#">Read More</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->
<?php
        }
?>
 