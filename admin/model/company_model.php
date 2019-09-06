<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of company_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class company_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_company($post)
        {
          echo $sql="INSERT INTO   company   (

name,
photo,
website,
num

)
VALUES (
  '".$post['name']."',
  '".$post['photo']."',
  '".$post['website']."',
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_company($del_id)
	{
		 $sql="delete from  company  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_company($post)
        {
       $sql="update company   set

name='".$post['name']."',

website='".$post['website']."',
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                    function update_company2($post)
        {
       $sql="update company   set

name='".$post['name']."',
website='".$post['website']."',
photo='".$post['photo']."',  
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_company($id)
      {
                    $sql="select * from  company where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
      
                function get_all_company_photo($limit)
      {
                    $sql="select * from  company where photo!=''  order by num limit 0,".$limit."";
               $r= $this->execute($sql);
return $r;
      }
        
}
