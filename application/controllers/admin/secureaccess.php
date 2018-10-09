<?php
class SecureAccess extends CI_Controller
{
	protected $userData = "";
	protected $cur_date_time = "";
	public $dateTimeFormat = "d-m-Y H:i:s a";
	public $dateFormat = "d-m-Y";
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');			
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('date');		
		$this->load->model("admin/secure_model");		
		$this->cur_date_time = date("Y-m-d H:i:s",gmt_to_local(time(),"UP45"));	//	echo $this->cur_date_time;die;
		$this->userData = $this->checkLogin();
	}	
	protected function checkLogin()
	{
		$userData = $this->checkconditions();		
		if($userData)
		{
			return $userData;
		}
		if(isset($this->isLogin) && $this->isLogin)
		{
			return FALSE;
		}
		$this->backtologin();
	}
	
	/**
	* This function contains any operation when login fails
	*/
	protected function backtologin()
	{
		$this->session->sess_destroy();
		redirect(base_url()."admin/login","refresh");
	}
	
	protected function checkconditions()
	{
		$getData = $this->input->cookie("ecomm_adminData");		
		if($getData)
		{
			$this->session->set_userdata(unserialize(base64_decode($getData)));
		}		
		if($this->session->userdata("username") || isset($_POST['username']))
		{
			$userData = (isset($_POST['username']))? $_POST : $this->session->userdata;
			$username = $userData['username'];
			$password = $userData['password'];
			$remember = isset($userData['remember'])?$userData['remember'] : "off";
			$checkDB = $this->secure_model->checklogindetails($username,$password);	
			
			
					
			
			if($checkDB != FALSE)
			{
				if(isset($_POST['username']))
				{
					$_POST["remember"] = $remember;
					//session expires after 30 days if remember me is selected 30 * 3600 = 108000
					if($remember == "off")$this->session->sess_expiration = "7200";					
					else 
					{ 
						$cookie = array(
						    'name'   => 'adminData',
						    'value'  => base64_encode(serialize(array_merge($checkDB[0],$_POST))),
						    'expire' => '108000',
						    'domain' => '',
						    'path'   => '/',
						    'prefix' => 'ecomm_',
						    'secure' => FALSE
						);
						$this->input->set_cookie($cookie);					
					}
					$dateandtime=date("Y-m-d H:i:s");
					$this->secure_model->updateadmin($dateandtime);
					$this->session->set_userdata($checkDB[0]);
					$this->session->set_userdata($_POST);
				/*	$this->load->model("admin/usertype_model");
					$usertypes["user_types"] = $this->usertype_model->getadminUsers();
					$this->session->set_userdata($usertypes); */
				}
				$usertypes = $this->secure_model->checkusertype($this->uri->segment_array(),$checkDB);
			//	echo "<pre>";print_r($usertypes);die;
				if(!(empty($usertypes)))
				{
					$this->session->set_userdata($usertypes);
					$checkDB[] = $usertypes;
					return $checkDB;
				}
			}			
		}		
		return FALSE;
	}
	
	protected function sendSMS($to,$msg){
		
		$curl = curl_init();
		$url = "http://speed.igrandsms.in/websms/sendsms.aspx";
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt ($curl, CURLOPT_POST, 1);
		$post_params = "userid=igdemo&password=IgDemo@2017&sender=IGrand&mobileno=".$to."&msg=".$msg;
		curl_setopt ($curl, CURLOPT_POSTFIELDS, $post_params);
		//curl_setopt ($curl, CURLOPT_COOKIEJAR, '/tmp/sms_cookie.txt');
		curl_setopt ($curl, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec ($curl);
		
		return $result;
	
	}
		
}
?>