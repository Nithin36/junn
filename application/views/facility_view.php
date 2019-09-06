<?php
  if(!empty($facility))
  {
	
	  ?>  
<section id="about-us">
        <div class="container">
			<div class="center wow fadeInDown">
				<h2><?php echo stripcslashes($facility['name']); ?></h2>
				
<?php
echo $facility['description'];

?>



			</div>


		</div><!--/.container-->
    </section><!--/about-us-->
  
<?php
  
  }
  else
  {
	  echo 'invalid facility';
	  
	  
  }
 
  ?>