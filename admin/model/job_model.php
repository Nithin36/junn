<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of job_model
 *
 * @author Nidhin
 */
require_once "commonoperation.php";
class job_model extends commonoperation{
    //put your code here
       function __construct()
	{
		$sample= new commonoperation();
	}
               function get_job($post)
        {
          $sql="select * from job where id=".$post['id']." order by num limit 0,1";
                $r= $this->execute($sql);
$nrow=array();
while ($row =@mysql_fetch_array($r)) {
    $nrow=$row;
}
return $nrow;
		  
        }
        
                   function get_job2($id)
        {
          $sql="select * from job where id=".$id." order by num limit 0,1";
                $r= $this->execute($sql);
$nrow=array();
while ($row =@mysql_fetch_array($r)) {
    $nrow=$row;
}
return $nrow;
		  
        }
        
//                function update_job($post)
//        {
//          echo $sql="update job set  "
//                   . "name='".$post['name']."',"
//                   . "salary='".$post['salary']."',"
//                   . "location='".$post['location']."',"
//                   . "pdate='".$post['pdate']."',"
//                   . "ldate='".$post['ldate']."',"
//                   . "qualification='".$post['qualification']."',"
//                   . "experience='".$post['experience']."' ,"
//                   . "keyskill='".$post['keyskill']."', "
//                   . "description='".$post['description']."', "
//                   . "type='".$post['type']."', "
//                   . "vacancies=".$post['vacancies'].", "
//                   . "num=".$post['num']." "
//                   . "where id=".$post['id'];
//		  $num=$this->affectedupdatedrows($sql);
//                    return $num;
//        }
          function update_job($post)
        {
          echo $sql="update job set  "
                   . "name='".$post['name']."',"
                   . "description='".$post['description']."', "
                   . "num=".$post['num']." "
                   . "where id=".$post['id'];
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
        
        
//                 function insert_job($post)
//        {
//           $sql="insert into job (name,salary,location,pdate,ldate,qualification,experience,keyskill,description,type,vacancies,num) "
//                   . "values( '".$post['name']."','".$post['salary']."','".$post['location']."','".$post['pdate']."','".$post['ldate']."','".$post['qualification']."','".$post['experience']."',"
//                   . "'".$post['keyskill']."','".$post['description']."','".$post['type']."',".$post['vacancies'].",".$post['num'].")";
//		  $num=$this->affectedupdatedrows($sql);
//                    return $num;
//        }
                  function insert_job($post)
        {
           $sql="insert into job (name,description,num) "
                   . "values( '".$post['name']."','".$post['description']."',".$post['num'].")";
		  $num=$this->affectedupdatedrows($sql);
                    return $num;
        }
                 function del_job($del_id)
	{
		 echo $sql="delete from  job  where id=".$del_id;
		 $num=$this->affectedupdatedrows($sql);
return $num;
		
	}
        
        
                  function view_job_all()
        {
          $sql="select * from job  order by num ";
                $r= $this->execute($sql);

return $r;
		  
        }
}
