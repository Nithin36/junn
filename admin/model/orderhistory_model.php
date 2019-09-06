<?php
require_once "commonoperation.php";
class orderhistory_model extends commonoperation{
function __construct()
{

$sample= new commonoperation();

}
function get_orderhistory($id)
{
$sql="select orderhistory.*,productorder.orderid,productorder.noofitems,"
. "productorder.price,productorder.totalprice,product.photo,product.name,"
. '(select sizeunit.name from sizeunit where id=productsize.sizeunit) as sunit,productsize.quantity as pquantity,'
. "(select ordersstatus.name from ordersstatus where ordersstatus.id=orderhistory.status) as deliverystatus from  orderhistory "
. " left join productorder on productorder.id=orderhistory.oid"
. " left join product on product.id=productorder.productid"   
. " left join productsize on productsize.product_id=product.id"       
. " where orderhistory.id=".$id." limit 0,1";
$r= $this->execute($sql);
$row2=array();
while ($row=@mysql_fetch_array($r)) {
$row2=$row;
}
return $row2;
}

function update_orderhistory_withdispatch($post)

{

$sql="update orderhistory   set courierno='".$post['courierno']."', trackid='".$post['trackid']."', status='".$post['status']."' where id=".$post['id']."";

$num=$this->affectedupdatedrows($sql);

return $num;

}

}
