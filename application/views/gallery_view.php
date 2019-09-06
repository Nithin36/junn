
     <section id="about-us">
        <div class="container">
			<div class=" wow fadeInDown center">

                                <h2>Gallery</h2>
                        </div>
                                     
                                                                                     <?php
if(!empty($allgallery))
  {
	
	    
                  		  				   foreach ($allgallery as $gallery)
{
                                                                       ?>  
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php echo base_url() ?>upload/gallerys/<?php echo $gallery['photo'] ?>" alt="">
<!--                        <div class="overlay">
                            <div class="recent-work-inner">-->
                           
                                <a class="preview" href="<?php echo base_url() ?>upload/gallerys/<?php echo $gallery['photo'] ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
<!--                            </div> 
                        </div>-->
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
                        
             
                        
                               <br/>
<?php echo $links ?>  
    
     </div><!--/.row-->
        </div>
                                </div>
		</div><!--/.container-->
    </section><!--/about-us-->
 
 