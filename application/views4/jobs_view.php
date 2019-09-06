
    
    <section id="blog" class="container">
        <div class="center">
            <h2>Jobs</h2>
            <p class="lead"></p>
        </div>

        <div class="blog">
            <div class="row">
                 <div class="col-md-12">
                     
                     
                                                                                     <?php
if(!empty($alljobs))
  {
	
	    
                  		  				   foreach ($alljobs as $job)
{
                                                                       ?>  
                    <div class="blog-item">
                        <div class="row">
                          
                                
                            <div class="col-xs-12 col-sm-10 blog-content">
                          
                                <h2><?php echo $job['name'];?></h2>
                                <h3><?php echo character_limiter($job['description'], 50) ;?></h3>
                                
                                <?php echo anchor('job/applyjob/'.$job['name'], 'Apply Now  <i class="fa fa-angle-right"></i>', array('class' => ' btn btn-primary readmore','title' => stripcslashes($job['name'])));?>
                               
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