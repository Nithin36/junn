<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Facility_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_facility_links()
    {                    
	$this->db->select('id,name');
$query = $this->db->get('facility');
$data =$query->result_array();

                return $data;
    }
    function get_facility($id)
    {                    

$query = $query = $this->db->get_where('facility', array('id' => $id), 1);
$data =$query->row_array();

                return $data;
    }
	
	    function get_facility_limit($limit)
    {                    
	$this->db->select('id,name');
$query = $this->db->get('facility',$limit);
$data =$query->result_array();

                return $data;
    }

}

?>