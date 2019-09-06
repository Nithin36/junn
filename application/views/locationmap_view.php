



 <section id="feature">
        <div class="container">
			<div class="center wow fadeInDown">
                            <h2>Location Map</h2>
                                <?php 
     if(!empty($locationmap))
  {
         
     		  				 foreach ($locationmap as $map)
{
		
?>
                            <h3><?php echo stripslashes($map['name']); ?></h3><br/>
                            <div class="col-xs-12 col-sm-12 map-content">
      <iframe src="<?php echo $map['code'] ?>" width="1110" height="456" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
                            <?php
}
?>
 <?php

  }
  else
  {
      ?>
    <div class="col-xs-12 col-sm-12"></div>
    <?php
	   echo '  <br/><br/> <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                               No result
                            </div>  ';
	  
	  
  }

?>
                            </div>


		</div><!--/.container-->
    </section><!--/about-us-->
  