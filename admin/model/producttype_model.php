<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of producttype_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class producttype_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_producttype($post)
        {
          echo $sql="INSERT INTO   producttype   (

name,
description,
main_id,
num

)
VALUES (
  '".$post['name']."',
  '".$post['description']."',
  ".$post['main_id'].",    
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_producttype($del_id)
	{
		 $sql="delete from  producttype  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
              function del_producttype_main($main_id)
	{
		 $sql="delete from  producttype  where main_id=".$main_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
                  function update_producttype($post)
        {
       $sql="update producttype   set

name='".$post['name']."',
description='".$post['description']."',    
main_id=".$post['main_id'].", 

num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
       
        
                  function get_producttype($id)
      {
                    $sql="select * from  producttype where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                      function get_all_producttype()
      {
                    $sql="select * from  producttype  order by num ";
               $r=$this->execute($sql);
               return $r;
      }
                        function get_all_producttype_mainid($main_id)
      {
                    $sql="select * from  producttype where main_id=".$main_id."  order by num ";
               $r=$this->execute($sql);
               return $r;
      }
       function selectbox_producttype($producttype_id)
        {
            if($category_id=="all")
            {
                 $sql="select * from  producttype order by num ";
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
            
            
  else if($category_id!="all")
            {
                 $sql="select * from  producttype order by num ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$producttype_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
        
        
        function selectbox_producttype_main_id($main_id)
        {
            if($category_id=="all")
            {
                 $sql="select * from  producttype order by num ";
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
            
            
  else if($main_id!="all")
            {
                 $sql="select * from  producttype where main_id=".$main_id." order by num ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
                   function get_producttype_name($id)
      {
      $row=$this->get_producttype($id);
      return $row['name'];
      }
     
        
}
