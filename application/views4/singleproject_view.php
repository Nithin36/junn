<?php
  if(!empty($project))
  {
	
	  ?>
<section id="blog" class="container">
        <div class="center">
            <h2>Project >> <?php echo $project['name'];?></h2>
            <p class="lead"></p>
        </div>

        <div class="blog">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-item">
                          <?php
                                if($project['photo']!="")
                                {
                                ?>
                                <img class="img-responsive img-blog" src="<?php echo base_url(); ?>upload/projects/<?php echo $project['photo']; ?>" width="100%" alt="" />
                               <?php
                                }
                               ?>
                            <div class="row">  
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date"><?php echo $project['status'];?></span>
                                        <span><i class="fa fa-user"></i> <?php echo $project['client'];?></span>
                                        <span><i class="fa fa-map-marker"></i> <?php echo $project['location'];?></span>
                                        
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 blog-content">
                                    <h2><?php echo $project['name'];?></h2>
                                    <p><?php echo $project['description'];?></p>
                                   

                                </div>
                                                                                                                     <?php
if(!empty($projectgallery))
  {
	
	    
                  		  				   foreach ($projectgallery as $gallery)
{
                                                                       ?>  
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php echo base_url() ?>upload/projectphotos/<?php echo $gallery['photo'] ?>" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                           
                                <a class="preview" href="<?php echo base_url() ?>upload/projectphotos/<?php echo $gallery['photo'] ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                            </div> 
                        </div>
                    </div>
                </div>   

        <?php 
}
}?>
                            </div>
                        </div><!--/.blog-item-->
                        
                     
                        
                  


                 
                    </div><!--/.col-md-8-->

                

            </div><!--/.row-->

         </div><!--/.blog-->

    </section>
  
  <?php
  
  }
  else
  {
	  echo 'invalid Page';
	  
	  
  }
 
  ?>