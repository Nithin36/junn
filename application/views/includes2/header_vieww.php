<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="description" content="">

<meta name="author" content="">

<title>Junaid</title>

<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet"> 

<!-- core CSS -->

<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>css/animate.min.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>css/prettyPhoto.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>css/responsive.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>css/validationEngine.jquery.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>css/jquery.bxslider.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>css/prettyPhoto.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>css/jquery.bxslider.css" rel="stylesheet">



<script src="<?php echo base_url(); ?>js/jquery.js"></script>

<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>js/jquery.prettyPhoto.js"></script>

<script src="<?php echo base_url(); ?>js/jquery.isotope.min.js"></script>

<script src="<?php echo base_url(); ?>js/main.js"></script>

<script src="<?php echo base_url(); ?>js/wow.min.js"></script>

<script src="<?php echo base_url(); ?>js/jquery.validationEngine.js"></script>

<script src="<?php echo base_url(); ?>js/jquery.validationEngine-en.js"></script>

<!--<script src="<?php echo base_url(); ?>js/jquery.bxslider.js"></script>-->



<script type="text/javascript">

$(document).ready(function () {



$("#main-contact-form").validationEngine({});



$("#form1").validationEngine({});

$('#formbutton1').click(function (e) {

e.preventDefault();

if (!$("#form1").validationEngine('validate')) {

return false;

}

else

{

var pid = $('input[name=pid]').val();

var dataString = {pid: pid};

$("#formbutton1").attr("disabled", "disabled");

$("#response").html('<i class="fa fa-spinner fa-spin"></i> Adding to cart. Please wait...')

$.ajax({

type: "POST",

url: "<?php echo base_url() ?>index.php/product/addtocartresponse/",

data: dataString,

success: function (data) {

var json = $.parseJSON(data);

if (json.status == "1")

{

$("#response").html('');

$("#formbutton1").removeAttr("disabled");

$("#cart1").modal();

}

else if (json.status == "2")

{

 //leads to view    

$("#response").html('');

$("#formbutton1").removeAttr("disabled");

window.location = "<?php echo base_url() ?>index.php/product/viewcart/";

}

else if (json.status == "3")

{

$("#response").html('');

$("#formbutton1").removeAttr("disabled");

$("#cart2").modal();

}

else if (json.status == "4")

{

$("#response").html('');

$("#formbutton1").removeAttr("disabled");

$("#cart3").modal();

}

$("#cou").html(json.noofitems);

}

,

error: function ()

{

}

});

return false;

}

});













$("#login2").validationEngine({});



$('#login2btn').click(function (e) {

e.preventDefault();

if (!$("#login2").validationEngine('validate')) {

return false;

}

else

{

var email = $('input[name=email2]').val();

var password = $('input[name=password23]').val();

var dataString = {login: 'login', email: email, password: password};

//var dataString = 'addcontact=addcontact&mobno='+mobno+'&faxno='+faxno+'&telno='+telno+'&email='+email+'&address='+address+'&num='+num+'&website='+website+'&name='+name+'';

$.ajax({

type: "POST",

url: "<?php echo base_url() ?>index.php/placeorder/customerloginresponse2/",

data: dataString,

success: function (data) {

var json = $.parseJSON(data);

//alert(json.status);

if (json.status == 2)

{

window.location = "<?php echo base_url() ?>index.php/home/home/";

}

else

{

}

$('input[name=email2]').val('');

$('input[name=password23]').val('');

//$("#response2").html(data);

}

,

error: function ()

{

}

});

return false;

}

});

});





function changecart(val1, val2, val3)

{

var dataString = {sid: val1, oid: val2};

$("#response" + val3).html('<i class="fa fa-spinner fa-spin"></i> updating...')

$.ajax({

type: "POST",

url: "<?php echo base_url() ?>index.php/product/addtocartresponse2/",

data: dataString,

success: function (data) {

var json = $.parseJSON(data);

$("#response" + val3).html('');

$("#pr" + val3).html('<i class=" fa fa-rupee"></i> ' + json.totalprice);

$("#s" + val3).html(json.stockstatus);

$("#si" + val3).html(json.stockitems);

if (json.status == 2)

{

$("#row" + val3).css('background-color', '#594343');

}

$(".tot1").html(json.wholeamount);

}

,

error: function ()

{

}

});

}





function deletecart(val1, val2)

{

var dataString = {did: val1};

$("#response" + val2).html('<i class="fa fa-spinner fa-spin"></i> deleting...')

$.ajax({

type: "POST",

url: "<?php echo base_url() ?>index.php/product/deleteorderresponse/",

data: dataString,

success: function (data) {

var json = $.parseJSON(data);

if (json.status == 1)

{

$("#row" + val2).hide();

}

$(".tot1").html(json.wholeamount);

window.location.reload();

}

,

error: function ()

{

}

});

}





</script>





<!--[if lt IE 9]>

<script src="js/html5shiv.js"></script>

<script src="js/respond.min.js"></script>

<![endif]-->       

<link rel="shortcut icon" href="images/ico/favicon.ico">

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>images/ico/apple-touch-icon-144-precomposed.png">

<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>images/ico/apple-touch-icon-114-precomposed.png">

<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>images/ico/apple-touch-icon-72-precomposed.png">

<link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>images/ico/apple-touch-icon-57-precomposed.png">



</head><!--/head-->



<body class="homepage">

<header id="header">

<div class="top-bar">

<div class="container">

<div class="row">



<div class="col-sm-6 col-xs-4">

<?php

if (!empty($homecontacts)) {

?>

<div class="col-sm-6">





<i class="fa fa-mobile" aria-hidden="true"></i> <?php if (trim($homecontacts['telno']) != " ") echo $homecontacts['telno'] ?>

</div>

<div class="col-sm-6">

<i></i> <?php if (trim($homecontacts['email']) != " ") echo $homecontacts['email'] ?>              

</div>

<?php

}

?>

</div>





<div class="col-sm-2 col-xs-4">

<div class="social">

<ul class="social-share">

<li><a href="https://www.facebook.com/junaidaluva2017" target="_blank"><i class="fa fa-facebook"></i></a></li>

<li><a href="https://twitter.com/?request_context=signup" target="_blank"><i class="fa fa-twitter"></i></a></li>



</ul>

</div>

</div>

<div class="col-sm-3 col-xs-8">



<ul class="list-inline pull-right" style="margin-bottom:0">



<li class="dropdown dropdown-small">



<?php if (($this->session->userdata('cusid'))) { ?>

<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">My Account :</span><b class="caret"></b></a>

<ul class="dropdown-menu">

    <li><a href="<?php echo base_url(); ?>index.php/customer/customerlogout">Log out</a></li>

</ul>

<?php

} else {

?>





<?php

}

?>





</li>



<?php

if ($this->router->fetch_class() != "placeorder") {

?>

<li class="">

<div class="shopping-item">

<a href="<?php echo base_url() ?>index.php/product/viewcart/">Cart - <i class="fa fa-shopping-cart"></i> <span class="product-count" id="cou"><?php echo $cartlist['noofitems'] ?></span></a>

</div></li>

<?php

}

?>



</ul>

</div>

</div>









</div><!--/.container-->

</div><!--/.top-bar-->





<nav class="navbar navbar-inverse" role="banner">

<div class="new_toppart"> 

<div class="container">

<div class="row">

<div class="col-sm-10">

<a class="navbar-brand" href="index.php"><img src="<?php echo base_url(); ?>images/logo.png" alt="logo"></a>

</div>  



</div>

</div>

</div>

<div class="new_toppart1"> 

<div class="container">

<div class="navbar-header">

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

<span class="sr-only">Toggle navigation</span>

<span class="icon-bar"></span>

<span class="icon-bar"></span>

<span class="icon-bar"></span>

</button>



</div>



<div class="collapse navbar-collapse navbar-left">

<!--                    <ul class="nav navbar-nav">

<li class="active"><a href="index.html">Women's</a></li>

<li><a href="#">Men's</a></li>

<li><a href="#">Best Sellers</a></li>

<li><a href="#">All Products</a></li>

<li><a href="#">Contact Us</a></li>





</ul>-->





<ul class="nav navbar-nav">

<li <?php if ($this->router->fetch_class() == "home") { ?> class="active" <?php } ?>> <?php echo anchor('home/home', 'Home'); ?> </li>

<?php

if (!empty($pagelinks)) {



foreach ($pagelinks as $menu) {



if (!empty($menu['sub'])) {

?>

<li class="dropdown <?php if (($this->arrayfunctions->check_array_match_element($menu['sub'], 'id', $this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='), $this->uri->segment(3))))) && ($this->router->fetch_class() == "page")) { ?> active  <?php } ?> "> <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $menu['name']; ?><i class="fa fa-angle-down"></i></a>

<ul class="dropdown-menu">

<?php

foreach ($menu['sub'] as $sub) {

?>

<li>  <?php echo anchor('page/subpage/' . str_replace(array('+', '/', '='), array('-', '_', '~'), $this->encrypt->encode($sub['id'])), stripcslashes($sub['name']), 'title="' . stripcslashes($sub['name']) . '"'); ?> </li>



<?php

}

?>



</ul>

</li>



<?php

} else {

?>

<li <?php if (($this->router->fetch_class() == "page") && (str_replace(array('+', '/', '='), array('-', '_', '~'), $this->encrypt->encode($menu['id']) == $this->uri->segment(3)))) { ?> class="active" <?php } ?>>  <?php echo anchor('page/page/' . str_replace(array('+', '/', '='), array('-', '_', '~'), $this->encrypt->encode($menu['id'])), $menu['name'], 'title="' . $menu['name'] . '"'); ?> </li>

<?php

}

}

}

?>





<?php

if (!empty($categories)) {



foreach ($categories as $category) {

?>  

<li <?php if (($this->router->fetch_class() == "product") && ($this->router->fetch_method() == "listproduct") && ($this->encrypt->decode(str_replace(array('-', '_', '~'), array('+', '/', '='), $_GET['id'])) == $category['id'])) { ?> class="active" <?php } ?>> 

<a  href="<?php echo base_url() ?>index.php/product/listproduct/index?id=<?php echo str_replace(array('+', '/', '='), array('-', '_', '~'), $this->encrypt->encode($category['id'])); ?>"><?php echo $category['name']; ?></a> </li>                    



<?php

}

}

?>        







<!--<li <?php if ($this->router->fetch_class() == "product") { ?> class="active" <?php } ?>> <?php echo anchor('product/product', 'Products'); ?> </li>-->

<li <?php if ($this->router->fetch_class() == "news") { ?> class="active" <?php } ?>> <?php echo anchor('news/news', 'News & Events'); ?> </li>   

<!--                <li class="dropdown">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">Gift Sets <i class="fa fa-angle-down"></i></a>

<ul class="dropdown-menu">

<li><a href="blog-item.html">Blog Single</a></li>

<li><a href="pricing.html">Pricing</a></li>

<li><a href="404.html">404</a></li>

<li><a href="shortcodes.html">Shortcodes</a></li>

</ul>

</li>

-->



<li class="dropdown <?php if ($this->router->fetch_class() == "contact") { ?> active <?php } ?>">

<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">Contact Us <i class="fa fa-angle-down"></i></a>

<ul class="dropdown-menu">

<li><?php echo anchor('contact/address', 'Address'); ?></li>

<li><?php echo anchor('contact/locationmap', 'Location Map'); ?></li>

<li><?php echo anchor('contact/enquiry', 'Enquiry'); ?></li> 

</ul>

</li>

</ul>

</div><!--<div class="search pull-right">

<form role="form">

<input type="text" class="search-form" autocomplete="off" placeholder="Search">

<i class="fa fa-search"></i>

</form>

</div>-->

</div>

</nav><!--/nav-->



</header><!--/header-->









