<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	
	
	
    
    function get_menu_links()
    {                    
	$this->db->select('id,name,num,child');
	$this->db->from('menu');
	$this->db->order_by("num", "asc"); 
	
$query = $this->db->get();
foreach ($query->result_array() as $row)
{
	if($row['child']!=0)
	{
	$row['sub']= $this->get_submenu_links($row['id']);
	}
	else
	{
		$row['sub']=array();
	}
  $data[]=$row;
}

return $data;

}
function get_menu_child($child)
    {                    
	$this->db->select('id,name,num');
	$this->db->from('menu');
	$this->db->where('child',$child);
	$this->db->order_by("num", "asc"); 
	
$query = $this->db->get();

$data =$query->result_array();

return $data;

}

function get_menu($id)
    {                    
 $query = $this->db->get_where('menu', array('id' => $id), 1);
 
$data =$query->row_array();
return $data;

}

function get_submenu($id)
    {    
	

$this->db->select('submenu.*,menu.name as mname');
$this->db->from('submenu');
$this->db->join('menu', 'submenu.menu = menu.id');
$this->db->where('submenu.id',$id);
$this->db->limit(1);
$query = $this->db->get();

$data =$query->row_array();

                return $data;

}

    function get_submenu_links($menu)
    {                    
	$this->db->select('id,name,num');
	$this->db->from('submenu');
	$this->db->where('menu',$menu);
	$this->db->order_by("num", "asc"); 
	
$query = $this->db->get();
$data =$query->result_array();
return $data;

}

}

?>