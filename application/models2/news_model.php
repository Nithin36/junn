<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class news_model extends CI_Model {



function __construct()
{
// Call the Model constructor
parent::__construct();
}

function get_news_limit($limit)
{                    
$this->db->order_by("num", "asc"); 
$query = $this->db->get('news', $limit);
$data =$query->result_array();

return $data;
}

function get_news_onlyphoto_limit($limit)
{                    



$this->db->select('*');
$this->db->from('news');
$this->db->where('photo != ','');
$this->db->order_by("num", "asc");
$this->db->limit($limit);
$query = $this->db->get();
$data =$query->result_array();

return $data;
}


function count_news()
{
$this->db->from('news');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

public function pagination_select_news($limit, $page=null)  
{  
$this->db->order_by("num", "asc"); 
$query = $this->db->get('news', $limit,$page);

$data =$query->result_array();

return $data;


}  


function get_news($id)
{                    
$query = $this->db->get_where('news', array('id' => $id), 1);

$data =$query->row_array();
return $data;

}

public function get_newsphotos_all($newsid)  
{  
//    $this->db->where('news= ',$newsid);
//$this->db->order_by("num", "asc"); 
//$query = $this->db->get('video');
$this->db->select('*');
$this->db->from('gallery');
$this->db->where('news',$newsid);
$this->db->order_by("num", "asc");
//$this->db->limit($limit);
$query = $this->db->get();
$data =$query->result_array();

return $data;


}  

public function get_newsvideos_all($newsid)  
{  $this->db->select('*');
$this->db->from('video');
$this->db->where('news',$newsid);
$this->db->order_by("num", "asc");
//$this->db->limit($limit);
$query = $this->db->get();
$data =$query->result_array();
return $data;


} 
}

?>