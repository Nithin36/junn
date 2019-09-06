
                    
                    
<div class="col-md-10 col-xs-12 col-sm-10 blog-content">
    <div class="col-md-6" >
             <?php echo validation_errors(); 

if(isset($messages))
{
echo $messages;
}

?>
                                                                                  <?php
  if(!empty($profile))
  {
	
	  ?>
        <form id="mainform7" class="contact-form form-horizontal" name="contact-form" method="post" action="<?php echo base_url() ?>index.php/client/clienteditresponse/" >
           


<div class="form-group">
<label>First Name *</label>
<input type="text" name="fname" id="fname" value="<?php echo $profile['fname'] ?>" class="form-control validate[required]" >
</div>

            <div class="form-group">
<label>Last Name *</label>
<input type="text" name="lname" id="lname" value="<?php echo $profile['lname'] ?>" class="form-control validate[required]" >
</div>
                    <div class="form-group">
<label>Country *</label>
<input type="text" name="country" id="country"  value="<?php echo $profile['country'] ?>"  class="form-control validate[required]" >
</div>
                    
 
<div class="form-group">
<label>Near by city *</label>
<input type="text" name="city" id="city"  value="<?php echo $profile['city'] ?>"  class="form-control validate[required]" >
</div>
                    <div class="form-group">
<label>location *</label>
<input type="text" name="location" id="location"  value="<?php echo $profile['location'] ?>"  class="form-control validate[required]" >
</div>
                                      <div class="form-group">
<label>Email :</label>
<?php echo $profile['email'] ?>
</div>
                       <input type="hidden" name="email" id="email"  value="<?php echo $profile['email'] ?>"   >
                    <div class="form-group">
<label> Change Email *</label>
<input type="text" name="email2" id="email2"  value=""  class="form-control validate[custom[email,ajax[ajaxEmail3]]]" >
</div>
<!--                    <div class="form-group">
<label>Telephone No *</label>
<input type="text" name="telno" id="telno"  value="<?php echo $profile['telno'] ?>"  class="form-control validate[required]" >
</div>-->
                    <div class="form-group">
<label>Contact No *</label>
<input type="text" name="mobno" id="mobno"  value="<?php echo $profile['mobno'] ?>"  class="form-control validate[required]" >
</div>
                    <div class="form-group">
<label>Address *</label>
<textarea id="address" name="address" class="form-control validate[required]" > <?php echo $profile['address'] ?> </textarea>
</div> 


    

   <div id="message2" ></div>

                    <div class="form-group">

    <input type="submit" class="btn btn-primary" name="apply_job" id="formbutton7" value="Submit">
   
</div>
                      
                    </form> 
        <?php
  }
        ?>
        </div>
</div>