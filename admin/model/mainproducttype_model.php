<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainproducttype_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class mainproducttype_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_mainproducttype($post)
        {
          echo $sql="INSERT INTO   mainproducttype   (

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
        
        
              function del_mainproducttype($del_id)
	{
		 $sql="delete from  mainproducttype  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_mainproducttype($post)
        {
       $sql="update mainproducttype   set

name='".$post['name']."',
description='".$post['description']."',    


num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
       
        
                  function get_mainproducttype($id)
      {
                    $sql="select * from  mainproducttype where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                      function get_all_mainproducttype()
      {
                    $sql="select * from  mainproducttype  order by num ";
               $r=$this->execute($sql);
               return $r;
      }
      
       function selectbox_mainproducttype($mainproducttype_id)
        {
            if($category_id=="all")
            {
                 $sql="select * from  mainproducttype order by num ";
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
                 $sql="select * from  mainproducttype order by num ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$mainproducttype_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
                   function get_mainproducttype_name($id)
      {
      $row=$this->get_mainproducttype($id);
      return $row['name'];
      }
     
        
}
