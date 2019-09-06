<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of subservice_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class subservice_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_subservice($post)
        {
           $sql="INSERT INTO   subservice   (
service,
name,
description,

num

)
VALUES (
  '".$post['service']."',
  '".$post['name']."',
  '".$post['description']."',

   ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_subservice($del_id)
	{
		 $sql="delete from  subservice  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_subservice($post)
        {
       $sql="update subservice   set
service='".$post['service']."',
name='".$post['name']."',
description='".$post['description']."' , 

num=".$post['num']."      
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }

        
                  function get_subservice($id)
      {
                   $sql="select * from  subservice where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                  function get_subservices_all()
      {
                    $sql="select * from  subservice order by num ";
               $r= $this->execute($sql);
            return $r;
      }
                    function get_subservices_service($service)
      {
                    $sql="select * from  subservice where service=".$service." order by num ";
               $r= $this->execute($sql);
            return $r;
      }
                    function get_subservices_limit($limit)
      {
                    $sql="select * from  subservice order by num limit 0,$limit ";
               $r= $this->execute($sql);
            return $r;
      }
                function get_subservices_photosall()
      {
                    $sql="select * from  subservice where image!='' order by num ";
               $r= $this->execute($sql);
            return $r;
      }
      
                 function get_subservices_photosall_limit($limit)
      {
                    $sql="select * from  subservice where image!='' order by num limit 0,$limit";
               $r= $this->execute($sql);
            return $r;
      }
      function selectbox_subservice($subservice_id)
        {
            if($subservice_id=="all")
            {
                 $sql="select * from  subservice order by num ";
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
            
            
  else if($subservice_id!="all")
            {
                 $sql="select * from  subservice order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$subservice_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
         function selectbox_subservice2($subservice_id)
        {
            if($subservice_id=="all")
            {
                 $sql="select * from  subservice order by num ";
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
            
            
  else if($subservice_id!="all")
            {
                 $sql="select * from  subservice order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['name'] ?>"<?php if($row['id']==$subservice_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
        
        
         function selectbox_subservice_service($service_id,$subservice_id)
        {
            if($subservice_id=="")
            {
                 $sql="select * from  subservice where service=".$service_id." order by num ";
               $r= $this->execute($sql);
            
?>
<option value="">Select</option>
<?php
  if ($this->affectedselectedrows($sql)!=0)
              {
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>" ><?php echo $row['name'] ?></option>

<?php
}
              }
              else
              {
                  ?>
<option value="">No Sub Service</option>
<?php
              }
            }
            
            
  else if($subservice_id!="")
            {
                 $sql="select * from  subservice  where service=".$service_id." order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
  if ($this->affectedselectedrows($sql)!=0)
              {
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$subservice_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
      }
              else
              {
                  ?>
<option value="">No Sub Service</option>
<?php
              }
            }          
            
        }
        
        function get_subservice_name($id)
        {
           $row=$this->get_subservice($id);
           return $row['name'];
        }
        
           
                  function update_subservice_image($id,$post)
        {
      echo $sql="update subservice   set

image='".$post['photo']."'
where
id=".$id."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
}
