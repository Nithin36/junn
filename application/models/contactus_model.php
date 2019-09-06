<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contactus_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_contactus_limit($limit)
    {                    

$query = $this->db->get('contactus', $limit);
$this->db->order_by("num", "asc"); 
$data =$query->result_array();

                return $data;
    }
	
	
	    function get_contactus_common()
    {                    

$query = $this->db->get('contactus',1);
$this->db->order_by("num", "asc"); 
$data =$query->row_array();

                return $data;
    }

	   function get_contactus()
    {                    
$this->db->order_by("num", "asc"); 
$query = $this->db->get('contactus');
$data =$query->result_array();

                return $data;
    }

    	   function get_forgot($id=1)
    {     
$query=$this->db->query('select * from forgot where id='.$id);
$data =$query->row_array();

return $data['email'];
    }
}

?>