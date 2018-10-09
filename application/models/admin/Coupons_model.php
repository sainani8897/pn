<?php
class Coupons_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getcouponlist()
	{
		$sql="SELECT * FROM coupons order by coupon_id desc";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function addcoupon($data)
	{
		$this->db->insert('coupons',$data);
	}
	
	function getcoupon($id)
	{
		$sql = "SELECT * from coupons WHERE coupon_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updatecoupon($pid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('coupon_id' => $pid);		
		$this->db->where($arr); 
		$this->db->update("coupons", $data[0]);		
	//	echo "update".$category_id;print_r($data);die;
		return TRUE;
		
	}
	
	function deletecoupon($id)
	{
		$this->db->where('coupon_id', $id);
        $this->db->delete('coupons');
		return TRUE;		
	}
	
	
}
?>