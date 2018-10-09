<?php
class Charges extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/pages_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');
      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }	
	}
	public function index()
	{
		if(!(empty($_POST)) && ($_POST['page_func'] == "edit"))
		{
				$data=array("order_amount"=>$this->input->post('order_amount'),"normal_delivery"=>$this->input->post('normal_delivery'),"express_delivery"=>$this->input->post('express_delivery'));
				
			$this->pages_model->editcharges($data);	
			$this->session->set_flashdata("success","Delivery Charges Updated successfully.");
		    redirect(base_url()."admin/charges/","refresh");
		} else {
		$data['express']=$this->pages_model->charges();
		$this->load->view("admin/edit_charges",$data);
		}
		
	}
	
	
		
}
?>