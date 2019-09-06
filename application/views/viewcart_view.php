<section id="feature">
<div class="container">
<div class=" wow fadeInDown center">
<h2>View Cart</h2>
</div>
<div class=" wow fadeInDown">
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
<td><select onchange="changecart(this.value,'<?php echo $this->encrypt->encode($productorder['id']) ?>','<?php echo $j; ?>')">
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
<a href="<?php echo base_url() ?>index.php/placeorder/placeorder/" class="btn btn-primary">Check Out</a>
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
</div>
</div><!--/.container-->
</section><!--/about-us-->
