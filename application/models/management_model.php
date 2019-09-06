<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Management_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_management_limit($limit)
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('management', $limit);
$data =$query->result_array();

                return $data;
    }

function count_management()
{
$this->db->from('management');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_management($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
$query = $this->db->get('management', $limit,$page);
//echo $this->db->last_query();
$data =$query->result_array();
         $this->db->last_query();
            return $data;
        
      
      }  
}

?>