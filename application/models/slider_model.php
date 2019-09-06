<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    	   function get_sliders()
    {                    
$this->db->order_by("num", "asc"); 
$query = $this->db->get('slider');
$data =$query->result_array();

                return $data;
    }

}

?>