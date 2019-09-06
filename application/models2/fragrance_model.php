<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Fragrance_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_fragrance_limit($limit)
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('fragrance', $limit);
$data =$query->result_array();

                return $data;
    }

     function get_fragrance_all()
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('fragrance');
$data =$query->result_array();

                return $data;
    }  
    
    function count_fragrance()
{
$this->db->from('fragrance');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_fragrance($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
 $query = $this->db->get('fragrance', $limit,$page);

$data =$query->result_array();
         
            return $data;
        
      
      }  
      
      
      function get_fragrance($id)
    {                    
 $query = $this->db->get_where('fragrance', array('id' => $id), 1);
 
$data =$query->row_array();
return $data;

}
}

?>