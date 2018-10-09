<?php
class Products_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getproductslist()
	{
		$sql="SELECT c.category_name,s.subcategory_name,b.brand_name,p.* FROM products as p LEFT JOIN categories AS c ON c.category_id = p.category_id   LEFT JOIN subcategories AS s ON p.subcategory_id = s.subcategory_id  LEFT JOIN brands AS b ON p.brands_id = b.b_id   WHERE p.deleted_id=0 order by product_id desc ";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}
	
	function totalproducts()
	{
		$sql="SELECT * FROM products WHERE deleted_id=0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}
	
	function activeproducts()
	{
		$sql="SELECT * FROM products where display_status='1' and  deleted_id=0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}
	
	function inactiveproducts()
	{
		$sql="SELECT * FROM products where display_status='0' and  deleted_id=0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}
	
	function addproduct($data)
	{
		$this->db->insert('products',$data);
	}
	
	function getproduct($id)
	{
		$sql = "SELECT * from products WHERE product_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updateProduct($pid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('product_id' => $pid);		
		$this->db->where($arr); 
		$this->db->update("products", $data[0]);		
	//	echo "update".$category_id;print_r($data);die;
		return TRUE;
		
	}
	
	function deleteProduct($pid,$data)
	{
		$arr = array('product_id' => $pid);		
		$this->db->where($arr);		
		$this->db->update("products", $data);
		return TRUE;		
	}
	
	var $table = 'products';
	var $column_order = array(null, 'product_name'); //set column field database for datatable orderable
	var $column_search = array('product_name'); //set column field database for datatable searchable 
	var $order = array('id' => 'asc'); // default order 
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
	
	
	function catprodlist($name)
	{
		$sql="SELECT p.*,b.brand_name,(SELECT sum(r.rating) FROM reviews r WHERE r.pid = p.product_id and r.status=1) as rate_total,(SELECT COUNT(DISTINCT(r.r_id)) FROM reviews r WHERE r.pid = p.product_id and r.status=1) as  rate_count FROM products as p LEFT JOIN categories AS c ON c.category_id = p.category_id LEFT JOIN brands AS b ON p.brands_id = b.b_id  WHERE c.category_name='$name' and p.deleted_id=0 and p.display_status='1' order by p.sort_order asc ";
		$result = $this->db->query($sql);
		return $result->result_array();
		
	}
	
	
	function latestproductslist()
	{
		$sql="SELECT p.*,b.brand_name,(SELECT sum(r.rating) FROM reviews r WHERE r.pid = p.product_id and r.status=1) as rate_total,(SELECT COUNT(DISTINCT(r.r_id)) FROM reviews r WHERE r.pid = p.product_id and r.status=1) as  rate_count FROM products as p LEFT JOIN categories AS c ON c.category_id = p.category_id LEFT JOIN brands AS b ON p.brands_id = b.b_id  WHERE p.deleted_id=0 and p.display_home=1 and p.display_status='1' order by sort_order asc ";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
	function searchproducts()
	{
				$sql="SELECT p.*,b.brand_name FROM products as p LEFT JOIN categories AS c ON c.category_id = p.category_id LEFT JOIN brands AS b ON p.brands_id = b.b_id  WHERE p.deleted_id=0 and p.display_status='1' order by sort_order asc ";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
	function brandprodlist($name)
	{
		$sql="SELECT p.*,b.brand_name,(SELECT sum(r.rating) FROM reviews r WHERE r.pid = p.product_id and r.status=1) as rate_total,(SELECT COUNT(DISTINCT(r.r_id)) FROM reviews r WHERE r.pid = p.product_id and r.status=1) as  rate_count FROM products as p  LEFT JOIN brands AS b ON p.brands_id = b.b_id  WHERE b.brand_name='$name' and p.deleted_id=0  and p.display_status='1' order by p.sort_order asc ";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
	function productdetail($id)
	{
		
		$sql="SELECT p.*,b.brand_name,c.category_name FROM products as p LEFT JOIN categories AS c ON c.category_id = p.category_id LEFT JOIN brands AS b ON p.brands_id = b.b_id  WHERE p.product_id='$id'  ";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	
	function productimages($id)
	{
		
		$sql="SELECT m.* FROM  productimages as m LEFT JOIN products AS p ON p.product_id = m.product_id  WHERE p.product_id='$id' ";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
	function relatedproducts($id,$pid)
	{
		
		$sql="SELECT p.*,b.brand_name FROM products as p  LEFT JOIN brands AS b ON p.brands_id = b.b_id  WHERE p.category_id='$id' and p.product_id NOT IN ($pid) and p.deleted_id=0 and p.display_status='1' order by p.sort_order asc ";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
	function viewstoreproducts()
	{
		
		
		$sql="SELECT p.*,b.brand_name,(SELECT sum(r.rating) FROM reviews r WHERE r.pid = p.product_id and r.status=1) as rate_total,(SELECT COUNT(DISTINCT(r.r_id)) FROM reviews r WHERE r.pid = p.product_id and r.status=1) as  rate_count FROM products as p LEFT JOIN categories AS c ON c.category_id = p.category_id LEFT JOIN brands AS b ON p.brands_id = b.b_id  WHERE p.deleted_id=0  and p.display_status='1' order by sort_order asc ";
		
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
	function addreview($data)
	{
		$this->db->insert('reviews',$data);
	}
	
	function chkreview($uid,$pid)
	{
		$query = $this->db->query("select * from  reviews where userid='$uid' and pid='$pid' ");  		
        return $query->num_rows();
	}
	
	function productreviews($id)
	{
		$sql="SELECT r.*,u.city FROM reviews as r left join users as u on u.id=r.userid WHERE r.pid='$id' and r.status=1 order by r.r_id desc";
		$result = $this->db->query($sql);
		return $result->result_array();	
		
	}
	
	function searchproducts1($keyword)
	{
		$sql="SELECT p.*,b.brand_name FROM products as p LEFT JOIN brands AS b ON p.brands_id = b.b_id where p.product_name like '%".$keyword."%' and p.display_status='1'" ;
		$result = $this->db->query($sql);
		return $result->result_array();	
	}
	
}


?>