<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productorder_model extends CI_Model {



function __construct()
{
// Call the Model constructor
parent::__construct();
}

function get_productorder($id)
{                    

$query = $query = $this->db->get_where('productorder', array('id' => $id), 1);
$data =$query->row_array();

return $data;
}

function check_productorder($pid,$uid)
{                    

$sql="select productorder.*"

." from productorder  where uniqueid='".$uid."' and productid='".$pid."' and orderstatus=0" ;


$query = $this->db->query($sql);
//echo $this->db->last_query();
return $rowcount = $query->num_rows();



}



function update_productorder($data,$pid,$uid)
{

$this->db->set($data);
$this->db->where('productid', $pid);
$this->db->where('uniqueid', $uid);
$this->db->update('productorder', $data);
//echo $this->db->last_query();
return ($this->db->affected_rows() != 1) ? false : true;

//return $rowcount = $query->num_rows();
}
function update_productorder2($data,$oid)
{

$this->db->set($data);
$this->db->where('id', $oid);

$this->db->update('productorder', $data);
//echo $this->db->last_query();
if($this->db->affected_rows()!=0)
{
return true;
}
else {
return false;
}

//return $rowcount = $query->num_rows();
}
public function get_productorder2($pid,$uid)
{  
$this->db->select('productorder.*');
//$this->db->from('productorder');
$this->db->where('productid', $pid);
$this->db->where('uniqueid', $uid);
$this->db->where('orderstatus', 0);
$query = $this->db->get('productorder');

$data =$query->row_array();

return $data;


}
function insert_productorder($data)
{


$this->db->insert('productorder', $data);

return ($this->db->affected_rows() != 1) ? false : true;

//return $rowcount = $query->num_rows();
}
function noofitems_productorder($uid)
{

$query=$this->db->query("select count(*) as noofitems from productorder where uniqueid='".$uid."' and orderstatus=0");
$data =$query->row_array();
//echo $this->db->last_query();
return $data;

}
function noofitems_productorder2($cusid)
{
$time1 = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

$orderdate=$time1->format('Y-m-d h:i:s');
$date1=  explode(' ',$orderdate );
$query=$this->db->query("select count(*) as noofitems from productorder where cusid='".$cusid."' and orderstatus=0 and SUBSTRING_INDEX(SUBSTRING_INDEX(orderdate, ' ', 1), ' ', -1)='".$date1[0]."'");
$data =$query->row_array();
//echo $this->db->last_query();
return $data;

}
function getall_productorder($uid)
{
$time1 = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

$orderdate=$time1->format('Y-m-d h:i:s');
$query=$this->db->query("select productorder.* ,product.name as producttitle,product.photo as productphoto,"
. '(select usertype.name from usertype where id=product.usertype) as uname,'
. '(select sizeunit.name from sizeunit where id=productsize.sizeunit) as sunit,'
. ' productsize.quantity as pquantity,productsize.noofitems as pnoofitems ,productsize.price as pprice,'
. '(select IFNULL(sum(po.noofitems),0) from productorder po   where po.productid=product.id and po.orderstatus=1 ) as solditems '
. " from productorder "
. " left join product on productorder.productid=product.id"
. " left join productsize on product.id=productsize.product_id"
. "  where productorder.uniqueid='".$uid."'  and productorder.orderstatus=0 ");
$data =$query->result_array();
//echo $this->db->last_query();

return $data;

}

function getall_productorder2($cid)
{
$time1 = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

$orderdate=$time1->format('Y-m-d h:i:s');
$date1=  explode(' ',$orderdate );
$query=$this->db->query("select productorder.* ,product.name as producttitle,product.photo as productphoto,"
. '(select usertype.name from usertype where id=product.usertype) as uname,'
. '(select sizeunit.name from sizeunit where id=productsize.sizeunit) as sunit,'
. ' productsize.quantity as pquantity,productsize.noofitems as pnoofitems ,productsize.price as pprice,'
. '(select IFNULL(sum(po.noofitems),0) from productorder po   where po.productid=product.id and po.orderstatus=1 ) as solditems '
. " from productorder "
. " left join product on productorder.productid=product.id"
. " left join productsize on product.id=productsize.product_id"
. "  where productorder.cusid='".$cid."' and SUBSTRING_INDEX(SUBSTRING_INDEX(orderdate, ' ', 1), ' ', -1)='".$date1[0]."' and orderstatus=0");
$data =$query->result_array();
//echo $this->db->last_query();

return $data;

}

function getall_productorder3($uid)
{

$query=$this->db->query("select productorder.* ,product.name as producttitle,product.photo as productphoto,"
. '(select usertype.name from usertype where id=product.usertype) as uname,'
. '(select sizeunit.name from sizeunit where id=productsize.sizeunit) as sunit,'
. ' productsize.quantity as pquantity,productsize.noofitems as pnoofitems ,productsize.price as pprice,'
. '(select IFNULL(sum(po.noofitems),0) from productorder po   where po.productid=product.id and po.orderstatus=1 ) as solditems '
. " from productorder "
. " left join product on productorder.productid=product.id"
. " left join productsize on product.id=productsize.product_id"
. "  where productorder.uniqueid='".$uid."'  and productorder.orderstatus=1");
$data =$query->result_array();
//echo $this->db->last_query();

return $data;

}
function get_productorder3($oid)
{

$query=$this->db->query("select productorder.* ,product.name as producttitle,product.photo as productphoto,"
. '(select usertype.name from usertype where id=product.usertype) as uname,'
. '(select sizeunit.name from sizeunit where id=productsize.sizeunit) as sunit,'
. ' productsize.quantity as pquantity,productsize.noofitems as pnoofitems ,productsize.price as pprice,productsize.onlineprice,'
. '(select IFNULL(sum(po.noofitems),0) from productorder po   where po.productid=product.id and po.orderstatus=1 ) as solditems '
. " from productorder "
. " left join product on productorder.productid=product.id"
. " left join productsize on product.id=productsize.product_id"
. "  where productorder.id='".$oid."'  and productorder.orderstatus=0");
$data =$query->row_array();
//echo $this->db->last_query();

return $data;

}

function delete_productorder($did)
{
$this->db->delete('productorder', array('id' => $did));
return ($this->db->affected_rows() != 1) ? false : true;
}
function update_productorder_custid($data,$uid)
{
$this->db->set($data);
$this->db->where('uniqueid', $uid);
$this->db->update('productorder', $data);
if($this->db->affected_rows()!=0)
{
return true;
}
else {
return false;
}

}

function update_productorder_withcustid($data,$cusid)
{
    $time1 = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

$orderdate=$time1->format('Y-m-d h:i:s');
$date1=  explode(' ',$orderdate );
$this->db->set($data);

$this->db->where('cusid', $cusid);
$this->db->where("SUBSTRING_INDEX(SUBSTRING_INDEX(orderdate, ' ', 1), ' ', -1)= ", $date1[0]);
$this->db->update('productorder', $data);
if($this->db->affected_rows()!=0)
{
return true;
}
else {
return false;
}

}

function get_productorder_history($cusid)
{
       $time1 = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

$orderdate=$time1->format('Y-m-d h:i:s');
$date1=  explode(' ',$orderdate );
    $query=$this->db->query("select productorder.id as poid,productorder.productid as pid,customerdelivery.*"
. " from productorder "
. " left join customerdelivery on customerdelivery.cusid=productorder.cusid"
. " where productorder.orderstatus=0 "
. " and SUBSTRING_INDEX(SUBSTRING_INDEX(orderdate, ' ', 1), ' ', -1)='".$date1[0]."'"
. " and productorder.cusid= '".$cusid."' ");
$data =$query->result_array();
//echo $this->db->last_query();

return $data;
}

}
?>