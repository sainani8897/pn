<?php
class Reviews extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/reviews_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }	
	}
	
	public function view($pid)
	{
		
		$data['reviews']=$this->reviews_model->getreviewslist($pid);
		$data['pid']=$pid;
		$this->load->view("admin/reviews_view",$data);		
	   
	}
	
	public function addreview()
	{
		if(!(empty($_POST)) && ($_POST['review_func'] == "add"))
		{			
		    $data=array("name"=>$this->input->post('name'),"description"=>$this->input->post('description'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'),"rating"=>$this->input->post('score'));				
			$this->reviews_model->addreview($data);	
			$this->session->set_flashdata("success_add","Review Added successfully.");
			redirect(base_url()."admin/reviews","refresh");			
		} else {		
		$this->load->view("admin/review_add");		
	   }
	}
	public function editreview($id)
	{
		
		if(!(empty($_POST)) && ($_POST['review_func'] == "edit"))
		{			
			 $data=array("name"=>$this->input->post('name'),"description"=>$this->input->post('description'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'),"rating"=>$this->input->post('score'));	
			
			$this->reviews_model->updatereview($id,$data);	
			$this->session->set_flashdata("success","Review updated successfully.");			
			redirect(base_url()."admin/reviews/view/".$this->input->post('pid')."","refresh");
			
		} else {			
		 		   
           $data['review']=$this->reviews_model->getreview($id);
		   $this->load->view("admin/review_edit",$data);
			
		}		
	}
	
		
	public function deletereview($bid)
	{
		$ids=explode("-",$bid);
				
		$this->reviews_model->deletereview($ids[0]);
		$this->session->set_flashdata("success", "Review deleted successfully.");
		redirect(base_url()."admin/reviews/view/".$ids[1]."","refresh");			
	}

	
	
}
?>