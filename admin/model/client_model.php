<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of client_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class client_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_client($post)
        {
          echo $sql="INSERT INTO   client   (

name,
photo,
num

)
VALUES (
  '".$post['name']."',
  '".$post['photo']."',
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_client($del_id)
	{
		 $sql="delete from  client  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_client($post)
        {
       $sql="update client   set

name='".$post['name']."',


num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                    function update_client2($post)
        {
       $sql="update client   set

name='".$post['name']."',

photo='".$post['photo']."',  
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_client($id)
      {
                    $sql="select * from  client where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
      
                function get_all_client_photo($limit)
      {
                    $sql="select * from  client where photo!=''  order by num limit 0,".$limit."";
               $r= $this->execute($sql);
return $r;
      }
        
}
