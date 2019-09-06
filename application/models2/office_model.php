<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Office_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_office_limit($limit)
    {                    
$this->db->order_by("office_order", "asc"); 
$query = $this->db->get('office', $limit);
$data =$query->result_array();

                return $data;
    }


}

?>