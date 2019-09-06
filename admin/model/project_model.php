<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of project_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class project_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_project($post)
        {
          echo $sql="INSERT INTO   project   (

name,
client,
location,
status,
description,
photo,
num

)
VALUES (
  '".$post['name']."',
  '".$post['client']."',
  '".$post['location']."',    
  '".$post['status']."',    
  '".$post['description']."',
  '".$post['photo']."',    
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        function insert_project2($post)
        {
          echo $sql="INSERT INTO   project   (

name,
client,
location,
status,
description,
num

)
VALUES (
  '".$post['name']."',
  '".$post['client']."',
  '".$post['location']."',     
  '".$post['status']."',      
  '".$post['description']."',  
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
              function del_project($del_id)
	{
		 $sql="delete from  project  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_project($post)
        {
       $sql="update project   set

name='".$post['name']."',
client='".$post['client']."',
location='".$post['location']."',    
status='".$post['status']."',    
description='".$post['description']."', 
photo='".$post['photo']."',      
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                    function update_project2($post)
        {
       $sql="update project   set

name='".$post['name']."',
client='".$post['client']."',
location='".$post['location']."', 
status='".$post['status']."',    
description='".$post['description']."',
 
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_project($id)
      {
                    $sql="select * from  project where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
      
                function get_all_project_photo($limit)
      {
                    $sql="select * from  project where photo!=''  order by num limit 0,".$limit."";
               $r= $this->execute($sql);
return $r;
      }
         function selectbox_project($project_id)
        {
            if($project_id=="all")
            {
                 $sql="select * from  project order by num ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>" ><?php echo $row['name'] ?></option>

<?php
}
            }
            
            
  else if($facility_id!="all")
            {
                 $sql="select * from  project order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$project_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
         function get_project_name($id)
        {
           $row=$this->get_project($id);
           return $row['name'];
        }
         function get_project_completed()
      {
                    $sql="select * from  project  where status='Completed' order by num";
               $r= $this->execute($sql);
              return $r;
      }
       function get_project_ongoing()
      {
                    $sql="select * from  project  where status='Ongoing' order by num";
               $r= $this->execute($sql);
              return $r;
      }
}
