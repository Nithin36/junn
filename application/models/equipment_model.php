<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Equipment_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_equipment_limit($limit)
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('equipment', $limit);
$data =$query->result_array();

                return $data;
    }

   function get_equipment_onlyphoto_limit($limit)
    {                    
		 


$this->db->select('*');
$this->db->from('equipment');
$this->db->where('photo != ','');
$this->db->order_by("num", "asc");
$this->db->limit($limit);
$query = $this->db->get();
$data =$query->result_array();

                return $data;
    }
    
    
    function count_equipment()
{
$this->db->from('equipment');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_equipment($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
 $query = $this->db->get('equipment', $limit,$page);

$data =$query->result_array();
         
            return $data;
        
      
      }  
      
      
      function get_equipment($id)
    {                    
 $query = $this->db->get_where('equipment', array('id' => $id), 1);
 
$data =$query->row_array();
return $data;

}
}

?>