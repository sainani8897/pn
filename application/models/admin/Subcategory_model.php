<?php
class Subcategory_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getsubcategorylist()
	{
		$sql="SELECT S.*, C.category_name   FROM subcategories S   LEFT JOIN categories C on S.category_id = C.category_id";
		//$sql = "SELECT * from subcategories WHERE status = '1' AND deleted_id='0' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	
	 function ajaxlist($catid)
     {
     $this -> db -> select('*');
     $this -> db -> where('category_id', $catid);
     $query = $this -> db -> get('subcategories');
     return $query->result();
   }
	
	function addsubcategory($data)
	{
		$this->db->insert('subcategories',$data);
	}
	
	function getsubcategory($id)
	{
		$sql = "SELECT * from subcategories WHERE subcategory_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updateSubcategory($category_id,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('subcategory_id' => $category_id);		
		$this->db->where($arr); 
		$this->db->update("subcategories", $data[0]);		
	//	echo "update".$category_id;print_r($data);die;
		return TRUE;
		
	}
	
	function deletesubCategory($category_id,$data)
	{
		$arr = array('subcategory_id' => $category_id);		
		$this->db->where($arr);		
		$this->db->update("subcategories", $data);
		return TRUE;		
	}
}
?>