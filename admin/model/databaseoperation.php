<?php
class databaseoperation
{
public $con;
public $database;

function serverconnect($server,$username,$password)
{
$con=@mysql_connect($server,$username,$password);
return $con;
}
function selectdatabse($db,$con)
{
//echo $database;
$selectdb=@mysql_select_db($db,$con);
return $selectdb;
}
function execute($sql)
{
$result=mysql_query($sql);
return $result;
}
function affectedupdatedrows($sql)
{
	$result=@mysql_query($sql);
 $num=mysql_affected_rows();
return $num;
}
function affectedselectedrows($sql)
{
	$result=@mysql_query($sql);
 $num=@mysql_num_rows($result);
return $num;
}
function selectrowid($sql)
{
	$id=0;
	$result=@mysql_query($sql);
 while($row=@mysql_fetch_array($result))
{
	$id=$row['id'];
}
return $id;
}

function establishconnection($host,$user,$password,$db)
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
$dbname="abetterchange_actgroup";*/
$server=$host;
$username=$user;
$password=$password;
$dbname=$db;

$con=$this->serverconnect($server,$username,$password);
if(!$con)
{
echo "not connect to server";
}
else
{
$c=$this->selectdatabse($dbname,$con);
if(!$c)
{
echo "not connect to db";
}
}
}
}

?>