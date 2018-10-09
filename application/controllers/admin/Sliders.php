<?php
class Sliders extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/sliders_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');
      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }	
	}
	public function index()
	{
		$data['sliders']=$this->sliders_model->getsliderlist();

		$this->load->view("admin/sliders_view",$data);
	}
	
	public function addslider()
	{
	
	if(!(empty($_POST)) && ($_POST['slider_func'] == "add"))
		{
			
			$imgup=$this->uploadCategoryFiles($_FILES);
		   
			$data=array("name"=>$this->input->post('name'),"link"=>$this->input->post('link'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'),"image"=>$this->posteddata['image']);
				
			$this->sliders_model->addslider($data);	
			$this->session->set_flashdata("success_add","Slider Added successfully.");
			redirect(base_url()."admin/sliders","refresh");
			
		} else {
		
	
		$this->load->view("admin/slider_add");
			
		}     	
	}
	
	
	public function editslider($id)
	{
		
		if(!(empty($_POST)) && ($_POST['slider_func'] == "edit"))
		{
			
			$imgup=$this->uploadCategoryFiles($_FILES);
			
		    if($this->posteddata['image']!="")
			{				
			$data=array("name"=>$this->input->post('name'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'),"link"=>$this->input->post('link'),"image"=>$this->posteddata['image']);
		} else {
			$data=array("name"=>$this->input->post('name'),"link"=>$this->input->post('link'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'));			
		}
			
			$this->sliders_model->updateslider($id,$data);	
			$this->session->set_flashdata("success","Slider updated successfully.");
			
			redirect(base_url()."admin/sliders","refresh");
			
		} else {
			
		 		   
           $data['slider']=$this->sliders_model->getslider($id);
		   $this->load->view("admin/slider_edit",$data);
			
		}
		
	}
	
	
	private function uploadCategoryFiles($files)
	{
		$config['upload_path'] = './uploads/sliders/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			if(isset($files["image"]))
			{				
				$config['file_name']  = "brand_".strtotime(date('Y-m-d H:i:s'));	
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
					$config['image_library'] = 'gd2';
                    $config['source_image'] = $data['upload_data']['full_path']; //get original image
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 1400;
                    $config['height'] = 550;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }					
					$img_url = "uploads/sliders/".$data['upload_data']['file_name'];	
														
					$this->posteddata["image"] = $img_url;	
                  
				}				
			}
			else
			{
				$this->posteddata["image"] = "";
			}			
		
	}
	
	
	public function deleteslider($bid)
	{
		
		
		$this->sliders_model->deleteslider($bid);
		$this->session->set_flashdata("info", "Slider deleted successfully.");
		redirect(base_url()."admin/sliders","refresh");			
	}

	
	
}
?>