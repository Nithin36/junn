<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profile_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class profile_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_profile($post)
        {
          echo $sql="INSERT INTO   profile   (

name,
doc,
num

)
VALUES (
  '".$post['name']."',
  '".$post['doc']."',
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_profile($del_id)
	{
		 $sql="delete from  profile  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_profile($post)
        {
       $sql="update profile   set

name='".$post['name']."',


num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                    function update_profile2($post)
        {
       $sql="update profile   set

name='".$post['name']."',

doc='".$post['doc']."',  
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_profile($id)
      {
                    $sql="select * from  profile where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
      
                function get_all_profile_doc($limit)
      {
                    $sql="select * from  profile where doc!=''  order by num limit 0,".$limit."";
               $r= $this->execute($sql);
return $r;
      }
        
}
