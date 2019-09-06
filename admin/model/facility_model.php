<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of facility_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class facility_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_facility($post)
        {
           $sql="INSERT INTO   facility   (

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
        
        
              function del_facility($del_id)
	{
		 $sql="delete from  facility  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_facility($post)
        {
      echo $sql="update facility   set

name='".$post['name']."',
description='".$post['description']."' , 
num=".$post['num']."      
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }

        
                  function get_facility($id)
      {
                    $sql="select * from  facility where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                  function get_facilitys_all()
      {
                    $sql="select * from  facility order by num ";
               $r= $this->execute($sql);
            return $r;
      }

      
      
      function selectbox_facility($facility_id)
        {
            if($facility_id=="all")
            {
                 $sql="select * from  facility order by num ";
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
            
            
  else if($facility_id!="all")
            {
                 $sql="select * from  facility order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$facility_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
        
        function get_facility_name($id)
        {
           $row=$this->get_facility($id);
           return $row['name'];
        }
        
        
}
