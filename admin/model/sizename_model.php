<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sizename_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class sizename_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_sizename($post)
        {
           $sql="INSERT INTO   sizename   (

name

)
VALUES (
  '".$post['name']."'
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_sizename($del_id)
	{
		 $sql="delete from  sizename  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_sizename($post)
        {
      echo $sql="update sizename   set

name='".$post['name']."'
      
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }

        
                  function get_sizename($id)
      {
                   $sql="select * from  sizename where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                  function get_sizenames_all()
      {
                    $sql="select * from  sizename order by num ";
               $r= $this->execute($sql);
            return $r;
      }
                    function get_sizenames_limit($limit)
      {
                    $sql="select * from  sizename order by num limit 0,$limit ";
               $r= $this->execute($sql);
            return $r;
      }
                function get_sizenames_photosall()
      {
                    $sql="select * from  sizename where image!='' order by num ";
               $r= $this->execute($sql);
            return $r;
      }
      
                 function get_sizenames_photosall_limit($limit)
      {
                    $sql="select * from  sizename where image!='' order by num limit 0,$limit";
               $r= $this->execute($sql);
            return $r;
      }
      function selectbox_sizename($sizename_id)
        {
            if($sizename_id=="all")
            {
                 $sql="select * from  sizename order by name ";
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
            
            
  else if($sizename_id!="all")
            {
                 $sql="select * from  sizename order by name  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$sizename_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
         function selectbox_sizename2($sizename_id)
        {
            if($sizename_id=="all")
            {
                 $sql="select * from  sizename order by num ";
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
            
            
  else if($sizename_id!="all")
            {
                 $sql="select * from  sizename order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['name'] ?>"<?php if($row['id']==$sizename_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        function get_sizename_name($id)
        {
           $row=$this->get_sizename($id);
           return $row['name'];
        }
        
           
                  function update_sizename_image($id,$post)
        {
      echo $sql="update sizename   set

image='".$post['photo']."'
where
id=".$id."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
}
