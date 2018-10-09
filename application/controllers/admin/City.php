<?php
class City extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/city_model");	
		$this->load->model("admin/state_model");
		$isLoggedIn = $this->session->userdata('isLoggedIn');      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }	
	}
	
	public function index()
	{
		if(!(empty($_POST)) && ($_POST['city_func'] == "add"))
		{			
		
		    $check=$this->city_model->checkDuplicate($this->input->post('name'));
			if($check==TRUE)
			{
		    $data=array("city_name"=>$this->input->post('name'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'),"state_id"=>$_POST['state']);				
			$this->city_model->addbcity($data);	
			$this->session->set_flashdata("success_add","City Added successfully.");
			redirect(base_url()."admin/city","refresh");	
			} else {
			$this->session->set_flashdata("success_add","City Already Exists.");
			redirect(base_url()."admin/city","refresh");		
			}
		} else {
		$data['states']=$this->state_model->getstatelist();
		$data['cities']=$this->city_model->getcitylist();
		$this->load->view("admin/city_view",$data);		
	   }
	}	
	
	
	public function editcity($id)
	{
		
		if(!(empty($_POST)) && ($_POST['brand_func'] == "edit"))
		{			
			
		    $data=array("city_name"=>$this->input->post('name'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'),"state_id"=>$_POST['state']);	
			
			$this->city_model->updatecity($id,$data);	
			$this->session->set_flashdata("success","City updated successfully.");			
			redirect(base_url()."admin/city","refresh");
			
		} else {			
		 	$data['states']=$this->state_model->getstatelist();	   
           $data['brand']=$this->city_model->getcity($id);
		   $this->load->view("admin/city_edit",$data);
			
		}		
	}
	
	
	
	
	public function deletecity($bid)
	{
				
		$this->city_model->deletecity($bid);
		$this->session->set_flashdata("success", "City deleted successfully.");
		redirect(base_url()."admin/city","refresh");			
	}

	
	
}
?>