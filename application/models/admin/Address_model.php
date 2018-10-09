<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Address_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
    function getaddresslist($uid)
	{
		$sql="SELECT a.*,c.city_name,s.state_name FROM address as a left join city as c on c.c_id=a.city left join states as s on s.s_id=a.state where a.user_id='$uid' order by a.address_id desc ";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function addaddress($data)
	{
		$this->db->insert('address',$data);
	}
	
	function getaddress($id)
	{
		$sql = "SELECT * from address WHERE address_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	
	function editaddress($id,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('address_id' => $id);		
		$this->db->where($arr); 
		$this->db->update("address", $data[0]);		
	//	echo "update".$category_id;print_r($data);die;
		return TRUE;
		
	}
	
	function deleteaddress($id)
	{
		$this->db->where('address_id', $id);
        $this->db->delete('address');
		return TRUE;
	}

}
