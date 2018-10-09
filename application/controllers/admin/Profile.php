<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller 
{	
	public $isLogin = TRUE;
	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('session');		
		$this->load->library('form_validation');
	}
	public function index()
	{	
       
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
		
		$this->load->view("admin/includes/header");
		$this->load->view("admin/includes/leftside");
		$this->load->view("admin/profile_view");
	}
	
	
	
	
	
}
?>