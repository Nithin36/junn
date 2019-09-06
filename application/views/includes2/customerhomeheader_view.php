


<section id="feature">
<div class="container">
<div class="center wow fadeInDown col-md-12">

    <div class="col-md-4">
<div class="widget archieve">
                        <h3>My Account</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="blog_archieve">
                                    <li><a href="<?php echo base_url() ?>index.php/customer/customerhome/">View Profile </a></li>
                                    <li><a href="<?php echo base_url() ?>index.php/customer/customeredit/">Edit Account</a></li>
                                         <li><a href="<?php echo base_url() ?>index.php/customer/customeredit/">Order History</a></li>
                                    <li><a href="<?php echo base_url() ?>index.php/customer/customerchangepassword/">Change Password </a></li>
                                    <li><a href="<?php echo base_url() ?>index.php/customer/customerlogout/">Logout</a></li>
                                </ul>
                            </div>
                        </div>                     
                    </div>
<!--<div class="col-xs-12 col-md-12 col-sm-12 text-center">
<div class="entry-meta">
<span id="publish_date">My Account</span>
<span><a href="<?php echo base_url() ?>index.php/client/clienthome/">View Profile </a></span>
<span><a href="<?php echo base_url() ?>index.php/client/clientproject/">Projects</a> </span>

<span><a href="<?php echo base_url() ?>index.php/client/clientedit/">Edit Account</a> </span>
<span><a href="<?php echo base_url() ?>index.php/client/clientchangepassword/">Change Password </a></span>
<span><a href="<?php echo base_url() ?>index.php/client/clientlogout/">Logout</a> </span>

</div>
</div>-->
    </div>     
    
    <div class="col-md-8">
        
    <ol class="breadcrumb bread">

<?php
if($this->router->fetch_method()=="customerhome")
{
?>
<li><a href="#">My Account</a></li>				                                                                                            
<li class="active">View Profile</li>
<?php
}
else  if($this->router->fetch_method()=="customeredit")
{
?>
<li><a href="#">My Account</a></li>				                                                                                            
<li class="active">Edit Account</li>
<?php
}
else  if($this->router->fetch_method()=="customerchangepassword")
{
?>
<li><a href="#">My Account</a></li>				                                                                                            
<li class="active">Change Password</li>
<?php
                        }
else  if(($this->router->fetch_method()=="clientproject")||($this->router->fetch_method()=="clientsingleproject"))
{
?>
<li><a href="#">My Account</a></li>				                                                                                            
<li class="active">Projects</li>
<?php
}
else  if(($this->router->fetch_method()=="clientprojectstatus"))
{
?>
<li><a href="#">My Account</a></li>				                                                                                            
<li class="active">Projects</li>
<?php
}
?>

</ol>