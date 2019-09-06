
    
    <section id="blog" class="container">
        <div class="center">
            <h2>Projects</h2>
            <p class="lead"></p>
        </div>

        <div class="blog">
            <div class="row">
                 <div class="col-md-12">
                     
                     
                                                                                     <?php
if(!empty($allprojects))
  {
	
	    
                  		  				   foreach ($allprojects as $project)
{
                                                                       ?>  
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-2 text-center">
                                <div class="entry-meta">
                                    <span id="publish_date"><?php echo $project['status'];?></span>
                                    <span><i class="fa fa-user"></i> <?php echo $project['client'];?></span>
                                    <span><i class="fa fa-map-marker"></i> <?php echo $project['location'];?></span>
                                    
                                </div>
                            </div>
                                
                            <div class="col-xs-12 col-sm-10 blog-content">
                                <?php
                                if($project['photo']!="")
                                {
                                ?>
                                <img class="img-responsive img-blog" src="<?php echo base_url(); ?>upload/projects/<?php echo $project['photo']; ?>" width="100%" alt="" />
                               <?php
                                }
                               ?>
                                <h2><?php echo $project['name'];?></h2>
                                <h3><?php   echo character_limiter($project['description'], 100);?></h3>
                                <?php echo anchor('project/viewproject/'.str_replace(array('+', '/', '='), array('-', '_', '~'),$this->encrypt->encode($project['id'])), 'Read More<i class="fa fa-angle-right"></i>', array('class' => ' btn btn-primary readmore','title' => stripcslashes($project['name'])));?>
                               
                            </div>
                        </div>    
                    </div><!--/.blog-item-->
                    
                    
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
                </div><!--/.col-md-8-->

                
            </div><!--/.row-->
        </div>
    </section>