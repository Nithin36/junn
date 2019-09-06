
    
       <section id="feature">
        <div class="container">
			<div class="center wow fadeInDown">
                            <h2>News & Events</h2>
                        </div>
                  <div class="blog">
            <div class="row">
                <div class="col-md-12">                                                                     <?php
if(!empty($allnews))
  {
	
	    
                  		  				   foreach ($allnews as $news)
{
                                                                       ?>  
                    <div class="blog-item">
                        <div class="row">
                         
                            <div class="col-xs-12 col-sm-12 blog-content">
                                <?php
                                if($news['image']!="")
                                {
                                ?>
                                <img class="img-responsive img-blog" src="<?php echo base_url(); ?>upload/news/<?php echo $news['image']; ?>" width="100%" alt="" />
                               <?php
                                }
                               ?>
                                <h2><?php echo $news['name'];?></h2>
                                <h3><?php echo $news['description'];?></h3>
                                <?php echo anchor('news/viewnews/'.str_replace(array('+', '/', '='), array('-', '_', '~'),$this->encrypt->encode($news['id'])), 'Read More<i class="fa fa-angle-right"></i>', array('class' => ' btn btn-primary readmore','title' => stripcslashes($news['name'])));?>
                               
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
                </div>
            </div>
                  </div>
                
            </div><!--/.row-->
        </div>
    </section>