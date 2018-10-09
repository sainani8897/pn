<?php
class Addresstype extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/addresstype_model");	
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
		
		    $check=$this->addresstype_model->checkDuplicate($this->input->post('name'));
			if($check==TRUE)
			{
		    $data=array("name"=>$this->input->post('name'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'));				
			$this->addresstype_model->addtype($data);	
			$this->session->set_flashdata("success_add","Address Type Added successfully.");
			redirect(base_url()."admin/addresstype","refresh");	
			} else {
			$this->session->set_flashdata("success_add","Address Type Already Exists.");
			redirect(base_url()."admin/addresstype","refresh");		
			}
		} else {
		$data['states']=$this->addresstype_model->gettypelist();
		$this->load->view("admin/addresstype_view",$data);		
	   }
	}	
	
	
	public function edittype($id)
	{
		
		if(!(empty($_POST)) && ($_POST['state_func'] == "edit"))
		{			
			
		    $data=array("name"=>$this->input->post('name'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'));	
			
			$this->addresstype_model->updatetype($id,$data);	
			$this->session->set_flashdata("success","Address Type updated successfully.");			
			redirect(base_url()."admin/addresstype","refresh");
			
		} else {			
		 		   
           $data['state']=$this->addresstype_model->getaddrtype($id);
		   $this->load->view("admin/addresstype_edit",$data);
			
		}		
	}
	
	
	
	
	public function deletetype($bid)
	{
				
		$this->addresstype_model->deletetype($bid);
		$this->session->set_flashdata("success", "Address Type deleted successfully.");
		redirect(base_url()."admin/addresstype","refresh");			
	}

	
	
}
?>