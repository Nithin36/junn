<?php
session_start();
if(isset($_SESSION['id']))
{

    function __autoload($class_name) 
{
   require_once "model/".$class_name.".php";
    
}
$login_model=new login_model();
 ?>
<!DOCTYPE html>
<html>

<?php
   include'view/head.php';
?>

<body>
  <!--  wrapper -->
  <div id="wrapper">
      <?php
       include'view/header.html';
     include'view/navigation.html';
     ?>
       <div id="page-wrapper">
<div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Change Password</h1>
                </div>
                <!--end page header -->
            </div>
<div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Change Password
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" id="changepassword" action="" method="post">
                                        <div id="status">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="pass2" type="password" id="pass2" class="form-control validate[required,minSize[6]]" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label>Conform Password</label>
                                            <input name="pass" type="password" id="pass" class="form-control validate[required,equals[pass2],minSize[6]]" placeholder="Conform Password">
                                        </div>
                                   
                                   
                                        <input id="passwordbutton" type="submit" value="Submit" class="btn btn-primary"/>
                                        <button type="reset" class="btn btn-success">Reset </button>
                                    </form>
                                </div>
                                
                                
   
                                
                                
                           
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
 </div>
        <?php
//        if(isset($_GET['page']))
//        {
//        include'view/header.html';
//        include'view/navigation.html';
//        if($_GET['page']=="password")
//        {
//            include'view/password.html';
//        }
//        else if($_GET['page']=="home")
//        {
//            include'view/welcome.html';
//        }
//         else if($_GET['page']=="editprofile")
//        {
//            include'view/editprofile.html';
//        }
// else {
//      include'view/welcome.html';
//      }
//        }
// else {
//        include'view/header.html';
//        
//        include'view/navigation.html';
//        include'view/welcome.html';
// }
// 
//        
        ?>
  </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
      <script src="js/jquery.validationEngine.js"></script>
       <script src="js/jquery.validationEngine-en.js"></script>
       <script src="dist/js/lobibox.min.js"></script>
<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>-->
<link rel="stylesheet" href="dist/css/Lobibox.min.css"/>
                                  <script type="text/javascript"> 
                                      window.id = '<?php echo $_SESSION['id']; ?>';
$(document).ready(function(){
 
    $("#changepassword").validationEngine({
        
        
             
    		});
                           $('#passwordbutton').click(function(e){
         e.preventDefault();

         //if invalid do nothing
         if(!$("#changepassword").validationEngine('validate')){
         return false;
          }
          else
          {   


      var dataString = 'changepassword=changepassword&password=' + $('input[name=pass]').val() + '&password2=' + $('input[name=pass2]').val()+ '&id='+window.id;
      $.ajax({
          
        type: "POST",
        url: "controller/login_controller.php",
        data: dataString,
        success: function (data) {
           var json = $.parseJSON(data);
if(json.status=="yes")
{
    $('input[name=pass]').val('');
     $('input[name=pass2]').val('');
            Lobibox.alert('success', {
                    msg: "Password Sucessfully Changed"
                });
//    $("#status").html('<div class="alert alert-success alert-dismissable" id="fail" >'
//                                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
//                               +'Password Sucessfully Changed</div>'
//                            );
    
}
else
{
     $('input[name=pass]').val('');
     $('input[name=pass2]').val('');
      Lobibox.alert('error', {
                    msg: "  Try After Some Time.."
                });
//    $("#status").html('<div class="alert alert-danger alert-dismissable" id="fail" >'
//                                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
//                               +'Try After Some Time </div>'
//                            );
}
          }
          ,
	error: function() 
		{
		}
      });
      return false;
  }
    })
    
    
    
    
    
    
    
    
    

});
</script>
</body>

</html>

<?php
   
}
 else {
header('location: index.html');    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

