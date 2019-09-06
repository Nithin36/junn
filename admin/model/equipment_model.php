<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of equipment_model
 *
 * @author Nidhin
 */
require_once "commonoperation.php";
class equipment_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
               function view_equipment($post)
        {
          $sql="select * from equipment where id=".$post['id']." order by num limit 0,1";
                $r= $this->execute($sql);
$nrow=array();
while ($row =@mysql_fetch_array($r)) {
    $nrow=$row;
}
return $nrow;
		  
        }
        
                   function view_equipment2($id)
        {
          $sql="select * from equipment where id=".$id." order by num limit 0,1";
                $r= $this->execute($sql);
$nrow=array();
while ($row =@mysql_fetch_array($r)) {
    $nrow=$row;
}
return $nrow;
		  
        }
        
                function edit_equipment($post)
        {
           $sql="update equipment set  name='".$post['name']."',quantity='".$post['quantity']."' ,model='".$post['model']."' ,num=".$post['num']." where id=".$post['id'];
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
                 function add_equipment($post)
        {
           $sql="insert into equipment (name,quantity,model,num) values( '".$post['name']."','".$post['quantity']."','".$post['model']."',".$post['num'].")";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                 function del_equipment($del_id)
	{
		  $sql="delete from  equipment  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
                  function view_equipment_all()
        {
          $sql="select * from equipment  order by num ";
                $r= $this->execute($sql);

return $r;
		  
        }
                   function view_equipment_limit($limit)
        {
          $sql="select * from equipment  order by num limit 0,$limit";
                $r= $this->execute($sql);

return $r;
		  
        }
}
