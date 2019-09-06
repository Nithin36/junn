<?php
ob_start();
function __autoload($class_name) 
{
    require_once "../model/".$class_name.".php";
}
$file_class=new file_class();
$project2_model=new project2_model();
$projectphotos_model=new projectphotos_model();

if(isset($_POST["addproject"]))
{
   
     $status="";
 $num=$project2_model->post_data_some_filled($_POST,'client,status,mobno,email,faxno,bifsc');

 if($num!=0)
{
	$status="no";

}

 else {

     $num=$project2_model->insert_project($_POST);
              if(num!=0)
              {
                   $status="no";
              }
              else
              {
               $status="yes";
              }
 
}
$status2 = array("status"=>"$status");
 

print_r(json_encode($status2));
}


if(isset($_GET["del_id"]))
{
      $url="";
                                        If(isset($_GET['page']))
                                        {
                                            $url=$url."&page=".$_GET['page'];
                                        }
                                           if(isset($_GET['projecttype']))
                                        {
                                             $url=$url."&projecttype=".$_GET['projecttype']; 
                                          }
                                        
                                         If(isset($_GET['pgno']))
                                        {
                                             $url=$url."&pgno=".$_GET['pgno'];
                                        }
                                        
                                  
    $r=$project2_model->del_project($_GET["del_id"]);
if($r!=1)
{
	header('location: ../list_project2.php?delete=fail'.$url);
}
else
{
	header('location: ../list_project2.php?delete=sucess'.$url);
}
}



if(isset($_POST["editproject"]))
{
    $id="&id=".$_POST['id'];
   
     $status="";
$num=$project2_model->post_data_some_filled($_POST,'client,status,mobno,email,faxno,bifsc');

 if($num!=0)
{
	$status="no";

}

 else {

     
          $_POST=$project2_model->escapestring_rows($_POST);
    $j=$project2_model->update_project($_POST);
  if(($j!=0)||($j!=1))
  {
      $status="yes";
  }       
 else {
    $status="no";
  } 
   
}
$status2 = array("status"=>"$status");
  $_POST=$project2_model->escapestring_rows($_POST);
$row=$project2_model->get_project($_POST['id']);
$row2=array_merge($row, $status2);
print_r(json_encode($row2));
}


if(isset($_POST['p'])){
//include("pages.php");
//include("db.php");
  
    $r=array();
     $_GET['p']=$_POST['p'];
    $max_records=30;
     $query="select * from  project where projecttype=".$_POST['id']."   order by num";
$r=$project2_model->ajax_pagination_query($max_records,$query);
//print_r($r);
 $total_records=$r['totalrecords'];
 $page=$r['page'];
$current_page=$r['currentpage'];
$html='';
$pages='';
if($total_records>0){
$page_rs=mysql_query($page);
$page_count=mysql_num_rows($page_rs);
if($_POST['p']==1)
{
    $i=1;
} 
 else {
    $i=(($_POST['p']*$max_records)-$max_records)+1;
}
//$i=1;

while($page_row=mysql_fetch_assoc($page_rs)){
    
    $page_row= $project2_model->stripslahes_rows($page_row);
$html.=' <tr>
                                            <td>'. $i.'</td>
                                           
                                            <td>'.$page_row['name'].'</td>
                                            <td>'.$page_row['client'].'</td>    
                                            <td>'.$page_row['plant'].'</td>
                                           
                                
                                <td style="text-transform: uppercase;">'.$page_row['status'] .'</td>
                                
                          
                               
                               
                                  
                                        </tr>';  
$i++;
}
if($total_records>0){
    if($total_records>$max_records){
$pages=$pages.$project2_model->pagelist($current_page,$total_records,$max_records);
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