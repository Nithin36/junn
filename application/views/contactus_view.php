
 <section id="feature">
        <div class="container">
			<div class="center wow fadeInDown">
                            <h2>Address</h2>




  <?php
    if(!empty($allcontact))
  {
        ?>
                            <div class="col-sm-12 map-content">
                                   <ul class="row">
                            <?php
$i=0;
		  				   foreach ($allcontact as $contact)
{
				
//                         if($i%2==0)
//                         {
                             ?>
                             <li class="col-sm-3">
                            <?php           
                         //}
				?>
                     
                      <address>
                           <p>
                                        <?php
              if($contact['name']!="")
			  {
			  ?>
                         <strong><?php echo $contact['name'];?></strong><br/>
                          <?php
                          }
                          ?>
                                        
                                        <?php
              if($contact['address']!="")
			  {
			  ?>             <i class="fa fa-envelope"></i>
                                                        <span><?php echo $contact['address'];?></span> <br/> 
                                             
<?php
                          }
              if($contact['mobno']!="")
			  {
			  ?>
                                            
                                                        <i class="fa fa-mobile"></i>
                                                        <span><?php echo $contact['mobno'];?></span><br/>
                                               
<?php
                          }
              if($contact['telno']!="")
			  {
			  ?>
                                               
                                                        <i class="fa fa-phone"></i>
                                                        <span><?php echo $contact['telno'];?></span><br/>
                                               
<?php
                          }
              if($contact['email']!="")
			  {
			  ?>
                                                
                                                        <i class="fa fa-envelope-o"></i>
                                                        <span><a href="mailto:<?php echo $contact['email'];?>"><?php echo $contact['email'];?></a></span><br/>
                                                
                                              <?php
                          }
              if($contact['faxno']!="")
			  {
			  ?>
                                               
                                                        <i class="fa fa-file"></i>
                                                        <span><?php echo $contact['faxno'];?></span><br/>
                                                
                                                <?php
                          }
              if($contact['website']!="")
			  {
			  ?>
                                                 
                                                        <i class="fa fa-globe"></i>
                                                        <span><?php echo $contact['website'];?></span><br/>
                                                
                                                <?php
                          }
                                                ?>
                           </p>
                                </address>
                                <?php       
                                       //  if($i%2==0)
                         //{
                             ?>
                             </li>
                            <?php           
                       //  }
				?>
                                       
                           
                      
                    
                  
                       
                    <?php
                    $i=$i+1;
}

?>
                              </ul>
</div>
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


		</div><!--/.container-->
    </section><!--/about-us-->
  