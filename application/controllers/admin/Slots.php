<?php
class Slots extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/slots_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }	
	}
	
	public function index()
	{
		if(!(empty($_POST)) && ($_POST['slot_func'] == "add"))
		{			
		    $name=implode(" - ",$this->input->post('name'));
			$check=$this->slots_model->checkDuplicate($name);
			if($check==TRUE)
			{
		    $data=array("slot_name"=>$name,"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'));				
			$this->slots_model->addslot($data);	
			$this->session->set_flashdata("success_add","Slot Added successfully.");
			redirect(base_url()."admin/slots","refresh");
			} else {
				
			$this->session->set_flashdata("success_add","Slot Already Exists.");
			redirect(base_url()."admin/slots","refresh");
				
			}
			
		} else {
		$data['cities']=$this->slots_model->getslotlist();
		$this->load->view("admin/slot_view",$data);		
	   }
	}	
		
	public function editslot($id)
	{
		
	 if(!(empty($_POST)) && ($_POST['slot_func'] == "edit"))
	 {		
	     $name=implode(" - ",$this->input->post('name'));
	  $data=array("slot_name"=>$name,"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'));	
			
		$this->slots_model->updateslot($id,$data);	
		$this->session->set_flashdata("success","Slot updated successfully.");			
		redirect(base_url()."admin/slots","refresh");
			
		} else {			
		 		   
           $data['brand']=$this->slots_model->getslot($id);
		   $this->load->view("admin/slot_edit",$data);			
		}		
	}
	
		
	public function deleteslot($bid)
	{				
	$this->slots_model->deleteslot($bid);
	$this->session->set_flashdata("success", "Slot deleted successfully.");
	redirect(base_url()."admin/slots","refresh");			
	}

	
}
?>