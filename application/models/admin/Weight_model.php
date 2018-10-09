<?php
class Weight_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getweightlist()
	{
		$sql="SELECT * FROM weight order by w_id desc";
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
		$this->db->where('weight', $name);
        $result = $this->db->get('weight');		
		if($result && $result->num_rows()>0)
		{
		return FALSE;		
		} else {		 
		return TRUE;
		}
	}
	
	function addweight($data)
	{
		$this->db->insert('weight',$data);
	}
	
	function getweigh($id)
	{
		$sql = "SELECT * from weight WHERE w_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
		return $result->row_array();			
		}
		
	}
	
	function updateweigh($bid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('w_id' => $bid);		
		$this->db->where($arr); 
		$this->db->update("weight", $data[0]);		
		return TRUE;
		
	}
	
	function deleteweight($id)
	{
		$this->db->where('w_id', $id);
        $this->db->delete('weight');
		return TRUE;		
	}
	
	function getweightlist1()
	{
		$sql="SELECT * FROM weight where status=1 order by w_id desc";
		$result = $this->db->query($sql);
		return $result->result_array();
				
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