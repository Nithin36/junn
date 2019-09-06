<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class gallery_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_gallery_limit($limit)
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('gallery', $limit);
$data =$query->result_array();

                return $data;
    }

   function get_gallery_onlyphoto_limit($limit)
    {                    
		 


$this->db->select('*');
$this->db->from('gallery');
$this->db->where('photo != ','');
$this->db->order_by("num", "asc");
$this->db->limit($limit);
$query = $this->db->get();
$data =$query->result_array();

                return $data;
    }
    
    
    function count_gallery()
{
$this->db->from('gallery');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_gallery($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
 $query = $this->db->get('gallery', $limit,$page);

$data =$query->result_array();
         
            return $data;
        
      
      }  
      
      
      function get_gallery($id)
    {     
         
 $query = $this->db->get_where('gallery', array('id' => $id), 1);
 
$data =$query->row_array();
return $data;

}

      function get_gallery_first()
    {     
     $this->db->order_by("num", "asc");     
 $query = $this->db->get('gallery', 1);
 
$data =$query->row_array();
return $data;

}
}

?>