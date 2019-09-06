<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productsize_model
 *
 * @author user
 */
require_once "commonoperation.php";
class productsize_model  extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
    
            function insert_productsize($post,$product_id)
        {
                $this->get_server_datetime();
          echo $sql="INSERT INTO   productsize   (

sizename,
sizeunit,
noofitems,
quantity,
price,
product_id,
onlineprice


)
VALUES (

  '".mysql_escape_string($post['sname'])."',
  '".mysql_escape_string($post['sunit'])."',
  '".mysql_escape_string($post['noofitems'])."',     
  '".mysql_escape_string($post['squantity'])."',
  '".mysql_escape_string($post['sprice'])."',
  '".$product_id."',
  '".mysql_escape_string($post['soprice'])."'    
   
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
                        function get_productsize_product($pid)
      {
                   $sql="select * from  productsize where product_id=".$pid." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
                  function del_productsize_product($pid)
	{
		 $sql="delete from  productsize  where product_id=".$pid;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
      
}
