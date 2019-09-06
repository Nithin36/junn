<section id="about-us" class="shortcode-item">
        <div class="container">
            <h2>Downloads</h2>
            <div class="row">
                
            

                                                                                                          <?php
if(!empty($alldownload))
  {
?>
    
<table class="table ">
            <thead>
              <tr>
                <th>Title</th>
                 <th></th>
                <th></th>
                <th>Download</th>
              
           
              </tr>
            </thead>
            <tbody>
                	<?php
	    
                  		  				   foreach ($alldownload as $download)
{
                                                                       ?>  
              <tr>
                <td><?php echo $download['name'] ?></td>
                 <td></td>
                <td></td>
                <td><?php echo anchor(base_url().'upload/downloads/'.$download['doc'],'Download Now');?></td>
                
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
                
                
                
            </div>
        </div>
    </section>