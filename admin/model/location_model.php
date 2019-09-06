<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of location_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class location_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_location($post)
        {
           $sql="INSERT INTO   location   (

name,
con_id

)
VALUES (
  '".$post['name']."',
  '".$post['con_id']."'    
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_location($del_id)
	{
		 $sql="delete from  location  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_location($post)
        {
      echo $sql="update location   set

name='".$post['name']."',
con_id='".$post['con_id']."'    
      
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }

        
                  function get_location($id)
      {
                   $sql="select * from  location where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                  function get_locations_all()
      {
                    $sql="select * from  location order by num ";
               $r= $this->execute($sql);
            return $r;
      }
                    function get_locations_limit($limit)
      {
                    $sql="select * from  location order by num limit 0,$limit ";
               $r= $this->execute($sql);
            return $r;
      }
                function get_locations_photosall()
      {
                    $sql="select * from  location where image!='' order by num ";
               $r= $this->execute($sql);
            return $r;
      }
      
                 function get_locations_photosall_limit($limit)
      {
                    $sql="select * from  location where image!='' order by num limit 0,$limit";
               $r= $this->execute($sql);
            return $r;
      }
      function selectbox_location($location_id)
        {
            if($location_id=="all")
            {
                 $sql="select * from  location order by name ";
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
            
            
  else if($location_id!="all")
            {
                 $sql="select * from  location order by name  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$location_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
         function selectbox_location2($location_id)
        {
            if($location_id=="all")
            {
                 $sql="select * from  location order by num ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['name'] ?>" ><?php echo $row['name'] ?></option>

<?php
}
            }
            
            
  else if($location_id!="all")
            {
                 $sql="select * from  location order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['name'] ?>"<?php if($row['id']==$location_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        function get_location_name($id)
        {
           $row=$this->get_location($id);
           return $row['name'];
        }
        
           
                  function update_location_image($id,$post)
        {
      echo $sql="update location   set

image='".$post['photo']."'
where
id=".$id."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
}
