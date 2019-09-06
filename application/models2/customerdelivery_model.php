<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customerdelivery_model extends CI_Model {
    //put your code here
    
      function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function insert_customerdelivery($data)
{


$this->db->insert('customerdelivery', $data);
$insert_id = $this->db->insert_id();

   
   if($this->db->affected_rows() != 1)
   {
       return 0;
   }
 else {
       return  $insert_id;
   }



//return $rowcount = $query->num_rows();
}


     function update_customerdelivery($data,$cusid)
{

$this->db->set($data);
$this->db->where('cusid', $cusid);
$this->db->update('customerdelivery', $data);
//echo $this->db->last_query();
return ($this->db->affected_rows() != 1) ? false : true;

//return $rowcount = $query->num_rows();
}
function get_customerdelivery($id)
{                    

$query = $this->db->get_where('customerdelivery', array('cusid' => $id), 1);
$data =$query->row_array();
//echo $this->db->last_query();
return $data;
}
}
