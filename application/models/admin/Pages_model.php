<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	

	
	function getpagelist()
	{
		$sql="SELECT * FROM pages ";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
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
	
	function editexpress($data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('eid' => 1);		
		$this->db->where($arr); 
		$this->db->update("express_delivery", $data[0]);		
		return TRUE;
		
	}
	
	function express()
	{
		$sql = "SELECT * from express_delivery WHERE eid = '1' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
	}
	
	function charges()
	{
		$sql = "SELECT * from charges WHERE cid = '1' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
	}
	
	function editcharges($data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('cid' => 1);		
		$this->db->where($arr); 
		$this->db->update("charges", $data[0]);		
		return TRUE;
		
	}

}
