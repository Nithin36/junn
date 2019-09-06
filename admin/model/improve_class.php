<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of improve_class
 *
 * @author Administrator
 */
class improve_class {
    //put your code here
    
     function __construct()
	{
		//$sample= new commonoperation();
	}
    function clear_cache()
    {
        header ("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");  
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");
    }
    

}
