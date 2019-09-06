<?php



require_once "commonoperation.php";

class productcategory_model extends commonoperation{

    //put your code here

       function __construct()

	{

		$sample= new commonoperation();

	}

        

            function insert_productcategory($category_id,$product_id)

        {
        print_r($category_id);

                          
                     echo   $sql="INSERT INTO   productcategory   (

product_id,
category_id
)
VALUES (
  '".$product_id."',
  '".$category_id."'
)
";
		  $num=$this->affectedupdatedrows($sql);
                     
                

                

        

                    return $num;

        }

        

        

              function del_productcategory($del_id)

	{

		echo $sql="delete from  productcategory  where id=".$del_id;

		 $num=$this->affectedupdatedrows($sql);

return $num;

		

	}

        

        

        

                  function update_productcategory($post)

        {

      $sql="update productcategory   set



name='".$post['name']."',

parent='".$post['parent']."' 

where

id=".$post['id']."

";

		  $num=$this->affectedupdatedrows($sql);

                    return $num;

        }



        

                  function get_productcategory($id)

      {

                    $sql="select * from  productcategory where id=".$id." limit 0,1";

               $r= $this->execute($sql);

$row2=array();

while ($row=@mysql_fetch_array($r)) {

   $row2=$row;

}

return $row2;

      }

                   function get_productcategory_product($product_id)

      {

                    $sql="select * from  productcategory where product_id=".$product_id." ";

               $r= $this->execute($sql);

$row2=array();

while ($row=@mysql_fetch_array($r)) {

    array_push($row2, $row);

   

}

return $row2;

      }

      

                  function get_productcategorys_all()

      {

                    $sql="select * from  productcategory order by num ";

               $r= $this->execute($sql);

            return $r;

      }



      

      

      function selectbox_productcategory($productcategory_id)

        {

            if($productcategory_id=="all")

            {

                 $sql="select * from  productcategory  order by name ";

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

            

            

  else if($productcategory_id!="all")

            {

                 $sql="select * from  productcategory order by num  ";

               $r= $this->execute($sql);

?>

<option value="">Select</option>

<?php

while ($row=@mysql_fetch_array($r)) {

    ?>

<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$productcategory_id){ ?>

        selected="selected"     

<?php }?>       

        ><?php echo $row['name'] ?></option>



<?php

}

            }          

            

        }

        

        

            function selectbox_productcategory3($productcategory_id)

        {

            if($productcategory_id=="all")

            {

                 $sql="select * from  productcategory  order by name ";

               $r= $this->execute($sql);

?>

<option value="">Select</option>

<option value="0">No Parent</option>

<?php

while ($row=@mysql_fetch_array($r)) {

    ?>

<option value="<?php echo $row['id'] ?>" ><?php echo $row['name'] ?></option>



<?php

}

            }

            

            

  else if($productcategory_id!="all")

            {

                 $sql="select * from  productcategory order by name  ";

               $r= $this->execute($sql);

?>

<option value="">Select</option>

<option value="0" <?php if($productcategory_id==0){ ?>  selected="selected" <?php }?>>No Parent</option>

<?php

while ($row=@mysql_fetch_array($r)) {

    ?>

<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$productcategory_id){ ?>

        selected="selected"     

<?php }?>       

        ><?php echo $row['name'] ?></option>



<?php

}

            }          

            

        }

        

            function selectbox_childproductcategory($productcategory_id)

        {

            if($productcategory_id=="all")

            {

                 $sql="select * from  productcategory  where id not in( select parent from productcategory ) order by name ";

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

            

            

  else if($productcategory_id!="all")

            {

                 $sql="select * from  productcategory  where id not in( select parent from productcategory ) order by name  ";

               $r= $this->execute($sql);

?>

<option value="">Select</option>

<?php

while ($row=@mysql_fetch_array($r)) {

    ?>

<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$productcategory_id){ ?>

        selected="selected"     

<?php }?>       

        ><?php echo $row['name'] ?></option>



<?php

}

            }          

            

        }

        

        function view_subproductcategory($id)

        {

            $sub=" ".

            $sql="select * from  productcategory where id=$id order by name  ";

               $r= $this->execute($sql);

               while ($row=@mysql_fetch_array($r)) {

                   

               }

        }

             

                  function get_parentproductcategory($id)

      {

                      $str="";

                    echo $sql="SELECT

maincat.id,

maincat.name,

maincat.parent



FROM

productcategory maincat

 INNER JOIN productcategory subcat ON subcat.id =maincat.parent

 where maincat.id= ".$id;

               $r= $this->execute($sql);



while ($row=@mysql_fetch_array($r)) {



      $str=$str.">>".$row['name'];

}

return $str;

      }

      

      

                function del_productcategory_product($product_id)

	{

		echo $sql="delete from  productcategory  where product_id=".$product_id;

		 $num=$this->affectedupdatedrows($sql);

return $num;

		

	}

      

        

}

?>

