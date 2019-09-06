
<script type="text/javascript"> 
$(document).ready(function(){

$("#register").validationEngine({});
$('#registerbtn').click(function(e){
e.preventDefault();
if(!$("#register").validationEngine('validate')){
return false;
}
else
{  
var fname=$('input[name=fname]').val() ;
var lname=$('input[name=lname]').val(); 
var email=$('input[name=email]').val(); 
var contactno=$('input[name=contactno]').val() ;
var country=$('input[name=country]').val() ;
var state= $('input[name=state]').val() ;
var city= $('input[name=city]').val() ;
var location= $('input[name=location]').val() ;
var zipcode= $('input[name=zipcode]').val() ;
var location= $('input[name=location]').val() ;
var password= $('input[name=password]').val() ;
var repassword= $('input[name=repassword]').val() ;
var address=$('textarea#address').val();
var dataString = { register: 'register', fname: fname, lname: lname , email: email , contactno: contactno , country: country, location: location , state: state, city: city ,repassword: repassword, password: password,address:address,zipcode:zipcode };
//var dataString = 'addcontact=addcontact&mobno='+mobno+'&faxno='+faxno+'&telno='+telno+'&email='+email+'&address='+address+'&num='+num+'&website='+website+'&name='+name+'';
$.ajax({
type: "POST",
url: "<?php echo base_url() ?>index.php/placeorder/customerregisterresponse/",
data: dataString,
success: function (data) {
$("#response1").html(data);
$('input[name=fname]').val('') ;
$('input[name=lname]').val(''); 
$('input[name=email]').val(''); 
$('input[name=contactno]').val('') ;
$('input[name=country]').val('') ;
$('input[name=state]').val('') ;
$('input[name=city]').val('') ;
$('input[name=location]').val('') ;
$('input[name=zipcode]').val('') ;
$('input[name=location]').val('') ;
$('input[name=password]').val('') ;
$('input[name=repassword]').val('') ;
$('textarea#address').val('');
}
,
error: function() 
{
}
});
return false;
}
});



$("#login").validationEngine({});
$('#loginbtn').click(function(e){
e.preventDefault();
if(!$("#login").validationEngine('validate')){
return false;
}
else
{  
var email=$('input[name=emaillogin]').val() ;
var password= $('input[name=passwordlogin]').val() ;
var dataString = { login: 'login', email: email, password: password  };
//var dataString = 'addcontact=addcontact&mobno='+mobno+'&faxno='+faxno+'&telno='+telno+'&email='+email+'&address='+address+'&num='+num+'&website='+website+'&name='+name+'';
$.ajax({
type: "POST",
url: "<?php echo base_url() ?>index.php/placeorder/customerloginresponse/",
data: dataString,
success: function (data) {
$('input[name=email]').val('') ;
$('input[name=password]').val(''); 
//$("#response2").html(data);
var json = $.parseJSON(data);
if(json.status==2)
{
window.location.reload();
}
else
{       //alert(json.status);
$('#response25').html("<p> Unaurhorised to login </p>");
}
}
,
error: function() 
{
}
});
return false;
}
});


$("#confrm").validationEngine({});
$('#confrmbtn').click(function(e){
e.preventDefault();
if(!$("#confrm").validationEngine('validate')){
return false;
}
else
{  
var contactno=$('input[name=contactno]').val(); 
var city=$('input[name=city]').val() ;
var email=$('input[name=email]').val() ;
var country= $('input[name=country]').val() ;
var location= $('input[name=location]').val() ;
var zipcode= $('input[name=zipcode]').val() ;
var address=$('textarea#address').val();
var dataString = { conform: 'conform' , contactno: contactno , city: city , email: email, country: country , location: location , zipcode: zipcode , address: address};
$.ajax({
type: "POST",
url: "<?php echo base_url() ?>index.php/placeorder/conformresponse/",
data: dataString,
success: function (data) {
var json2 = $.parseJSON(data);
if(json2.status == 1)
{
window.location.reload();
}
else
{
//alert(json.status);
$('#response25').html("<p> Unaurhorised to login </p>");
}
}
,
error: function() 
{
}
});
return false;
}
});


$("#confrmorderhistory").validationEngine({});
$('#confrmorderhistorybtn').click(function(e){
e.preventDefault();
if(!$("#confrmorderhistory").validationEngine('validate')){
return false;
}
else
{  

var dataString = { confrmorderhistory: 'confrmorderhistory'};
$.ajax({
type: "POST",
url: "<?php echo base_url() ?>index.php/placeorder/conformorderhistory/",
data: dataString,
success: function (data) {
var json2 = $.parseJSON(data);
if(json2.status == 1)
{
window.location.reload();
}
else
{
//alert(json.status);
$('#response25').html("<p> Unaurhorised to login </p>");
}
}
,
error: function() 
{
}
});
return false;
}
});


$("#forgot").validationEngine({});
$('#forgotbtn').click(function(e){
e.preventDefault();
if(!$("#forgot").validationEngine('validate')){
return false;
}
else
{  
     $("#forgot26").html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
var email=$('input[name=emailforgot]').val() ;
var dataString = { forgot: 'forgot', email: email};
//var dataString = 'addcontact=addcontact&mobno='+mobno+'&faxno='+faxno+'&telno='+telno+'&email='+email+'&address='+address+'&num='+num+'&website='+website+'&name='+name+'';
$.ajax({
type: "POST",
url: "<?php echo base_url() ?>index.php/placeorder/forgotpasswordresponse/",
data: dataString,
success: function (data) {
$('input[name=emailforgot]').val('') ;
$('#forgot26').html(data);

}
,
error: function() 
{
}
});
return false;
}
});
});

function checkpayment(val)
{
  
    if($("#payment").prop('checked') == false){
      
      $('#onlinepaybtn').prop('disabled', true);
}

   if($("#payment").prop('checked') == true){
    
      $('#onlinepaybtn').prop('disabled', false);
}
}



</script>
<?php
$total=0;
?>
<section id="feature">
<div class="container">
<div class="center wow fadeInDown">
<h2>Place Order</h2>
<div class="accordion">
<div class="panel-group" id="accordion1">
<?php     if(!($this->session->userdata('cusid'))) {  ?> 
<div class="panel panel-default">
<div class="panel-heading active">
<h3 class="panel-title ">
<a class="accordion-toggle " data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
LOGIN OR SIGNUP
<i class="fa fa-angle-right pull-right"></i>
</a>
</h3>
</div>
<div id="collapseOne1" class="panel-collapse collapse in">
<div class="panel-body">
<div class="media accordion-inner">
<!--                                        <div class="pull-left">
<img class="img-responsive" src="images/accordion1.png">
</div>-->
<div class="media-body">
<div class="col-md-4">
<h4>Sign In</h4>
<div id="response25"></div>
<form  role = "form" id="login">
<div class="form-group">
<label class="pull-left">Email *</label>
<input type="text" name="emaillogin" id="emaillogin" class="form-control validate[required,custom[email]]">
</div>
<div class="form-group">
<label class="pull-left">Password*</label>
<input type="password" id="passwordlogin" name="passwordlogin" class="form-control validate[required]">
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" id="loginbtn" name="login" value="Sign In">
<!--&nbsp;<a href="#">Forgot Password?</a>-->
</div>
</form>
<a href="#" data-toggle="modal" data-target="#myModal25">Forgot Password ?</a>
</div>
<div class="col-md-8 reg">
<h4>Sign Up</h4><br/>
<div id="response1"></div>
<form class = "form-horizontal" id="register" role = "form">
<div class="col-md-6">
<div class = "form-group">
<label for = "firstname" class = "col-sm-4 control-label">First Name</label>
<div class = "col-sm-8">
<input type = "text" class = "form-control validate[required]" name="fname" id = "firstname"  placeholder = "Enter First Name">
</div>
</div>
<div class = "form-group">
<label for = "lastname" class = "col-sm-4 control-label">Last Name</label>
<div class = "col-sm-8">
<input type = "text" class = "form-control validate[required]" id = "lastname" name="lname" placeholder = "Enter Last Name">
</div>
</div>
<div class = "form-group">
<label for = "firstname" class = "col-sm-4 control-label">Email</label>
<div class = "col-sm-8">
<input type = "text" name="email" class = "form-control validate[required,custom[email]]" id = "email" placeholder = "Enter Email">
</div>
</div>
<div class = "form-group">
<label for = "Contact No" class = "col-sm-4 control-label">Contact No:</label>
<div class = "col-sm-8">
<input type = "text" name="contactno" class = "form-control validate[required,custom[phone]]" id ="contactno" placeholder = "Enter Contact No">
</div>
</div>
<div class = "form-group">
<label for = "Country"  class ="col-sm-4 control-label">Country</label>
<div class = "col-sm-8">
<input type = "text" name="country" class= "form-control  validate[required]" id ="country" placeholder = "Enter Country">
</div>
</div>
<div class = "form-group">
<label for = "firstname" class = "col-sm-4 control-label">Near by City</label>
<div class = "col-sm-8">
<input type = "text" class = "form-control validate[required]" name="city" id = "city" placeholder = "Enter Near by City">
</div>
</div>

</div>

<div class="col-md-6 reg2">
<div class = "form-group">
<label for = "lastname" class = "col-sm-4 control-label">Location</label>
<div class = "col-sm-8">
<input type = "text" name="location" class = "form-control validate[required]" id = "location" placeholder = "Enter Location">
</div>
</div>
<div class = "form-group">
<label for = "firstname" class = "col-sm-4 control-label">Zip Code</label>
<div class = "col-sm-8">
<input type = "text" name="zipcode" class = "form-control validate[required]" id = "zipcode" placeholder = "Enter Zip Code">
</div>
</div>
<div class = "form-group">
<label for = "Address" class ="col-sm-4 control-label">Address</label>
<div class = "col-sm-8">
<textarea class = "form-control validate[required]" name="address" id="address" col="4" row="4" placeholder = "Enter Address"></textarea>
</div>
</div>
<div class = "form-group">
<label for = "firstname" class = "col-sm-4 control-label">Password</label>
<div class = "col-sm-8">
<input type = "password" id = "password" name="password" class = "form-control validate[required]"  placeholder = "Enter Password">
</div>
</div>
<div class = "form-group">
<label for = "lastname" class = "col-sm-4 control-label">Re-enter password</label>
<div class = "col-sm-8">
<input type = "password" name="repassword" id="repassword" class = "form-control validate[required,equals[password]]" placeholder = "Re-enter password">
</div>
</div>
<div class = "form-group">
<div class = "col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-primary" name="register" id="registerbtn" value="Sign Up">
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
}
?>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title ">
<a class="accordion-toggle"  <?php     if(($this->session->userdata('cusid'))) { ?> data-toggle="collapse" <?php } ?>  data-parent="#accordion1" href="#collapseTwo1">
Confirm Delivery address
<i class="fa fa-angle-right pull-right"></i>
</a>
</h3>
</div>
<div id="collapseTwo1" class="panel-collapse collapse  <?php     if(($this->session->userdata('cusid'))&&(!$this->session->userdata('conform'))&&(!$this->session->userdata('orderhistory'))) { ?> in  <?php } ?>" >
<div class="panel-body">
<?php if(!empty($deliverydetails)) {?>
<div class="col-md-12 ">

<div id="response1"></div>
<form class = "form-horizontal" id="confrm" role = "form">

<div class="col-md-6">
<div class = "form-group">
<label for = "Contact No" class = "col-sm-4 control-label">Email:</label>

<div class = "col-sm-8">
<input type = "text" name="email" class = "form-control validate[required,custom[email]]" id ="email" value="<?php echo $deliverydetails['email'];?>" placeholder = "Enter Email">
</div>
</div>

<div class = "form-group">
<label for = "Contact No" class = "col-sm-4 control-label">Contact No:</label>

<div class = "col-sm-8">
<input type = "text" name="contactno" class = "form-control validate[required,custom[phone]]" id ="contactno" value="<?php echo $deliverydetails['mobno'];?>" placeholder = "Enter Contact No">
</div>
</div>
<div class = "form-group">
<label for = "Country"  class ="col-sm-4 control-label">Country</label>

<div class = "col-sm-8">
<input type = "text" name="country" class= "form-control  validate[required]" id ="country" value="<?php echo $deliverydetails['country'];?>" placeholder = "Enter Country">
</div>
</div>

<!--<div class = "form-group">
<label for = "State/Province" class = "col-sm-4 control-label">State/Province</label>

<div class = "col-sm-8">
<input type = "text" class = "form-control validate[required]" name="state" value="<?php echo $deliverydetails['country'];?>"  id ="state" placeholder = "Enter State/Province">
</div>
</div>-->

<div class = "form-group">
<label for = "Near by City" class = "col-sm-4 control-label">Near by City</label>

<div class = "col-sm-8">
<input type = "text" class = "form-control validate[required]" name="city" id = "city" value="<?php echo $deliverydetails['city'];?>" placeholder = "Enter Near by City">
</div>
</div>

</div>

<div class="col-md-6 reg">


<div class = "form-group">
<label for = "Location" class = "col-sm-4 control-label">Location</label>

<div class = "col-sm-8">
<input type = "text" name="location" class = "form-control validate[required]" id ="location" value="<?php echo $deliverydetails['location'];?>" placeholder = "Enter Location">
</div>
</div>

<div class = "form-group">
<label for = "Zip Code" class = "col-sm-4 control-label">Zip Code</label>

<div class = "col-sm-8">
<input type = "text" name="zipcode" class = "form-control validate[required]" id = "zipcode"  value="<?php echo $deliverydetails['pincode'];?>" placeholder = "Enter Zip Code">
</div>
</div>

<div class = "form-group">
<label for = "Address" class ="col-sm-4 control-label">Address</label>

<div class = "col-sm-8">
<textarea class = "form-control validate[required]" name="address" id="address" col="4" row="4" placeholder = "Enter Address"><?php echo $deliverydetails['address'];?></textarea>
</div>
</div>


<div class = "form-group">
<div class = "col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-primary" name="confrmbtn" id="confrmbtn" value="Confirm">
</div>
</div>

</form>
</div>
</div>
<?php
}
?>


</div>
</div>
</div>

<!--<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<a class="accordion-toggle"  data-parent="#accordion1" href="#collapseThree1">
Confirm order details
<i class="fa fa-angle-right pull-right"></i>
</a>
</h3>
</div>
<div id="collapseThree1" class="panel-collapse collapse">
<div class="panel-body">
Confirm order details
</div>
</div>
</div>-->


<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title ">
<a class="accordion-toggle " <?php     if(($this->session->userdata('cusid'))&&($this->session->userdata('conform'))) { ?> data-toggle="collapse" <?php } ?> data-parent="#accordion1" href="#collapseFour1">
Order History
<i class="fa fa-angle-right pull-right"></i>
</a>
</h3>
</div>
<div id="collapseFour1" class="panel-collapse collapse <?php     if(($this->session->userdata('cusid'))&&($this->session->userdata('conform'))&&(!$this->session->userdata('orderhistory'))) { ?> in  <?php } ?>">
<div class="panel-body">

<?php
//print_r($productorders);
if(!empty($productorders))
{
?>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover ">
<thead>
<tr>
<th>Photo</th>
<th>Product Title</th>
<th>No of items</th>
<th>Price</th>
<th>Total price</th>
<th>Available Items</th>
<th>Status</th>
<th>Cancel</th>
</tr>
</thead>
<tbody>
<?php
$total=0;
$j=1;
   foreach ($productorders as $productorder)
{
$select= $productorder['pnoofitems']-$productorder['solditems'];
$stock="in stock";
if(($select<0)||($select==0))
{
$stock="Out of stock";
$select=0; 
}
else {
$total=$total+$productorder['totalprice'];  
}
  ?> 
<tr id="row<?php echo $j; ?>" <?php  if(($select<0)||($select==0))
{
?>
style="background-color: #b3aaaa;"
<?php
}
?>
>
<td><img style="height:100px; width: 100 px;" class="img-responsive" src="<?php echo base_url()?>upload/products/thumb2/<?php echo $productorder['productphoto']?>" /></td>
<td><?php echo $productorder['producttitle']?>&nbsp;<?php echo $productorder['pquantity']?>&nbsp; <?php echo $productorder['sunit']?><br/>
<span id="response<?php echo $j; ?>"></span>
</td>
<td><select disabled="disabled" onchange="changecart(this.value,'<?php echo $this->encrypt->encode($productorder['id']) ?>','<?php echo $j; ?>')">
<?php 
for($i=1;$i<=$select;$i++)
{
?>
<option  <?php if($i==$productorder['noofitems']) {?> selected="selected" <?php }?>value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>
</td>
<td><i class="fa fa-rupee"></i> <?php echo $productorder['price'] ?></td>
<td id="pr<?php echo $j; ?>"><i class=" fa fa-rupee"></i> <?php echo $productorder['totalprice'] ?></td>
<td id="si<?php echo $j; ?>" ><?php echo  $select; ?></td>
<td id="s<?php echo $j; ?>"><?php echo  $stock; ?></td>
<td> <a href="#" onclick="deletecart('<?php echo $this->encrypt->encode($productorder['id']) ?>','<?php echo $j; ?>')"><i class=" fa fa-bitbucket-square fa-2x"></a></i></td>
</tr>
<?php
$j++;
}
?>
</tbody>
</table>
</div>
<h4>   <span>Total Price</span> <span>:</span> <span><i class=" fa fa-rupee"></i> <span class="tot1"><?php echo $total ?></span></span>  </h4> 

<?php 
}
else
{
echo '  <br/> <div class="alert alert-info alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
No Products in the cart....
</div>  ';
}
?> 


<form  class="form-horizontal pull-left" id="confrmorderhistory" action="" role = "form">

<div class = "form-group">
<div class = "col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-primary" name="confrmorderhistorybtn" id="confrmorderhistorybtn" value="Continue">
</div>
</div>

</form>
</div>
</div>
</div>




<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title ">
<a class="accordion-toggle " <?php     if(($this->session->userdata('cusid'))&&($this->session->userdata('orderhistory'))) { ?> data-toggle="collapse" <?php } ?> data-parent="#accordion1" href="#collapseFive1">
Payment options
<i class="fa fa-angle-right pull-right"></i>
</a>
</h3>
</div>
<div id="collapseFive1" class="panel-collapse collapse <?php     if(($this->session->userdata('cusid'))&&($this->session->userdata('conform'))&&($this->session->userdata('orderhistory'))) { ?> in  <?php } ?>">
<div class="panel-body">
<?php 

$purpose=" ";
$phone=" ";
$buyer=" ";
$email=" ";
$time1 = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

$orderdate=$time1->format('Y-m-d h:i:s');
$date1=  explode(' ',$orderdate );
if(!empty($deliverydetails)) {
    $purpose=" ";
$phone=$deliverydetails['mobno'];

$email=$deliverydetails['email'];
if(!empty($customerdetail)) {
   $buyer=$customerdetail['fname']." ".$customerdetail['lname']; 
   $purpose="Order from ".$buyer;
}

}
//$total=9;


    $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
array("X-Api-Key:6ad02bfaf46dd0133d3c7ce7a20c7418",
"X-Auth-Token:298fae5a4401f0a5d79a38897d2fa41e"));
$payload = Array(
    'purpose' => $purpose,
    'amount' => $total,
    'phone' => $phone,
    'buyer_name' => $buyer,
    'redirect_url' => base_url().'index.php/placeorder/sucessorder/',
    'send_email' => false,
    'webhook' => '',
    'send_sms' => true,
    'email' => $email,
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

$json_decode=json_decode($response,true);
$long_url=$json_decode['payment_request']['longurl'];

//$long_url=  base_url()."index.php/placeorder/sucessorder"
?>
    
  
    <form  class="form-horizontal pull-left" id="onlinepay" action="<?php echo $long_url;?>" role = "form">
<div class = "form-group">


<div class = "col-sm-12">
     <span>Total Price</span> <span>:</span> <span><i class=" fa fa-rupee"></i> <span class="tot1"><?php echo $total ?></span></span>   
    <input type = "checkbox" checked="checked" onclick="checkpayment(this.value)" name="payment" class = "form-control validate[required]" id ="payment"  value="1" >
    <label for = "Instamojo" class ="col-sm-4 control-label ">Instamojo</label>
    
</div>
</div>
<div class = "form-group">
<div class = "col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-primary" name="onlinepaybtn" id="onlinepaybtn" value="Pay Online">
</div>
</div>

</form>


</div>
</div>
</div>
</div><!--/#accordion1-->
</div>

</div>


</div><!--/.container-->
</section><!--/about-us-->


<div class="modal fade " id="myModal25" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 style="color:#4e4e4e;" class="modal-title" id="myModalLabel">Forgot Password ?</h4>
</div>
<!--                                        <div class="modal-body">Will Update Soon</div>-->
<div class="modal-body" >


<div id="forgot26" ></div>
<form id="forgot" class="contact-form" name="contact-form" method="post" >


<div class="form-group">
<label>Email*</label>
<input type="text" id="emailforgot" name="emailforgot" class="form-control validate[required,custom[email]]" >
</div>




<div class="form-group">

<input type="submit" class="btn btn-primary" name="apply_job" id="forgotbtn" value="Submit">
</div>



</form> 

</div>
</div>

</div>
</div>