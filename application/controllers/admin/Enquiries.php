<?php
class Enquiries extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/enquiries_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }	
	}
	
	public function index()
	{
		
		$data['enquiries']=$this->enquiries_model->getenquirieslist();
		$this->load->view("admin/enquiries_view",$data);		
	   
	}
	
	
	
	
}
?>