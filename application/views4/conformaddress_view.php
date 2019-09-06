

<section id="feature">
        <div class="container">
            <div class="center wow fadeInDown">        
                <h2>Confirm Delivery Address</h2>
                             
             <?php echo validation_errors(); 

if(isset($messages))
{
echo $messages;
}

?>
            </div> 
            <div class="row contact-wrap"> 
                <div class="col-md-3 center"></div>
                <div class="col-md-6 ">
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="<?php echo base_url(); ?>index.php/product/conformorderresponse">
              


<div class="form-group">
<label>Name *</label>
<input type="text" name="name" id="name" class="form-control validate[required]">
</div>

 

    
    
    <div class="form-group">
<label>Email*</label>
<input type="text" id="email" name="email" class="form-control validate[required,custom[email]]">
</div>
    
   
      <div class="form-group">
<label>Contact Number*</label>
<input type="text" id="contactno" name="contactno" class="form-control validate[required,custom[phone]]">
  

</div>
                    
    
                                         <div class="form-group">
<label>Country*</label>
<input type="text" id="country" name="country" class="form-control validate[required]">
</div>
                                         <div class="form-group">
<label>Near by City*</label>
<input type="text" id="city" name="city" class="form-control validate[required]">
</div>

   <div class="form-group">                   
<label>Location*</label>
<input type="text" id="location" name="location" class="form-control validate[required]">
</div>    
    <div class="form-group">                   
<label>Pin code*</label>
<input type="text" id="pincode" name="pincode" class="form-control validate[required,custom[onlyNumberSp]]">
</div>                    
<div class="form-group">
<label>Address *</label>
<textarea id="address" name="address" class="form-control validate[required]"></textarea>
</div>    
                    <div class="form-group">
<label>Delivery Address *</label>
<textarea id="daddress" name="daddress" class="form-control validate[required]"></textarea>
</div> 
  
<div class="form-group center">

<input type="submit" class="btn btn-primary" name="confirm" value="Confirm">
</div>
                       
</div>
                <div class="col-md-3 center"></div>
                </form> 
                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </section>