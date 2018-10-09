<?php
class Testimonials extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/testimonials_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }	
	}
	
	public function index()
	{
		
		$data['faqs']=$this->testimonials_model->gettestlist();
		$this->load->view("admin/test_view",$data);		
	   
	}
	
	public function addtestimonials()
	{
		if(!(empty($_POST)) && ($_POST['test_func'] == "add"))
		{			
		      $imgup=$this->uploadProductFiles($_FILES);
		    $data=array("name"=>$this->input->post('name'),"description"=>$this->input->post('description'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'),"location"=>$this->input->post('location'),"test_date"=>$this->input->post('date'),"image"=>$this->posteddata['image']);				
			$this->testimonials_model->addtestimonials($data);	
			$this->session->set_flashdata("success_add","Testimonials Added successfully.");
			redirect(base_url()."admin/testimonials","refresh");			
		} else {		
		$this->load->view("admin/test_add");		
	   }
	}
	public function edittestimonials($id)
	{
		
		if(!(empty($_POST)) && ($_POST['test_func'] == "edit"))
		{			
		    $imgup=$this->uploadProductFiles($_FILES);
		    if($this->posteddata['image']!="")
			{
			$data=array("name"=>$this->input->post('name'),"description"=>$this->input->post('description'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'),"location"=>$this->input->post('location'),"test_date"=>$this->input->post('date'),"image"=>$this->posteddata['image']);	
			} else {
			$data=array("name"=>$this->input->post('name'),"description"=>$this->input->post('description'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'),"location"=>$this->input->post('location'),"test_date"=>$this->input->post('date'));
			}
			
			$this->testimonials_model->updatetestimonials($id,$data);	
			$this->session->set_flashdata("success","Testimonials updated successfully.");			
			redirect(base_url()."admin/testimonials","refresh");
			
		} else {			
		 		   
           $data['faq']=$this->testimonials_model->gettestimonials($id);
		   $this->load->view("admin/test_edit",$data);
			
		}		
	}
	
	
	
	
	public function deletetestimonials($bid)
	{
				
		$this->testimonials_model->deletetestimonials($bid);
		$this->session->set_flashdata("success", "Testimonials deleted successfully.");
		redirect(base_url()."admin/testimonials","refresh");			
	}

	private function uploadProductFiles($files)
	{
		$config['upload_path'] = './uploads/products/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg ';
		
			if(isset($files["image"]))
			{				
				$config['file_name']  = "test_".strtotime(date('Y-m-d H:i:s'));	
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload("image"))
				{
					$error = array('info' => $this->upload->display_errors());
					$this->session->set_flashdata("error", $this->upload->display_errors());			
					$this->posteddata["image"] = "";
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
				//	echo "<pre>";print_r($data);die;
				//	base_url()."images/uploads/categories/".$data['upload_data']['file_name'];
					$config['image_library'] = 'gd2';
                    $config['source_image'] = $data['upload_data']['full_path']; //get original image
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 150;
                    $config['height'] = 150;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }
					$img_url = "uploads/products/".$data['upload_data']['file_name'];
										
					$this->posteddata["image"] = $img_url;
				}				
			}
			else
			{
				$this->posteddata["image"] = "";
			}			
		
	}
	
}
?>