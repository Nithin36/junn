<?php

require_once("router_class.php");
class commonoperation extends router_class
{
function __construct()
{
$router=new router_class();
//$con=$router->establishconnection("localhost:3306","jupitpxv_n36","!9uO4v?y*mPI","jupitpxv_db");
$con=$router->establishconnection("localhost","root","","junai7pe_db");
//
//$con=$router->establishconnection("localhost","root","","junaid");


}


function limit_text($txt,$limit)
{
 $string= stripslashes($txt); 
						   
if (strlen($string) > $limit) {
$stringCut = substr($string, 0, $limit);
$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
}
return $string;
}

function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

function add_sucess()
{
	if(isset($_GET['add']))
				{
					$action=$_GET['add'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try after some times.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Added.</p>
                        <?php
					}
				}
				
}

function post_sucess3()
{
	if(isset($_GET['add']))
				{
					$action=$_GET['add'];
					if($action=="fail")
					{
                                            ?>
                    
				
                                
                                
                                  var msg = $.spModal('message', 'Post A Job ', 'Try After Sometime');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('Close');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                
                    <?php
					}
					else if($action="sucess")
					{
						?>
                    
				
                                
                                
                                  var msg = $.spModal('message', 'Post A Job ', 'SucessFully Posted');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('Close');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                
                    <?php
					}
				}
				
}
function post_sucess4()
{
	if(isset($_GET['edit']))
				{
					$action=$_GET['edit'];
					if($action=="fail")
					{
                                            ?>
                    
				
                                
                                
                                  var msg = $.spModal('message', 'Edit Job Post ', 'Try After Sometime');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('Close');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                
                    <?php
					}
					else if($action="sucess")
					{
						?>
                    
				
                                
                                
                                  var msg = $.spModal('message', 'Edit Job Post ', 'SucessFully Edited');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('Close');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                
                    <?php
					}
				}
				
}
function add_sucess2()
{
	if(isset($_GET['add']))
				{
					$action=$_GET['add'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try after some times.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Added. Username and password send to your mail</p>
                        <?php
					}
				}
				
}




function post_sucess()
{
	if(isset($_GET['add']))
				{
					$action=$_GET['add'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try after some times.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Posted.</p>
                        <?php
					}
				}
				
}


function publish_sucess()
{
	if(isset($_GET['publish']))
				{
					$action=$_GET['publish'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try after some times.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Published.</p>
                        <?php
					}
				}
				
}


function unpublish_sucess()
{
	if(isset($_GET['npublish']))
				{
					$action=$_GET['npublish'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try after some times.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Not Published.</p>
                        <?php
					}
				}
				
}
function reg_sucess()
{
	if(isset($_GET['add']))
				{
					$action=$_GET['add'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try after some times.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Registered.</p>
                        <?php
					}
				}
				
}


function reg_sucess2()
{
	if(isset($_GET['add']))
				{
					$action=$_GET['add'];
					if($action=="fail")
					{
                                            ?>
                    
				
                                
                                
                                  var msg = $.spModal('message', 'Registeration Failed ', 'Try After Sometime');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('Close');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                
                    <?php
					}
					else if($action=="sucess")
					{
						?>
                                
                                
                                  var msg = $.spModal('message', 'Registered SucessFully ', 'You can now log into your Account');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('Close');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
				}
				
}
function edit_sucess()
{
	if(isset($_GET['edit']))
				{
					$action=$_GET['edit'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try after some times.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Edited.</p>
                        <?php
					}
				}
				
}


function edit_sucess2()
{
	if(isset($_GET['edit']))
				{
					$action=$_GET['edit'];
					if($action=="fail")
					{
                                          
						?>
                                
                                
                                  var msg = $.spModal('message', 'Edited Failed ', 'Try After Sometime');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('Close');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
					else if($action="sucess")
					{
						
						?>
                                
                                
                                  var msg = $.spModal('message', 'Sucessfully Edited', '');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('Close');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
				}
				
}
function send_sucess()
{
	if(isset($_GET['send']))
				{
					$action=$_GET['send'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try after some times.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Sended.</p>
                        <?php
					}
				}
				
}
function approve_sucess()
{
	if(isset($_GET['approval']))
				{
					$approve=$_GET['approval'];
					if($approve=="fail")
					{?>
                    
					<p class="msg error">Try after some times.</p>
                    <?php
					}
					else if($approve="sucess")
					{
						?>
						<p class="msg done">SucessFully approved.</p>
                        <?php
					}
				}
				
}

function add_delete()
{
	if(isset($_GET['delete']))
				{
					$action=$_GET['delete'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try after some times.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Deleted.</p>
                        <?php
					}
				}
				
}
function add_delete2()
{
	if(isset($_GET['delete']))
				{
					$action=$_GET['delete'];
					if($action=="fail")
					{	?>
                                
                                
                                  var msg = $.spModal('message', 'Error', 'Try After Sometimes');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('Close');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
					else if($action="sucess")
					{
						?>
                                
                                
                                  var msg = $.spModal('message', 'Sucessfully Deleted', 'Your jobpost sucessfully deleted');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('Close');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
				}
				
}
function required_field_message2()
{
	if(isset($_GET['required']))
				{
	$required=$_GET['required'];
	if($required=="add")
	{
	?>
                                
                                
                                var msg = $.spModal('message', 'Error ', 'Required Fields Not filled');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
                                                
        }
	else if($required=="edit")
	{
            ?>
                                
                                
                                 var msg = $.spModal('message', 'Error ', 'Required Fields Not filled');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
                                                
        }
        else if($required=="change")
	{
		
            ?>
                                
                                
                                  var msg = $.spModal('message', 'Error ', 'Required Fields Not filled');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
                                                
        }
	
}

}



function required_field_message3()
{
	if(isset($_GET['publish']))
				{
	
	{
	?>
                                
                                
                                var msg = $.spModal('message', 'Not Published', 'This job post will not be publish until approval of your details');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
                                                
        }
	
	
}

}
function required_field_message()
{
	if(isset($_GET['required']))
				{
	$required=$_GET['required'];
	if($required=="add")
	{
	?>
								
	<p class="msg warning">Required fields are not filled</p>
     <?php

	}
	else if($required=="edit")
	{
		?>
		<p class="msg warning">Required fields are not filled</p>
        <?php
	}
        else if($required=="change")
	{
		?>
		<p class="msg warning">Required fields are not filled</p>
        <?php
	}
}

}




function change_sucess()
{
	if(isset($_GET['change']))
				{
					$action=$_GET['change'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try after some times.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Changed.</p>
                        <?php
					}
				}
				
}


function change_sucess2()
{
	if(isset($_GET['change']))
				{
					$action=$_GET['change'];
					if($action=="fail")
					{ ?>
                                
                                
                                  var msg = $.spModal('message', 'Change Password ', 'Try After Sometimes');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
					else if($action="sucess")
					{
						 ?>
                                
                                
                                  var msg = $.spModal('message', 'Change Password ', 'Your Password Sucessfully Changed');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
				}
				
}


function change_resume2()
{
	if(isset($_GET['change']))
				{
					$action=$_GET['change'];
					if($action=="fail")
					{ ?>
                                
                                
                                  var msg = $.spModal('message', 'Change Resume ', 'Try After Sometimes');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
					else if($action="sucess")
					{
						 ?>
                                
                                
                                  var msg = $.spModal('message', 'Change Resume ', 'Your Resume Sucessfully Changed');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
				}
				
}
function block_sucess()
{
	if(isset($_GET['block']))
				{
					$action=$_GET['block'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try after some times.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Blocked.</p>
                        <?php
					}
				}
				
}



function unblock_sucess()
{
	if(isset($_GET['unblock']))
				{
					$action=$_GET['unblock'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try after some times.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully UnBlocked.</p>
                        <?php
					}
				}
				
}



function match_sucess()
{
	if(isset($_GET['match']))
				{
					$action=$_GET['match'];
					if($action=="change")
					{?>
                    
					<p class="msg error">Fields will not match.</p>
                    <?php
					}
					
                      
				}
				
}


function match_sucess2()
{
	if(isset($_GET['match']))
				{
					$action=$_GET['match'];
					if($action=="change")
					{
                                            
						 ?>
                                
                                
                                  var msg = $.spModal('message', 'Change Password ', 'Your Password does not match');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
					
                      
				}
				
}

function generate_employer_id($emp_id)
{
    $nemp_id=1000+$emp_id;
    return "Emp".$nemp_id;
}
function generate_admin_id($emp_id)
{
    $nemp_id=1000+$emp_id;
    return "SubAdm".$nemp_id;
}
function generate_jobseeker_id($emp_id)
{
    $nemp_id=1000+$emp_id;
    return "JobSeeker".$nemp_id;
}
function generate_job_id($emp_id)
{
    $nemp_id=1000+$emp_id;
    return "Job".$nemp_id;
}
function generate_appliedjob_id($emp_id)
{
    $nemp_id=1000+$emp_id;
    return "App_job".$nemp_id;
}

function email_sucess()
{
    if(isset($_GET['reqemail']))
				{
					$action=$_GET['reqemail'];
					if($action=="edit")
					{?>
                    
					<p class="msg error">Invalid Email Id.</p>
                    <?php
					}
					
 else if($action=="sucess") {
     
     ?>
                                      
                                        <?php
 }
                      
				}
}



function email_sucess2()
{
    if(isset($_GET['reqemail']))
				{
					$action=$_GET['reqemail'];
					if($action=="edit")
					{
                                            ?>
                                
                                
                                  var msg = $.spModal('message', 'Error ', 'Invalid Url');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
                                                
                                        }
					
 else if($action=="sucess") {
     
     ?>
                                      
                                        <?php
 }
                      
				}
}


function mobile_sucess()
{
    if(isset($_GET['reqmobile']))
				{
					$action=$_GET['reqmobile'];
					if($action=="edit")
					{?>
                    
					<p class="msg error">Invalid mobile Id.</p>
                    <?php
					}
					
 else if($action=="sucess") {
     
     ?>
                                      
                                        <?php
 }
                      
				}
}

function mobile_sucess2()
{
    if(isset($_GET['reqmobile']))
				{
					$action=$_GET['reqmobile'];
					if($action=="edit")
					{
                                            ?>
                                
                                
                                  var msg = $.spModal('message', 'Error ', 'Invalid Url');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
                                                
                                        }
					
 else if($action=="sucess") {
     
     ?>
                                      
                                        <?php
 }
                      
				}
}
function img_sucess()
{
    if(isset($_GET['invalidimg']))
				{
					$action=$_GET['invalidimg'];
					if($action=="edit")
					{?>
                    
					<p class="msg error">Invalid image logo.</p>
                    <?php
					}
					
 else if($action=="sucess") {
     
     ?>
                                      
                                        <?php
 }
                      
				}
}


function img_sucess2()
{
    if(isset($_GET['invalidimg']))
				{
					$action=$_GET['invalidimg'];
					if($action=="edit")
					{
                                            ?>
                                
                                
                                  var msg = $.spModal('message', 'Error ', 'Invalid Image');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
                                                
                                        }
					
 else if($action=="sucess") {
     
    
 }
                      
				}
}

function url_sucess()
{
    if(isset($_GET['invalidurl']))
				{
					$action=$_GET['invalidurl'];
					if($action=="edit")
					{?>
                    
					<p class="msg error">Invalid url.</p>
                    <?php
					}
					
 else if($action=="sucess") {
     
     ?>
                                      
                                        <?php
 }
                      
				}
}




function url_sucess2()
{
    if(isset($_GET['invalidurl']))
				{
					$action=$_GET['invalidurl'];
					if($action=="edit")
					{
                                            ?>
                                
                                
                                  var msg = $.spModal('message', 'Error ', 'Invalid Url');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
					
 else if($action=="sucess") {
     
     ?>
                                      
                                        <?php
 }
                      
				}
}

function folder_creation($path)
{
    if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
}
  
function extract_id_from_empid($str)
{
   $tempid=trim($str,'Emp');
    $eid=$tempid-1000;
    return $eid;
}
  
function extract_id_from_subadminid($str)
{
   $tempid=trim($str,'SubAdm');
    $eid=$tempid-1000;
    return $eid;
}
function extract_id_from_jobseekerid($str)
{
   $tempid=trim($str,'JobSeeker');
    $eid=$tempid-1000;
    return $eid;
}

function extract_id_from_jobid($str)
{
   $tempid=trim($str,'Job');
    $eid=$tempid-1000;
    return $eid;
}
function extract_id_from_jobapplied($str)
{
   $tempid=trim($str,'App_job');
    $eid=$tempid-1000;
    return $eid;
}
function from_year()
{
    ?>
             
          ?>
          <?php
          for($i=0;$i<31;$i++)
          {
              if($i==0)
              {
                  ?>
           <option value="0">0 year</option>
          
          <?php
              }
 else {
              ?>
          <option value="<?php echo $i; ?>"><?php echo $i." Year"; ?></option>
          <?php
 } 
          }
           ?>
          <option value="31">30+ Year</option>
          <?php
         
     
}

function from_year_selected($id)
{
    ?>
             
          ?>
          <?php
          for($i=0;$i<31;$i++)
          {
              if($i==0)
              {
                  if($id==0)
                  {
                  ?>
          <option value="0" selected="selected">0 year</option>
          
          <?php
                  }
 else {
     ?>
            <option value="0">0 year</option>
           <?php
     
 }
              }
              
              
              
 else {
     
     if($i==$id)
     {
              ?>
          <option  selected="selected" value="<?php echo $i; ?>"><?php echo $i." Year"; ?></option>
          <?php
 } 
 
 else 
     
 {
     ?>
          <option  value="<?php echo $i; ?>"><?php echo $i." Year"; ?></option>
          <?php
 }
          }
          }
           if($id==31)
     {
           ?>
          <option selected="selected" value="31">30+ Year</option>
          <?php
     }
 else {
     ?>
           <option  value="31">30+ Year</option>
          <?php
         
     }
     

}

function from_salary()
{
    ?>
          <option value="not">Not Disclosed</option>
             <option value="0">< 1 lakh</option>
          ?>
          <?php
          for($i=1;$i<=50;$i++)
          {
              
              ?>
          <option value="<?php echo $i; ?>"><?php echo $i." lakh"; ?></option>
          <?php
              
          }
           ?>
          <option value="51">50 + lakh</option>
          <?php
         
     
}

function from_salary2()
{
    ?>
         
             <option value="0">< 1 lakh</option>
          ?>
          <?php
          for($i=1;$i<=50;$i++)
          {
              
              ?>
          <option value="<?php echo $i; ?>"><?php echo $i." lakh"; ?></option>
          <?php
              
          }
           ?>
          <option value="51">50 + lakh</option>
          <?php
         
     
}
function from_salary_selected($id)
{
    if($id=="not")
    {
        ?>
          <option selected="selected" value="not">Not Disclosed</option>
          <?php
    
        
    }
 else {
        
 
    ?>
          
          <option value="not">Not Disclosed</option>
             
         
          
          
          
          
          
          <?php
 }
          for($i=0;$i<=50;$i++)
          {
              
          if($i==$id)
          {
              if($id!="not")
              {
                  ?>
          <option selected="selected" value="<?php echo $i; ?>"><?php echo $i." lakh";  ?></option>
          <?php
          }
              }
 else {
              ?>
          <option value="<?php echo $i; ?>"><?php echo $i." lakh";  ?></option>
          <?php
 } 
          }
            if($id==51)
    {
        ?>
          <option value="51" selected="selected">50 + lakh</option>
          <?php
    }
 else {
        ?>
          <option value="51">50 + lakh</option>
          <?php 
    }
         
 

}
function to_year()
{
    ?>
             <option value="31">30+ year</option>
          ?>
          <?php
          for($i=30;$i>=0;$i--)
          {
              ?>
          <option value="<?php echo $i; ?>"><?php echo $i." Year"; ?></option>
          <?php
              
          }
           ?>
         
          <?php
         
     
}

function to_year_selected($id)
{
    if(id==31)
    {
    ?>
          
             <option selected="selected" value="31">30+ year</option>
          <?php
          }
          else
          {
          ?>
          
          <option  value="31">30+ year</option>
          <?php
          }
        
          for($i=30;$i>=0;$i--)
          {
              
          if($i==$id)
          {
              ?>
          <option selected="selected" value="<?php echo $i; ?>"><?php echo $i." Year"; ?></option>
          <?php
          }
 else {
     ?>
          <option  value="<?php echo $i; ?>"><?php echo $i." Year"; ?></option>
          <?php
 }
          }
           
    

}
function to_salary()
{
    ?>
          <option value="not">Not Disclosed</option>
             <option value="51">50+ lakh</option>
          ?>
          <?php
          for($i=50;$i>=0;$i--)
          {
              ?>
          <option value="<?php echo $i; ?>"><?php echo $i." lakh"; ?></option>
          <?php
              
          }
           ?>
          <option value="0">< 1 lakh</option>
          <?php
         
     
}


function to_salary_selected($id)
{

    if($id=="not")
    {
        ?>
          <option selected="selected" value="not">Not Disclosed</option>
          <?php
    
        
    }
 else {
        
 
    ?>
          
          <option value="not">Not Disclosed</option>
             
        
         
          <?php
 }
          for($i=50;$i>=0;$i--)
          {
              
          if($i==$id)
          {
              if($id!="not")
              {
                  ?>
          <option selected="selected" value="<?php echo $i; ?>"><?php echo $i." lakh";  ?></option>
          <?php
              }
          }
 else {
              ?>
          <option value="<?php echo $i; ?>"><?php echo $i." lakh";  ?></option>
          <?php
 } 
          }
            if($id==51)
    {
        ?>
          <option value="51" selected="selected">50 + lakh</option>
          <?php
    }
 else {
        ?>
          <option value="51">50 + lakh</option>
          <?php 
    }
         
     

         
     
}


function get_current_date_with_d_m_y()
{
    $originalDate = date('Y-m-d');
$newDate = date("d-m-Y", strtotime($originalDate));
return $newDate;
}

function get_date_with_y_m_d($date)
{
    $newdatearr=  explode("-", $date);
    return $newdatearr[2]."-".$newdatearr[1]."-".$newdatearr[0];
}
function store_array_elements_db($arr)
{
   $str=""; 
// Note that $snacks will be an array.
for($i=0;$i<count($arr);$i++) {
  
   $str=$str.$arr[$i].",";
}
return $str;
}
function store_array_elements_db2($arr)
{
   $str=""; 
// Note that $snacks will be an array.
for($i=0;$i<count($arr)-1;$i++) {
  
   $str=$str.$arr[$i].",";
}
return $str;
}
function isExpired($expiry){
		// Find todays date.
		$today = date("Y-m-d");
 
                //Change date into a string
		$todaysDate = strtotime($today);
 
                // Change the album date into a string
		$expiryDate = strtotime($expiry);
 
                // compare the two dates (strings)
		if ($expiryDate<$todaysDate){
			return 'Expired';
		}else{
			return 'Not Expired';
		}
}


function select_order()
{
    for($i=0;$i<=200;$i++)
    {
        ?>
          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php
    }
}


function select_order_selected($id)
{
    for($i=0;$i<=200;$i++)
    {
        $id2=$i;
        ?>
          <option <?php if($id2==$id) { ?> selected="selected" <?php } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php
    }
}


function genereate_get_array($post)
{
    $querystring="";
    foreach($post as $key => $value)
{
        $value=  stripslashes($value);
       count($post[$key]);
      $querystring=$querystring."&".$key."=".$value;
}
return $querystring;
}

function genereate_get_array_with_encrption($post)
{
    $querystring="";
    foreach($post as $key => $value)
{
        $value=mysql_escape_string($value);
       count($post[$key]);
      $querystring=$querystring."&".$key."=".$value;
}
return $querystring;
}

function genereate_get_array2($post)
{
    $querystring="";
    foreach($post as $key => $value)
{
       count($post[$key]);
      $querystring=$querystring."&".$key."=".$value;
}
return $querystring;
}
function genereate_get_array_except($post,$str)
{
    $except=explode(',',$str);

    $querystring="";
    foreach($post as $key => $value)
{
        $status="no";
        for($i=0;$i<count($except);$i++)
        {
            
            if($key==$except[$i])
            {
               $status="yes";
            }
        }
       
        if($status=="no")
        {
      $querystring=$querystring."&".$key."=".$value;
        }
}
return $querystring;
}

function generate_post_array($get)
{
        $querystring="";
        foreach($get as $key => $value)
{
            if(($key!="page"))
            {
      $querystring=$querystring."&".$key."=".$value;
            }
           
            
        }
        parse_str($querystring, $output);
return $output;
            
}

function check_item_array($str,$item)
{
    $status="no";
  $arr=explode(',',$str);
  for($i=0;$i<count($arr);$i++) {
       $arr[$i]."<br/>";
      if($arr[$i]==$item)
      {
         $status="yes";
       $arr[$i]."<br/>";
      }
  }
  return $status;
}

function show_no_result()
{
    ?>
          <p class="msg error">No Results</p>
          <?php
}


function generate_string_from($count)
{
   $str=""; 
// Note that $snacks will be an array.
for($i=1;$i<=$count;$i++) {
  if($count==$i)
  {
      $str=$str.$i."";
  }
 else {
      $str=$str.$i.",";
  }
   
}
return $str;
}


function generate_string_from2($start,$end)
{
   $str=""; 
// Note that $snacks will be an array.
for($i=$start;$i<=$end;$i++) {
  if($end==$i)
  {
      $str=$str.$i."";
  }
 else {
      $str=$str.$i.",";
  }
   
}
return $str;
}


function base_url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],''
    //$_SERVER['REQUEST_URI']
  );
}
function url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}
function getBaseUrl() 
{
	// output: /myproject/index.php
	$currentPath = $_SERVER['PHP_SELF']; 
	
	// output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
	$pathInfo = pathinfo($currentPath); 
	
	// output: localhost
	$hostName = $_SERVER['HTTP_HOST']; 
	
	// output: http://
	$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
	
	// return: http://localhost/myproject/
	return $protocol.$hostName.$pathInfo['dirname']."/";
}

function random_password($length) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    $password=$password.$str;
    return $password;
}

function random_password2($length) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    $password=$password.$str;
    return $password;
}





function applied_sucess()
{
	if(isset($_GET['apply']))
				{
					$action=$_GET['apply'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try after some times.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Applied.</p>
                        <?php
					}
				}
				
}

function applied_sucess2()
{
	if(isset($_GET['apply']))
				{
					$action=$_GET['apply'];
					if($action=="fail")
					{
                                            ?>
                    
					    <script type="text/javascript">
        
$(document).ready(function(){
         var msg = $.spModal('message', 'Jobs Applied', 'Try After Sometimes');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('Close');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
    });
</script>
                    <?php
					}
					else if($action=="sucess")
					{
						?>
						    <script type="text/javascript">
        
$(document).ready(function(){
              var msg = $.spModal('message', 'Jobs Applied', 'SucessFully Applied');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('Close');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
    });
</script>
                        <?php
					}
				}
				
}
function send_registration_mail($username,$emp_email,$password)
{
   $message='
       <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title></title>

<style type="text/css">@media only screen and (max-width:480px){body,table,td,p,a,li,blockquote{-webkit-text-size-adjust:none !important}body{width:100% !important;min-width:100% !important}td[id=bodyCell]{padding:10px !important}table.kmMobileHide{display:none !important}table[class=kmTextContentContainer]{width:100% !important}table[class=kmBoxedTextContentContainer]{width:100% !important}td[class=kmImageContent]{padding-left:0 !important;padding-right:0 !important}img[class=kmImage]{width:100% !important}td.kmMobileStretch{padding-left:0 !important;padding-right:0 !important}table[class=kmSplitContentLeftContentContainer],table[class=kmSplitContentRightContentContainer],table[class=kmColumnContainer],td[class=kmVerticalButtonBarContentOuter] table[class=kmButtonBarContent],td[class=kmVerticalButtonCollectionContentOuter] table[class=kmButtonCollectionContent],table[class=kmVerticalButton],table[class=kmVerticalButtonContent]{width:100% !important}td[class=kmButtonCollectionInner]{padding-left:9px !important;padding-right:9px !important;padding-top:9px !important;padding-bottom:0 !important;background-color:transparent !important}td[class=kmVerticalButtonIconContent],td[class=kmVerticalButtonTextContent],td[class=kmVerticalButtonContentOuter]{padding-left:0 !important;padding-right:0 !important;padding-bottom:9px !important}table[class=kmSplitContentLeftContentContainer] td[class=kmTextContent],table[class=kmSplitContentRightContentContainer] td[class=kmTextContent],table[class=kmColumnContainer] td[class=kmTextContent],table[class=kmSplitContentLeftContentContainer] td[class=kmImageContent],table[class=kmSplitContentRightContentContainer] td[class=kmImageContent]{padding-top:9px !important}td[class="rowContainer kmFloatLeft"],td[class="rowContainer kmFloatLeft firstColumn"],td[class="rowContainer kmFloatLeft lastColumn"]{float:left;clear:both;width:100% !important}table[id=templateContainer],table[class=templateRow]{max-width:600px !important;width:100% !important}h1{font-size:24px !important;line-height:130% !important}h2{font-size:20px !important;line-height:130% !important}h3{font-size:18px !important;line-height:130% !important}h4{font-size:16px !important;line-height:130% !important}td[class=kmTextContent]{font-size:14px !important;line-height:130% !important}td[class=kmTextBlockInner] td[class=kmTextContent]{padding-right:18px !important;padding-left:18px !important}table[class="kmTableBlock kmTableMobile"] td[class=kmTableBlockInner]{padding-left:9px !important;padding-right:9px !important}table[class="kmTableBlock kmTableMobile"] td[class=kmTableBlockInner] [class=kmTextContent]{font-size:14px !important;line-height:130% !important;padding-left:4px !important;padding-right:4px !important}}</style>
</head>
<body style="margin:0;padding:0;background-color:#F0EEEE">
<center>
<table align="center" border="0" cellpadding="0" cellspacing="0" id="bodyTable" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;padding:0;background-color:#F0EEEE;height:100%;margin:0;width:100%">
<tbody>
<tr>
<td align="center" id="bodyCell" valign="top" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;padding-top:50px;padding-left:20px;padding-bottom:20px;padding-right:20px;border-top:0;height:100%;margin:0;width:100%">
<table border="0" cellpadding="0" cellspacing="0" id="templateContainer" width="600" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;border:1px solid #aaa;background-color:#f4f4f4;border-radius:0">
<tbody>
<tr>
<td id="templateContainerInner" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;padding:0">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
<tr>
<td align="center" valign="top" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
<table border="0" cellpadding="0" cellspacing="0" class="templateRow" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
<tbody>
<tr>
<td class="rowContainer kmFloatLeft" valign="top" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
<table border="0" cellpadding="0" cellspacing="0" class="kmImageBlock" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
<tbody class="kmImageBlockOuter">
<tr>
<td class="kmImageBlockInner" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;padding:9px;" valign="top">
<table align="left" border="0" cellpadding="0" cellspacing="0" class="kmImageContentContainer" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
<tbody>
<tr>
<td class="kmImageContent" valign="top" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;padding:0;padding-top:0px;padding-bottom:0;padding-left:9px;padding-right:9px;">
<img align="left" alt="" class="kmImage" src="'.$this->get_path().'images/dotcjob.png" width="260" style="border:0;height:auto;line-height:100%;outline:none;text-decoration:none;padding-bottom:0;display:inline;vertical-align:bottom;margin-right:0;max-width:260px;" />
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
<table border="0" cellpadding="0" cellspacing="0" class="templateRow" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
<tbody>
<tr>
<td class="rowContainer kmFloatLeft" valign="top" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
<table border="0" cellpadding="0" cellspacing="0" class="kmTextBlock" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
<tbody class="kmTextBlockOuter">
<tr>
<td class="kmTextBlockInner" valign="top" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;">
<table align="left" border="0" cellpadding="0" cellspacing="0" class="kmTextContentContainer" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
<tbody>
<tr>
<td class="kmTextContent" valign="top" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;color:#505050;font-family:Helvetica, Arial;font-size:14px;line-height:150%;text-align:left;padding-top:9px;padding-bottom:9px;padding-left:18px;padding-right:18px;">
<div class="kmParagraph" style="padding-bottom:9px"><b>Dotcjob.com- Login Details</b></div>
<div class="kmParagraph" style="padding-bottom:9px">Welcome '.$username.',</div>
<div class="kmParagraph" style="padding-bottom:9px"> </div>
<div class="kmParagraph" style="padding-bottom:9px">                               Username: '.$username.'</div>
<div class="kmParagraph" style="padding-bottom:9px"><span style="line-height: 20.7999992370605px;">                              
  Password: '.$password.'</span></div>
    <div class="kmParagraph" style="padding-bottom:9px"><span style="line-height: 20.7999992370605px;">                              
 <a href='.$this->get_path().'index.php?page=login>Login Here</a></span></div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0" class="kmTextBlock" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
<tbody class="kmTextBlockOuter">
<tr>
<td class="kmTextBlockInner" valign="top" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;">
<table align="left" border="0" cellpadding="0" cellspacing="0" class="kmTextContentContainer" width="100%" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0">
<tbody>
<tr>
<td class="kmTextContent" valign="top" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;color:#505050;font-family:Helvetica, Arial;font-size:14px;line-height:150%;text-align:left;font-size:11px;color:#a9a9a9;padding-bottom:9px;text-align:center;padding-right:18px;padding-left:18px;padding-top:9px;">
<div class="kmParagraph" style="padding-bottom:9px">
<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;font-size: 12.8000001907349px; line-height: normal; font-family: Arial;" width="560">
<tbody>
<tr>
<td colspan="5" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;font-family: arial, sans-serif; margin: 0px;">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;font-family: Arial;" width="560">
<tbody>
<tr>
<td colspan="2" style="border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0;font-family: arial, sans-serif; margin: 0px; font-size: 12px;"><br />
<br />
<font color="#474a4b">Regards,</font><br />
<strong><font color="#fe0000">dotcjob</font><span style="color: rgb(223, 41, 42);">.</span><span style="color: #000000;">com</span></strong><font color="#474a4b"> team</font></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
</tr>
</tbody>
</table>
<br />
 </div>
<div class="kmParagraph" style="padding-bottom:9px">You have received this mail because your e-mail ID is registered with dotcjob.com. This is a system-generated e-mail, please do not reply to this message. </div>
<div class="kmParagraph" style="padding-bottom:9px"> </div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</center>
</body>
</html>
';
         //Normal headers
$subject = "DotcJob.com Login Details";
$headers  = 'From:info@dotcjob.com' . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$to  = "".$emp_email."";

		 if (!mail($to, $subject, $message, $headers)) 
		 { 
		 echo "<div id='validation_error'>Mail Sending Failed.</div>";
		 }
		 else {
    	 echo '<div id="success">Mail Successfully Sent.</div>';
		 }
//end mail

	

}




function send_forgotpassword_mail($mail,$username,$password)
{
  $status=0;
  
   $message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>


</head>

<body style="background-color:#e3e3e3;">
<div class="cover" style="width:1000px; height:auto; margin:0 auto; ">

<table width="700" border="0" align="center"   cellspacing="0" cellpadding="2"  >
  <tr>
    <td height="79" bgcolor="#FFFFFF">
    <img src="'.$this->get_path().'images/logo.png" style="padding-left:20px;" />
    
    </td>
  </tr>
  <tr>
    <td height="0" bgcolor="#000"></td>
  </tr>
  <tr>
    <td bgcolor="#F0F0F0">
        
    <p style="margin-left:10px;">
     <table>
      <tr><td>Jupiter Login Details</td><td></td><td></td> </tr>
     <tr><td></td><td></td><td></td> </tr>
     <tr><td>UserName</td><td>:</td><td>'.$username.'</td> </tr>
     <tr><td></td><td></td><td></td> </tr>
    <tr><td>Password</td><td>:</td><td>'.base64_decode($password).'</td> </tr>  
      <tr><td></td><td></td><td></td> </tr>   
    
      </table>    
    

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


';
         //Normal headers
$subject = "Login Details";
$headers  = 'From:noreply@junaidperfumes.in' . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$to  = "".$mail."";

		 if (!mail($to, $subject, $message, $headers)) 
		 { 
		$status=0;
		 }
		 else {
                     $status=1;
		 }
//end mail
return $status;
	

}


function login_sucess()
{
	if(isset($_GET['login']))
				{
					$action=$_GET['login'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Login Failed.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Applied.</p>
                        <?php
					}
				}
				
}


function not_found()
{
    if(isset($_GET['notfound']))
				{
					$action=$_GET['notfound'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Not Found.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">Please Check Your Mail to reset the password.</p>
                        <?php
					}
				}
				
}


function login_here()
{
    if(isset($_GET['loginhere']))
				{
					$action=$_GET['loginhere'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try After Some Times.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">Your password Sucessfully changed. You can login here</p>
                        <?php
					}
				}
				
}




function msg_sucess()
{
	if(isset($_GET['msg']))
				{
					$action=$_GET['msg'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try After Sometime.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Sended.</p>
                        <?php
					}
				}
				
}



function msg_sucess2()
{
	if(isset($_GET['msg']))
				{
					$action=$_GET['msg'];
					if($action=="fail")
					{
                                              ?>
                                
                                
                                  var msg = $.spModal('message', 'Send Message ', 'Try After Some Time');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
					else if($action="sucess")
					{
						      ?>
                                
                                
                                  var msg = $.spModal('message', 'Send Message ', 'Send Message SucessFully');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
				}
				
}

function assigned_sucess()
{
	if(isset($_GET['assigned']))
				{
					$action=$_GET['assigned'];
					if($action=="fail")
					{?>
                    
					<p class="msg error">Try After Sometime.</p>
                    <?php
					}
					else if($action="sucess")
					{
						?>
						<p class="msg done">SucessFully Assigned.</p>
                        <?php
					}
				}
				
}
function check_expiry_date($exp_date)
{
    //$exp_date = "2016-01-16";
$todays_date = date("Y-m-d");
$valid="";
$today = strtotime($todays_date);
$expiration_date = strtotime($exp_date);

if ($expiration_date > $today) {
   
    $valid = "no";
} else {
    $valid = "yes";
}
return $valid;
}

function reverse_date_ymd($date) 
{
    $revdate="";
    $newarr=explode('-',$date);
    for($i=3;$i>0;$i--) {
        $j=$i-1;
        if($j==0)
        {
            $revdate=$revdate.$newarr[$j];
        }
 else {
  $revdate=$revdate.$newarr[$j]."-";
 }
    }
    return $revdate;
}



function invalidpage()
{
    ?>
                    
					<p class="msg error">InValid Page.</p>
                    <?php
}






function email_exist()
{
    if(isset($_GET['existemail']))
				{
					$action=$_GET['existemail'];
					if($action=="no")
					{?>
                    
					<p class="msg error">Invalid Email Id.</p>
                    <?php
					}
					
 else if($action=="yes") {
     
     ?>
                          <p class="msg error">This Email id is already exist. please Try another email id for employer registration</p>            
                                        <?php
 }
                      
				}
}




function email_exist2()
{
    if(isset($_GET['existemail']))
				{
					$action=$_GET['existemail'];
					if($action=="no")
					{
                                            ?>
                                
                                
                                  var msg = $.spModal('message', 'Error ', 'Invalid Email id');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
					
 else if($action=="yes") {
     
     ?>
                                
                                
                                  var msg = $.spModal('message', 'Error ', 'This Email id is already taken');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
 }
                      
				}
}
function username_exist2()
{
    if(isset($_GET['existusername']))
				{
					$action=$_GET['existusername'];
					if($action=="no")
					{
                                            ?>
                                
                                
                                  var msg = $.spModal('message', 'Error ', 'Invalid User');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
					}
					
 else if($action=="yes") {
     
    ?>
                                
                                
                                  var msg = $.spModal('message', 'Error ', 'Username Already Exist');
            
            // adds 'Accept' button
            var acceptBtn = msg.addButton('OK');
            acceptBtn.on('click', function () {
                msg.close();
            });
            
            // adds 'Cancel' button
           
                                
                                
                                                <?php
 }
                      
				}
}

function username_exist()
{
    if(isset($_GET['existusername']))
				{
					$action=$_GET['existusername'];
					if($action=="no")
					{
                                            ?>
                    
					<p class="msg error">Invalid User.</p>
                    <?php
					}
					
 else if($action=="yes") {
     
     ?>
                          <p class="msg error">This Login name is already exist. please Try another Login name for employer registration</p>            
                                        <?php
 }
                      
				}
}










function is_checked()
{
    if(isset($_GET['checked']))
				{
					$action=$_GET['checked'];
					if($action=="no")
					{?>
                    
					<p class="msg error">Please Tick the one of the check box below</p>
                    <?php
					}
					
 else if($action=="yes") {
     
     ?>
                          <p class="msg error">This Login name is already exist. please Try another Login name for employer registration</p>            
                                        <?php
 }
                      
				}
}



function get_sql_now()
{
    $sql="select now()";
		   $r= $this->execute($sql);
                    $row = @mysql_fetch_array($r);
                    return $row;
}


function get_server_datetime()
{
          $time1 = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

return $postedtime=$time1->format('Y-m-d h:i:s');
}



function get_url_page()
{
    $urlpage="";
    $urlpage = strlen($_SERVER['QUERY_STRING']) ? basename($_SERVER['PHP_SELF'])."?".$_SERVER['QUERY_STRING'] : basename($_SERVER['PHP_SELF']);
    return $urlpage;
}

function get_db_url_page($uri)
{
    $newuri="";
       $parts = explode('/', $uri);
   $newuri= array_pop($parts);
    
    return $newuri;
}



function change_style_firstletter($str,$colour)
{
    $str3="";
    $str2=explode(' ',$str);
    for($i=0;$i<count($str2);$i++)
    {
        $l=strlen($str2[$i]);
        $l2=$l-1;
        
       $l4= substr($str2[$i], 1, $l2); 
       $l5=$str2[$i][0];
     $l6=  '<span style="color:'.$colour.';">'.$l5.'</span>';
     $l7=$l6.$l4;
     $str3=$str3." ".$l7;
    }
    return $str3;
}

function generate_jasonarray($array,$index)
{
    $jsonData      = array();				
	 $jsonData[] = $array;
$outputArr = array();
   $outputArr["'".$index."'"] = $jsonData;
    print_r( json_encode($outputArr));	
}

function generate_jasonarray2($array)
{
   

    print_r(json_encode($array));	
}
function action()
{
     if(isset($_GET['action']))
                                {
                                    if($_GET['action']=="sucess")
                                    {
                                ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                               Success Fully Added. 
                            </div>
                            <?php
                                    }
                                   else if($_GET['action']=="fail")
                                    {
                                ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                               Try After Some Time
                            </div>
                            <?php
                                }
                                }
}


function action2()
{
     if(isset($_GET['action']))
                                {
                                    if($_GET['action']=="sucess")
                                    {
                                ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                               Success Fully Edited. 
                            </div>
                            <?php
                                    }
                                   else if($_GET['action']=="fail")
                                    {
                                ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                               Try After Some Time
                            </div>
                            <?php
                                }
                                }
}


function action3()
{
     if(isset($_GET['action']))
                                {
                                    if($_GET['action']=="sucess")
                                    {
                                ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                               Success Fully Registered. 
                            </div>
                            <?php
                                    }
                                   else if($_GET['action']=="fail")
                                    {
                                ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                               Try After Some Time
                            </div>
                            <?php
                                }
                                }
}




function order()
{
    for($i=1;$i<200;$i++)
    {
        ?>
                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>               
      <?php                    
                          
        
    }
}


function order_selected($id)
{
    for($i=1;$i<200;$i++)
    {
        ?>
                          <option value="<?php echo $i; ?>" <?php if($i==$id) {
                              ?>
                                  selected="selected"
                             <?php
                          }
                             ?>
                                  ><?php echo $i; ?></option>               
                          }
      <?php                    
                          
        
    }
}

function calculate_percentage($value,$totalvalue)
{
    $percentage=round(($value/$totalvalue)*100);
    return $percentage;
}
//function getBaseUrl() 
//{
//	// output: /myproject/index.php
//	$currentPath = $_SERVER['PHP_SELF']; 
//	
//	// output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
//	$pathInfo = pathinfo($currentPath); 
//	
//	// output: localhost
//	$hostName = $_SERVER['HTTP_HOST']; 
//	
//	// output: http://
//	$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
//	
//	// return: http://localhost/myproject/
//	return $protocol.$hostName.$pathInfo['dirname']."/";
//}



function Lobibox()
{
     if(isset($_GET['action']))
                                {
                                    if($_GET['action']=="sucess")
                                    {
                                ?>
                          Lobibox.alert('success', {
                    msg: "Success Fully Added.."
                });
                            
                            <?php
                                    }
                                                 else if($_GET['action']=="validate")
                                    {
                                ?>
                 Lobibox.alert('error', {
                    msg: "  Validation Error"
                });
                          
                            <?php
                                }
                                   else if($_GET['action']=="fail")
                                    {
                                ?>
                 Lobibox.alert('error', {
                    msg: "  Try After Some Time.."
                });
                          
                            <?php
                                }
                                }
}

function Lobiboxcat()
{
     if(isset($_GET['action']))
                                {
                                    if($_GET['action']=="sucess")
                                    {
                                ?>
                          Lobibox.alert('success', {
                    msg: "Success Fully Added.."
                });
                            
                            <?php
                                    }
                                     else if($_GET['action']=="cat")
                                    {
                                ?>
                 Lobibox.alert('info', {
                    msg: "  cannot add more sub category in this category"
                });
                          
                            <?php
                                }
                                                 else if($_GET['action']=="validate")
                                    {
                                ?>
                 Lobibox.alert('error', {
                    msg: "  Validation Error"
                });
                          
                            <?php
                                }
                                   else if($_GET['action']=="fail")
                                    {
                                ?>
                 Lobibox.alert('error', {
                    msg: "  Try After Some Time.."
                });
                          
                            <?php
                                }
                                }
}
function Lobibox2()
{
     if(isset($_GET['action']))
                                {
                                    if($_GET['action']=="sucess")
                                    {
                                ?>
                         Lobibox.alert('success', {
                    msg: "Success Fully Edited.."
                });
                           
                            <?php
                                    }
                                                       else if($_GET['action']=="validate")
                                    {
                                ?>
                 Lobibox.alert('error', {
                    msg: "  Validation Error"
                });
                          
                            <?php
                                }
                                   else if($_GET['action']=="fail")
                                    {
                                ?>
                 Lobibox.alert('error', {
                    msg: "  Try After Some Time.."
                });
                          
                            <?php
                                }
                                }
}




function Del_Lobibox()
{
     if(isset($_GET['delete']))
                                {
                                    if($_GET['delete']=="sucess")
                                    {
                                ?>
                         Lobibox.alert('success', {
                    msg: "Success Fully Deleted.."
                });
                           
                            <?php
                                    }
                                   else if($_GET['delete']=="fail")
                                    {
                                ?>
                 Lobibox.alert('error', {
                    msg: "  Try After Some Time.."
                });
                          
                            <?php
                                }
                                }
}


function update_Lobibox()

{

     if(isset($_GET['action']))

                                {

                                    if($_GET['action']=="sucess")

                                    {

                                ?>

                         Lobibox.alert('success', {

                    msg: "Success Fully Updated.."

                });

                           

                            <?php

                                    }

                                   else if($_GET['action']=="fail")

                                    {

                                ?>

                 Lobibox.alert('error', {

                    msg: "  Try After Some Time.."

                });

                          

                            <?php

                                }

                                }

}
}






?>