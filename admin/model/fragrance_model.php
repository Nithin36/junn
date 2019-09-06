<?php


require_once "commonoperation.php";

class fragrance_model extends commonoperation{

//put your code here

function __construct()

{

$sample= new commonoperation();

}
function insert_fragrance($post)
{

$sql="INSERT INTO   fragrance   (
name,
num
)

VALUES (

'".$post['name']."',
'".$post['num']."'    
)

";

$num=$this->affectedupdatedrows($sql);

return $num;

}
function del_fragrance($del_id)
{

echo $sql="delete from  fragrance  where id=".$del_id;

$num=$this->affectedupdatedrows($sql);

return $num;



}







function update_fragrance($post)

{

$sql="update fragrance   set

name='".$post['name']."',
num='".$post['num']."'
where

id=".$post['id']."

";

$num=$this->affectedupdatedrows($sql);

return $num;

}

function get_fragrance($id)

{

$sql="select * from  fragrance where id=".$id." limit 0,1";

$r= $this->execute($sql);

$row2=array();

while ($row=@mysql_fetch_array($r)) {

$row2=$row;

}

return $row2;

}

function get_fragrances_all()

{

$sql="select * from  fragrance order by num ";

$r= $this->execute($sql);

return $r;

}

function selectbox_fragrance($fragrance_id)

{

if($fragrance_id=="all")

{

$sql="select * from  fragrance  order by name ";

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

else if($fragrance_id!="all")

{

$sql="select * from  fragrance order by name  ";

$r= $this->execute($sql);

?>

<option value="">Select</option>

<?php

while ($row=@mysql_fetch_array($r)) {

?>

<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$fragrance_id){ ?>

selected="selected"     

<?php }?>       

><?php echo $row['name'] ?></option>



<?php

}

}          



}



function selectbox_childfragrance_productfragrance($procat)

{



$sql="select fragrance.*,CASE WHEN ( fragrance.parent=0 ) THEN ('Main fragrance') ELSE (select c.name from fragrance c where c.id=fragrance.parent) end as main from  fragrance  where id not in( select parent from fragrance ) order by name ";

$r= $this->execute($sql);

?>

<option value="">Select</option>

<?php

while ($row=@mysql_fetch_array($r)) {

?>

<option value="<?php echo $row['id'] ?>"<?php 

foreach ($procat as $value) {







if($row['id']==$value['fragrance_id']){ ?>

selected="selected"     

<?php }

}

?>       

><?php  echo $row['main'].">>".$row['name'] ?></option>



<?php

}





}

function selectbox_fragrance3($fragrance_id)

{

if($fragrance_id=="all")

{

$sql="select fragrance.*,CASE WHEN ( fragrance.parent=0 ) THEN ('Main fragrance') ELSE (select c.name from fragrance c where c.id=fragrance.parent) end as main"

. " from  fragrance  order by fragrance.name ";

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





else if($fragrance_id!="all")

{

$sql="select fragrance.*,CASE WHEN ( fragrance.parent=0 ) THEN ('Main fragrance') ELSE (select c.name from fragrance c where c.id=fragrance.parent) end as main"

. " from  fragrance  order by fragrance.name ";

$r= $this->execute($sql);

?>

<option value="">Select</option>

<option value="0" <?php if($fragrance_id==0){ ?>  selected="selected" <?php }?>>No Parent</option>

<?php

while ($row=@mysql_fetch_array($r)) {

?>

<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$fragrance_id){ ?>

selected="selected"     

<?php }?>       

><?php echo $row['main'].">>".  $row['name'] ?></option>



<?php

}

}          



}



function selectbox_childfragrance($fragrance_id)

{

if($fragrance_id=="all")

{

$sql="select fragrance.*,CASE WHEN ( fragrance.parent=0 ) THEN ('Main fragrance') ELSE (select c.name from fragrance c where c.id=fragrance.parent) end as main from  fragrance  where id not in( select parent from fragrance ) order by name ";

$r= $this->execute($sql);

?>

<option value="">Select</option>

<?php

while ($row=@mysql_fetch_array($r)) {

?>

<option value="<?php echo $row['id'] ?>" ><?php echo  $row['main']." >> ".$row['name']; ?></option>



<?php

}

}





else if($fragrance_id!="all")

{

$sql="select fragrance.*,CASE WHEN ( fragrance.parent=0 ) THEN ('Main fragrance') ELSE (select c.name from fragrance c where c.id=fragrance.parent) end as main from  fragrance  where id not in( select parent from fragrance ) order by name ";

$r= $this->execute($sql);

?>

<option value="">Select</option>

<?php

while ($row=@mysql_fetch_array($r)) {

?>

<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$fragrance_id){ ?>

selected="selected"     

<?php }?>       

><?php echo  $row['main']." >> ".$row['name']; ?></option>



<?php

}

}          



}



function view_subfragrance($id)

{

$sub=" ".

$sql="select * from  fragrance where id=$id order by name  ";

$r= $this->execute($sql);

while ($row=@mysql_fetch_array($r)) {



}

}



function get_parentfragrance($id)

{

$str="";

echo $sql="SELECT

maincat.id,

maincat.name,

maincat.parent



FROM

fragrance maincat

INNER JOIN fragrance subcat ON subcat.id =maincat.parent

where maincat.id= ".$id;

$r= $this->execute($sql);



while ($row=@mysql_fetch_array($r)) {



$str=$str.">>".$row['name'];

}

return $str;

}



function check_mainfragrance($id)

{

$str="";

$sql="SELECT * FROM fragrance where id= ".$id." and parent=0";
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

