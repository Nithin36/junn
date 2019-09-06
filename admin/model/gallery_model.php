<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gallery_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class gallery_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_gallery($post)
        {
           $sql="INSERT INTO   gallery   (

name,

description,
photo,
news,
num

)
VALUES (
  '".$post['name']."',  
  '".$post['description']."',
  '".$post['photo']."',
  '".$post['news']."',    
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_gallery($del_id)
	{
		 $sql="delete from  gallery  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_gallery($post)
        {
       $sql="update gallery   set

name='".$post['name']."',
description='".$post['description']."',
news='".$post['news']."',
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                    function update_gallery2($post)
        {
       $sql="update gallery   set

name='".$post['name']."',
     
description='".$post['description']."',
news='".$post['news']."',    
photo='".$post['photo']."',  
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_gallery($id)
      {
                    $sql="select * from  gallery where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
                      function get_gallery_sub($sid)
      {
                   $sql="select * from  gallery where subcategory=".$sid." order by num limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                function get_all_gallery_photo($limit)
      {
                    $sql="select * from  gallery where photo!=''  order by num limit 0,".$limit."";
               $r= $this->execute($sql);
return $r;
      }
        
}
