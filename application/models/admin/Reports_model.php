<?php
class Reports_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function totalreports()
	{
		$sql="SELECT u.firstName,u.lastName,o.* FROM orders as o LEFT JOIN users AS u ON u.id = o.user_id where o.is_deleted=0";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function filters($data)
	{
		if($data['username']!=""){
		$qry1="and CONCAT_WS(' ', u.firstName,u.lastName) LIKE '%".$data['username']."%'";	
		}else { $qry1=""; }
		
		if($data['status']!=""){
		$qry2="and o.order_status='".$data['status']."'";	
		}else { $qry2=""; }
		
		
		
		if($data['fromdate']!=""){
		$qry3="and o.order_date>='".$data['fromdate']."' and o.order_date<='".$data['todate']."'";	
		}else { $qry3=""; }
		
		$sql="SELECT u.firstName,u.lastName,o.* FROM orders as o LEFT JOIN users AS u ON u.id = o.user_id where o.is_deleted=0 $qry1 $qry2 $qry3";
		
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
		 
	}
	
	function getuserdetails($oid)
	{
	    $sql="SELECT u.firstName,u.lastName,u.email,u.phone,u.address,u.city,o.* FROM orders as o LEFT JOIN users AS u ON u.id = o.user_id where o.order_id='$oid'";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();		
		} else {
		 
		   return $result->row_array();
		}	
	}
	function getorderdetails($oid)
	{
		
		$sql="SELECT p.product_image,de.*,o.* FROM order_details as de LEFT JOIN orders AS o ON o.order_id = de.order_id   LEFT JOIN products AS p ON p.product_id = de.product_id where de.order_id='$oid'";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}	
		
	}
	
	
	function deleteorder($oid,$data)
	{
		$arr = array('order_id' => $oid);		
		$this->db->where($arr);		
		$this->db->update("orders", $data);
		return TRUE;		
	}

}
?>