<?php
class Verify extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','cookie'));	
		$this->load->library('session');	
		$this->load->model('admin/login_model');	
	}
	function index()
	{   
	   if($this->session->userdata('userId')==NULL)
	   {
		   redirect(base_url()."admin/login","refresh");
		   
	   } else {
		   
		$this->load->view('admin/verification');
		
	   }
		
	}
	
	
	function check()
	{
		if($this->session->userdata('otp')==$this->input->post('otp'))
		{
			$this->session->set_userdata('isLoggedIn','TRUE');
			$dateandtime=date("Y-m-d H:i:s");
			$ip=$_SERVER['REMOTE_ADDR'];
			$this->login_model->updateadmin($dateandtime,$this->session->userdata('userId'),$ip);
			redirect(base_url()."admin/dashboard","refresh");
			
		} else {
			
			$this->session->set_flashdata('error','Your Enter Wrong OTP');
			redirect(base_url()."admin/verify","refresh");
		}
		
	}
}
?>