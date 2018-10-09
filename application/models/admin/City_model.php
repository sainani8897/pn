<?php
class City_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getcitylist()
	{
		$sql="SELECT c.*,s.state_name FROM city as c left join states as s on c.state_id=s.s_id order by c.c_id desc";
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
		$this->db->where('city_name', $name);
        $result = $this->db->get('city');		
		if($result && $result->num_rows()>0)
		{
		return FALSE;		
		} else {		 
		return TRUE;
		}
	}
	
	function addbcity($data)
	{
		$this->db->insert('city',$data);
	}
	
	function getcity($id)
	{
		$sql = "SELECT * from city WHERE c_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updatecity($bid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('c_id' => $bid);		
		$this->db->where($arr); 
		$this->db->update("city", $data[0]);		
		return TRUE;
		
	}
	
	function deletecity($id)
	{
		$this->db->where('c_id', $id);
        $this->db->delete('city');
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
	
	
	function ajaxlist($sid)
     {
     $this -> db -> select('*');
     $this -> db -> where('state_id', $sid);
     $query = $this -> db -> get('city');
     return $query->result();
   }
	
	
}
?>