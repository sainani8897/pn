<?php
class Vendors_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getvendorslist()
	{
		$sql="SELECT * FROM vendors where deleted_id=''";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function addvendor($data)
	{
		$this->db->insert('vendors',$data);
	}
	
	function getvendor($id)
	{
		$sql = "SELECT * from vendors WHERE vendor_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updatevendor($pid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('vendor_id' => $pid);		
		$this->db->where($arr); 
		$this->db->update("vendors", $data[0]);		
	//	echo "update".$category_id;print_r($data);die;
		return TRUE;
		
	}
	
	function deleteVendor($pid,$data)
	{
		$arr = array('vendor_id' => $pid);		
		$this->db->where($arr);		
		$this->db->update("vendors", $data);
		return TRUE;		
	}
	
	function getproducts($vid)
	{
		
		$sql="SELECT c.category_name,s.subcategory_name,v.vendor_company,p.* FROM products as p LEFT JOIN categories AS c ON c.category_id = p.category_id   LEFT JOIN subcategories AS s ON p.subcategory_id = s.subcategory_id  LEFT JOIN vendors AS v ON p.vendor_id = v.vendor_id   WHERE p.deleted_id=0 and v.vendor_id='$vid' ";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function getorders($vid)
	{
		
		$sql="SELECT c.category_name,s.subcategory_name,v.vendor_company,p.* FROM products as p LEFT JOIN categories AS c ON c.category_id = p.category_id   LEFT JOIN subcategories AS s ON p.subcategory_id = s.subcategory_id  LEFT JOIN vendors AS v ON p.vendor_id = v.vendor_id   WHERE p.deleted_id=0 and v.vendor_id='$vid' ";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
}
?>