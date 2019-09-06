<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of management_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class management_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_management($post)
        {
          echo $sql="INSERT INTO   management   (

name,
photo,
designation,	
num

)
VALUES (
  '".$post['name']."',
  '".$post['photo']."',
  '".$post['designation']."',
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_management($del_id)
	{
		 $sql="delete from  management  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_management($post)
        {
       $sql="update management   set

name='".$post['name']."',
designation='".$post['designation']."',
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                    function update_management2($post)
        {
       $sql="update management   set

name='".$post['name']."',
designation='".$post['designation']."',
photo='".$post['photo']."',  
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_management($id)
      {
                    $sql="select * from  management where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
      
                function get_all_management_photo($limit)
      {
                    $sql="select * from  management where photo!=''  order by num limit 0,".$limit."";
               $r= $this->execute($sql);
return $r;
      }
        
}
