<?php
class Coupons extends CI_Controller
{
	function __construct()
	{
		parent::__construct();	
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/coupons_model');
				
		$isLoggedIn = $this->session->userdata('isLoggedIn');        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }        
	}
	
	public function index()
	{		
      	$data['coupons']=$this->coupons_model->getcouponlist();
		$this->load->view("admin/coupons_view",$data);
		
	}
	
	public function addcoupon()
	{		
		
		if(!(empty($_POST)) && ($_POST['coupon_func'] == "add"))
		{
						   
			$data=array("coupon_code"=>$this->input->post('code'),"coupon_type"=>$this->input->post('type'),"coupon_value"=>$this->input->post('value'),"coupon_status"=>$this->input->post('status'),"coupon_expiry_date"=>$this->input->post('expiry_date'));
				
			$this->coupons_model->addcoupon($data);	
			$this->session->set_flashdata("success_add","Coupon Added successfully.");
			redirect(base_url()."admin/coupons","refresh");
			
		} else {	
	      
	       $this->load->view("admin/coupon_add");	 
		}
		
	}
	
	public function editcoupon($id)
	{
	  
	   if(!(empty($_POST)) && ($_POST['coupon_func'] == "edit"))
		{				
			
		  
	$data=array("coupon_code"=>$this->input->post('code'),"coupon_type"=>$this->input->post('type'),"coupon_value"=>$this->input->post('value'),"coupon_status"=>$this->input->post('status'),"coupon_expiry_date"=>$this->input->post('expiry_date'));
				
			
			$this->coupons_model->updatecoupon($id,$data);	
			$this->session->set_flashdata("success","Coupon updated successfully.");
			redirect(base_url()."admin/coupons","refresh");
			
		} else {			

		   $data['coupon']=$this->coupons_model->getcoupon($id);		   
		   $this->load->view("admin/coupon_edit",$data);
			
		}
		
	}
	
	public function deletecoupon($pid)
	{			
		
		$this->coupons_model->deletecoupon($pid);
		$this->session->set_flashdata("info", "Coupon deleted successfully.");
		redirect(base_url()."admin/coupons","refresh");			
	}
	
	
	 
	
}
?>