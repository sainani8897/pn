<?php
class Secure_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function checklogindetails($username,$password)
	{
		$query = $this->db->get_where("backend_users",array("admin_email"=>$username,"admin_password"=>$password));		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}		
		return FALSE;
	}
	
	function getAlluserTypes()
	{
		$query = $this->db->get("backend_usertype");
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}		
		return FALSE;
	}
	
	function checkusertype($link,$cur_user)
	{	
		$str_link = "";foreach($link as $eachlink)
		{ 
			$str_link .= $eachlink."/";
		}
		if(isset($link[2]))$str_link = $link[2];
		else $str_link = "";
//		echo $str_link;
	//	$user_types = $this->getAlluserTypes();
		$extrawhere = "";
		if($str_link != "login")
		{
		//	$extrawhere = " AND ( allowed_links = '*' OR allowed_links = 'login' OR FIND_IN_SET('".$str_link."',allowed_links))";
		}	
		$sql = "SELECT * FROM backend_usertype 
				WHERE user_type_id = '".$cur_user[0]['user_type']."' ".$extrawhere;		
	//	echo $sql;die;						
		$query = $this->db->query($sql);
	//	echo "<pre>"; print_r($query->result_array());die;
		if ($query->num_rows() > 0)
		{
			$data = $query->result_array();
		//	echo $str_link;echo "  ".$data[0]["allowed_links"];
			if(in_array($str_link,explode(",",$data[0]["allowed_links"])) || $str_link == "login" || $str_link == "" || $data[0]["allowed_links"] == "*")
			{
				return array("display_name"=>$data[0]['user_type_dpname'],"allowedmodules"=>$data[0]['allowed_links']);
			}			
		}		
		return FALSE;
	}
	
	public function checkfrontendUser($username,$passwd)
	{
		$sql = "
			SELECT * FROM ".DBPREFIX."_users
			WHERE (
						`userid` = '".$username."'
						OR
						`email` = '".$username."'
				  )
				  AND `password` = '".$passwd."'
		";		
		$result = $this->db->query($sql);
		if ($result->num_rows() > 0)
		{
			return $result->result_array();
		}		
		return FALSE;
	}
	
	public function new_users_no()
	{
	   $sql="select * from users";	
	   $result = $this->db->query($sql);
	   return $result->num_rows();
	}
	
	public function updateadmin($time)
	{
		$sql="update backend_users set last_login='$time' where admin_id=1";
		 $result = $this->db->query($sql);
		 
	}
}
?>