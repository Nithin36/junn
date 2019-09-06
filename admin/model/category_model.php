<?php



/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */



/**

 * Description of category_model

 *

 * @author Administrator

 */

require_once "commonoperation.php";

class category_model extends commonoperation{

    //put your code here

       function __construct()

	{

		$sample= new commonoperation();

	}

        

            function insert_category($post)

        {

           $sql="INSERT INTO   category   (



name,

parent,
num

)

VALUES (

  '".$post['name']."',

  '".$post['parent']."',
  '".$post['num']."'    

)

";

		  $num=$this->affectedupdatedrows($sql);

                    return $num;

        }

        

        

              function del_category($del_id)

	{

		echo $sql="delete from  category  where id=".$del_id;

		 $num=$this->affectedupdatedrows($sql);

return $num;

		

	}

        

        

        

                  function update_category($post)

        {

      $sql="update category   set



name='".$post['name']."',
num='".$post['num']."'    

where

id=".$post['id']."

";

		  $num=$this->affectedupdatedrows($sql);

                    return $num;

        }



        

                  function get_category($id)

      {

                   $sql="select category.*,CASE WHEN ( category.parent=0 ) THEN (concat('Main Category >> ',category.name)) ELSE concat('Main category >> ',(select c.name from category c where c.id=category.parent),' >> ',category.name) end as main from  category where id=".$id." limit 0,1";

               $r= $this->execute($sql);

$row2=array();

while ($row=@mysql_fetch_array($r)) {

   $row2=$row;

}

return $row2;

      }

      

      

                  function get_categorys_all()

      {

                    $sql="select * from  category order by num ";

               $r= $this->execute($sql);

            return $r;

      }



      

      

      function selectbox_category($category_id)

        {

            if($category_id=="all")

            {

                 $sql="select * from  category  order by name ";

               $r= $this->execute($sql);

?>

<option value="">Select</option>

<?php

while ($row=@mysql_fetch_array($r)) {

    ?>

<option value="<?php echo $row['id'] ?>" ><?php echo $row['name'] ?></option>



<?php

}

            }

            

            

  else if($category_id!="all")

            {

                 $sql="select * from  category order by name  ";

               $r= $this->execute($sql);

?>

<option value="">Select</option>

<?php

while ($row=@mysql_fetch_array($r)) {

    ?>

<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$category_id){ ?>

        selected="selected"     

<?php }?>       

        ><?php echo $row['name'] ?></option>



<?php

}

            }          

            

        }

        

         function selectbox_childcategory_productcategory($procat)

        {

       

                       $sql="select category.*,CASE WHEN ( category.parent=0 ) THEN ('Main Category') ELSE (select c.name from category c where c.id=category.parent) end as main from  category  where id not in( select parent from category ) order by name ";

               $r= $this->execute($sql);

?>

<option value="">Select</option>

<?php

while ($row=@mysql_fetch_array($r)) {

    ?>

<option value="<?php echo $row['id'] ?>"<?php 

        foreach ($procat as $value) {

            

        



if($row['id']==$value['category_id']){ ?>

        selected="selected"     

<?php }

        }

?>       

        ><?php  echo $row['name']; ?></option>



<?php

}

                   

            

        }

            function selectbox_category3($category_id)

        {

            if($category_id=="all")

            {

                 $sql="select category.*,CASE WHEN ( category.parent=0 ) THEN ('Main Category') ELSE (select c.name from category c where c.id=category.parent) end as main"

                       . " from  category  order by category.name ";

               $r= $this->execute($sql);

?>

<option value="">Select</option>

<option value="0">No Parent</option>

<?php

while ($row=@mysql_fetch_array($r)) {

    ?>

<option value="<?php echo $row['id'] ?>" ><?php echo $row['main'].">>". $row['name'] ?></option>



<?php

}

            }

            

            

  else if($category_id!="all")

            {

                    $sql="select category.*,CASE WHEN ( category.parent=0 ) THEN ('Main Category') ELSE (select c.name from category c where c.id=category.parent) end as main"

                       . " from  category  order by category.name ";

               $r= $this->execute($sql);

?>

<option value="">Select</option>

<option value="0" <?php if($category_id==0){ ?>  selected="selected" <?php }?>>No Parent</option>

<?php

while ($row=@mysql_fetch_array($r)) {

    ?>

<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$category_id){ ?>

        selected="selected"     

<?php }?>       

        ><?php echo $row['main'].">>".  $row['name'] ?></option>



<?php

}

            }          

            

        }

        

            function selectbox_childcategory($category_id)

        {

            if($category_id=="all")

            {

                 $sql="select category.*,CASE WHEN ( category.parent=0 ) THEN ('Main Category') ELSE (select c.name from category c where c.id=category.parent) end as main from  category  where id not in( select parent from category ) order by name ";

               $r= $this->execute($sql);

?>

<option value="">Select</option>

<?php

while ($row=@mysql_fetch_array($r)) {

    ?>

<option value="<?php echo $row['id'] ?>" ><?php echo $row['name']; ?></option>



<?php

}

            }

            

            

  else if($category_id!="all")

            {

                $sql="select category.*,CASE WHEN ( category.parent=0 ) THEN ('Main Category') ELSE (select c.name from category c where c.id=category.parent) end as main from  category  where id not in( select parent from category ) order by name ";

               $r= $this->execute($sql);

?>

<option value="">Select</option>

<?php

while ($row=@mysql_fetch_array($r)) {

    ?>

<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$category_id){ ?>

        selected="selected"     

<?php }?>       

        ><?php echo  $row['name']; ?></option>



<?php

}

            }          

            

        }

        

        function view_subcategory($id)

        {

            $sub=" ".

            $sql="select * from  category where id=$id order by name  ";

               $r= $this->execute($sql);

               while ($row=@mysql_fetch_array($r)) {

                   

               }

        }

             

                  function get_parentcategory($id)

      {

                      $str="";

                    echo $sql="SELECT

maincat.id,

maincat.name,

maincat.parent



FROM

category maincat

 INNER JOIN category subcat ON subcat.id =maincat.parent

 where maincat.id= ".$id;

               $r= $this->execute($sql);



while ($row=@mysql_fetch_array($r)) {



      $str=$str.">>".$row['name'];

}

return $str;

      }

      

      function check_maincategory($id)

      {

                      $str="";

                  $sql="SELECT * FROM category where id= ".$id." and parent=0";
                   // echo $this->affectedselectedrows($sql);

if($this->affectedselectedrows($sql)!=0)

{

    return true;

}

 else {

     return false;

}     

        

}

}

?>

