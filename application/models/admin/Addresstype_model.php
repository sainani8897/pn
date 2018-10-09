<?php
class Addresstype_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function gettypelist()
	{
		$sql="SELECT * FROM addresstype order by at_id desc";
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
		$this->db->where('name', $name);
        $result = $this->db->get('addresstype');		
		if($result && $result->num_rows()>0)
		{
		return FALSE;		
		} else {		 
		return TRUE;
		}
	}
	
	function addtype($data)
	{
		$this->db->insert('addresstype',$data);
	}
	
	function getaddrtype($id)
	{
		$sql = "SELECT * from addresstype WHERE at_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updatetype($bid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('at_id' => $bid);		
		$this->db->where($arr); 
		$this->db->update("addresstype", $data[0]);		
		return TRUE;
		
	}
	
	function deletetype($id)
	{
		$this->db->where('at_id', $id);
        $this->db->delete('addresstype');
		return TRUE;		
	}
	

	
	
}
?>