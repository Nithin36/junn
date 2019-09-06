<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of locationmap_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class locationmap_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_locationmap($post)
        {
          echo $sql="INSERT INTO   locationmap   (

name,
code,
num

)
VALUES (
  '".$post['name']."',
  '".$post['code']."',
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_locationmap($del_id)
	{
		 $sql="delete from  locationmap  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_locationmap($post)
        {
       $sql="update locationmap   set

name='".$post['name']."',
code='".$post['code']."',    


num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
       
        
                  function get_locationmap($id)
      {
                    $sql="select * from  locationmap where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                      function get_all_locationmap()
      {
                    $sql="select * from  locationmap  order by num ";
               $r=$this->execute($sql);
               return $r;
      }
                         function get_limit_locationmap($limit)
      {
                    $sql="select * from  locationmap  order by num limit 0,$limit";
               $r=$this->execute($sql);
               return $r;
      }
      
       function selectbox_locationmap($locationmap_id)
        {
            if($category_id=="all")
            {
                 $sql="select * from  locationmap order by num ";
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
                 $sql="select * from  locationmap order by num ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$locationmap_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
                   function get_locationmap_name($id)
      {
      $row=$this->get_locationmap($id);
      return $row['name'];
      }
     
        
}
