<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of download_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class download_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_download($post)
        {
          echo $sql="INSERT INTO   download   (

name,
doc,
num

)
VALUES (
  '".$post['name']."',
  '".$post['doc']."',
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
              function del_download($del_id)
	{
		 $sql="delete from  download  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_download($post)
        {
       $sql="update download   set

name='".$post['name']."',


num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                    function update_download2($post)
        {
       $sql="update download   set

name='".$post['name']."',

doc='".$post['doc']."',  
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
                  function get_download($id)
      {
                    $sql="select * from  download where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
      
                function get_all_download_doc($limit)
      {
                    $sql="select * from  download where doc!=''  order by num limit 0,".$limit."";
               $r= $this->execute($sql);
return $r;
      }
        
}
