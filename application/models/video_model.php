<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Video_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_video_limit($limit)
    {                    
$this->db->order_by("num", "asc"); 
$query = $this->db->get('video', $limit);
$data =$query->result_array();

                return $data;
    }
    
        function count_video()
{
$this->db->from('video');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_video($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
 $query = $this->db->get('video', $limit,$page);

$data =$query->result_array();
         
            return $data;
        
      
      }  


}

?>