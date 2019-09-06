<section id="about-us" class="shortcode-item">
        <div class="container">
            <h2>Videos</h2>
            <div class="row">
                                                                                                     <?php
if(!empty($allvideo))
  {
	
	    
                  		  				   foreach ($allvideo as $video)
{
                                                                       ?>  
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                         <iframe src="<?php echo $video['link']; ?>"></iframe>

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

        
    

         

       
                
                
                
            </div>
        </div>
    </section>