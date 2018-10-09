<?php
class Faqs_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getfaqlist()
	{
		$sql="SELECT * FROM faqs order by f_id desc";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function addfaq($data)
	{
		$this->db->insert('faqs',$data);
	}
	
	function getfaq($id)
	{
		$sql = "SELECT * from faqs WHERE f_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updatefaq($bid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('f_id' => $bid);		
		$this->db->where($arr); 
		$this->db->update("faqs", $data[0]);		
		return TRUE;
		
	}
	
	function deletefaq($id)
	{
		$this->db->where('f_id', $id);
        $this->db->delete('faqs');
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