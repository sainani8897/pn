<?php
class Express extends CI_Controller 
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
				$data=array("start"=>$this->input->post('from_time'),"end"=>$this->input->post('to_time'));
				
			$this->pages_model->editexpress($data);	
			$this->session->set_flashdata("success","Express Delivery Updated successfully.");
		    redirect(base_url()."admin/express/","refresh");
		} else {
		$data['express']=$this->pages_model->express();
		$this->load->view("admin/edit_express",$data);
		}
		
	}
	
	
		
}
?>