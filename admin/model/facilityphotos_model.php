<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of facilityphotos_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class facilityphotos_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_facilityphotos($post)
        {
          echo $sql="INSERT INTO   facilityphotos   (
name,
facility,
photo,
num

)
VALUES (
  '".$post['name']."',
  ".$post['facility'].",
  '".$post['photo']."',
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_facilityphotos($del_id)
	{
		 $sql="delete from  facilityphotos  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
               function del_facilityphotos_facility($facility)
	{
		 $sql="delete from  facilityphotos  where facility=".$facility;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
                function del_facilityphotos_facility_photo($facility)
	{
	            $sql="select * from  facilityphotos  where facility=".$facility."";
               $r= $this->execute($sql);

while ($row=@mysql_fetch_array($r)) {
   unlink('../../upload/facilityphotos/thumb/'.$row['photo']);
                                        unlink('../../upload/facilityphotos/thumb2/'.$row['photo']);
                                       unlink('../../upload/facilityphotos/'.$row['photo']);
}

		
	}
        
        
        
                  function update_facilityphotos($post)
        {
       $sql="update facilityphotos   set
name='".$post['name']."',
facility=".$post['facility'].",
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                    function update_facilityphotos2($post)
        {
       $sql="update facilityphotos   set
name='".$post['name']."',
facility='".$post['facility']."',

photo='".$post['photo']."',  
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_facilityphotos($id)
      {
                    $sql="select * from  facilityphotos where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
      
                function get_all_facilityphotos_photo($limit)
      {
                    $sql="select * from  facilityphotos where photo!=''  order by num limit 0,".$limit."";
               $r= $this->execute($sql);
return $r;
      }
        
}
