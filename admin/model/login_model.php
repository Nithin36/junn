<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author Administrator
 */
//echo $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";




require_once "commonoperation.php";

class login_model extends commonoperation{
    //put your code here
       function __construct()
	{
           
		$sample= new commonoperation();
	}
        function check_login($post,$usertype)
        {
             $sql="select * from login where (username='".$post['username']."' or email='".$post['username']."') and password='".md5($post['password'])."' and usertype='".$usertype."' and password2='".base64_encode($post['password'])."' limit 0,1";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        function get_loginid($post,$usertype)
        {
            $id="";
             $sql="select * from login where (username='".$post['username']."' or email='".$post['username']."') and password='".md5($post['password'])."' and usertype='".$usertype."' and password2='".base64_encode($post['password'])."'  limit 0,1";
               $r= $this->execute($sql);

while ($row =@mysql_fetch_array($r)) {
    $id=$row['id'];
}
return $id;
        }
        
        
            function update_password($post)
        {
            $sql="update login set password='".md5($post['password'])."', password2='".base64_encode($post['password'])."' where id=".$post['id'];
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
        
        
         function view_login_profile($post)
        {
          $sql="select * from login where id=".$post['id']." order by id desc limit 0,1";
                $r= $this->execute($sql);
$nrow=array();
while ($row =@mysql_fetch_array($r)) {
    $nrow=$row;
}
return $nrow;
		  
        }
           function get_login_password($id)
        {
          $sql="select username,password,password2  from login where id=".$id." and usertype='admin' order by id desc limit 0,1";
                $r= $this->execute($sql);
$nrow=array();
while ($row =@mysql_fetch_array($r)) {
    $nrow=$row;
}
return $nrow;
		  
        }
        
        
           function edit_login_profile($post)
        {
          $sql="update login set name='".mysql_escape_string($post['name'])."',email='".mysql_escape_string($post['email'])."',username='".$post['username']."'where id=".$post['id'];
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
}
