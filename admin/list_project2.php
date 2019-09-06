<?php
session_start();
if(isset($_SESSION['id']))
{

    function __autoload($class_name) 
{
   require_once "model/".$class_name.".php";
    
}
$project_model=new project_model();
$projecttype_model=new projecttype_model();
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
                    <h1 class="page-header">Projects</h1>
                </div>
                <!--end page header -->
            </div>
<div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <?php 
include 'view/project_header.php';
?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                 projects-Manage projects
                        </div>
                        <div class="panel-body">
                            
                                  <div class="col-lg-6" >
        <form role="form" id="form" action="list_project2.php" method="post" enctype="multipart/form-data">

 <div class="form-group">
                                            <label>Category *:</label>
                                            <select id="projecttype" name="projecttype" class="form-control" data-validation-engine="validate[required]"  >
                                                <option value="">select</option>
                                                <?php
                                                $projecttype_model->selectbox_projecttype('all');
                                                ?>
                                            </select>
                                            <br/>
                                            <input id="formbutton" name="editproduct" value="Search Project " type="submit" value="Submit" class="btn btn-primary"/>
                                            <?php
                                                
                                    if(isset($_POST['projecttype']))
                                    {
                                        ?>
                                    <a href="list_project2.php">List all Projects</a><br/><br/><br/>
                                    <?php
                                       
                                    }
                                    else  if(isset ($_GET['projecttype']))
                                    {
                                         ?>
                                   <a href="list_project2.php">List all Projects</a><br/><br/><br/>
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
                                          $nsql2="";
                                   
                                    if(isset($_POST['projecttype']))
                                    {
                                      
                                        $nsql2=" where projecttype=".$_POST['projecttype'];
                                         $nsql=" where project.projecttype=".$_POST['projecttype'];
                                    }
                                    else  if(isset ($_GET['projecttype']))
                                    {
                                        
                                        $_POST['projecttype']=$_GET['projecttype'];
                                        $nsql2=" where projecttype=".$_POST['projecttype'];
                                         $nsql=" where project.projecttype=".$_POST['projecttype'];
                                    }
                                    	$perpage=30;
				$pgno = 1;
					if(isset($_GET["pgno"])){
	 $pgno = intval($_GET["pgno"]);
                                        }

				  $start=$project_model->start_page($pgno,$perpage);
				$i=1;
				
			$pquery=" select project.*,projecttype.name as ptname from project left join projecttype on projecttype.id=project.projecttype ".$nsql."  order by projecttype.name ";
				$result=$project_model->execute_pagenation_join_query($start,$perpage,$pquery);
				 $status="yes";
				if($project_model->affectedselectedrows($pquery)==0)
                                {
                                     $status="no";
                                }
                                if($status=="yes")
                                {
                                    ?>
                                   
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                             <th>Order</th>
                                             <th>Category</th>
                                            <th>Project</th>
                                            <th>Client</th>
                                            <th>Plant</th>
                                            <th>Status</th>
                                            
                                           
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
                                        if(isset($_POST['projecttype']))
                                        {
                                             $url=$url."&projecttype=".$_POST['projecttype']; 
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
                                            <td><?php echo $row['ptname']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['client']; ?></td>
                                            <td><?php echo $row['plant']; ?></td>
                                
                                <td><?php echo $row['status']; ?></td>
                                
                          
                               
                               
                                    <td><a href="edit_project2.php?id=<?php echo $row['id'].$url; ?>" class="btn btn-default">Edit</a></td>
                                <td><a href="#" data-href="controller/project2_controller.php?del_id=<?php echo $row['id'].$url; ?>" class="btn btn-danger" data-toggle="modal"  data-target="#confirm-delete">Delete</a></td>
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
                               No projects
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
      if($project_model->affectedselectedrows($pquery)>$perpage)
          
                                {
          
                  if(isset($_POST['projecttype']))
          {
               $pgurl="list_project2.php?page=project&projecttype=".$_POST['projecttype'];
               $table=" project   ".$nsql2;


			$subquery=" order by num  ";
          }
          
          
 else {
                $pgurl="list_project2.php?page=project";
			
			$table=" project   ";


 $subquery=" order by num  ";}
			 $result2=$project_model->page_select_rows($table,$subquery);
		  $project_model->display_page_numbers($result2,$pgurl,$perpage,$pgno);
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
                    <p>You are sure want to delete.</p>
                    
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
        <script>
            
        $('#confirm-delete').on('show.bs.modal', function(e) {
                var link = $(e.relatedTarget);
  $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            //$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
           // $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });

    </script>
    <script src="dist/js/lobibox.min.js"></script>
<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>-->
<link rel="stylesheet" href="dist/css/Lobibox.min.css"/>
                                  <script type="text/javascript"> 
                                      window.id = '<?php echo $_SESSION['id']; ?>';
$(document).ready(function(){
 
 <?php
 $project_model->Del_Lobibox();
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

