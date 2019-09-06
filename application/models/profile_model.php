<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class profile_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_profile_limit($limit)
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('profile', $limit);
$data =$query->result_array();

                return $data;
    }

   function get_profile_onlyphoto_limit($limit)
    {                    
		 


$this->db->select('*');
$this->db->from('profile');
$this->db->where('photo != ','');
$this->db->order_by("num", "asc");
$this->db->limit($limit);
$query = $this->db->get();
$data =$query->result_array();

                return $data;
    }
    
    
    function count_profile()
{
$this->db->from('profile');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_profile($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
 $query = $this->db->get('profile', $limit,$page);

$data =$query->result_array();
         
            return $data;
        
      
      }  
      
      
      function get_profile($id)
    {                    
 $query = $this->db->get_where('profile', array('id' => $id), 1);
 
$data =$query->row_array();
return $data;

}
}

?>