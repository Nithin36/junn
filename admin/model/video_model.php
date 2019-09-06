<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of video_model
 *
 * @author Nidhin
 */
require_once "commonoperation.php";
class video_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
               function view_video($post)
        {
          $sql="select * from video where id=".$post['id']." order by num limit 0,1";
                $r= $this->execute($sql);
$nrow=array();
while ($row =@mysql_fetch_array($r)) {
    $nrow=$row;
}
return $nrow;
		  
        }
        
                   function view_video2($id)
        {
          $sql="select * from video where id=".$id." order by num limit 0,1";
                $r= $this->execute($sql);
$nrow=array();
while ($row =@mysql_fetch_array($r)) {
    $nrow=$row;
}
return $nrow;
		  
        }
        
                function edit_video($post)
        {
           $sql="update video set  name='".$post['name']."',news='".$post['news']."',link='".$post['link']."' ,num=".$post['num']." where id=".$post['id'];
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
                 function add_video($post)
        {
           $sql="insert into video (name,news,link,num) values( '".$post['name']."','".$post['news']."','".$post['link']."',".$post['num'].")";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                 function del_video($del_id)
	{
		  $sql="delete from  video  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
                  function view_video_all()
        {
          $sql="select * from video  order by num ";
                $r= $this->execute($sql);

return $r;
		  
        }
                   function view_video_limit($limit)
        {
          $sql="select * from video  order by num limit 0,$limit";
                $r= $this->execute($sql);

return $r;
		  
        }
}
