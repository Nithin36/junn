<section id="about-us" class="shortcode-item">
        <div class="container">
            <h2>Equipment</h2>
            <div class="row">
                
            

                                                                                                          <?php
if(!empty($allequipment))
  {
?>
    
<table class="table ">
            <thead>
              <tr>
                <th>Equipment</th>
               
                <th>Model</th>
                <th>Quantity</th>
              
           
              </tr>
            </thead>
            <tbody>
                	<?php
	    
                  		  				   foreach ($allequipment as $equipment)
{
                                                                       ?>  
              <tr>
                <td><?php echo $equipment['name'] ?></td>
              
                <td><?php echo $equipment['model'] ?></td>
                <td><?php echo $equipment['quantity'] ?></td>
                
              </tr>
   <?php
}
   ?>
             
             
              
            </tbody>
          </table>
         

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
                
                
                                               <br/>
<?php echo $links ?> 
            </div>
        </div>
    </section>