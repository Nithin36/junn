<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pagetitle_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class pagetitle_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_pagetitle($post)
        {
          echo $sql="INSERT INTO   pagetitle   (

title,
keyword,
description,
pageurl 


)
VALUES (
  '".$post['title']."',
  '".$post['keyword']."',
  '".$post['description']."',  
   '".$post['pageurl']."'     
      
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_pagetitle($del_id)
	{
		 $sql="delete from  pagetitle  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_pagetitle($post)
        {
       $sql="update pagetitle   set

title='".$post['title']."',
description='".$post['description']."',   
keyword='".$post['keyword']."',  
pageurl='".$post['pageurl']."'      
  
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
       
        
                  function get_pagetitle($id)
      {
                    $sql="select * from  pagetitle where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                      function get_all_pagetitle()
      {
                    $sql="select * from  pagetitle  ";
               $r= $this->execute($sql);
               return $r;
      }
      
       function selectbox_pagetitle($pagetitle_id)
        {
            if($category_id=="all")
            {
                 $sql="select * from  pagetitle order by title ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>" ><?php echo $row['title'] ?></option>

<?php
}
            }
            
            
  else if($category_id!="all")
            {
                 $sql="select * from  pagetitle order by title ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$pagetitle_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['title'] ?></option>

<?php
}
            }          
            
        }
        
        
                   function get_pagetitle_name($id)
      {
      $row=$this->get_pagetitle($id);
      return $row['title'];
      }
     
        
}
