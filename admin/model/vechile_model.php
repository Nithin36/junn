<?php

require_once "commonoperation.php";
class vechile_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
               function view_vechile($post)
        {
          $sql="select * from vechile where id=".$post['id']." order by num limit 0,1";
                $r= $this->execute($sql);
$nrow=array();
while ($row =@mysql_fetch_array($r)) {
    $nrow=$row;
}
return $nrow;
		  
        }
        
                   function view_vechile2($id)
        {
          $sql="select * from vechile where id=".$id." order by num limit 0,1";
                $r= $this->execute($sql);
$nrow=array();
while ($row =@mysql_fetch_array($r)) {
    $nrow=$row;
}
return $nrow;
		  
        }
        
                function edit_vechile($post)
        {
           $sql="update vechile set  name='".$post['name']."',quantity='".$post['quantity']."' ,num=".$post['num']." where id=".$post['id'];
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
                 function add_vechile($post)
        {
           $sql="insert into vechile (name,quantity,num) values( '".$post['name']."','".$post['quantity']."',".$post['num'].")";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                 function del_vechile($del_id)
	{
		  $sql="delete from  vechile  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
                  function view_vechile_all()
        {
          $sql="select * from vechile  order by num ";
                $r= $this->execute($sql);

return $r;
		  
        }
                   function view_vechile_limit($limit)
        {
          $sql="select * from vechile  order by num limit 0,$limit";
                $r= $this->execute($sql);

return $r;
		  
        }
}
