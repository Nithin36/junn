<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of brand_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class brand_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_brand($post)
        {
          echo $sql="INSERT INTO   brand   (

name,
photo,
num

)
VALUES (
  '".$post['name']."',
  '".$post['photo']."',
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_brand($del_id)
	{
		 $sql="delete from  brand  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_brand($post)
        {
       $sql="update brand   set

name='".$post['name']."',

num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                   function update_brand2($post)
        {
       $sql="update brand   set

name='".$post['name']."',

photo='".$post['photo']."',  
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_brand($id)
      {
                    $sql="select * from  brand  where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
      
                function get_all_brand_photo($limit)
      {
                    $sql="select * from  brand  where photo!='' order by num limit 0,".$limit."";
               $r= $this->execute($sql);
return $r;
      }
            function selectbox_brand($brand_id)
        {
            if($brand_id=="all")
            {
                 $sql="select * from  brand  order by name ";
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
            
            
  else if($brand_id!="all")
            {
                 $sql="select * from  brand order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$brand_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
}
