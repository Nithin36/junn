  
  <?php
  if(!empty($service))
  {
	
	  ?>
     <section id="about-us">
        <div class="container">
			<div class="center wow fadeInDown">
				<h2><?php echo stripcslashes($service['name']); ?></h2>
				
<?php
echo $service['description'];

?>



			</div>
                                                                                                                     <?php
if(!empty($servicegallery))
  {
	
	    
                  		  				   foreach ($servicegallery as $gallery)
{
                                                                       ?>  
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php echo base_url() ?>upload/serviceicons/<?php echo $gallery['photo'] ?>" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                           
                                <a class="preview" href="<?php echo base_url() ?>upload/serviceicons/<?php echo $gallery['photo'] ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                            </div> 
                        </div>
                    </div>
                </div>   

        <?php 
}
}?>

		</div><!--/.container-->
    </section><!--/about-us-->
  
  
  <?php
  
  }
  else
  {
	  echo 'invalid Page';
	  
	  
  }
 
  ?>