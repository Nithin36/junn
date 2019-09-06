<?php
require_once "commonoperation.php";
class productorder_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_productorder($post)
        {
                $this->get_server_datetime();
          echo $sql="INSERT INTO   productorder   (

name,
brand,
usertype,
fragrance,
description,
ingredients,
howtouse,
num,
photo,
status,
addeddate


)
VALUES (

  '".mysql_escape_string($post['name'])."',
  '".mysql_escape_string($post['brand'])."',
  '".mysql_escape_string($post['usertype'])."',
  '".mysql_escape_string($post['fragrance'])."', 
  '".mysql_escape_string($post['description'])."', 
  '".mysql_escape_string($post['ingredients'])."',  
  '".mysql_escape_string($post['howtouse'])."',      
  ".mysql_escape_string($post['num']).",     
  '".mysql_escape_string($post['photo'])."',
  '".mysql_escape_string($post['status'])."',
  '".$this->get_server_datetime()."'    
   
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_productorder($del_id)
	{
		 $sql="delete from  productorder  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
                function del_productorder_productordertype($del_id)
	{
		 $sql="delete from  productorder  where type=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
                 function del_productorder_main($del_id)
	{
		 $sql="delete from  productorder  where main_id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
                  function del_productorderphoto_productordertype($del_id)
	{
	            $sql="select * from  productorder  where type=".$del_id."";
               $r= $this->execute($sql);

while ($row=@mysql_fetch_array($r)) {
   unlink('../../upload/productorders/thumb/'.$row['photo']);
                                        unlink('../../upload/productorders/thumb2/'.$row['photo']);
                                       unlink('../../upload/productorders/'.$row['photo']);
}

		
	}
        
        
        
                   function del_productorderphoto_main($del_id)
	{
	            $sql="select * from  productorder  where main_id=".$del_id."";
               $r= $this->execute($sql);

while ($row=@mysql_fetch_array($r)) {
   unlink('../../upload/productorders/thumb/'.$row['photo']);
                                        unlink('../../upload/productorders/thumb2/'.$row['photo']);
                                       unlink('../../upload/productorders/'.$row['photo']);
}

		
	}
        
        
                  function update_productorder($post)
        {
       $sql="update productorder   set
name='".$post['name']."',
brand='".$post['brand']."',
usertype='".$post['usertype']."',
fragrance='".$post['fragrance']."',      
description='".$post['description']."',
ingredients='".$post['ingredients']."',
howtouse='".$post['howtouse']."',    
status='".$post['status']."',
num='".$post['num']."'      
    
   
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                   function update_productorder2($post)
        {
       $sql="update productorder   set

name='".$post['name']."',
brand='".$post['brand']."',
usertype='".$post['usertype']."',
fragrance='".$post['fragrance']."',    
description='".$post['description']."',
ingredients='".$post['ingredients']."',
howtouse='".$post['howtouse']."',    
status='".$post['status']."',
num='".$post['num']."' , 
photo='".$post['photo']."'
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_productorder($id)
      {
                    $sql="select * from  productorder  where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                  function get_productorder_name($id)
      {
      $row=$this->get_productorder($id);
      return $row['name'];
      }
      
      
                function get_all_productorder_photo($limit)
      {
                    $sql="select * from  productorder  where photo!='' order by num";
               $r= $this->execute($sql);
return $r;
      }
      function get_productorders_productordertype($type)
      {
                      $sql="select * from  productorder  where photo!='' and type=".$type." order by id desc";
               $r= $this->execute($sql);
               return $r;

      }
        
}