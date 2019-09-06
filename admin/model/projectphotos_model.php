<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of projectphotos_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class projectphotos_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_projectphotos($post)
        {
          echo $sql="INSERT INTO   projectphotos   (
name,
project,
photo,
num

)
VALUES (
  '".$post['name']."',
  ".$post['project'].",
  '".$post['photo']."',
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_projectphotos($del_id)
	{
		 $sql="delete from  projectphotos  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
               function del_projectphotos_project($project)
	{
		 $sql="delete from  projectphotos  where project=".$project;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
                function del_projectphotos_project_photo($project)
	{
	            $sql="select * from  projectphotos  where project=".$project."";
               $r= $this->execute($sql);

while ($row=@mysql_fetch_array($r)) {
   unlink('../../upload/projectphotos/thumb/'.$row['photo']);
                                        unlink('../../upload/projectphotos/thumb2/'.$row['photo']);
                                       unlink('../../upload/projectphotos/'.$row['photo']);
}

		
	}
        
        
        
                  function update_projectphotos($post)
        {
       $sql="update projectphotos   set
name='".$post['name']."',
project=".$post['project'].",
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                    function update_projectphotos2($post)
        {
       $sql="update projectphotos   set
name='".$post['name']."',
project='".$post['project']."',

photo='".$post['photo']."',  
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_projectphotos($id)
      {
                    $sql="select * from  projectphotos where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
      
                function get_all_projectphotos_photo($limit)
      {
                    $sql="select * from  projectphotos where photo!=''  order by num limit 0,".$limit."";
               $r= $this->execute($sql);
return $r;
      }
        
      
      
             function get_projectphotos_project_result($project)
	{
	            $sql="select * from  projectphotos  where project=".$project."";
               $r= $this->execute($sql);
               return $r;
        }      
}
