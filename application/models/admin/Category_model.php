<?php
class Category_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getcategorylist()
	{	
		$sql = "SELECT * from categories WHERE parent_category_id = '0' AND deleted_id is NULL order by category_id desc ";	
		$result = $this->db->query($sql);		
		return $result->result_array();				
	}
	
	function addcategory($data)
	{
		$this->db->insert('categories',$data);
	}
	
	function getcategory($id)
	{
		$sql = "SELECT * from categories WHERE category_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	function getcatid($name)
	{
		$sql = "SELECT * from categories WHERE category_name = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	
	function updateCategory($category_id,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('category_id' => $category_id);		
		$this->db->where($arr); 
		$this->db->update("categories", $data[0]);		
	//	echo "update".$category_id;print_r($data);die;
		return TRUE;
		
	}
	
	function deleteCategory($category_id,$data)
	{
		$arr = array('category_id' => $category_id);		
		$this->db->where($arr);		
		$this->db->update("categories", $data);
		return TRUE;		
	}
	
	function getcategorylist1()
	{	
		$sql = "SELECT * from categories WHERE parent_category_id='0' AND display_status='1' AND deleted_id is NULL order by category_id desc ";	
		$result = $this->db->query($sql);		
		return $result->result_array();				
	}
	
	function catlist()
	{
		$sql = "SELECT * from categories WHERE parent_category_id='0' AND display_status='1' AND deleted_id is NULL order by sort_order asc ";	
		$result = $this->db->query($sql);		
		return $result->result_array();
	}
	
	function weightlist()
	{
			$sql = "SELECT * from weight WHERE status='1' order by sort_order asc ";	
		$result = $this->db->query($sql);		
		return $result->result_array();	
	}
	
	
	function fcatlist()
	{
	$sql = "SELECT * from categories WHERE parent_category_id='0' AND display_status='1' AND deleted_id is NULL order by sort_order asc limit 0,6";	
		$result = $this->db->query($sql);		
		return $result->result_array();	
	}
	
	
	function filterlist($catid,$filter)
	{
		if($filter['byprice']!="")
		{
			$byprice="order by p.discount_price ".$filter['byprice']."";
		} else {
			$byprice="";
		}
		
		if(count($filter['bybrand'])>0)
		{
		$chk=implode(",",$filter['bybrand']);
		$bybrand="and p.brands_id IN(".$chk.")";
		} else {
			
			$bybrand="";
		}
		
		if($filter['weight']!="")
		{
			$byweight="and p.weight=".$filter['weight']."";
		} else {
			$byweight="";
		}
		
		$sql = "SELECT p.*,b.brand_name,(SELECT sum(r.rating) FROM reviews r WHERE r.pid = p.product_id and r.status=1) as rate_total,(SELECT COUNT(DISTINCT(r.r_id)) FROM reviews r WHERE r.pid = p.product_id and r.status=1) as  rate_count from products as p left join brands as b on p.brands_id = b.b_id  WHERE p.category_id='$catid' AND p.display_status='1' AND p.deleted_id='0' and discount_price>='".$filter['minprice']."' and discount_price<='".$filter['maxprice']."' $byweight $bybrand $byprice";
		
		
		$result = $this->db->query($sql);		
		return $result->result_array();	
	}
}
?>