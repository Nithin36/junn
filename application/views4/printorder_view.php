<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body onload="window.print()">
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
     if(($select==0)||($select<0))
     {
          $stock="Out of stock";
          $select=0; 
     }
 else {
            $total=$total+$productorder['totalprice'];  
     }

                                                                       ?> 
              <tr  <?php  if(($select==0)||($select<0))
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
    </body>
</html>
