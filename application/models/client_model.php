<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_client_limit($limit)
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('client', $limit);
$data =$query->result_array();

                return $data;
    }

function count_client()
{
$this->db->from('client');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_client($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
$query = $this->db->get('client', $limit,$page);
$data =$query->result_array();
         
            return $data;
        
      
      }  
}

?>