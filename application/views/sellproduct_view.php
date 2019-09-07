

<section id="feature" class="min">
        <div class="container">
            <div class="center wow fadeInDown">        
                <h2>Sell Medicines</h2>
                             
             <?php echo validation_errors(); 

if(isset($messages))
{
echo $messages;
}

?>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="<?php echo base_url(); ?>index.php/contact/enquiry">
                <div class="col-md-12 ">

                    <h3>Seller Details</h3>
<div class="form-group col-md-3">
<label>Name *</label>
<input type="text" name="name" id="name" class="form-control validate[required]">
</div>
      <div class="form-group col-md-3">
<label>Age*</label>
<input type="text" id="contactno" name="contactno" class="form-control validate[required,custom[phone]]">
  

</div>
                      <div class="form-group col-md-3">
<label>Sex*</label>
<select id="disabledSelect" class="form-control">
          <option>Male</option>
          <option>Female</option>
        </select>
  

</div>
    <div class="form-group col-md-3">
<label>Email*</label>
<input type="text" id="email" name="email" class="form-control validate[required,custom[email]]">
</div>
    
   
      <div class="form-group col-md-3">
<label>Contact Number*</label>
<input type="text" id="contactno" name="contactno" class="form-control validate[required,custom[phone]]">
  

</div>
                          <div class="form-group col-md-3">
<label>Address*</label>
<textarea id="details" name="details" class="form-control validate[required]"></textarea>
  

</div>
                    
                    </div>
                    
                    
                                <div class="col-md-12 ">

                    <h3>Medicine Details</h3>
<div class="form-group col-md-3">
<label>Drug Name *</label>
<input type="text" name="name" id="name" class="form-control validate[required]">
</div>
      <div class="form-group col-md-3">
<label>Company Name*</label>
<input type="text" id="contactno" name="contactno" class="form-control validate[required,custom[phone]]">
  

</div>
                      <div class="form-group col-md-3">
<label>Dose*</label>
<input type="text" name="name" id="name" class="form-control validate[required]">
  

</div>
    <div class="form-group col-md-3">
<label>No of vial/tablets*</label>
<input type="text" id="email" name="email" class="form-control validate[required,custom[email]]">
</div>
    
   
      <div class="form-group col-md-3">
<label>Expiary Date*</label>
<input type="text" id="contactno" name="contactno" class="form-control validate[required,custom[phone]]">
  

</div>
                    
                          <div class="form-group col-md-3">
<label>Marked Price*</label>
<input type="text" id="contactno" name="contactno" class="form-control validate[required,custom[phone]]">
  

</div>
                    
                                              <div class="form-group col-md-3">
<label>Reason To Donate*</label>
<select id="disabledSelect" class="form-control">
          <option>Male</option>
          <option>Female</option>
        </select>
  

</div>
  
                    
                    </div>
          
<!--
                        <div class="col-md-6">
    
                                         <div class="form-group">
<label>Subject*</label>
<input type="text" id="subject" name="subject" class="form-control validate[required]">
</div>


<div class="form-group">
<label>Other Details *</label>
<textarea id="details" name="details" class="form-control validate[required]"></textarea>
</div>    
  
<div class="form-group">

<input type="submit" class="btn btn-primary" name="apply_job" value="Submit">
</div>
                       
</div>-->
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section>