<section id="about-us" class="shortcode-item">
        <div class="container">
            <h2>Manpower</h2>
            <div class="row">
                
            

                                                                                                          <?php
if(!empty($allmanpower))
  {
?>
    
<table class="table ">
            <thead>
              <tr>
                <th>Designation</th>
                 <th></th>
                <th></th>
                <th>Quantity</th>
              
           
              </tr>
            </thead>
            <tbody>
                	<?php
	    
                  		  				   foreach ($allmanpower as $manpower)
{
                                                                       ?>  
              <tr>
                <td><?php echo $manpower['name'] ?></td>
                 <td></td>
                <td></td>
                <td><?php echo $manpower['quantity'] ?></td>
                
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