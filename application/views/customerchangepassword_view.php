
                    
                    
<div class="col-md-12 col-xs-12 col-sm-10 blog-content">
    <div class="col-md-6" >
             <?php echo validation_errors(); 

if(isset($messages))
{
echo $messages;
}

?>
  
        <form id="mainform7" class="contact-form" name="contact-form" method="post" action="<?php echo base_url() ?>index.php/client/clientchangepasswordresponse/" >
           


    <div class="form-group">
<label>Password ( minimum 6 characters) *</label>
<input type="password" id="password" name="password" class="form-control validate[required]" >
</div>
        <div class="form-group">
<label>Re enter Password ( minimum 6 characters) *</label>
<input type="password" id="password2" name="password2" class="form-control validate[required,equals[password]]" >
</div>

                    <div class="form-group">

    <input type="submit" class="btn btn-primary" name="apply_job" id="formbutton7" value="Submit">
   
</div>
                      
                    </form> 

        </div>
</div>