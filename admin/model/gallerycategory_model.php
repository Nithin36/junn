<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gallerycategory_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class gallerycategory_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_gallerycategory($post)
        {
          $sql="INSERT INTO   gallerycategory   (

name,
num

)
VALUES (
  '".$post['name']."',
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_gallerycategory($del_id)
	{
		 $sql="delete from  gallerycategory  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
              function del_gallerycategory_main($main_id)
	{
		 $sql="delete from  gallerycategory  where main_id=".$main_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
                  function update_gallerycategory($post)
        {
       $sql="update gallerycategory   set

name='".$post['name']."',
   
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
       
        
                  function get_gallerycategory($id)
      {
                    $sql="select * from  gallerycategory where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                      function get_all_gallerycategory()
      {
                    $sql="select * from  gallerycategory  order by num ";
               $r=$this->execute($sql);
               return $r;
      }
    
       function selectbox_gallerycategory($gallerycategory_id)
        {
            if($category_id=="all")
            {
                 $sql="select * from  gallerycategory order by num ";
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
                 $sql="select * from  gallerycategory order by num ";
               $r= $this->execute($sql);
?>

<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$gallerycategory_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
        
        
        function selectbox_gallerycategory_main_id($main_id)
        {
            if($category_id=="all")
            {
                 $sql="select * from  gallerycategory order by num ";
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
        
                   function get_gallerycategory_name($id)
      {
      $row=$this->get_gallerycategory($id);
      return $row['name'];
      }
     
        
}
