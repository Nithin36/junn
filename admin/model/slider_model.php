<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of slider_model
 *
 * @author Administrator
 */
require_once "commonoperation.php";
class slider_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
        
            function insert_slider($post)
        {
          echo $sql="INSERT INTO   slider   (

name,
title1,
title2,
title3,
description,
readmore,
photo,
num

)
VALUES (
  '".mysql_real_escape_string($post['name'])."',
  '".mysql_real_escape_string($post['title1'])."', 
  '".mysql_real_escape_string($post['title2'])."',
  '".mysql_real_escape_string($post['title3'])."',      
  '".mysql_real_escape_string($post['description'])."',
  '".$post['readmore']."',     
  '".$post['photo']."',
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
        function insert_slider2($post)
        {
          echo $sql="INSERT INTO   slider   (

name,
title1,
title2,
title3,
description,
readmore,
photo,
photo2,
num

)
VALUES (
  '".mysql_real_escape_string($post['name'])."',
  '".mysql_real_escape_string($post['title1'])."', 
  '".mysql_real_escape_string($post['title2'])."',
  '".mysql_real_escape_string($post['title3'])."',  
  '".mysql_real_escape_string($post['description'])."',
  '".$post['readmore']."',     
  '".$post['photo']."',
  '".$post['photo2']."',    
  ".$post['num']."     
)
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
              function del_slider($del_id)
	{
		 $sql="delete from  slider  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
        
                  function update_slider($post)
        {
       $sql="update slider   set

name='".mysql_real_escape_string($post['name'])."',
title1='".mysql_real_escape_string($post['title1'])."',
title2='".mysql_real_escape_string($post['title2'])."',
title3='".mysql_real_escape_string($post['title3'])."',    
description='".mysql_real_escape_string($post['description'])."',
readmore='".$post['readmore']."',

num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                    function update_slider2($post)
        {
       $sql="update slider   set

name='".mysql_real_escape_string($post['name'])."',
title1='".mysql_real_escape_string($post['title1'])."',
title2='".mysql_real_escape_string($post['title2'])."',
title3='".mysql_real_escape_string($post['title3'])."',    
     
description='".mysql_real_escape_string($post['description'])."',
readmore='".$post['readmore']."',
photo='".$post['photo']."',  
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
                      function update_slider3($post)
        {
       $sql="update slider   set

name='".mysql_real_escape_string($post['name'])."',
title1='".mysql_real_escape_string($post['title1'])."',
title2='".mysql_real_escape_string($post['title2'])."',
title3='".mysql_real_escape_string($post['title3'])."', 
description='".mysql_real_escape_string($post['description'])."',
readmore='".$post['readmore']."',
photo2='".$post['photo2']."',  
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
                           function update_slider4($post)
        {
       $sql="update slider   set

name='".mysql_real_escape_string($post['name'])."',
title1='".mysql_real_escape_string($post['title1'])."',
title2='".mysql_real_escape_string($post['title2'])."',
title3='".mysql_real_escape_string($post['title3'])."',    
description='".mysql_real_escape_string($post['description'])."',
readmore='".$post['readmore']."',
photo='".$post['photo']."',  
photo2='".$post['photo2']."',  
num=".$post['num']."     
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                  function get_slider($id)
      {
                    $sql="select * from  slider where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
      
      
      
                function get_all_slider_photo($limit)
      {
                    $sql="select * from  slider where photo!=''  order by num limit 0,".$limit."";
               $r= $this->execute($sql);
return $r;
      }
      
         
                function get_number_slider_photo($limit)
      {
                    $sql="select * from  slider where photo!=''  order by num limit 0,".$limit."";
               $ro= $this->affectedselectedrows($sql);
return $ro;
      }
        
}
