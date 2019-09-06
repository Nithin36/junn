<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Arrayfunctions {

public function check_array_match_element($arr,$key,$value)
{
$flag=false;
foreach ($arr as $subarr)
{
if($subarr[$key]==$value)
{
    $flag=true;
}
}
return $flag;
}
}


