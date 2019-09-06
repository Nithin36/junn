<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ajaxpagination_class
 *
 * @author Administrator
 */
require_once( "footer_class.php");
class ajaxpagination_class extends footer_class 
{
	function __construct()
{
$footer=new footer_class();
}


function ajax_pagination_query($max_records,$page)
{
    
   // $max_records=2;
//$page = "Select * from   articles where  status=1  order by id asc";
//$sql = "Select * from   articles where  status=1 ";
$rstotal=mysql_query($page) ;
$total_records=mysql_num_rows($rstotal);
//echo "p: ".$_GET["p"];
//if($_GET['P']==0)
//{
//    $current_page=1;
//}
// else {
//    $current_page=$_GET["p"];
//}

$current_page=(isset($_GET["p"]) && intval($_GET["p"])<>0)?intval($_GET["p"])-1:0;
//echo "current :".$current_page."</br/>";
$start=($current_page*$max_records);
if($start=='')
$start=0;
$end=0;
if($total_records >= 1)
{
$total_pages=ceil($total_records/$max_records);
if($start < $total_records)
{
if($start + $max_records < $total_records)
$end = $start + $max_records;
else
$end = $total_records;
}
$page = "$page LIMIT $start,$max_records";
}

$array = array( 
                    "page"=>$page,  
                    "totalrecords"=>$total_records,
                    "currentpage"=>$current_page,
                    );
return $array;
}

function pagelist($current, $total,$max_records)
{
//global $max_records;




$current++;
$perpage=3;// per page link
if(!empty($max_records)) $limit=$max_records;
if(!$current) $current = 1;
 $last = ceil($total/$max_records);
$previous=$current - 1;
if($last==$current)
{
    $next=$current;
}
 else {
    $next=$current + 1;
}

$pagination='';

if($total > 1)
{
$pagination.='<div class="cols-xs-12 anim-section text-center animate"><ul class="pagination">';
if( $current >1)
{
$pagination.="<li style='cursor:pointer' ><a rel='1' class=' pages' >First</a></li>";
$pagination .= "<li style='cursor:pointer'><a  rel=".$previous." class=' pages'>Previous</a></li>";
}
else
{

}
if ($current >= $perpage) {
    $pages = $current - floor($perpage/2);
   
    if ($last > $current + floor($perpage/2))
    if($perpage%2==0)
    $loop = $current + floor($perpage/2)-1;
    else
    $loop = $current + floor($perpage/2);
    else if ($current <= $last && $current > $last - ($perpage-1)) {
         $pages = $last - ($perpage-1);
        $loop = $last;
    } else {
     $loop = $last;
    }
} else {
    $pages = 1;
    if ($last > $perpage)
        $loop = $perpage;
    else
        $loop = $last;
}

for($i = $pages; $i <=$loop; $i++)
{

$class=($current==$i)?'active':'';

$pagination.="<li  class='".$class."' style='cursor:pointer'><a class=' pages' rel='".$i."'>".$i."</a></li>";


}
if( $total != $current )
{
$pagination .= "<li style='cursor:pointer'><a  rel=".$next." class=' pages'>Next</a></li>";
$pagination.="<li style='cursor:pointer' ><a rel='".$last."' class=' pages' >Last</a></li>";

}
else
{

}
$pagination.=' </ul></div>';
}

return $pagination;
}



}
