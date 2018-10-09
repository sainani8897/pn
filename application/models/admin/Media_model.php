<?php
class Media_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getmedialist()
	{
		$sql="SELECT * FROM media order by m_id desc";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function addmedia($data)
	{
		$this->db->insert('media',$data);
	}
	
	function getmedia($id)
	{
		$sql = "SELECT * from media WHERE m_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updatemedia($bid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('m_id' => $bid);		
		$this->db->where($arr); 
		$this->db->update("media", $data[0]);		
		return TRUE;
		
	}
	
	function deletemedia($id)
	{
		$this->db->where('m_id', $id);
        $this->db->delete('media');
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