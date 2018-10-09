<?php
class Faqs extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/faqs_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }	
	}
	
	public function index()
	{
		
		$data['faqs']=$this->faqs_model->getfaqlist();
		$this->load->view("admin/faq_view",$data);		
	   
	}
	
	public function addfaq()
	{
		if(!(empty($_POST)) && ($_POST['faq_func'] == "add"))
		{			
		    $data=array("faq_name"=>$this->input->post('name'),"description"=>$this->input->post('description'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'));				
			$this->faqs_model->addfaq($data);	
			$this->session->set_flashdata("success_add","Faq Added successfully.");
			redirect(base_url()."admin/faqs","refresh");			
		} else {		
		$this->load->view("admin/faq_add");		
	   }
	}
	public function editfaq($id)
	{
		
		if(!(empty($_POST)) && ($_POST['faq_func'] == "edit"))
		{			
			$data=array("faq_name"=>$this->input->post('name'),"description"=>$this->input->post('description'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'));	
			
			$this->faqs_model->updatefaq($id,$data);	
			$this->session->set_flashdata("success","Faq updated successfully.");			
			redirect(base_url()."admin/faqs","refresh");
			
		} else {			
		 		   
           $data['faq']=$this->faqs_model->getfaq($id);
		   $this->load->view("admin/faq_edit",$data);
			
		}		
	}
	
	
	
	
	public function deletefaq($bid)
	{
				
		$this->faqs_model->deletefaq($bid);
		$this->session->set_flashdata("success", "Faq deleted successfully.");
		redirect(base_url()."admin/faqs","refresh");			
	}

	
	
}
?>