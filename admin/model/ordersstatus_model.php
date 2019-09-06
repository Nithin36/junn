<?php

require_once "commonoperation.php";
class ordersstatus_model extends commonoperation{
function __construct()
{

$sample= new commonoperation();

}



function selectbox_ordersstatus($ordersstatus_id)

{

if($ordersstatus_id=="all")

{

$sql="select * from  ordersstatus order by num ";

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
else if($country_id!="all")
{
$sql="select * from  ordersstatus order by num  ";
$r= $this->execute($sql);
?>
<option value="">Select</option>
<?php
while ($row=@mysql_fetch_array($r)) {
?>
<option value="<?php echo $row['id'] ?>"<?php if($row['id']==$ordersstatus_id){ ?>
selected="selected"     
<?php }?>><?php echo $row['name'] ?></option>
<?php

}

}          



}
}
