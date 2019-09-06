<?php
require_once( "ajaxpagination_class.php");

class pagenation_class extends ajaxpagination_class 
{
	function __construct()
{
$ajaxpagination_class=new ajaxpagination_class();
}

function start_page($pgno,$perpage)
{

$calc = $perpage * $pgno;
$start = $calc - $perpage;
return $start;
}



function display_page_numbers($result2,$pgurl,$perpage,$pgno)
{
    
     if(isset($pgno))
{
  ?>
                                   <div class="cols-xs-12 anim-section text-center animate">
<ul class="pagination">
<?php
 $rows = @mysql_num_rows($result2);
if($rows)
{
$rs = mysql_fetch_assoc($result2);
 $total = $rs["Total"];
}
$totalPages = ceil($total / $perpage);
 $newno=$pgno;
if($pgno <=1 ){
    
    if($total<$newno)
    {
       echo "<li class='active'><a href='#'>Prev</a></li>";
    }
    
 
    }

else
{
$j = $pgno - 1;
echo "<li><a  href='".$pgurl."&pgno=".$j."'>< Prev</a></li>";
}
for($i=1; $i <= $totalPages; $i++)
{
if($i<>$pgno)
{
echo "<li><a  href='".$pgurl."&pgno=".$i."'>$i</a></li>";
}
else
{
     if($total<$newno)
    {
echo "<li class='active' ><a href='#'>$i</a></li>";
    }
    if(isset($_GET['pgno']))
    {
        echo "<li class='active' ><a href='#'>$i</a></li>";
    }
}
}
if($pgno == $totalPages )
{
    if($total<$newno)
    {
echo "<li class='active' ><a href='#'>$Next ></a></li>";
    }
}
else
{
$j = $pgno + 1;

echo "<li><a href='".$pgurl."&pgno=".$j."'>Next</a></li>";
    
}
?>
    </ul>

</div> 
 <?php   

}
    
}

function execute_pagenation_query($start,$perpage,$table,$subquery)
	{
		 $sql="select * from ".$table.$subquery." Limit $start, $perpage ";
		   $r= $this->execute($sql);
		return $r;
	}


function page_select_rows($table,$subqury)
{
	
	 $sql="select count(*) As Total from ".$table.$subqury;
		   $r= $this->execute($sql);
		return $r;
}


function execute_pagenation_join_query($start,$perpage,$query)
	{
		 $sql=$query." Limit $start, $perpage ";
		   $r= $this->execute($sql);
		return $r;
	}

}

?>