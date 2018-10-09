<?php
class Newsletter extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/newsletter_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }	
	}
	
	public function index()
	{
		
		$data['newsletter']=$this->newsletter_model->getnewsletterlist();
		$this->load->view("admin/newsletter_view",$data);		
	   
	}
	
	
	
	
}
?>