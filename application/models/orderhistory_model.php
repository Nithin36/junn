<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orderhistory_model extends CI_Model {



function __construct()
{
// Call the Model constructor
parent::__construct();
}


function insert_orderhistory($data)
{


$this->db->insert('orderhistory', $data);
//echo $this->db->last_query();
return ($this->db->affected_rows() != 1) ? false : true;

//return $rowcount = $query->num_rows();
}








}
?>