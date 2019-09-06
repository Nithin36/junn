<?php
require_once("security_class.php");
class path_class extends security_class
{
   
	//private $path="../../aacadmin/" ;
//private $ckeditorimagepath="http://localhost/jobportal/";
//private $path="http://localhost/jobportal/";
        
        
       private $ckeditorimagepath="http://www.abetterchange.com/demo/unique2/";
private $path="http://www.junaidperfumes.in/";
	function __construct()
{
$security_class=new security_class();

//$header=new header_class();
//$con=$db->establishconnection("199.79.62.23:3306","actgroupn36","Eef2v5@1","abetterchange_actgroup");
}
	function set_path($path)
	{
		$this->path=$path;
	}
	function get_ckeditorimagepath()
	{
		return $this->ckeditorimagepath;
	}
        function get_path()
	{
		return $this->path;
	}
	
}


?>