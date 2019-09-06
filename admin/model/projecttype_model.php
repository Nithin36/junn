<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of projecttype_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class projecttype_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_projecttype($post)
        {
           $sql="INSERT INTO   projecttype   (

name,
description,
num

)
VALUES (
  '".$post['name']."',
  '".$post['description']."',
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_projecttype($del_id)
	{
		 $sql="delete from  projecttype  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
              function del_projecttype_main($main_id)
	{
		 $sql="delete from  projecttype  where main_id=".$main_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
                  function update_projecttype($post)
        {
       $sql="update projecttype   set

name='".$post['name']."',
description='".$post['description']."',    
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
       
        
                  function get_projecttype($id)
      {
                    $sql="select * from  projecttype where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                      function get_all_projecttype()
      {
                    $sql="select * from  projecttype  order by num ";
               $r=$this->execute($sql);
               return $r;
      }
    
       function selectbox_projecttype($projecttype_id)
        {
            if($category_id=="all")
            {
                 $sql="select * from  projecttype order by num ";
               $r= $this->execute($sql);
?>

<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>" ><?php echo $row['name'] ?></option>

<?php
}
            }
            
            
  else if($category_id!="all")
            {
                 $sql="select * from  projecttype order by num ";
               $r= $this->execute($sql);
?>

<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$projecttype_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
        
        
        function selectbox_projecttype_main_id($main_id)
        {
            if($category_id=="all")
            {
                 $sql="select * from  projecttype order by num ";
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
         
            
        }
        
                   function get_projecttype_name($id)
      {
      $row=$this->get_projecttype($id);
      return $row['name'];
      }
     
        
}
