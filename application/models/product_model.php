<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model {



function __construct()
{
// Call the Model constructor
parent::__construct();
}

function get_product_links()
{                    
$this->db->select('id,name');
$query = $this->db->get('product');
$data =$query->result_array();

return $data;
}
function get_product($id)
{                    

$query = $this->db->get_where('product', array('id' => $id), 1);
$data =$query->row_array();

return $data;
}

function get_product_limit($limit)
{                    
$this->db->select('product.*,(select name from brand where id=product.brand) as bname,(select name from usertype where id=product.usertype) as uname,(select name from sizeunit where id=productsize.sizeunit) as sunit,productsize.quantity,productsize.price,productsize.onlineprice');
$this->db->from('product');
$this->db->join('productsize', 'productsize.product_id = product.id');
$array = array( 'product.status' => 1);
$this->db->where($array); 
$this->db->order_by("product.num", "asc"); 
$this->db->limit($limit);
$query = $this->db->get();	
$data =$query->result_array();
return $data;
}

function get_products()
{                    
$this->db->select('id,name,photo');
$query = $this->db->get('product');
$this->db->where('status=', 1);
$this->db->order_by("num", "asc"); 
$data =$query->result_array();
return $data;
}
function get_product_single($id)
{                    
$this->db->select('product.*,'
. '(select name from brand where id=product.brand) as bname,'
. '(select name from usertype where id=product.usertype) as uname,'
. '(select name from sizeunit where id=productsize.sizeunit) as sunit,'
. 'productsize.quantity,productsize.noofitems,productsize.price,productsize.onlineprice,'
. '(select sum(productorder.noofitems) from productorder where productorder.productid=product.id and productorder.orderstatus=1 ) as solditems');
$this->db->from('product');
$this->db->join('productsize', 'productsize.product_id = product.id');
//$this->db->where('product.id =', $id);
//$this->db->where('product.status=', 1);
$array = array('product.id ' => $id, 'product.status' => 1);

$this->db->where($array); 
$this->db->order_by("product.num", "asc"); 
$query = $this->db->get();	
$data =$query->row_array();
//echo $this->db->last_query();
return $data;
}

function get_products_home()
{                    
$this->db->select('*');
$this->db->from('usertype');
$this->db->order_by("name", "asc"); 

$query = $this->db->get();

foreach ($query->result_array() as $row)
{
if($row['id']!=0)
{
$row['homeproducts']= $this->get_product_usertype($row['id']);
}
else
{
$row['homeproducts']=array();
}
$data[]=$row;
}
return $data;
}

function get_product_usertype($id)
{   

$this->db->select('product.*,(select name from brand where id=product.brand) as bname,(select name from usertype where id=product.usertype) as uname,(select name from sizeunit where id=productsize.sizeunit) as sunit,productsize.quantity,productsize.price');

$this->db->from('product');
$this->db->join('productsize', 'productsize.product_id = product.id');
$array = array('product.usertype ' => $id, 'product.status' => 1);

$this->db->where($array); 

$this->db->order_by("product.num", "asc"); 
$this->db->limit(3);
$query = $this->db->get();	

$data =$query->result_array();
return $data;
}
function count_product()
{

$sql="select product.*,(select name from brand where id=product.brand) as bname,(select name from usertype where id=product.usertype) as uname,(select name from sizeunit where id=productsize.sizeunit) as sunit,productsize.quantity,productsize.price,productsize.onlineprice"
." from product left join productsize on productsize.product_id = product.id"
." where  product.status=1"
." order by product.num asc ";
$query = $this->db->query($sql);
return $rowcount = $query->num_rows();
}

public function pagination_select_product($limit, $page=null)  
{  
$sql="select product.*,(select name from brand where id=product.brand) as bname,(select name from usertype where id=product.usertype) as uname,(select name from sizeunit where id=productsize.sizeunit) as sunit,productsize.quantity,productsize.price,productsize.onlineprice"
." from product left join productsize on productsize.product_id = product.id"
." where product.status=1 "
." order by product.num asc limit ".$page." ,".$limit."  ";

$query = $this->db->query($sql);

$data =$query->result_array();

return $data;


}


function count_product2($id)
{

$sql="select product.*,(select name from brand where id=product.brand) as bname,(select name from usertype where id=product.usertype) as uname,(select name from sizeunit where id=productsize.sizeunit) as sunit,productsize.quantity,productsize.price,productsize.onlineprice"
." from product left join productsize on productsize.product_id = product.id"
." where product.id in(select product_id from productcategory where category_id=".$id.") and product.status=1"
." order by product.num asc ";

$query = $this->db->query($sql);
//echo $this->db->last_query();
return $rowcount = $query->num_rows();
}

public function pagination_select_product2($limit, $page=null,$id)  
{  

$sql="select product.*,(select name from brand where id=product.brand) as bname,(select name from usertype where id=product.usertype) as uname,(select name from sizeunit where id=productsize.sizeunit) as sunit,productsize.quantity,productsize.price,productsize.onlineprice"
." from product left join productsize on productsize.product_id = product.id"
." where product.id in(select product_id from productcategory where category_id=".$id.") and product.status=1"
." order by product.num asc limit ".$page." ,".$limit."  ";

$query = $this->db->query($sql);
$data =$query->result_array();
//echo $this->db->last_query();

return $data;


}  

function count_producttitle($title)
{

$sql="select product.*,(select name from brand where id=product.brand) as bname,(select name from usertype where id=product.usertype) as uname,(select name from sizeunit where id=productsize.sizeunit) as sunit,productsize.quantity,productsize.price,productsize.onlineprice"
." from product left join productsize on productsize.product_id = product.id"
." where name like'".$title."%' and product.status=1"
." order by product.num asc ";

$query = $this->db->query($sql);
//echo $this->db->last_query();
return $rowcount = $query->num_rows();
}

public function pagination_select_producttitle($limit, $page=null,$title)  
{  

$sql="select product.*,(select name from brand where id=product.brand) as bname,(select name from usertype where id=product.usertype) as uname,(select name from sizeunit where id=productsize.sizeunit) as sunit,productsize.quantity,productsize.price,productsize.onlineprice"
." from product left join productsize on productsize.product_id = product.id"
." where name like'".$title."%' and product.status=1"
." order by product.num asc limit ".$page." ,".$limit."  ";

$query = $this->db->query($sql);
$data =$query->result_array();
//echo $this->db->last_query();

return $data;


}  

function count_productgender($id)
{

$sql="select product.*,(select name from brand where id=product.brand) as bname,(select name from usertype where id=product.usertype) as uname,(select name from sizeunit where id=productsize.sizeunit) as sunit,productsize.quantity,productsize.price,productsize.onlineprice"
." from product left join productsize on productsize.product_id = product.id"
." where usertype=".$id." and product.status=1"
." order by product.num asc ";

$query = $this->db->query($sql);
//echo $this->db->last_query();
return $rowcount = $query->num_rows();
}

public function pagination_select_productgender($limit, $page=null,$id)  
{  

$sql="select product.*,(select name from brand where id=product.brand) as bname,(select name from usertype where id=product.usertype) as uname,(select name from sizeunit where id=productsize.sizeunit) as sunit,productsize.quantity,productsize.price,productsize.onlineprice"
." from product left join productsize on productsize.product_id = product.id"
." where usertype=".$id." and product.status=1"
." order by product.num asc limit ".$page." ,".$limit."  ";

$query = $this->db->query($sql);
$data =$query->result_array();
//echo $this->db->last_query();

return $data;


}  


function count_productfragrance($id)
{

$sql="select product.*,(select name from brand where id=product.brand) as bname,(select name from usertype where id=product.usertype) as uname,(select name from sizeunit where id=productsize.sizeunit) as sunit,productsize.quantity,productsize.price"
." from product left join productsize on productsize.product_id = product.id"
." where fragrance=".$id." and product.status=1"
." order by product.num asc ";

$query = $this->db->query($sql);
//echo $this->db->last_query();
return $rowcount = $query->num_rows();
}

public function pagination_select_productfragrance($limit, $page=null,$id)  
{  

$sql="select product.*,(select name from brand where id=product.brand) as bname,(select name from usertype where id=product.usertype) as uname,(select name from sizeunit where id=productsize.sizeunit) as sunit,productsize.quantity,productsize.price,productsize.onlineprice"
." from product left join productsize on productsize.product_id = product.id"
." where fragrance=".$id." and product.status=1"
." order by product.num asc limit ".$page." ,".$limit."  ";

$query = $this->db->query($sql);
$data =$query->result_array();
//echo $this->db->last_query();

return $data;


}  

function get_products_category()
{                    
$this->db->select('*');
$this->db->from('category');
$this->db->where('category.parent =', 0);
$this->db->order_by("name", "asc"); 

$query = $this->db->get();

foreach ($query->result_array() as $row)
{
if($row['id']!=0)
{
$row['subcatgories']= $this->get_product_subcategory($row['id']);
}
else
{
$row['catgories']=array();
}
$data[]=$row;
}
return $data;
}

function get_product_subcategory($id)
{   

$this->db->select('*');

$this->db->from('category');

$this->db->where('category.parent =', $id);
$this->db->order_by("category.name", "asc"); 
$query = $this->db->get();	
$data =$query->result_array();
return $data;
}


public function get_productsubcategory($id)  
{  

$sql="select category.name,category.id,(select c.name from category c where c.id=category.parent ) as parentname"
." from category where category.id=".$id;

$query = $this->db->query($sql);
$data =$query->row_array();
// $this->db->last_query();

return $data;


}  

function generate_serial($length){

$len=$length;
$base='JKLMNOPQRS123456789';
$max=strlen($base)-1;
$rand_num='';
mt_srand((double)microtime()*1000000);
while (strlen($rand_num)<$len+1)
$rand_num.=$base{mt_rand(0,$max)};


return $rand_num;


}

}

?>