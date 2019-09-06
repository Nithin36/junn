<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of news_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class news_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_news($post)
        {
           $sql="INSERT INTO   news   (

name,
description,

num

)
VALUES (
  '".mysql_real_escape_string($post['name'])."',
  '".$post['description']."',

   ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_news($del_id)
	{
		 $sql="delete from  news  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_news($post)
        {
      echo $sql="update news   set

name='".mysql_real_escape_string($post['name'])."',
description='".$post['description']."' , 

num=".$post['num']."      
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }

        
                  function get_news($id)
      {
                   $sql="select * from  news where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                  function get_newss_all()
      {
                    $sql="select * from  news order by num ";
               $r= $this->execute($sql);
            return $r;
      }
                    function get_newss_limit($limit)
      {
                    $sql="select * from  news order by num limit 0,$limit ";
               $r= $this->execute($sql);
            return $r;
      }
                function get_newss_photosall()
      {
                    $sql="select * from  news where image!='' order by num ";
               $r= $this->execute($sql);
            return $r;
      }
      
                 function get_newss_photosall_limit($limit)
      {
                    $sql="select * from  news where image!='' order by num limit 0,$limit";
               $r= $this->execute($sql);
            return $r;
      }
      function selectbox_news($news_id)
        {
            if($news_id=="all")
            {
                 $sql="select * from  news order by num ";
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
            
            
  else if($news_id!="all")
            {
                 $sql="select * from  news order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$news_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
         function selectbox_news2($news_id)
        {
            if($news_id=="all")
            {
                 $sql="select * from  news order by num ";
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
            
            
  else if($news_id!="all")
            {
                 $sql="select * from  news order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['name'] ?>"<?php if($row['id']==$news_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        function get_news_name($id)
        {
           $row=$this->get_news($id);
           return $row['name'];
        }
        
           
                  function update_news_image($id,$post)
        {
      echo $sql="update news   set

image='".$post['photo']."'
where
id=".$id."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
}
