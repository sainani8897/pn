<?php
class Catslides_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getimageslist($cid)
	{
		$sql="SELECT c.category_name,i.* FROM catslides as i LEFT JOIN categories AS c ON c.category_id = i.category_id    WHERE  i.category_id='$cid' order by i.category_id desc ";
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
		$this->db->insert('catslides',$data);
	}
	
	function getimage($id)
	{
		$sql = "SELECT * from catslides WHERE id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function editimage($pid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('id' => $pid);		
		$this->db->where($arr); 
		$this->db->update("catslides", $data[0]);		
	//	echo "update".$category_id;print_r($data);die;
		return TRUE;
		
	}
	
	function deleteimage($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('catslides');
		return TRUE;	
	}
	
	function catsliderslist($name)
	{
		$sql="SELECT i.* FROM catslides as i LEFT JOIN categories AS c ON c.category_id = i.category_id  WHERE  c.category_name='$name' order by i.sort_order asc ";
		$result = $this->db->query($sql);	
		return $result->result_array();
		
	}
	
}
?>