<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

/**
* Description of forgot_model
*
* @author Nidhin
*/
require_once "commonoperation.php";
class forgot_model extends commonoperation{
//put your code here
function __construct()
{
$sample= new commonoperation();
}

function view_forgot($post)
{
$sql="select * from forgot where id=".$post['id']." limit 0,1";
$r= $this->execute($sql);
$nrow=array();
while ($row=@mysql_fetch_array($r)) {
$nrow=$row;
}
return $nrow;

}

function view_forgot2($id)

{

$sql="select * from forgot where id=".$id." limit 0,1";

$r= $this->execute($sql);

$nrow=array();

while ($row=@mysql_fetch_array($r)) {

$nrow=$row;

}

return $nrow['email'];



}
function get_forgotmail($post)
{
$sql="select email from forgot where email='".$post['email']."' limit 0,1";
if($this->affectedselectedrows($sql)!=0)
{    
$r= $this->execute($sql);
$nrow=array();
while ($row=@mysql_fetch_array($r)) {
$nrow=$row;
}
}
else {
    $row['email']="nill";
    $nrow=$row;
}
return $nrow['email'];

}
function edit_forgot($post)
{
$sql="update forgot set  email='".$post['email']."' where id=".$post['id'];
$num=$this->affectedupdatedrows($sql);
return $num;
}



}
