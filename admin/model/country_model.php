<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of country_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class country_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_country($post)
        {
           $sql="INSERT INTO   country   (

name

)
VALUES (
  '".$post['name']."'
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_country($del_id)
	{
		 $sql="delete from  country  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_country($post)
        {
      echo $sql="update country   set

name='".$post['name']."'
      
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }

        
                  function get_country($id)
      {
                   $sql="select * from  country where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                  function get_countrys_all()
      {
                    $sql="select * from  country order by num ";
               $r= $this->execute($sql);
            return $r;
      }
                    function get_countrys_limit($limit)
      {
                    $sql="select * from  country order by num limit 0,$limit ";
               $r= $this->execute($sql);
            return $r;
      }
                function get_countrys_photosall()
      {
                    $sql="select * from  country where image!='' order by num ";
               $r= $this->execute($sql);
            return $r;
      }
      
                 function get_countrys_photosall_limit($limit)
      {
                    $sql="select * from  country where image!='' order by num limit 0,$limit";
               $r= $this->execute($sql);
            return $r;
      }
      function selectbox_country($country_id)
        {
            if($country_id=="all")
            {
                 $sql="select * from  country order by name ";
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
            
            
  else if($country_id!="all")
            {
                 $sql="select * from  country order by name  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$country_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        
         function selectbox_country2($country_id)
        {
            if($country_id=="all")
            {
                 $sql="select * from  country order by num ";
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
            
            
  else if($country_id!="all")
            {
                 $sql="select * from  country order by num  ";
               $r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
    ?>
<option value="<?php echo $row['name'] ?>"<?php if($row['id']==$country_id){ ?>
        selected="selected"     
<?php }?>       
        ><?php echo $row['name'] ?></option>

<?php
}
            }          
            
        }
        
        function get_country_name($id)
        {
           $row=$this->get_country($id);
           return $row['name'];
        }
        
           
                  function update_country_image($id,$post)
        {
      echo $sql="update country   set

image='".$post['photo']."'
where
id=".$id."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
}
