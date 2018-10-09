<?php
class Productimages_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getimageslist($pid)
	{
		$sql="SELECT p.product_name,i.* FROM productimages as i LEFT JOIN products AS p ON p.product_id = i.product_id    WHERE  i.product_id='$pid' order by i.image_id desc  ";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function addimage($data)
	{
		$this->db->insert('productimages',$data);
	}
	
	function getimage($id)
	{
		$sql = "SELECT * from productimages WHERE image_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function editimage($pid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('image_id' => $pid);		
		$this->db->where($arr); 
		$this->db->update("productimages", $data[0]);		
	//	echo "update".$category_id;print_r($data);die;
		return TRUE;
		
	}
	
	function deleteimage($id)
	{
		$this->db->where('image_id', $id);
        $this->db->delete('productimages');
		return TRUE;	
	}
	
	
}
?>