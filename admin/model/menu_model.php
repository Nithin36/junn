<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class menu_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_menu($post)
        {
           $sql="INSERT INTO   menu   (

name,
description,
child,
num

)
VALUES (
  '".$post['name']."',
  '".$post['description']."',
  ".$post['child'].", 
   ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_menu($del_id)
	{
		echo $sql="delete from  menu  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_menu($post)
        {
      echo $sql="update menu   set

name='".$post['name']."',
description='".$post['description']."' , 
child=".$post['child'].",
num=".$post['num']."      
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }

        
                  function get_menu($id)
      {
                    $sql="select * from  menu where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                  function get_menus_all()
      {
                    $sql="select * from  menu order by num ";
               $r= $this->execute($sql);
            return $r;
      }

      
      
      function selectbox_menu($menu_id)
        {
            if($menu_id=="all")
            {
                 $sql="select * from  menu order by num ";
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
            
            
  else if($menu_id!="all")
            {
                 $sql="select * from  menu order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$menu_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
        
        function get_menu_name($id)
        {
           $row=$this->get_menu($id);
           return $row['name'];
        }
        
        
}
