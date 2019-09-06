<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	
	
	 function get_page_links_notapplicable()
    {                    
	$this->db->select('pages.id,pages.title,sub.id as subid,sub.title as subtitle');
	$this->db->from('pages');
$this->db->join('pages as sub', 'sub.parent_id = pages.id');
$this->db->where('pages.parent_id !=', '0');
$query = $this->db->get();
$data =$query->result_array();

                return $data;
    }
    
    function get_page_links()
    {                    
	$this->db->select('id,title,parent_id');
	$this->db->from('pages');
	$this->db->order_by("page_order", "asc"); 
	
$query = $this->db->get();

foreach ($query->result_array() as $row)
{
	if($row['parent_id']!=0)
	{
	$row['sub']= $this->get_page_sublinks($row['parent_id']);
	}
	else
	{
		$row['sub']=array();
	}
  $data[]=$row;
}

return $data;
}

function get_page_sublinks($id)
    {   
	$this->db->select('id as subid ,title as subtitle');
	$this->db->from('pages');
	$this->db->where('parent_id =', $id);
	$this->db->order_by("page_order", "asc"); 
	
$query = $this->db->get();
$data =$query->result_array();
return $data;
	}

}

?>