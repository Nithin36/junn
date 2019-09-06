<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}

$job_model=new job_model();
//$subjob_model=new subjob_model();
if(isset($_POST["addjob"]))
{
   
     $status="";
 $num=$job_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../add_job.php?action=fail');

}

 else {

      $_POST=$job_model->escapestring_rows($_POST);
              $num=$job_model->insert_job($_POST);
              if(num!=0)
              {
                    header('location: ../add_job.php?action=fail');
              }
              else
              {
               header('location: ../add_job.php?action=sucess');
              }
  

    
    

     
 
 
 
}

}


if(isset($_GET["del_id"]))
{
      $url="";
                                        If(isset($_GET['page']))
                                        {
                                            $url=$url."&page=".$_GET['page'];
                                        }
                                        
                                         If(isset($_GET['pgno']))
                                        {
                                             $url=$url."&pgno=".$_GET['pgno'];
                                        }
                                         $row=$job_model->get_job($_GET["del_id"]);
                                     
      //$r3=$subjob_model->del_subjob_job($_GET["del_id"]);                               
    $r=$job_model->del_job($_GET["del_id"]);
    
if($r!=1)
{
	header('location: ../list_job.php?delete=fail'.$url);
}
else
{
	header('location: ../list_job.php?delete=sucess'.$url);
}
}



if(isset($_POST["editjob"]))
{
   $id="&id=".$_POST['id'];
     $status="";
$num=$job_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

 if($num!=0)
{
	 header('location: ../edit_job.php?action=fail'.$id);

}

 else {
$id="&id=".$_POST['id'];

      
          $_POST=$job_model->escapestring_rows($_POST);
//          $_POST['name']=stripcslashes(nl2br($_POST['name']));
//           $_POST['description']=stripcslashes($_POST['description']);
//            $_POST['child']=stripcslashes(nl2br($_POST['child']));
//            $_POST['num']=stripcslashes(nl2br($_POST['num']));
    $j=$job_model->update_job($_POST);
  if(($j!=0)||($j!=1))
  {
       header('location: ../edit_job.php?action=sucess'.$id);
  }       
 else {
     header('location: ../edit_job.php?action=fail'.$id);
  } 

    

     
 
 
 
}

}

if(isset($_POST['p'])){
//include("pages.php");
//include("db.php");
  
    $r=array();
     $_GET['p']=$_POST['p'];
    $max_records=10;
     $query="select * from  job  order by num";
$r=$job_model->ajax_pagination_query($max_records,$query);
//print_r($r);
 $total_records=$r['totalrecords'];
 $page=$r['page'];
$current_page=$r['currentpage'];
$html='';
$pages='';
if($total_records>0){
$page_rs=mysql_query($page);
$page_count=mysql_num_rows($page_rs);
while($page_row=mysql_fetch_assoc($page_rs)){
    //$page_row= $job_model->stripslahes_rows($page_row);
$html.=' <div class="call-action call-action-boxed call-action-style1 clearfix">
            <!-- Call Action Button -->
            <div class="button-side" style="margin-top:8px;"><a target="_blank" href="apply-for-job.php?id='.base64_encode($page_row['id']).'&job='.stripcslashes($page_row['name']).' " style="background-color: #ee3733;" class="btn-system btn-large">Apply Now</a></div>
            <h2 class="primary"><strong class="appjobtitle">'.stripcslashes($page_row['name']).'</strong> </h2>
           '.$page_row['description'].'
          </div><div class="hr1" style="margin-bottom:40px;"></div>';   
}
if($total_records>0){
    if($total_records>$max_records){
$pages=$pages.$job_model->pagelist($current_page,$total_records,$max_records);
    }
}
echo json_encode(array('status'=>true,'html'=>"$html",'pages'=>"$pages"));exit;
}else
{
$html.='
<div align="center">
'. 'no data to show
</div>';
echo json_encode(array('status'=>true,'html'=>"$html"));exit;
}
}

ob_flush();
?>