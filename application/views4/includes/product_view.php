
<div id="content">
    <div id="slider" class="banner-container parallax">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <h3>Products</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="our-team-container">
      <div class="container">
        <div class="row">
            		
          <div class="col-xs-12 col-sm-4 ">
            <div class="about-detail">
                <?php
  if(!empty($productdesc))
  {
	
	  ?>  
           <p>  <?php echo  $productdesc['description']?></p>
 <?php
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
          <div class="col-xs-12 col-sm-6 info-container2">
              							
								
                                                                <?php
if(!empty($productphotos))
  {
	
	  ?> 
								<div class="col-xs-12 col-sm-12 our-images">
                                                                    <ul>
                                                                       <?php
                  		  				   foreach ($productphotos as $photo)
{
                                                                       ?>
									<li class=" zoom col-xs-12 col-sm-6 pdtimg">
                                                                            <figure>
                                                                            <a href="#" title="<?php echo $photo['name'];?>"><img alt="" src="<?php echo base_url().'upload/products/'.$photo['photo'];?>"></a>
                                                                            </figure>
                                                                            </li>
                                                                        
                                                                        <?php
}
                                                                        ?>
                                                                    </ul>	
								
                                                                </div>						
							
                                                                
                                                                
                                                             <?php
  
  }
  
  ?>   

							</div>
          </div>
        </div>
      </div>
    </div>
  </div>
