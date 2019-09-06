<?php
include "database.php";
class sample extends database
{
function __construct()
{
/*$server="199.79.62.23:3306";
$username="pankajn36";
$password="pankajn36";
$dbname="abetterchange_office";*/
//$server="localhost";
/*$server="127.0.0.1";
$username="root";
$password="";
$dbname="office";*/
/*$server="199.79.62.23:3306";
$username="actgroupn36";
$password="Eef2v5@1";
$dbname="abetterchange_actgroup";*/

/*$server="localhost";
$username="root";
$password="";
$dbname="abetterchange_actgroup";
$db=new database();
$con=$db->serverconnect($server,$username,$password);
if(!$con)
{
echo "not connect to server";
}
else
{
$c=$db->selectdatabse($dbname,$con);
if(!$c)
{
echo "not connect to db";
}
}*/

$db=new database();
$con=$db->establishconnection("localhost","root","","abetterchange_actgroup");

}

function limit_text($txt,$limit)
{
	 $string= stripslashes($txt); ;
						   
						   if (strlen($string) > $limit) {

    // truncate string
    $stringCut = substr($string, 0, $limit);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
	
	
}

return $string;

}


}

?>