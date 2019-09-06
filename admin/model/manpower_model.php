<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of manpower_model
 *
 * @author Nidhin
 */
require_once "commonoperation.php";
class manpower_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
               function view_manpower($post)
        {
          $sql="select * from manpower where id=".$post['id']." order by num limit 0,1";
                $r= $this->execute($sql);
$nrow=array();
while ($row =@mysql_fetch_array($r)) {
    $nrow=$row;
}
return $nrow;
		  
        }
        
                   function view_manpower2($id)
        {
          $sql="select * from manpower where id=".$id." order by num limit 0,1";
                $r= $this->execute($sql);
$nrow=array();
while ($row =@mysql_fetch_array($r)) {
    $nrow=$row;
}
return $nrow;
		  
        }
        
                function edit_manpower($post)
        {
           $sql="update manpower set  name='".$post['name']."',quantity='".$post['quantity']."' ,num=".$post['num']." where id=".$post['id'];
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
                 function add_manpower($post)
        {
           $sql="insert into manpower (name,quantity,num) values( '".$post['name']."','".$post['quantity']."',".$post['num'].")";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                 function del_manpower($del_id)
	{
		  $sql="delete from  manpower  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
                  function view_manpower_all()
        {
          $sql="select * from manpower  order by num ";
                $r= $this->execute($sql);

return $r;
		  
        }
                   function view_manpower_limit($limit)
        {
          $sql="select * from manpower  order by num limit 0,$limit";
                $r= $this->execute($sql);

return $r;
		  
        }
}
