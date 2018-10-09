<?php
class Dashboard_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
		$this->load->library('form_validation');
		$this->load->helper('security');
	}
	
	function prodenquiries($id)
	{
	   $sql="select e.*,s.company,s.phone from enquiries as e left join sellers as s on s.s_id=e.seller_id where e.customer_id='$id' and e.service_id='0' order by e.en_id desc";	
	   $result = $this->db->query($sql);
	   return $result->result_array();
	}
	function penqdetails($id)
	{
	$sql="select e.*,s.*,c.city_name,a.area_name from enquiries as e left join sellers as s on s.s_id=e.seller_id left join city as c on c.c_id=s.city left join area as a on a.a_id=s.area where e.en_id='$id' and e.service_id='0' order by e.en_id desc";	
	   $result = $this->db->query($sql);
	   return $result->row_array();	
	}
	
	function senqdetails($id)
	{
	$sql="select e.*,s.*,c.city_name,a.area_name from enquiries as e left join sellers as s on s.s_id=e.seller_id left join city as c on c.c_id=s.city left join area as a on a.a_id=s.area where e.en_id='$id' and e.product_id='0' order by e.en_id desc";	
	   $result = $this->db->query($sql);
	   return $result->row_array();	
	}
	
	function serenquiries($id)
	{
	   $sql="select e.*,s.company,s.phone from enquiries as e left join sellers as s on s.s_id=e.seller_id where e.customer_id='$id' and e.product_id='0' order by e.en_id desc";	
	   $result = $this->db->query($sql);
	   return $result->result_array();
	}
	
	function getprod($id)
	{
	$sql="select p.*,s.* from products as p left join sellers as s on s.s_id=p.seller_id where p.product_id='$id'";	
	   $result = $this->db->query($sql);
	   return $result->row_array();
	}
	function arealist()
	{
	$sql="select * from area where status=1 order by sort_order asc";	
	   $result = $this->db->query($sql);
	   return $result->result_array();
	}
	function citylist()
	{
	$sql="select * from city where status=1 order by sort_order asc";	
	   $result = $this->db->query($sql);
	   return $result->result_array();
	}
	
	function insertcustomer($data)
	{
		$this->db->insert('customers', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
	}
	
	function addenquiry($data)
	{
		$this->db->insert('enquiries', $data);
	}
	function checkcustomer($no)
	{
		$sql="select * from customers where phone='$no' ";	
	    $result = $this->db->query($sql);
	   if($result && $result->num_rows()>0)
		{
		return $result->row_array();			
		} else {
		return FALSE;	
		}
	}
	
	function pplist()
	{
	    $sql="select * from products where status='1' ";	
	    $result = $this->db->query($sql);	
		return $result->result_array();
	}
	
	function pslist()
	{
	    $sql="select * from services where status='1' ";	
	    $result = $this->db->query($sql);	
		return $result->result_array();
	}
	
	function products($sid)
	{
		$sql="select * from products where seller_id='$sid' and status='1' order by product_id asc";	
	    $result = $this->db->query($sql);	
		return $result->result_array();
	}
	function services($sid)
	{
		$sql="select * from services where seller_id='$sid' and status='1' order by service_id desc";	
	    $result = $this->db->query($sql);	
		return $result->result_array();
	}
	
	function scatlist($cid)
	{
		$sql="select * from subcategories where category_id='$cid' and status='1' and deleted_id='0' order by sort_order asc";	
	    $result = $this->db->query($sql);	
		return $result->result_array();
	}
	function sscatlist($scid)
	{
		$sql="select * from subsubcategories where subcategory_id='$scid' and status='1'  order by sort_order asc";	
	    $result = $this->db->query($sql);	
		return $result->result_array();
	}
	
	function ssprodlist($scid)
	{
		$sql="select * from products where subsubcategory_id='$scid' and status='1' and deleted_id='0' order by sort_order asc";	
	    $result = $this->db->query($sql);	
		return $result->result_array();
	}
	
	function spservices($scid)
	{
		$sql="select * from services where subsubcategory_id='$scid' and status='1' order by sort_order asc";	
	    $result = $this->db->query($sql);	
		return $result->result_array();
	}
	
	function dashboardquote($id)
	{
		 $sql="select e.*,c.* from enquiries as e left join customers as c on c.c_id=e.customer_id where e.seller_id='$id' order by e.en_id desc limit 0,5";	
	   $result = $this->db->query($sql);
	   return $result->result_array();
	}
	
	function prodquotations($id)
	{
	   $sql="select e.*,c.* from enquiries as e left join customers as c on c.c_id=e.customer_id where e.seller_id='$id' and e.service_id='0' order by e.en_id desc";	
	   $result = $this->db->query($sql);
	   return $result->result_array();
	}
	
	function serquotations($id)
	{
	   $sql="select e.*,c.* from enquiries as e left join customers as c on c.c_id=e.customer_id where e.seller_id='$id' and e.product_id='0' order by e.en_id desc";	
	   $result = $this->db->query($sql);
	   return $result->result_array();
	}
	
	function quotationpdetails($id)
	{
	$sql="select e.*,u.*,c.city_name,a.area_name from enquiries as e left join customers as u on u.c_id=e.customer_id left join city as c on c.c_id=u.city left join area as a on a.a_id=u.area where e.en_id='$id' and e.service_id='0' ";	
	   $result = $this->db->query($sql);
	   return $result->row_array();		
	}
	function quotationsdetails($id)
	{
	$sql="select e.*,u.*,c.city_name,a.area_name from enquiries as e left join customers as u on u.c_id=e.customer_id left join city as c on c.c_id=u.city left join area as a on a.a_id=u.area where e.en_id='$id' and e.product_id='0' ";	
	   $result = $this->db->query($sql);
	   return $result->row_array();		
	}
	
	function dashboarcampaigns($id)
	{
		$sql="select * from campaign  where seller_id='$id'   ";	
	   $result = $this->db->query($sql);
	   return $result->result_array();	
	}
	
	function dashboarcities()
	{
		$sql="select * from city where status=1 order by sort_order asc";	
	   $result = $this->db->query($sql);
	   return $result->result_array();	
	}
	
	function totalcust()
	{
		$sql="select c_id from customers where status=1";	
	   $result = $this->db->query($sql);
	   return $result->result_array();	
	}
	
	function addcampaign($data)
	{
		$this->db->insert('campaign', $data);
	}
	
	function dashboardnot($id)
	{
		$sql="select c.*,s.* from campaign as c left join sellers as s on s.s_id=c.seller_id where FIND_IN_SET('$id', c.customers) and c.status=1";	
	   $result = $this->db->query($sql);
	   return $result->result_array();	
	}
	function dashboardpro($id)
	{
		$sql="select e.*,c.city_name,a.area_name from customers as e left join city as c on c.c_id=e.city left join area as a on a.a_id=e.area where e.c_id='$id'";	
	   $result = $this->db->query($sql);
	   return $result->row_array();	
	}
	
	function intrests($id)
	{
		$sql="select * from intrests where customer_id='$id' order by id desc";	
	   $result = $this->db->query($sql);
	   return $result->result_array();	
	}
	
	function editpc($data,$id)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('c_id' => $id);		
		$this->db->where($arr); 
		$this->db->update("customers", $data[0]);
		return TRUE;
		
	}	
	
	function editps($data,$id)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('s_id' => $id);		
		$this->db->where($arr); 
		$this->db->update("sellers", $data[0]);
		return TRUE;
		
	}	
	
	function changepassword($oldpass,$pass,$user)
	{
		$query = $this->db->get_where("customers",array("c_id"=>$user,"password"=>$oldpass));		
		if ($query->num_rows() > 0)
		{
		
		$arr = array('c_id' => $user);		
		$this->db->where($arr); 
		$this->db->update("customers", array("password"=>$pass));
		
	  $sql="select * from customers  where c_id='$user'";	
	     $result = $this->db->query($sql);
	     return $result->row_array();	
		}		
		return FALSE;
	}
	
	function changepassword1($oldpass,$pass,$user)
	{
		$query = $this->db->get_where("sellers",array("s_id"=>$user,"password"=>$oldpass));		
		if ($query->num_rows() > 0)
		{		
		$arr = array('s_id' => $user);		
		$this->db->where($arr); 
		$this->db->update("sellers", array("password"=>$pass));		
	  
		}		
		return FALSE;
	}
	
	function changenumber($num,$pass,$user)
	{
		$query = $this->db->get_where("customers",array("c_id"=>$user,"password"=>$pass));		
		if ($query->num_rows() > 0)
		{
		
		$arr = array('c_id' => $user);		
		$this->db->where($arr); 
		$this->db->update("customers", array("phone"=>$num));
	    $sql="select * from customers  where c_id='$user'";	
	     $result = $this->db->query($sql);
	     return $result->row_array();	
		}		
		return FALSE;
	}
	
	function changenumber1($num,$pass,$user)
	{
		$query = $this->db->get_where("sellers",array("s_id"=>$user,"password"=>$pass));		
		if ($query->num_rows() > 0)
		{
		
		$arr = array('s_id' => $user);		
		$this->db->where($arr); 
		$this->db->update("sellers", array("phone"=>$num));
	  
		}		
		return FALSE;
	}
	
	function credits($id)
	{
		 $sql="select * from sellers  where s_id='$id'";	
	     $result = $this->db->query($sql);
	     return $result->row_array();	
	}
	
	function updatecredits($num,$id)
	{
		 $sql="update sellers set credits=credits-$num  where s_id='$id'";	
	     $result = $this->db->query($sql);
	}
	
	function renew($data,$id)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('s_id' => $id);		
		$this->db->where($arr); 
		$this->db->update("sellers", $data[0]);
		return TRUE;
		
	}	
	
}

?>