<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Executives extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/executives_model');
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
	}

	public function index()
	{		       
	    $data['executives']=$this->executives_model->getexcutiveslist();
		$this->load->view('admin/executives_view',$data);
	}
	
	public function addexecutive()
	{
		
		
		if(!(empty($_POST)) && ($_POST['executive_func'] == "add"))
		{
			
			$imgup=$this->uploadCategoryFiles($_FILES);
			$data=array("first_name"=>$this->input->post('fname'),"last_name"=>$this->input->post('lname'),"email"=>$this->input->post('email'),"phone"=>$this->input->post('phone'),"alt_phone"=>$this->input->post('altphone'),"code"=>$this->input->post('code'),"status"=>$this->input->post('status'),"id_proof"=>$this->posteddata['image'],"address_proof"=>$this->posteddata['image1']);
				
			$this->executives_model->addexecutive($data);	
			$this->session->set_flashdata("success_add","Executive Added successfully.");
			redirect(base_url()."admin/executives","refresh");
			
		} else {			
			
			$this->load->view("admin/executive_add");
		}
	}
	
	public function editexecutive($id)
	{
				
		if(!(empty($_POST)) && ($_POST['executive_func'] == "edit"))
		{		
			
			$imgup=$this->uploadCategoryFiles($_FILES);
			
			if($this->posteddata['image']!="" && $this->posteddata['image1']!=""){
				$data=array("first_name"=>$this->input->post('fname'),"last_name"=>$this->input->post('lname'),"email"=>$this->input->post('email'),"phone"=>$this->input->post('phone'),"alt_phone"=>$this->input->post('altphone'),"code"=>$this->input->post('code'),"status"=>$this->input->post('status'),"id_proof"=>$this->posteddata['image'],"address_proof"=>$this->posteddata['image1']);
			} else if($this->posteddata['image']!="")
			{
				$data=array("first_name"=>$this->input->post('fname'),"last_name"=>$this->input->post('lname'),"email"=>$this->input->post('email'),"phone"=>$this->input->post('phone'),"alt_phone"=>$this->input->post('altphone'),"code"=>$this->input->post('code'),"status"=>$this->input->post('status'),"id_proof"=>$this->posteddata['image']);
			}else if($this->posteddata['image1']!="")
			{ $data=array("first_name"=>$this->input->post('fname'),"last_name"=>$this->input->post('lname'),"email"=>$this->input->post('email'),"phone"=>$this->input->post('phone'),"alt_phone"=>$this->input->post('altphone'),"code"=>$this->input->post('code'),"status"=>$this->input->post('status'),"address_proof"=>$this->posteddata['image1']);
			} else {
				
			$data=array("first_name"=>$this->input->post('fname'),"last_name"=>$this->input->post('lname'),"email"=>$this->input->post('email'),"phone"=>$this->input->post('phone'),"alt_phone"=>$this->input->post('altphone'),"code"=>$this->input->post('code'),"status"=>$this->input->post('status'));	
			}
			
				
			$this->executives_model->editexecutive($id,$data);	
			$this->session->set_flashdata("success","Executive Updated successfully.");
			redirect(base_url()."admin/executives","refresh");
			
		} else {
			
			$data['executive']=$this->executives_model->getexecutive($id);			
			$this->load->view("admin/executive_edit",$data);
		}
	}
	
	
	
	private function uploadCategoryFiles($files)
	{
		$config['upload_path'] = './uploads/executives/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			if(isset($files["id_proof"]))
			{			
				$config['file_name']  = "executive_".strtotime(date('Y-m-d H:i:s'));	
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload("id_proof"))
				{
					$error = array('info' => $this->upload->display_errors());
					$this->session->set_flashdata("error", $this->upload->display_errors());			
					$this->posteddata["image"] ="";
				} else {
					
					$data = array('upload_data' => $this->upload->data());
					$config['image_library'] = 'gd2';
                    $config['source_image'] = $data['upload_data']['full_path']; //get original image
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 550;
                    $config['height'] = 550;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }						
					$img_url = "uploads/executives/".$data['upload_data']['file_name'];										
					$this->posteddata["image"] = $img_url;
				}				
			} else{
				
				$this->posteddata["image"] = "";
			}		
			
			
			if(isset($files["address_proof"]))
			{			
				$config['file_name']  = "executive_".strtotime(date('Y-m-d H:i:s'));	
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload("address_proof"))
				{
					$error = array('info' => $this->upload->display_errors());
					$this->session->set_flashdata("error", $this->upload->display_errors());			
					$this->posteddata["image1"] ="";
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
				    $config['image_library'] = 'gd2';
                    $config['source_image'] = $data['upload_data']['full_path']; //get original image
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 550;
                    $config['height'] = 550;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }		
					$img_url ="uploads/executives/".$data['upload_data']['file_name'];										
					$this->posteddata["image1"] = $img_url;
				}				
			}
			else
			{
				$this->posteddata["image1"] = "";
			}				
		
	}
	
	
	public function deleteexecutive($id)
	{
		$this->executives_model->deleteexecutive($id);
		$this->session->set_flashdata("info", "Executive deleted successfully.");
		redirect(base_url()."admin/executives","refresh");	
	}
	
	
}
