<section id="about-us" class="shortcode-item">
        <div class="container">
            <h2>Vechiles</h2>
            <div class="row">
                
            

                                                                                                          <?php
if(!empty($allvechile))
  {
?>
    
<table class="table ">
            <thead>
              <tr>
                <th>Vechiles</th>
                 <th></th>
                <th></th>
                <th>No of items</th>
              
           
              </tr>
            </thead>
            <tbody>
                	<?php
	    
                  		  				   foreach ($allvechile as $vechile)
{
                                                                       ?>  
              <tr>
                <td><?php echo $vechile['name'] ?></td>
                 <td></td>
                <td></td>
                <td><?php echo $vechile['quantity'] ?></td>
                
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