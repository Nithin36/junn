<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usertype_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_usertype_limit($limit)
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('usertype', $limit);
$data =$query->result_array();

                return $data;
    }

    
        function get_usertype_all()
    {                    
$this->db->order_by("name", "asc"); 
$query = $this->db->get('usertype');
$data =$query->result_array();

                return $data;
    }
    

    
    
    function count_usertype()
{
$this->db->from('usertype');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_usertype($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
 $query = $this->db->get('usertype', $limit,$page);

$data =$query->result_array();
         
            return $data;
        
      
      }  
      
      
      function get_usertype($id)
    {                    
 $query = $this->db->get_where('usertype', array('id' => $id), 1);
 
$data =$query->row_array();
return $data;

}
}

?>