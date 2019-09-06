<?php
ob_start();
function __autoload($class_name) 
{
require_once "../model/".$class_name.".php";

}
$fragrance_model=new fragrance_model();
if(isset($_POST["addfragrance"]))
{
$status="";
$num=$fragrance_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');

if($num!=0)
{
header('location: ../add_fragrance.php?action=fail');

}
else {
if($_POST['parent']!=0)
{

if($fragrance_model->check_mainfragrance($_POST['parent']))

{
$_POST=$fragrance_model->escapestring_rows($_POST);

$num=$fragrance_model->insert_fragrance($_POST);

if($num!=0)

{
header('location: ../add_fragrance.php?action=sucess');

}
else

{
header('location: ../add_fragrance.php?action=fail');

}
}

else {
header('location: ../add_fragrance.php?action=cat');

}

}
else {
$_POST=$fragrance_model->escapestring_rows($_POST);

$num=$fragrance_model->insert_fragrance($_POST);

if($num!=0)
{
header('location: ../add_fragrance.php?action=sucess');               
}
else

{
header('location: ../add_fragrance.php?action=fail');

}

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

$row=$fragrance_model->get_fragrance($_GET["del_id"]);



//$r3=$subfragrance_model->del_subfragrance_fragrance($_GET["del_id"]);                               

$r=$fragrance_model->del_fragrance($_GET["del_id"]);



if($r!=1)

{

header('location: ../list_fragrance.php?delete=fail'.$url);

}

else

{

header('location: ../list_fragrance.php?delete=sucess'.$url);

}

}







if(isset($_POST["editfragrance"]))

{

$id="&id=".$_POST['id'];

$status="";

$num=$fragrance_model->post_data_some_filled($_POST,'mobno,email,faxno,bifsc');



if($num!=0)

{

header('location: ../edit_fragrance.php?action=fail'.$id);



}



else {

$id="&id=".$_POST['id'];





$_POST=$fragrance_model->escapestring_rows($_POST);

//          $_POST['name']=stripcslashes(nl2br($_POST['name']));

//           $_POST['description']=stripcslashes($_POST['description']);

//            $_POST['child']=stripcslashes(nl2br($_POST['child']));

//            $_POST['num']=stripcslashes(nl2br($_POST['num']));

$j=$fragrance_model->update_fragrance($_POST);

if(($j!=0)||($j!=1))

{

header('location: ../edit_fragrance.php?action=sucess'.$id);

}       

else {

header('location: ../edit_fragrance.php?action=fail'.$id);

} 















}



}



if(isset($_POST['p'])){

//include("pages.php");

//include("db.php");



$r=array();

$_GET['p']=$_POST['p'];

$max_records=10;

$query="select * from  fragrance  order by num";

$r=$fragrance_model->ajax_pagination_query($max_records,$query);

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

//$page_row= $fragrance_model->stripslahes_rows($page_row);

$html.=' <div class="call-action call-action-boxed call-action-style1 clearfix">

<!-- Call Action Button -->

<div class="button-side" style="margin-top:8px;"><a target="_blank" href="apply-for-fragrance.php?id='.base64_encode($page_row['id']).'&fragrance='.stripcslashes($page_row['name']).' " style="background-color: #ee3733;" class="btn-system btn-large">Apply Now</a></div>

<h2 class="primary"><strong class="appfragrancetitle">'.stripcslashes($page_row['name']).'</strong> </h2>

'.$page_row['description'].'

</div><div class="hr1" style="margin-bottom:40px;"></div>';   

}

if($total_records>0){

if($total_records>$max_records){

$pages=$pages.$fragrance_model->pagelist($current_page,$total_records,$max_records);

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