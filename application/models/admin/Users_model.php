<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	var $table = 'users';
	var $column_order = array(null, 'firstName','lastName','phone','address','city'); //set column field database for datatable orderable
	var $column_search = array('firstName','lastName','phone','address','city'); //set column field database for datatable searchable 
	var $order = array('id' => 'desc'); 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	
	public function getuserlist()
	{
		$sql="SELECT u.*, c.city_name   FROM users u   LEFT JOIN city c on u.city = c.c_id";
		//$sql = "SELECT * from subcategories WHERE status = '1' AND deleted_id='0' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
	}
	
	public function adduser($data)
	{
		$this->db->insert('users',$data);
	}
	
	function getuser($id)
	{
		$sql = "SELECT * from users WHERE id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	
	function edituser($id,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('id' => $id);		
		$this->db->where($arr); 
		$this->db->update("users", $data[0]);		
	//	echo "update".$category_id;print_r($data);die;
		return TRUE;
		
	}
	
	function getorders($uid)
	{
		
		$sql="SELECT u.*,o.* FROM orders as o LEFT JOIN users AS u ON o.user_id = u.id WHERE u.is_deleted=0 and u.id='$uid'";
		
		$result = $this->db->query($sql);
		
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();
						
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function deleteuser($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('users');
		return TRUE;		
	}
	

}
