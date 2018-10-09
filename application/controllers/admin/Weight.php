<?php
class Weight extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/weight_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }	
	}
	
	public function index()
	{
		if(!(empty($_POST)) && ($_POST['weight_func'] == "add"))
		{			
		
		    $check=$this->weight_model->checkDuplicate($this->input->post('name'));
			if($check==TRUE)
			{
		    $data=array("weight"=>$this->input->post('name'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'));				
			$this->weight_model->addweight($data);	
			$this->session->set_flashdata("success_add","Weight Added successfully.");
			redirect(base_url()."admin/weight","refresh");	
			} else {
			$this->session->set_flashdata("success_add","Weight Already Exists.");
			redirect(base_url()."admin/weight","refresh");		
			}
		} else {
		$data['weights']=$this->weight_model->getweightlist();
		$this->load->view("admin/weight_view",$data);		
	   }
	}	
	
	
	public function editweight($id)
	{
		
		if(!(empty($_POST)) && ($_POST['weight_func'] == "edit"))
		{			
			
		    $data=array("weight"=>$this->input->post('name'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'));	
			
			$this->weight_model->updateweigh($id,$data);	
			$this->session->set_flashdata("success","Weight updated successfully.");			
			redirect(base_url()."admin/weight","refresh");
			
		} else {			
		 		   
           $data['weight']=$this->weight_model->getweigh($id);
		   $this->load->view("admin/weight_edit",$data);
			
		}		
	}
	
	
	
	
	public function deleteweight($bid)
	{
				
		$this->weight_model->deleteweight($bid);
		$this->session->set_flashdata("success", "Weight deleted successfully.");
		redirect(base_url()."admin/weight","refresh");			
	}

	
	
}
?>