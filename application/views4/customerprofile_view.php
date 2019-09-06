
                    
                    
                    <div class="col-md-10 col-xs-12 col-sm-10 blog-content">
                                                                             <?php
  if(!empty($profile))
  {
	
	  ?>
                    <div class="col-md-6">
                        
                                         <div class="col-md-12 pr">    <div class="col-md-5">First Name </div> <div class="col-md-2">:</div><div class="col-md-5"><?php echo $profile['fname'] ?></div></div>  
                     <div class="col-md-12 pr">    <div class="col-md-5">Last Name </div> <div class="col-md-2">:</div><div class="col-md-5"><?php echo $profile['lname'] ?></div></div>    
                         <div class="col-md-12 pr"> <div class="col-md-5">Country </div><div class="col-md-2">:</div> <div class="col-md-5"><?php echo $profile['country'] ?></div></div>
                         <div class="col-md-12 pr"> <div class="col-md-5">Near by city </div> <div class="col-md-2">:</div><div class="col-md-5"><?php echo $profile['city'] ?></div></div>
                        <div class="col-md-12 pr">  <div class="col-md-5">Location </div> <div class="col-md-2">:</div><div class="col-md-5"><?php echo $profile['location'] ?></div></div>
              
                        
                         <div class="col-md-12 pr"> <div class="col-md-5">Email </div> <div class="col-md-2">:</div><div class="col-md-5"><?php echo $profile['email'] ?></div></div>
    
                         <div class="col-md-12 pr"> <div class="col-md-5">Mob no </div> <div class="col-md-2">:</div><div class="col-md-5"><?php echo $profile['mobno'] ?></div></div>
                          <div class="col-md-12 pr"> <div class="col-md-5">Zip code </div> <div class="col-md-2">:</div><div class="col-md-5"><?php echo $profile['pincode'] ?></div></div>
                         <div class="col-md-12 pr"> <div class="col-md-5">Address </div><div class="col-md-2">:</div> <div class="col-md-5"><?php echo $profile['address'] ?></div></div>
                    </div>
                    <?php
  }
                    ?>   

                                </div>