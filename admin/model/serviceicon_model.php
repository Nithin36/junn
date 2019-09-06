<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of serviceicon_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class serviceicon_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_serviceicon($post)
        {
          echo $sql="INSERT INTO   serviceicon   (
name,
service,
photo,
num

)
VALUES (
  '".$post['name']."',
  ".$post['service'].",
  '".$post['photo']."',
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_serviceicon($del_id)
	{
		 $sql="delete from  serviceicon  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_serviceicon($post)
        {
        $sql="update serviceicon   set
name='".$post['name']."',
service=".$post['service'].", 
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                    function update_serviceicon2($post)
        {
       $sql="update serviceicon   set
name='".$post['name']."',
service='".$post['service']."',
photo='".$post['photo']."',  
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_serviceicon($id)
      {
                    $sql="select * from  serviceicon where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
                 function get_serviceicon_service($service)
      {
                    $sql="select * from  serviceicon where service=".$service." ";
               $r= $this->execute($sql);

return $r;
      }
                   function get_serviceicon_subservice($subservice)
      {
                    $sql="select * from  serviceicon where subservice=".$subservice." ";
               $r= $this->execute($sql);

return $r;
      }
      
      
                function get_all_serviceicon_photo($limit)
      {
                    $sql="select * from  serviceicon where photo!=''  order by num limit 0,".$limit."";
               $r= $this->execute($sql);
return $r;
      }
        
}
