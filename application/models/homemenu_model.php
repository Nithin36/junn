<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class homemenu_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_homecontent($id=1)
    {                    
$this->db->select('*');
$this->db->from('homemenu');
$this->db->where('id',$id);
	$this->db->limit(1);
$query = $this->db->get();
 $data =$query->row_array();

                return $data;
    }


}

?>