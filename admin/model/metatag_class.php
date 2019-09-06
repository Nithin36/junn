<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of metatag_class
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class metatag_class extends commonoperation
{
	
	function __construct()
	{
		$sample= new commonoperation();
	}
        
        function display_metatags()
        {
            $sql="select * from pagetitle";
		$pdtsql=@mysql_query($sql);
                $flag=0;
		while($pdtrows=@mysql_fetch_array($pdtsql)){
                    $uri = $pdtrows['pageurl']; 
       

   $parts = explode('/', $uri);
   $newuri= array_pop($parts);
$myurl = strlen($_SERVER['QUERY_STRING']) ? basename($_SERVER['PHP_SELF'])."?".$_SERVER['QUERY_STRING'] : basename($_SERVER['PHP_SELF']);
if($newuri==$myurl)
{
    $flag=1;
            ?>
<title><?php echo $pdtrows['title']; ?></title>
<meta name="keywords" content="<?php echo $pdtrows['keyword']; ?>">
<meta name="Description" content="<?php echo $pdtrows['description']; ?>">

<?php
}
 else {
    
}
                }
                
                if($flag==0)
                {
                       $sql="select * from pagetitle where id=4";
		$pdtsql=@mysql_query($sql);
                
		while($pdtrows=@mysql_fetch_array($pdtsql)){
                    ?>

<title><?php echo $pdtrows['title']; ?></title>
<meta name="keywords" content="<?php echo $pdtrows['keyword']; ?>">
<meta name="Description" content="<?php echo $pdtrows['description']; ?>">
<?php
                }            
                }
        }
        
}
