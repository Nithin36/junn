<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class product_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_product($post)
        {
                $this->get_server_datetime();
          echo $sql="INSERT INTO   product   (

name,
brand,
usertype,
fragrance,
description,
ingredients,
howtouse,
num,
photo,
status,
addeddate


)
VALUES (

  '".mysql_escape_string($post['name'])."',
  '".mysql_escape_string($post['brand'])."',
  '".mysql_escape_string($post['usertype'])."',
  '".mysql_escape_string($post['fragrance'])."', 
  '".mysql_escape_string($post['description'])."', 
  '".mysql_escape_string($post['ingredients'])."',  
  '".mysql_escape_string($post['howtouse'])."',      
  ".mysql_escape_string($post['num']).",     
  '".mysql_escape_string($post['photo'])."',
  '".mysql_escape_string($post['status'])."',
  '".$this->get_server_datetime()."'    
   
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_product($del_id)
	{
		 $sql="delete from  product  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
                function del_product_producttype($del_id)
	{
		 $sql="delete from  product  where type=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
                 function del_product_main($del_id)
	{
		 $sql="delete from  product  where main_id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
                  function del_productphoto_producttype($del_id)
	{
	            $sql="select * from  product  where type=".$del_id."";
               $r= $this->execute($sql);

while ($row=@mysql_fetch_array($r)) {
   unlink('../../upload/products/thumb/'.$row['photo']);
                                        unlink('../../upload/products/thumb2/'.$row['photo']);
                                       unlink('../../upload/products/'.$row['photo']);
}

		
	}
        
        
        
                   function del_productphoto_main($del_id)
	{
	            $sql="select * from  product  where main_id=".$del_id."";
               $r= $this->execute($sql);

while ($row=@mysql_fetch_array($r)) {
   unlink('../../upload/products/thumb/'.$row['photo']);
                                        unlink('../../upload/products/thumb2/'.$row['photo']);
                                       unlink('../../upload/products/'.$row['photo']);
}

		
	}
        
        
                  function update_product($post)
        {
       $sql="update product   set
name='".$post['name']."',
brand='".$post['brand']."',
usertype='".$post['usertype']."',
fragrance='".$post['fragrance']."',      
description='".$post['description']."',
ingredients='".$post['ingredients']."',
howtouse='".$post['howtouse']."',    
status='".$post['status']."',
num='".$post['num']."'      
    
   
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                   function update_product2($post)
        {
       $sql="update product   set

name='".$post['name']."',
brand='".$post['brand']."',
usertype='".$post['usertype']."',
fragrance='".$post['fragrance']."',    
description='".$post['description']."',
ingredients='".$post['ingredients']."',
howtouse='".$post['howtouse']."',    
status='".$post['status']."',
num='".$post['num']."' , 
photo='".$post['photo']."'
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_product($id)
      {
                    $sql="select * from  product  where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                  function get_product_name($id)
      {
      $row=$this->get_product($id);
      return $row['name'];
      }
      
      
                function get_all_product_photo($limit)
      {
                    $sql="select * from  product  where photo!='' order by num";
               $r= $this->execute($sql);
return $r;
      }
      function get_products_producttype($type)
      {
                      $sql="select * from  product  where photo!='' and type=".$type." order by id desc";
               $r= $this->execute($sql);
               return $r;

      }
        
}
