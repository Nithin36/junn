<?php
if(!empty($news))
{

?>

<section id="feature">
<div class="container">
<div class="row">    
<div class="center wow fadeInDown">
<h2>News >> <?php echo $news['name'];?></h2>
<?php
if($news['image']!="")
{
?>
<img class="img-responsive img-blog" src="<?php echo base_url(); ?>upload/news/<?php echo $news['image']; ?>" width="100%" alt="" />
<?php
}
?>

<?php
if(trim($news['description'])!="")
echo $news['description'];

?>
</div>
</div>
    
   
<?php
if(!empty($newsphotos))
{
    //print_r($newsphotos);
    ?>
 <div class="row left">   
<h3>Photos</h3>
<?php


foreach ($newsphotos as $gallery)
{
   ?>  
<div class="col-xs-12 col-sm-4 col-md-3">
<div class="recent-work-wrap">
<img class="img-responsive" src="<?php echo base_url() ?>upload/gallerys/<?php echo $gallery['photo'] ?>" alt=""/>
<div class="overlay">
<div class="recent-work-inner">

<a class="preview" href="<?php echo base_url() ?>upload/gallerys/<?php echo $gallery['photo'] ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
</div> 
</div>
</div>
</div>   

<?php 

}?>
 </div>
<?php 

}?>


<?php
if(!empty($newsvideos))
{
    //print_r($newsphotos);
    ?>
 <div class="row left">  
<h3>Videos</h3>
<?php


foreach ($newsvideos as $video)
{
   ?>  
 <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                         <iframe width="280" height="155"  frameborder="0" allow="autoplay; encrypted-media" allowfullscreen src="<?php echo $video['link']; ?>"></iframe>

                    </div>
                    
                    
                </div>   

<?php 

}?>
 </div>

<?php 

}?>
</div>


</div><!--/.container-->
</section><!--/about-us-->


<?php

}
else
{
echo 'invalid Page';


}

?>