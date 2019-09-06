<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Job_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    

    function get_job($id)
    {                    

$query = $query = $this->db->get_where('job', array('id' => $id), 1);
$data =$query->result_array();

                return $data;
    }
	function count_job()
{
$this->db->from('job');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_job($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
$query = $this->db->get('job', $limit,$page);
$data =$query->result_array();
         
            return $data;
        
      
      }  


}

?>