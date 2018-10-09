<?php
class State extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/state_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }	
	}
	
	public function index()
	{
		if(!(empty($_POST)) && ($_POST['state_func'] == "add"))
		{			
		
		    $check=$this->state_model->checkDuplicate($this->input->post('name'));
			if($check==TRUE)
			{
		    $data=array("state_name"=>$this->input->post('name'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'));				
			$this->state_model->addbcity($data);	
			$this->session->set_flashdata("success_add","State Added successfully.");
			redirect(base_url()."admin/state","refresh");	
			} else {
			$this->session->set_flashdata("success_add","State Already Exists.");
			redirect(base_url()."admin/state","refresh");		
			}
		} else {
		$data['states']=$this->state_model->getstatelist();
		$this->load->view("admin/state_view",$data);		
	   }
	}	
	
	
	public function editstate($id)
	{
		
		if(!(empty($_POST)) && ($_POST['state_func'] == "edit"))
		{			
			
		    $data=array("state_name"=>$this->input->post('name'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'));	
			
			$this->state_model->updatestate($id,$data);	
			$this->session->set_flashdata("success","State updated successfully.");			
			redirect(base_url()."admin/state","refresh");
			
		} else {			
		 		   
           $data['state']=$this->state_model->getstate($id);
		   $this->load->view("admin/state_edit",$data);
			
		}		
	}
	
	
	
	
	public function deletestate($bid)
	{
				
		$this->state_model->deletestate($bid);
		$this->session->set_flashdata("success", "State deleted successfully.");
		redirect(base_url()."admin/state","refresh");			
	}

	
	
}
?>