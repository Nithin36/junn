
<section id="about-us">
        <div class="container">
            <div class="center wow fadeInDown">        
                <h2>Apply Job</h2>
                             
<?php echo validation_errors(); 
if(isset($error))
{
echo $error;
}
if(isset($messages))
{
echo $messages;
}

?>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" enctype="multipart/form-data" name="contact-form" method="post" action="<?php echo base_url(); ?>index.php/job/submitapplication">
                <div class="col-md-6 ">
<div class="form-group">
<label>Post Applied For *</label>
<input type="text" name="post_applied" id="post_applied" <?php if(isset($jobtitle)) { ?>value="<?php echo $jobtitle;?>" <?php } ?> class="form-control validate[required]">
</div>

<div class="form-group">
<label>Name *</label>
<input type="text" name="name" id="name" class="form-control validate[required]">
</div>
<div class="form-group">
<label>Age *</label>
<input type="number" name="age" id="age" class="form-control validate[required]">
</div>
         <div class="form-group">
<label>Gender*</label>
<select name="gender" id="gender" class="form-control validate[required]">
    <option value="male">Male</option>   
    <option value="female">Female</option>   
</select>
  

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
<label>Nationality*</label>
<input type="text" id="nationality" name="nationality" class="form-control validate[required]">
</div>
</div>
                        <div class="col-md-6">
    
                 <div class="form-group">
<label>Passport Details*</label>
<input type="text" id="passport" name="passport" class="form-control validate[required]">
</div>
                             <div class="form-group">
<label>Iqama Details*</label>
<input type="text" id="iqamadetails" name="iqamadetails" class="form-control validate[required]">
</div>
                                         <div class="form-group">
<label>Iqama Status*</label>
<input type="text" id="zipcode" name="iquamastat" class="form-control validate[required]">
</div>


<div class="form-group">
<label>Enter a brief description about your Experience &amp; Qualification *</label>
<textarea id="resume" name="resume" class="form-control validate[required]"></textarea>
</div>    
                    <div class="form-group">
<label>Attach Resume(1MB)(only doc,docx,pdf)*</label>
<input type="file" id="attachresume" name="attachresume" class="form-control validate[required]">
</div>
<div class="form-group">

<input type="submit" class="btn btn-primary" name="apply_job" value="Submit">
</div>
                       
</div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section>