<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sizeunit_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class sizeunit_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_sizeunit($post)
        {
           $sql="INSERT INTO   sizeunit   (

name

)
VALUES (
  '".$post['name']."'
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_sizeunit($del_id)
	{
		 $sql="delete from  sizeunit  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_sizeunit($post)
        {
      echo $sql="update sizeunit   set

name='".$post['name']."'
      
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }

        
                  function get_sizeunit($id)
      {
                   $sql="select * from  sizeunit where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                  function get_sizeunits_all()
      {
                    $sql="select * from  sizeunit order by num ";
               $r= $this->execute($sql);
            return $r;
      }
                    function get_sizeunits_limit($limit)
      {
                    $sql="select * from  sizeunit order by num limit 0,$limit ";
               $r= $this->execute($sql);
            return $r;
      }
                function get_sizeunits_photosall()
      {
                    $sql="select * from  sizeunit where image!='' order by num ";
               $r= $this->execute($sql);
            return $r;
      }
      
                 function get_sizeunits_photosall_limit($limit)
      {
                    $sql="select * from  sizeunit where image!='' order by num limit 0,$limit";
               $r= $this->execute($sql);
            return $r;
      }
      function selectbox_sizeunit($sizeunit_id)
        {
            if($sizeunit_id=="all")
            {
                 $sql="select * from  sizeunit order by name ";
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
            
            
  else if($sizeunit_id!="all")
            {
                 $sql="select * from  sizeunit order by name  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$sizeunit_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
         function selectbox_sizeunit2($sizeunit_id)
        {
            if($sizeunit_id=="all")
            {
                 $sql="select * from  sizeunit order by num ";
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
            
            
  else if($sizeunit_id!="all")
            {
                 $sql="select * from  sizeunit order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['name'] ?>"<?php if($row['id']==$sizeunit_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        function get_sizeunit_name($id)
        {
           $row=$this->get_sizeunit($id);
           return $row['name'];
        }
        
           
                  function update_sizeunit_image($id,$post)
        {
      echo $sql="update sizeunit   set

image='".$post['photo']."'
where
id=".$id."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
}
