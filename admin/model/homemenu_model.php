<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of homemenu_model
 *
 * @author Administrator
 */
class homemenu_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
    
    
    
                    function update_homemenu($post)
        {
       $sql="update homemenu  set

name='".mysql_real_escape_string($post['name'])."',
title1='".mysql_real_escape_string($post['title1'])."',
title2='".mysql_real_escape_string($post['title2'])."', 
title3='".mysql_real_escape_string($post['title3'])."',  
title4='".mysql_real_escape_string($post['title4'])."',     
description1='".mysql_real_escape_string($post['description1'])."',
description2='".mysql_real_escape_string($post['description2'])."', 
description3='".mysql_real_escape_string($post['description3'])."', 
description4='".mysql_real_escape_string($post['description4'])."',     
readmore1='".$post['readmore1']."',
readmore2='".$post['readmore2']."',
readmore3='".$post['readmore3']."',
readmore4='".$post['readmore4']."',    
title='".mysql_real_escape_string($post['title'])."',   
metadescription='".mysql_real_escape_string($post['metadescription'])."',   
metakeyword='".mysql_real_escape_string($post['metakeyword'])."'       

   
where
id=".$post['id']."
";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                     function get_homemenu($id)
      {
                    $sql="select * from  homemenu where id=".$id." limit 0,1";
               $r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
   $row2=$row;
}
return $row2;
      }
}
