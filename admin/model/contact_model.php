<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contact_model
 *
 * @author Nidhin
 */
require_once "commonoperation.php";
class contact_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
               function view_contact($post)
        {
          $sql="select * from contactus where id=".$post['id']." order by num limit 0,1";
                $r= $this->execute($sql);
$nrow=array();
while ($row =@mysql_fetch_array($r)) {
    $nrow=$row;
}
return $nrow;
		  
        }
        
                   function view_contact2($id)
        {
          $sql="select * from contactus where id=".$id." order by num limit 0,1";
                $r= $this->execute($sql);
$nrow=array();
while ($row =@mysql_fetch_array($r)) {
    $nrow=$row;
}
return $nrow;
		  
        }
        
                function edit_contact($post)
        {
           $sql="update contactus set  name='".$post['name']."',mobno='".$post['mobno']."',website='".$post['website']."',faxno='".$post['faxno']."',telno='".$post['telno']."',email='".$post['email']."',address='".$post['address']."' ,num=".$post['num']." where id=".$post['id'];
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
                 function add_contact($post)
        {
           $sql="insert into contactus (name,mobno,faxno,telno,email,address,num,website) values( '".$post['name']."','".$post['mobno']."','".$post['faxno']."','".$post['telno']."','".$post['email']."','".$post['address']."',".$post['num'].",'".$post['website']."')";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                 function del_contact($del_id)
	{
		  $sql="delete from  contactus  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
                  function view_contact_all()
        {
          $sql="select * from contactus  order by num ";
                $r= $this->execute($sql);

return $r;
		  
        }
                   function view_contact_limit($limit)
        {
          $sql="select * from contactus  order by num limit 0,$limit";
                $r= $this->execute($sql);

return $r;
		  
        }
}
