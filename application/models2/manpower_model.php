<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manpower_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_manpower_limit($limit)
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('manpower', $limit);
$data =$query->result_array();

                return $data;
    }

   function get_manpower_onlyphoto_limit($limit)
    {                    
		 


$this->db->select('*');
$this->db->from('manpower');
$this->db->where('photo != ','');
$this->db->order_by("num", "asc");
$this->db->limit($limit);
$query = $this->db->get();
$data =$query->result_array();

                return $data;
    }
    
    
    function count_manpower()
{
$this->db->from('manpower');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_manpower($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
 $query = $this->db->get('manpower', $limit,$page);

$data =$query->result_array();
         
            return $data;
        
      
      }  
      
      
      function get_manpower($id)
    {                    
 $query = $this->db->get_where('manpower', array('id' => $id), 1);
 
$data =$query->row_array();
return $data;

}
}

?>