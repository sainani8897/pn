<?php
class Brands_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getbrandlist()
	{
		$sql="SELECT * FROM brands order by b_id desc";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function addbrand($data)
	{
		$this->db->insert('brands',$data);
	}
	
	function getbrand($id)
	{
		$sql = "SELECT * from brands WHERE b_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updateBrand($bid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('b_id' => $bid);		
		$this->db->where($arr); 
		$this->db->update("brands", $data[0]);		
		return TRUE;
		
	}
	
	function deletebrand($id)
	{
		$this->db->where('b_id', $id);
        $this->db->delete('brands');
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
	
	function getbrandlist1()
	{
		$sql="SELECT * FROM brands where brand_status=1 order by b_id desc";
		$result = $this->db->query($sql);		
		return $result->result_array();			
	}
	
	function brandslist()
	{
		$sql="SELECT * FROM brands where brand_status=1 order by sort_order asc";
		$result = $this->db->query($sql);		
		return $result->result_array();			
	}
	
	function fbrandslist()
	{
		$sql="SELECT * FROM brands where brand_status=1 order by sort_order asc limit 0,6";
		$result = $this->db->query($sql);		
		return $result->result_array();			
	}
	function getcatid($name)
	{
		$sql="SELECT category_id FROM categories where category_name='$name'";
		$result = $this->db->query($sql);		
		return $result->row_array();	
	}
	function flrbrandslist($catid)
	{
		$sql="SELECT brands_id,count(*) as num FROM products where category_id='$catid' and display_status='1' group by brands_id";
	
		$result = $this->db->query($sql);		
		return $result->result_array();			
		
	}
	
}
?>