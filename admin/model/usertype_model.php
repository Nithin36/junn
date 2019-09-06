<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usertype_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class usertype_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_usertype($post)
        {
           $sql="INSERT INTO   usertype   (

name

)
VALUES (
  '".$post['name']."'
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_usertype($del_id)
	{
		 $sql="delete from  usertype  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_usertype($post)
        {
      echo $sql="update usertype   set

name='".$post['name']."'
      
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }

        
                  function get_usertype($id)
      {
                   $sql="select * from  usertype where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                  function get_usertypes_all()
      {
                    $sql="select * from  usertype order by num ";
               $r= $this->execute($sql);
            return $r;
      }
                    function get_usertypes_limit($limit)
      {
                    $sql="select * from  usertype order by num limit 0,$limit ";
               $r= $this->execute($sql);
            return $r;
      }
                function get_usertypes_photosall()
      {
                    $sql="select * from  usertype where image!='' order by num ";
               $r= $this->execute($sql);
            return $r;
      }
      
                 function get_usertypes_photosall_limit($limit)
      {
                    $sql="select * from  usertype where image!='' order by num limit 0,$limit";
               $r= $this->execute($sql);
            return $r;
      }
      function selectbox_usertype($usertype_id)
        {
            if($usertype_id=="all")
            {
                 $sql="select * from  usertype order by name ";
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
            
            
  else if($usertype_id!="all")
            {
                 $sql="select * from  usertype order by name  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$usertype_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
         function selectbox_usertype2($usertype_id)
        {
            if($usertype_id=="all")
            {
                 $sql="select * from  usertype order by num ";
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
            
            
  else if($usertype_id!="all")
            {
                 $sql="select * from  usertype order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['name'] ?>"<?php if($row['id']==$usertype_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        function get_usertype_name($id)
        {
           $row=$this->get_usertype($id);
           return $row['name'];
        }
        
           
                  function update_usertype_image($id,$post)
        {
      echo $sql="update usertype   set

image='".$post['photo']."'
where
id=".$id."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
}
