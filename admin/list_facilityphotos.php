<?php
session_start();
if(isset($_SESSION['id']))
{

    function __autoload($class_name) 
{
   require_once "model/".$class_name.".php";
    
}
$facilityphotos_model=new facilityphotos_model();
$facility_model=new facility_model()
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
                    <h1 class="page-header">Facilities</h1>
                </div>
                <!--end page header -->
            </div>
<div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <?php 
include 'view/facility_header.php'; 
?>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                 Facilities-Manage Facility Photos
                        </div>
                        <div class="panel-body">
                            
                  
                          <div class="col-lg-6" >
        <form role="form" id="form" action="list_facilityphotos.php" method="post" enctype="multipart/form-data">

 <div class="form-group">
                                            <label>Facilities*:</label>
                                            <select id="service" name="facility" class="form-control validate[required]" onchange="view_people(this.value)" >
                                                
                                                <?php
                                                $facility_model->selectbox_facility('all');
                                                ?>
                                            </select>
                                            <br/>
                                            <input id="formbutton" name="editfacilityphotos" value="Search Photos" type="submit" value="Submit" class="btn btn-primary"/>
                                            <?php
                                                
                                    if(isset($_POST['facility']))
                                    {
                                        ?>
                                    <a href="list_facilityphotos.php">List all Photos</a><br/><br/><br/>
                                    <?php
                                       
                                    }
                                    else  if(isset ($_GET['facility']))
                                    {
                                         ?>
                                   <a href="list_facilityphotos.php">List all Photos</a><br/><br/><br/>
                                    <?php
                                       
                                    }
                                            
                                            ?>
                                        </div>


    </form>
    </div>
                                
                 <br/>      
                  <br/> 
                   <br/> 
                       <br/> 
                        <br/> 
                            
                             <div class="panel-body">
                            <div class="row">
                                <div class="panel-body">
                                    
                                    <?php
                                       $nsql="";
                                   
                                    if(isset($_POST['facility']))
                                    {
                                      
                                        $nsql=" where facility=".$_POST['facility'];
                                    }
                                    else  if(isset ($_GET['facility']))
                                    {
                                        
                                        $_POST['facility']=$_GET['facility'];
                                        $nsql=" where facility=".$_POST['facility'];
                                    }
                                    
                                    	$perpage=10;
				$pgno = 1;
					if(isset($_GET["pgno"])){
	 $pgno = intval($_GET["pgno"]);
                                        }

				  $start=$facilityphotos_model->start_page($pgno,$perpage);
				$i=1;
				
			$pquery=" select * from facilityphotos ".$nsql."  order by facility ,num  ";
				$result=$facilityphotos_model->execute_pagenation_join_query($start,$perpage,$pquery);
				 $status="yes";
				if($facilityphotos_model->affectedselectedrows($pquery)==0)
                                {
                                     $status="no";
                                }
                                if($status=="yes")
                                {
                                    ?>
                                   
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover"  style="float:left;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                             <th>Order</th>
                                             <th>Facility</th>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            
                                           
                            <th><a href="" class="btn btn-default">Edit</a></th>
                                            <th><a href="" class="btn btn-danger">Delete</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $url="";
                                        If(isset($_GET['page']))
                                        {
                                            $url=$url."&page=".$_GET['page'];
                                        }
                                        
                                         If(isset($_GET['pgno']))
                                        {
                                             $url=$url."&pgno=".$_GET['pgno'];
                                        }
                                        	 while($row=@mysql_fetch_array($result))
{
                                     ?>
                                      
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['num']; ?></td>
                                            <td><?php echo $facility_model->get_facility_name($row['facility']); ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td>
<?php
if($row['photo']=="")
{
    ?>
                                                <img src="../upload/facilityphotos/download.png" height="50" width="50" alt=""/>
     <?php                                           
}
 else {
    

?>
                                                <img src="../upload/facilityphotos/<?php echo $row['photo']?>" height="50" width="50" alt=""/>
<?php
 }
?>
                                </td>
                                
                          
                               
                               
                                    <td><a href="edit_facilityphotos.php?id=<?php echo $row['id'].$url; ?>" class="btn btn-default">Edit</a></td>
                                <td><a href="#" data-href="controller/facilityphotos_controller.php?del_id=<?php echo $row['id'].$url; ?>" class="btn btn-danger" data-toggle="modal"  data-target="#confirm-delete">Delete</a></td>
                                        </tr>
                                        
                                 <?php
                                 $i=$i+1;
}
                                 ?>
                                     
                                     
                                      
                                       
                                    </tbody>
                                </table>
                            </div>
                                    
                                    <?php
                                    
                                }
 else {
     ?>
              <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                               No List
                            </div>                       
     <?php
 }
                                    ?>
                                    
                                    
                        </div>
                            </div>
                             </div>
                            
                            
                            
                            <div class="panel-body">
                                <div class="row">
                                   <?php
  if($status=="yes")
                        {
      if($facilityphotos_model->affectedselectedrows($pquery)>$perpage)
          
                                {
                if(isset($_POST['facility']))
          {
               $pgurl="list_facilityphotos.php?page=facilityphotos&facility=".$_POST['facility'];
               $table=" facilityphotos   ".$nsql;


			$subquery=" order by facility,num  ";
          }
 else {
                $pgurl="list_facilityphotos.php?page=facilityphotos";
			
			$table=" facilityphotos   ";


			$subquery="order by facility,num ";
 }
			 $result2=$facilityphotos_model->page_select_rows($table,$subquery);
		  $facilityphotos_model->display_page_numbers($result2,$pgurl,$perpage,$pgno);
                                }
                        }
//	
//   
?>
                                </div>
                                
                                
                                
                                
                                
                                
                                
                     
                            </div>
                            
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
 </div>
        <?php

        ?>
  </div>
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
            
                <div class="modal-body">
                    <p>You are sure want to delete Image.</p>
                    
                    <p class="debug-url"></p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
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
        <script>
            
        $('#confirm-delete').on('show.bs.modal', function(e) {
                var link = $(e.relatedTarget);
  $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            //$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
           // $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });

    </script>
                                  <script type="text/javascript"> 
                                      window.id = '<?php echo $_SESSION['id']; ?>';
$(document).ready(function(){
 <?php
$facilityphotos_model->Del_Lobibox();
?>
    $("#form").validationEngine({
        
        
             
    		});
//                           $('#passwordbutton').click(function(e){
//         e.preventDefault();
//
//         //if invalid do nothing
//         if(!$("#changepassword").validationEngine('validate')){
//         return false;
//          }
//          else
//          {   
//
//
//      var dataString = 'changepassword=changepassword&password=' + $('input[name=pass]').val() + '&password2=' + $('input[name=pass2]').val()+ '&id='+window.id;
//      $.ajax({
//          
//        type: "POST",
//        url: "controller/login_controller.php",
//        data: dataString,
//        success: function (data) {
//           var json = $.parseJSON(data);
//if(json.status=="yes")
//{
//    $("#status").html('<div class="alert alert-success alert-dismissable" id="fail" >'
//                                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
//                               +'Password Sucessfully Changed</div>'
//                            );
//    
//}
//else
//{
//    $("#status").html('<div class="alert alert-danger alert-dismissable" id="fail" >'
//                                +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
//                               +'Try After Some Time </div>'
//                            );
//}
//          }
//          ,
//	error: function() 
//		{
//		}
//      });
//      return false;
//  }
//    })
//    
    
    
    
    
    
    
    
    

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

