<?php
class State_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getstatelist()
	{
		$sql="SELECT * FROM states order by s_id desc";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function checkDuplicate($name)
	{		
		$this->db->where('state_name', $name);
        $result = $this->db->get('states');		
		if($result && $result->num_rows()>0)
		{
		return FALSE;		
		} else {		 
		return TRUE;
		}
	}
	
	function addbcity($data)
	{
		$this->db->insert('states',$data);
	}
	
	function getstate($id)
	{
		$sql = "SELECT * from states WHERE s_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updatestate($bid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('s_id' => $bid);		
		$this->db->where($arr); 
		$this->db->update("states", $data[0]);		
		return TRUE;
		
	}
	
	function deletestate($id)
	{
		$this->db->where('s_id', $id);
        $this->db->delete('states');
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