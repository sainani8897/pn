<?php
class Reviews_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getreviewslist($pid)
	{
		$sql="SELECT * FROM reviews where pid='$pid' order by r_id desc";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function addreview($data)
	{
		$this->db->insert('reviews',$data);
	}
	
	function getreview($id)
	{
		$sql = "SELECT * from reviews WHERE r_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updatereview($bid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('r_id' => $bid);		
		$this->db->where($arr); 
		$this->db->update("reviews", $data[0]);		
		return TRUE;
		
	}
	
	function deletereview($id)
	{
		$this->db->where('r_id', $id);
        $this->db->delete('reviews');
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