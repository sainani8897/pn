<?php
class Area_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getarealist()
	{
		$sql="SELECT a.*,c.city_name FROM area a left join city c on c.c_id=a.city_id order by a.a_id desc";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	
	function getcitylist()
	{
		$sql="SELECT * FROM city order by c_id asc";
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
		$this->db->where('area_name', $name);
        $result = $this->db->get('area');		
		if($result && $result->num_rows()>0)
		{
		return FALSE;		
		} else {		 
		return TRUE;
		}
	}
	function addarea($data)
	{
		$this->db->insert('area',$data);
	}
	
	function getarea($id)
	{
		$sql = "SELECT * from area WHERE a_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updatearea($id,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('a_id' => $id);		
		$this->db->where($arr); 
		$this->db->update("area", $data[0]);		
		return TRUE;
		
	}
	
	function deletearea($id)
	{
		$this->db->where('a_id', $id);
        $this->db->delete('area');
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