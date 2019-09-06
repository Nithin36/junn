
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>


</head>

<body style="background-color:#e3e3e3;">
    <?php
   
    ?>
<div class="cover" style="width:1000px; height:auto; margin:0 auto; ">

<table width="700" border="0" align="center"   cellspacing="0" cellpadding="2"  >
  <tr>
    <td height="79" bgcolor="#FFFFFF">
        <img src="<?php echo base_url() ?>images/logo.png" style="padding-left:20px;" />
    
    </td>
  </tr>
  <tr>
    <td height="0" bgcolor="#000"></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0">
         <p>Please  Contact this customer for confirming these orders..</p>
    <p style="margin-left:10px;">
                 <?php
//print_r($productorders);
       if(!empty($customerdetails))
{
  
?>
                <h3>Contact Details</h3>
       
<table border="1">
            <thead>
              <tr>
               <th>Profile</th>
                 <th>Address</th>
                  <th>Delivery Address</th>
                
               
              
           
              </tr>
            </thead>
            <tbody>
                      <tr>
               <td>
                   <table>
                       <tr><td>Name</td><td>:</td><td>&nbsp;&nbsp;<?php echo $customerdetails['name'] ?></td></tr>
                       <tr><td>Contact no</td><td>:</td><td>&nbsp;&nbsp;<?php echo $customerdetails['mobno'] ?></td></tr>
                       <tr><td>Email</td><td>:</td><td>&nbsp;&nbsp;<?php echo $customerdetails['email'] ?></td></tr>
                       <tr><td>Country</td><td>:</td><td>&nbsp;&nbsp;<?php echo $customerdetails['country'] ?></td></tr>
                       <tr><td>Near by city</td><td>:</td><td>&nbsp;&nbsp;<?php echo $customerdetails['city'] ?></td></tr>
                       <tr><td>Location</td><td>:</td><td>&nbsp;&nbsp;<?php echo $customerdetails['location'] ?></td></tr>
                       <tr><td>Pin no</td><td>:</td><td>&nbsp;&nbsp;<?php echo $customerdetails['pincode'] ?></td></tr>
                   </table>
                 
               </td>
                 <td><?php echo $customerdetails['address'] ?></td>
                  <td><?php echo $customerdetails['daddress'] ?></td>
                
               
              
           
              </tr>
            </tbody>
             
          </table>
                <br/>
     
                               <?php
}
//print_r($productorders);
       if(!empty($productorders))
{
  
?>
        <h3>Order Details</h3>
       
<table border="1">
            <thead>
              <tr>
               <th>Order id</th>
                 <th>Photo</th>
                  <th>Product Title</th>
                <th>No of items</th>
                <th>Price</th>
                <th>Total price</th>
               
                <th>Status</th>
               
              
           
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
     if(($select<0))
     {
          $stock="Out of stock";
          $select=0; 
     }
 else {
            $total=$total+$productorder['totalprice'];  
     }

                                                                       ?> 
              <tr  <?php  if(($select<0))
     {
         ?>
                  style="background-color: #594343;"
                  <?php
     }
     ?>
     >
                  <td><?php echo $productorder['orderid']?></td>
                <td><img style="height:100px; width: 100 px;" class="img-responsive" src="<?php echo base_url()?>upload/products/thumb2/<?php echo $productorder['productphoto']?>" /></td>
                <td><?php echo $productorder['producttitle']?>&nbsp;<?php echo $productorder['pquantity']?>&nbsp; <?php echo $productorder['sunit']?><br/>
                   
                </td>
                <td>
                <?php echo $productorder['noofitems'] ?>
                </td>
                      <td><i class="fa fa-rupee"></i> <?php echo $productorder['price'] ?></td>
                         <td><i class=" fa fa-rupee"></i> <?php echo $productorder['totalprice'] ?></td>
              
                
             
                <td><?php echo  $stock; ?></td>
                
              </tr>

 <?php
 $j++;
}
?>
             
              
            </tbody>
          </table>
    <br/>
        <h4>   <span>Total Price</span> <span>:</span> <span><i class=" fa fa-rupee"></i> <span class="tot1"><?php echo $total ?></span></span>  </h4> 
        
        
                      <?php 
}

 
  ?> 
    

</p>
      </td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#eee">
    
    
    
     <p style="color:#575757; line-height:21px; text-align:justify; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; 
font-size:13px;"></a><br />
 This is system generated Mail. Please do not reply to this message.</p>
    
    
    </td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#eee">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#eee">
   
    
    </td>
  </tr>
</table>
 



</div>


</body>
</html>
