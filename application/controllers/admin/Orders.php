<?php
class Orders extends CI_Controller
{
	function __construct()
	{
		parent::__construct();	
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/category_model');
		$this->load->model('admin/subcategory_model');
		$this->load->model('admin/vendors_model');
		$this->load->model('admin/products_model');
		$this->load->model('admin/orders_model');
		$this->load->model('admin/executives_model');
		
		$isLoggedIn = $this->session->userdata('isLoggedIn');        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
        
	}
	public function index()
	{
		
      
		$data['orders']=$this->orders_model->getorderslist();
          
		$this->load->view("admin/orders_view",$data);
		
	}
	
	public function details($oid)
	{ 
	    
		if(!(empty($_POST)) && ($_POST['order_func'] == "change"))
		{
			$data=array("order_status"=>$this->input->post('order_status'),"excutive_id"=>$this->input->post('executive'));
			$this->orders_model->changeorderstatus($oid,$data);
			$this->session->set_flashdata("success_add","Order Updated successfully.");
		$mesg="Your Order :'RTD".$oid."' changed to '".$this->input->post('order_status')."'";			
		$result=$this->sendSMS($this->input->post('phone'),$mesg);
			redirect(base_url()."admin/orders/details/".$oid."","refresh");
			
		} else {
			
		$data['orderdetails']=$this->orders_model->getorderdetails($oid);
		$data['userdetails']=$this->orders_model->getuserdetails($oid);	    		
		$data['executives']=$this->executives_model->getexcutiveslist();
		$data['oid']=$oid;
		$this->load->view("admin/order_details",$data);
		
		}
	}
	public function order_status()
	{
		$data=array("order_status"=>$this->input->post('status'));
		$this->orders_model->changeorderstatus($this->input->post('oid'),$data);
		return "ok";
	}
	
	public function executive_change()
	{
		$data=array("excutive_id"=>$this->input->post('excutive'));
		$this->orders_model->changeorderstatus($this->input->post('oid'),$data);
		return "ok";
	}
	
	public function deleteorder($oid)
	{
		
		$deleteUser = array("deleted_id"=>$this->session->userdata('userId'),"deleted_date"=>date('Y-m-d H:i:s'),"is_deleted"=>'1');
		
		$this->orders_model->deleteorder($oid,$deleteUser);
		$this->session->set_flashdata("info", "Order deleted successfully.");
		redirect(base_url()."admin/orders","refresh");			
	}
	
	protected function sendSMS($to,$msg)
	{
		
		$curl = curl_init();
		$url = "http://speed.igrandsms.in/websms/sendsms.aspx";
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt ($curl, CURLOPT_POST, 1);
		$post_params = "userid=chotuonline&password=chotu247&sender=RTDOOR&mobileno=".$to."&msg=".$msg;
		curl_setopt ($curl, CURLOPT_POSTFIELDS, $post_params);
		//curl_setopt ($curl, CURLOPT_COOKIEJAR, '/tmp/sms_cookie.txt');
		curl_setopt ($curl, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec ($curl);		
		return $result;
	
	}
	 
	
}
?>