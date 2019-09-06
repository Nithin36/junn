<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Download_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_download_limit($limit)
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('download', $limit);
$data =$query->result_array();

                return $data;
    }

   function get_download_onlyphoto_limit($limit)
    {                    
		 


$this->db->select('*');
$this->db->from('download');
$this->db->where('photo != ','');
$this->db->order_by("num", "asc");
$this->db->limit($limit);
$query = $this->db->get();
$data =$query->result_array();

                return $data;
    }
    
    
    function count_download()
{
$this->db->from('download');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_download($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
 $query = $this->db->get('download', $limit,$page);

$data =$query->result_array();
         
            return $data;
        
      
      }  
      
      
      function get_download($id)
    {                    
 $query = $this->db->get_where('download', array('id' => $id), 1);
 
$data =$query->row_array();
return $data;

}
}

?>