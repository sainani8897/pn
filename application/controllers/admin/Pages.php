<?php
class Pages extends CI_Controller 
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
		
		$data['pages']=$this->pages_model->getpagelist();
		$this->load->view("admin/pages_view",$data);
		
	}
	
	public function editpage($id)
	{
		
		if(!(empty($_POST)) && ($_POST['page_func'] == "edit"))
		{
				
		   	$data=array("meta_title"=>$this->input->post('meta_title'),"meta_keywords"=>$this->input->post('meta_keywords'),"meta_description"=>$this->input->post('meta_description'),"description"=>$this->input->post('description'));
				
			$this->pages_model->editpage($data,$id);	
			$this->session->set_flashdata("success","Page Updated successfully.");
		    redirect(base_url()."admin/pages/editpage/".$id."","refresh");
			
			
		} else {		
	
		$data['page']=$this->pages_model->getpage($id);
		$this->load->view("admin/pages_edit",$data);
			
		}     	
		
	}
		
}
?>