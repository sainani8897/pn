<?php
class Brands extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/brands_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }	
	}
	
	public function index()
	{
		if(!(empty($_POST)) && ($_POST['brand_func'] == "add"))
		{			
			$imgup=$this->uploadCategoryFiles($_FILES);		   
			$data=array("brand_name"=>$this->input->post('name'),"brand_status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'),"brand_image"=>$this->posteddata['image']);				
			$this->brands_model->addbrand($data);	
			$this->session->set_flashdata("success_add","Brand Added successfully.");
			redirect(base_url()."admin/brands","refresh");
			
		} else {
		$data['brands']=$this->brands_model->getbrandlist();

		$this->load->view("admin/brands_view",$data);
		
		}
	}	
	
	
	public function editbrand($id)
	{
		
		if(!(empty($_POST)) && ($_POST['brand_func'] == "edit"))
		{			
			$imgup=$this->uploadCategoryFiles($_FILES);			
		    if($this->posteddata['image']!="")
			{				
			$data=array("brand_name"=>$this->input->post('name'),"brand_status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'),"brand_image"=>$this->posteddata['image']);
		} else {
			$data=array("brand_name"=>$this->input->post('name'),"brand_status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'));			
		}
			
			$this->brands_model->updateBrand($id,$data);	
			$this->session->set_flashdata("success","Brand updated successfully.");			
			redirect(base_url()."admin/brands","refresh");
			
		} else {			
		 		   
           $data['brand']=$this->brands_model->getbrand($id);
		   $this->load->view("admin/brand_edit",$data);
			
		}		
	}
	
	
	private function uploadCategoryFiles($files)
	{
		$config['upload_path'] = './uploads/brands/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			if(isset($files["image"]))
			{				
				$config['file_name']  = "brand_".strtotime(date('Y-m-d H:i:s'));	
				$this->load->library('upload', $config);

				if(!$this->upload->do_upload("image"))
				{
					$error = array('info' => $this->upload->display_errors());
					$this->session->set_flashdata("error", $this->upload->display_errors());			
					$this->posteddata["image"] = "";
				} else {
					
					$data = array('upload_data' => $this->upload->data());
				//	echo "<pre>";print_r($data);die;
				//	base_url()."images/uploads/categories/".$data['upload_data']['file_name'];
					$config['image_library'] = 'gd2';
                    $config['source_image'] = $data['upload_data']['full_path']; //get original image
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 200;
                    $config['height'] = 100;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }					
					$img_url = "uploads/brands/".$data['upload_data']['file_name'];										
					$this->posteddata["image"] = $img_url;	                  
				}	
							
			} else {
				
				$this->posteddata["image"] = "";
			}			
		
	}
	
	
	public function deletebrand($bid)
	{
		
		
		$this->brands_model->deletebrand($bid);
		$this->session->set_flashdata("info", "Brand deleted successfully.");
		redirect(base_url()."admin/brands","refresh");			
	}

	
	
}
?>