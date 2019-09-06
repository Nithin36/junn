<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class vechile_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_vechile_limit($limit)
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('vechile', $limit);
$data =$query->result_array();

                return $data;
    }

    
    
    function count_vechile()
{
$this->db->from('vechile');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_vechile($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
 $query = $this->db->get('vechile', $limit,$page);

$data =$query->result_array();
         
            return $data;
        
      
      }  
      
      
      function get_vechile($id)
    {                    
 $query = $this->db->get_where('vechile', array('id' => $id), 1);
 
$data =$query->row_array();
return $data;

}
}

?>