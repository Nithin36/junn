<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of partner_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class partner_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_partner($post)
        {
          echo $sql="INSERT INTO   partner   (

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
        
        
              function del_partner($del_id)
	{
		 $sql="delete from  partner  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_partner($post)
        {
       $sql="update partner   set

name='".$post['name']."',


num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                    function update_partner2($post)
        {
       $sql="update partner   set

name='".$post['name']."',

photo='".$post['photo']."',  
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_partner($id)
      {
                    $sql="select * from  partner where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
      
                function get_all_partner_photo($limit)
      {
                    $sql="select * from  partner where photo!=''  order by num limit 0,".$limit."";
               $r= $this->execute($sql);
return $r;
      }
        
}
