<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of post_array_class
 *
 * @author Administrator
 */
require_once("commonoperation.php");
class post_array_class extends commonoperation{
    //put your code here
      function __construct()
	{
		$sample= new commonoperation();
	}
        
        
        
            function insert_post($post_name,$array,$time)
{
    $post_array=$this->store_array_elements_db($array);
	
	 $sql="INSERT INTO  post_array(


post_name,
post_array,
post_date,
post_time

)
VALUES 
(

   '".$post_name."',
   '".$post_array."',
    '".$this->get_current_date_with_d_m_y()."',
     '".$time."'   
 
)
";
$num=$this->affectedupdatedrows($sql);
return $num;
}
function get_insert_id($post_name,$array,$time)
{
      $post_array=$this->store_array_elements_db2($array);
   $row= $this->get_insert_id_row($post_name, $post_array,$time);
   return $row['post_id'];
}

function get_insert_id_row($post_name,$post_array,$time)
{
    $r= $this->get_insert_id_result($post_name, $post_array,$time);
              $row = @mysql_fetch_array($r);
           return $row;        
               
}

function get_insert_id_result($post_name,$post_array,$time)
{
     $sql="select * from  post_array where post_name='".$post_name."' and post_array like '%".$post_array."%'"
             . " and post_date like '".$this->get_current_date_with_d_m_y()."' and post_time='".$time."'";
		   $r= $this->execute($sql);
		return $r;
    }
    function get_post_array_element($post_id)
    {
        $row= $this->get_post_array_element_row($post_id);
   return $row['post_array'];
    }
     function get_post_array_element_row($post_id)
    {
          $r= $this->get_post_array_element_resource($post_id);
              $row = @mysql_fetch_array($r);
           return $row;        
    }
 function get_post_array_element_resource($post_id)
    {
       $sql="select * from  post_array where post_id=".$post_id;
		   $r= $this->execute($sql);
		return $r;
    }
}
