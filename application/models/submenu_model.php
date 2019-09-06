<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Submenu_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
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