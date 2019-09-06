<?php
//  if(!empty($facility))
//  {
//	

	  ?>  
<div id="content">
    <div id="slider" class="banner-container parallax">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <h3>Request Quotation</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="our-team-container">
      <div class="container">
        <div class="row">
            	 
         <div class="col-xs-12 col-sm-12 ">
                        <?php echo validation_errors(); 

if(isset($messages))
{
echo $messages;
}

?>
            <div class="about-detail">
                <form class="our_contact" name="apply" method="post" action="#" enctype="multipart/form-data" id="apply">
<div class="col-md-6 ">
   <div class="form-group">
<label>Name *</label>
<input type="text" name="name" id="name" value="" class="form-control validate[required]">
</div> 
<div class="form-group">
<label>Product*</label>
<input type="text" name="product" id="product" value="" class="form-control validate[required]">
</div>

<div class="form-group">
<label>Quantity *</label>
<input type="text" name="quantity" id="quantity" class="form-control validate[required]">
</div>
<div class="form-group">
<label>Price *</label>
<input type="number" name="price" id="price" class="form-control validate[required]">
</div>
  
 

    


</div>
          
          
          
          
          
          
          <div class="col-md-6">
    
 
    
    <div class="form-group">
<label>Email*</label>
<input type="text" id="email" name="email" class="form-control validate[required,custom[email]]">
</div>
    
   
      <div class="form-group">
<label>Contact Number*</label>
<input type="text" id="contactno" name="contactno" class="form-control validate[required,custom[phone]]">
  

</div>

<div class="form-group">
<label>Quotation details *</label>
<textarea id="details" name="details" class="form-control validate[required]"></textarea>
</div>    
  
<div class="form-group">

<input type="submit" class="quote jobbutton" name="apply_job" value="Submit">
</div>
                       
</div>
     </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
<?php
//  
//  }
//  else
//  {
//	  echo 'invalid facility';
//	  
//	  
//  }
 
  ?>