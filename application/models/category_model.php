<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_category_limit($limit)
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('category', $limit);
$data =$query->result_array();

                return $data;
    }
function get_categories_all()
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
$row['subcatgories']= $this->get_subcategories_all($row['id']);
}
else
{
$row['catgories']=array();
}
$data[]=$row;
}
return $data;
}
    
    function get_subcategories_all($id)
{   

$this->db->select('*');

$this->db->from('category');

$this->db->where('category.parent =', $id);
$this->db->order_by("category.name", "asc"); 
$query = $this->db->get();	
$data =$query->result_array();
return $data;
}
    function count_category()
{
$this->db->from('category');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_category($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
 $query = $this->db->get('category', $limit,$page);

$data =$query->result_array();
         
            return $data;
        
      
      }  
      
      
      function get_category($id)
    {                    
 $query = $this->db->get_where('category', array('id' => $id), 1);
 
$data =$query->row_array();
return $data;

}
}

?>