<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Locationmap_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
  	   function get_locationmap()
    {                    
$this->db->order_by("num", "asc"); 
$query = $this->db->get('locationmap');
$data =$query->result_array();

                return $data;
    }

    function get_locationmap_limit($limit)
    {                    

$query = $this->db->get('locationmap', $limit);
$this->db->order_by("num", "asc"); 
$data =$query->result_array();

                return $data;
    }
    
    	    function get_locationmap_common()
    {                    

$query = $this->db->get('locationmap',1);
$this->db->order_by("num", "asc"); 
$data =$query->row_array();

                return $data;
    }
	
}

?>