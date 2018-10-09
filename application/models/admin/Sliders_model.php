<?php
class Sliders_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getsliderlist()
	{
		$sql="SELECT * FROM sliders order by s_id desc";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function addslider($data)
	{
		$this->db->insert('sliders',$data);
	}
	
	function getslider($id)
	{
		$sql = "SELECT * from sliders WHERE s_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updateslider($bid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('s_id' => $bid);		
		$this->db->where($arr); 
		$this->db->update("sliders", $data[0]);		
		return TRUE;
		
	}
	
	function deleteslider($id)
	{
		$this->db->where('s_id', $id);
        $this->db->delete('sliders');
		return TRUE;		
	}
	
	function sliderslist()
	{
		$sql="SELECT * FROM sliders where status=1 order by sort_order asc";
		$result = $this->db->query($sql);
		return $result->result_array();		
	}
	
}
?>