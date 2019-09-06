<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class case_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_case_limit($limit)
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('case', $limit);
$data =$query->result_array();

                return $data;
    }

   function get_case_onlyphoto_limit($limit)
    {                    
		 


$this->db->select('*');
$this->db->from('case');
$this->db->where('photo != ','');
$this->db->order_by("num", "asc");
$this->db->limit($limit);
$query = $this->db->get();
$data =$query->result_array();

                return $data;
    }
    
    
    function count_case()
{
$this->db->from('case');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_case($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
 $query = $this->db->get('case', $limit,$page);

$data =$query->result_array();
         
            return $data;
        
      
      }  
      
      
      function get_case($id)
    {                    
 $query = $this->db->get_where('case', array('id' => $id), 1);
 
$data =$query->row_array();
return $data;

}
}

?>