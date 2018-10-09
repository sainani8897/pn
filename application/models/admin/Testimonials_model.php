<?php
class Testimonials_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function gettestlist()
	{
		$sql="SELECT * FROM testimonials order by t_id desc";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function addtestimonials($data)
	{
		$this->db->insert('testimonials',$data);
	}
	
	function gettestimonials($id)
	{
		$sql = "SELECT * from testimonials WHERE t_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updatetestimonials($bid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('t_id' => $bid);		
		$this->db->where($arr); 
		$this->db->update("testimonials", $data[0]);		
		return TRUE;
		
	}
	
	function deletetestimonials($id)
	{
		$this->db->where('t_id', $id);
        $this->db->delete('testimonials');
		return TRUE;		
	}
	
	function getpage($id)
	{
		$sql = "SELECT * from pages WHERE p_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	
	function editpage($data,$pid)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('p_id' => $pid);		
		$this->db->where($arr); 
		$this->db->update("pages", $data[0]);		
		return TRUE;
		
	}
	
	
}
?>