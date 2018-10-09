<?php
class Dashboard extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();	
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/login_model');
	}
	public function index()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
        
       
		//$data['oObj'] = $this;
		//$data['orderslist']= $this->login_model->orderslist();
		//$data['newusers'] = $this->login_model->new_users_no();
		//$data['neworders'] = $this->login_model->new_orders_no();
		//$data['newproducts'] = $this->login_model->new_products_no();
		//$data['newexcutives'] = $this->login_model->new_excutives_no();
		//$data['userlist']= $this->login_model->userlist();
		$data="";
		$settings = $this->login_model->settings();
		
		
		$this->session->set_userdata('settings_admin',$settings);
		
		$this->load->view("admin/dashboard_view",$data);
		//print_r($data);	
		//$this->load->view("admin/includes/admin_header",$data);	
		
		//$this->load->view("admin/includes/admin_footer");
	}
}
?>