<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gallerysubcategory_model
 *
 * @author user
 */
require_once "commonoperation.php";
class gallerysubcategory_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_gallerysubcategory($post)
        {
         $sql="INSERT INTO   gallerysubcategory   (
category,
name,
num

)
VALUES (
'".$post['category']."',
  '".$post['name']."',
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_gallerysubcategory($del_id)
	{
		 $sql="delete from  gallerysubcategory  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
              function del_gallerysubcategory_main($category)
	{
		 $sql="delete from  gallerysubcategory  where category=".$category;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
                  function update_gallerysubcategory($post)
        {
       $sql="update gallerysubcategory   set
category='".$post['category']."',
name='".$post['name']."',
   
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
       
        
                  function get_gallerysubcategory($id)
      {
                    $sql="select * from  gallerysubcategory where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                      function get_all_gallerysubcategory()
      {
                    $sql="select * from  gallerysubcategory  order by num ";
               $r=$this->execute($sql);
               return $r;
      }
    
       function selectbox_gallerysubcategory($gallerysubcategory_id)
        {
            if($category_id=="all")
            {
                 $sql="select * from  gallerysubcategory order by num ";
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
                 $sql="select * from  gallerysubcategory order by num ";
               $r= $this->execute($sql);
?>

<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$gallerysubcategory_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
        
        
        function selectbox_gallerysubcategory_category($category,$selected)
        {
            if($selected=="all")
            {
                 $sql="select * from  gallerysubcategory where category=".$category." order by num ";
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
 else {
     
     
                 $sql="select * from  gallerysubcategory where category=".$category." order by num ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>" <?php if($row['id']==$selected) { ?> selected="selected"  <?php } ?>><?php echo $row['name'] ?></option>

<?php
     
 }
         
            
        }
        }
        
                   function get_gallerysubcategory_name($id)
      {
      $row=$this->get_gallerysubcategory($id);
      return $row['name'];
      }
                 function get_all_gallerysubcategory_photo($limit)
      {
                    $sql="select * from  gallerysubcategory   order by num limit 0,".$limit."";
               $r= $this->execute($sql);
return $r;
      }
        
}
