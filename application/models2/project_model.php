<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Project_model extends CI_Model {

  

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_project_limit($limit)
    {                    
		$this->db->order_by("num", "asc"); 
$query = $this->db->get('project', $limit);
$data =$query->result_array();

                return $data;
    }

   function get_project_onlyphoto_limit($limit)
    {                    
		 


$this->db->select('*');
$this->db->from('project');
$this->db->where('photo != ','');
$this->db->order_by("num", "asc");
$this->db->limit($limit);
$query = $this->db->get();
$data =$query->result_array();

                return $data;
    }
    
    
    function count_project()
{
$this->db->from('project');

$query = $this->db->get();
return $rowcount = $query->num_rows();
}

    public function pagination_select_project($limit, $page=null)  
      {  
         $this->db->order_by("num", "asc"); 
 $query = $this->db->get('project', $limit,$page);

$data =$query->result_array();
         
            return $data;
        
      
      }  
      
      
      function get_project($id)
    {                    
 $query = $this->db->get_where('project', array('id' => $id), 1);
 
$data =$query->row_array();
return $data;

}
   function get_project_gallery($id)
    {                    
		 


$query =$this->db->query('select * from projectphotos where project='.$id.' order by num asc');


$data =$query->result_array();

                return $data;
    }
}

?>