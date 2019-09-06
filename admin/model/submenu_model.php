<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of submenu_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class submenu_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_submenu($post)
        {
          echo $sql="INSERT INTO   submenu   (

name,
description,
menu,
display,
num


)
VALUES (
  '".$post['name']."',
  '".$post['description']."',    
  ".$post['menu'].",
  '".$post['display']."',    
  ".$post['num']."    
   
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_submenu($del_id)
	{
		 $sql="delete from  submenu  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
                function del_submenu_menu($del_id)
	{
		 $sql="delete from  submenu  where menu=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
      
        
        
                  function update_submenu($post)
        {
    $sql="update submenu   set

name='".$post['name']."',
description='".$post['description']."', 
display='".$post['display']."',    
menu=".$post['menu'].",
num=".$post['num']."     

   
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                   function update_submenu2($post)
        {
       $sql="update submenu   set

name='".$post['name']."',   
description='".$post['description']."',     
display='".$post['display']."',   
photo='".$post['photo']."'   
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_submenu($id)
      {
                    $sql="select * from  submenu  where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
                 function get_submenu_menu($menu)
      {
                    $sql="select * from  submenu  where menu=".$menu." order by num";
               $r= $this->execute($sql);
               return $r;

      }
                  function get_submenu_name($id)
      {
      $row=$this->get_submenu($id);
      return $row['name'];
      }
      
          function menu_selected($menu,$submenu)
       {
           $flag=0;
           $r=$this->get_submenu_menu($menu);
           $row2=array();
while ($row=@mysql_fetch_array($r)) {
   if($row['id']==$submenu)
   {
       $flag=1;
   }
}
return $flag;
      }
     
        
}
