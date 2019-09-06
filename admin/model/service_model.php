<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of service_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class service_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_service($post)
        {
           $sql="INSERT INTO   service   (

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
        
        
              function del_service($del_id)
	{
		 $sql="delete from  service  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_service($post)
        {
      echo $sql="update service   set

name='".$post['name']."',
description='".$post['description']."' , 

num=".$post['num']."      
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }

        
                  function get_service($id)
      {
                   $sql="select * from  service where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                  function get_services_all()
      {
                    $sql="select * from  service order by num ";
               $r= $this->execute($sql);
            return $r;
      }
                    function get_services_limit($limit)
      {
                    $sql="select * from  service order by num limit 0,$limit ";
               $r= $this->execute($sql);
            return $r;
      }
                function get_services_photosall()
      {
                    $sql="select * from  service where image!='' order by num ";
               $r= $this->execute($sql);
            return $r;
      }
      
                 function get_services_photosall_limit($limit)
      {
                    $sql="select * from  service where image!='' order by num limit 0,$limit";
               $r= $this->execute($sql);
            return $r;
      }
      function selectbox_service($service_id)
        {
            if($service_id=="all")
            {
                 $sql="select * from  service order by num ";
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
            
            
  else if($service_id!="all")
            {
                 $sql="select * from  service order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$service_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
         function selectbox_service2($service_id)
        {
            if($service_id=="all")
            {
                 $sql="select * from  service order by num ";
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
            
            
  else if($service_id!="all")
            {
                 $sql="select * from  service order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['name'] ?>"<?php if($row['id']==$service_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        function get_service_name($id)
        {
           $row=$this->get_service($id);
           return $row['name'];
        }
        
           
                  function update_service_image($id,$post)
        {
      echo $sql="update service   set

image='".$post['photo']."'
where
id=".$id."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
}
