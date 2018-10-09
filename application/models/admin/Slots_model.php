<?php
class Slots_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getslotlist()
	{
		$sql="SELECT * FROM slot order by s_id desc";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function addslot($data)
	{
		$this->db->insert('slot',$data);
	}
	
	function getslot($id)
	{
		$sql = "SELECT * from slot WHERE s_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updateslot($id,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('s_id' => $id);		
		$this->db->where($arr); 
		$this->db->update("slot", $data[0]);		
		return TRUE;
		
	}
	
	function deleteslot($id)
	{
		$this->db->where('s_id', $id);
        $this->db->delete('slot');
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
	
	function checkDuplicate($name)
	{		
		$this->db->where('slot_name', $name);
        $result = $this->db->get('slot');		
		if($result && $result->num_rows()>0)
		{
		return FALSE;		
		} else {		 
		return TRUE;
		}
	}
	
	
}
?>