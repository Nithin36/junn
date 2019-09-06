<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Service_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_service_links()
    {                    
	$this->db->select('id,name');
        $this->db->order_by("num", "asc"); 
$query = $this->db->get('service');
$data =$query->result_array();

                return $data;
    }
    function get_service($id)
    {                    

 $query = $this->db->get_where('service', array('id' => $id), 1);
$data =$query->row_array();

                return $data;
    }
	
	    function get_service_limit($limit)
    {                    
	$this->db->select('id,name,image,description');
        $this->db->where('image != ','');
        $this->db->order_by("num", "asc"); 
$query = $this->db->get('service',$limit);
$data =$query->result_array();

                return $data;
    }

    
    	  function get_servdesc($id=1)
    {                    

$query=$this->db->query('select * from servdesc where id='.$id);
$data =$query->row_array();

                return $data;
    }
    
    
        	    function get_services()
    {                    
	$this->db->select('id,name,image');
$query = $this->db->get('service');
$this->db->order_by("num", "asc"); 
$data =$query->result_array();
                return $data;
    }
    
 function get_service_gallery($id)
    {                    
		 


$query =$this->db->query('select * from serviceicon where service='.$id.' order by num asc');


$data =$query->result_array();

                return $data;
    }

}

?>