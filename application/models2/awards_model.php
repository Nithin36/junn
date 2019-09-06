<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Awards_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_awards_limit($limit)
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('awards', $limit);
$data =$query->result_array();

                return $data;
    }

function count_awards()
{
$this->db->from('awards');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_awards($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
$query = $this->db->get('awards', $limit,$page);
$data =$query->result_array();
         
            return $data;
        
      
      }  
}

?>