<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Executives_model extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getexcutiveslist()
	{
		$sql="SELECT * FROM executives order by e_id desc";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}

	
	public function addexecutive($data)
	{
		$this->db->insert('executives',$data);
	}
	
	function getexecutive($id)
	{
		$sql = "SELECT * from executives WHERE e_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	
	function editexecutive($id,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('e_id' => $id);		
		$this->db->where($arr); 
		$this->db->update("executives", $data[0]);		
		return TRUE;
		
	}
	
	function deleteexecutive($id)
	{
		$this->db->where('e_id', $id);
		$this->db->delete("executives");		
		return TRUE;
	}
	
	
}
