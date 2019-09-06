

     <section id="about-us">
        <div class="container">
			<div class="center wow fadeInDown col-md-12">
				<h2>CLIENTS</h2>
				
                                                                <?php
if(!empty($allclients))
  {
	
	  ?> 
                                <div class="partners">
                                    <ul>
                              <?php
                  		  				   foreach ($allclients as $client)
{
                                                                       ?>              
                                     <li style="margin:10px;"><?php echo anchor('client/client','<img class="img-responsive wow fadeInDown animated" data-wow-duration="1000ms" data-wow-delay="300ms" src="'. base_url().'upload/clients/'.$client['photo'].'"title="'.$client['name'].'" alt="'.$client['name'].'" style="border: 1px solid rgb(204, 204, 204); visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInDown;"/>', 'title="'.$client['name'].'"'); ?> </li>                                                              
              
    <?php
    
}
   ?></ul>
                                    
                                
                                </div>                             
                                
              	                    

 <?php }
  else
  {
	  echo '  <br/> <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                               No result
                            </div>  ';
	  
	  
  }
 
  ?>   

			</div>
            <br/>
<?php echo $links ?>  

		</div><!--/.container-->
    </section><!--/about-us-->
  
  
  