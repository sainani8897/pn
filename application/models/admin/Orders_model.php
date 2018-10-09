<?php
class Orders_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getorderslist()
	{
		$sql="SELECT u.firstName,u.lastName,o.* FROM orders as o LEFT JOIN users AS u ON u.id = o.user_id where o.is_deleted=0 order by o.order_id desc";
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
	    $sql="SELECT c.city_name,s.state_name,a.*,o.* FROM address as a LEFT JOIN orders AS o ON a.address_id = o.address_id left join city as c on c.c_id=a.city left join states as s on s.s_id=a.state where o.order_id='$oid'";
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
	
	function changeorderstatus($oid,$data)
	{
		$arr = array('order_id' => $oid);		
		$this->db->where($arr);		
		$this->db->update("orders", $data);
		return TRUE;		
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