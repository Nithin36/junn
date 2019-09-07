  
  <?php
  if(!empty($page))
  {
	
	  ?>
<section id="feature" class="min">
        <div class="container">
			<div class="center wow fadeInDown">
				<h2><?php echo stripcslashes($page['name']); ?></h2>
				
<?php
if(trim($page['description'])!="")
echo $page['description'];

?>


			</div>


		</div><!--/.container-->
    </section><!--/about-us-->
  
  
  <?php
  
  }
  else
  {
	  echo 'invalid Page';
	  
	  
  }
 
  ?>