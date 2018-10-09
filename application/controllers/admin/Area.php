<?php
class Area extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/area_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }	
	}
	
	public function index()
	{
		if(!(empty($_POST)) && ($_POST['area_func'] == "add"))
		{			
		
		    $check=$this->area_model->checkDuplicate($this->input->post('name'));
			if($check==TRUE){
		    $data=array("area_name"=>$this->input->post('name'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'),"city_id"=>$this->input->post('city'));				
			$this->area_model->addarea($data);	
			$this->session->set_flashdata("success_add","Area Added successfully.");
			redirect(base_url()."admin/area","refresh");	
			} else {
			$this->session->set_flashdata("success_add","Area Already Exists.");
			redirect(base_url()."admin/area","refresh");		
			}		
		} else {
		$data['areas']=$this->area_model->getarealist();
		$data['cities']=$this->area_model->getcitylist();
		$this->load->view("admin/area_view",$data);		
	   }
	}	
		
	public function editarea($id)
	{
		
	 if(!(empty($_POST)) && ($_POST['area_func'] == "edit"))
	 {			
		$data=array("area_name"=>$this->input->post('name'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'),"city_id"=>$this->input->post('city'));	
			
		$this->area_model->updatearea($id,$data);	
		$this->session->set_flashdata("success","Area updated successfully.");			
		redirect(base_url()."admin/area","refresh");
			
		} else {			
		 	$data['cities']=$this->area_model->getcitylist();	   
           $data['area']=$this->area_model->getarea($id);
		   $this->load->view("admin/area_edit",$data);			
		}		
	}
	
		
	public function deletearea($bid)
	{				
	$this->area_model->deletearea($bid);
	$this->session->set_flashdata("success", "Area deleted successfully.");
	redirect(base_url()."admin/area","refresh");			
	}

	
}
?>