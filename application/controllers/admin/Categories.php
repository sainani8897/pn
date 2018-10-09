<?php
class Categories extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();	
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/category_model');
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
        
	}
	public function index()
	{		
       
		if(!(empty($_POST)) && ($_POST['category_func'] == "add"))
		{
							   
			$data=array("category_name"=>$this->input->post('name'),"sort_order"=>$this->input->post('sort_order'),"display_status"=>$this->input->post('status'),"created_date"=>date('Y-m-d H:i:s'),"created_id"=>$this->session->userdata('userId'));				
			$this->category_model->addcategory($data);	
			$this->session->set_flashdata("success_add","Category Added successfully.");
			redirect(base_url()."admin/categories","refresh");
			
		} else {
			
		$data['categories']=$this->category_model->getcategorylist();
		$this->load->view("admin/categories_view",$data);
		
		}		
	}
	
	public function addcategory()
	{
		
		if(!(empty($_POST)) && ($_POST['category_func'] == "add"))
		{
			
			$imgup=$this->uploadCategoryFiles($_FILES);
		   
			$data=array("category_name"=>$this->input->post('name'),"display_status"=>$this->input->post('status'),"created_date"=>date('Y-m-d H:i:s'),"created_id"=>$this->session->userdata('userId'),"category_image"=>$this->posteddata['image']);
				
			$this->category_model->addcategory($data);	
			$this->session->set_flashdata("success_add","Category Added successfully.");
			redirect(base_url()."admin/categories","refresh");
			
		} else {
		
	
		$this->load->view("admin/categories_add");
			
		}           
		
		
	}
	
	public function edit()
	{
	    
	   if(!(empty($_POST)) && ($_POST['category_func'] == "edit"))
		{
			$data=$this->uri->uri_to_assoc();
		    $id=$data['edit'];
			$category_id = $id;
		
		   
			$data=array("category_name"=>$this->input->post('name'),"display_status"=>$this->input->post('status'),"updated_date"=>date('Y-m-d H:i:s'),"sort_order"=>$this->input->post('sort_order'));
		
			
			$this->category_model->updateCategory($category_id,$data);	
			$this->session->set_flashdata("success","Category updated successfully.");
			redirect(base_url()."admin/categories","refresh");
			
		} else {
			
		   $sub=$this->uri->uri_to_assoc();		  
		   $id=$sub['edit'];		   
           $data['category']=$this->category_model->getcategory($id);
		  $this->load->view("admin/categories_edit",$data);
			//echo json_encode(array("status"=>"success","data"=>$this->category_model->getcategory($id)));
		}
	}
	
	private function uploadCategoryFiles($files)
	{
		$config['upload_path'] = './uploads/categories/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			if(isset($files["image"]))
			{				
				$config['file_name']  = "category_".strtotime(date('Y-m-d H:i:s'));	
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
					$arrImg = array
					(
						"base"=>"uploads",
						"type"=>"categories",
						"img"=>$data['upload_data']['file_name'],
						"width"=>100,
						"height"=>100
					);
					$img_url = "uploads/categories/".$data['upload_data']['file_name'];
										
					$this->posteddata["image"] = $img_url;
				}				
			}
			else
			{
				$this->posteddata["image"] = "";
			}			
		
	}
	
	public function deletecategories($category_id)
	{
		
		$deleteUser = array("deleted_id"=>$this->session->userdata('userId'),"deleted_date"=>date('Y-m-d H:i:s'));
		
		$this->category_model->deleteCategory($category_id,$deleteUser);
		$this->session->set_flashdata("info", "Category deleted successfully.");
		redirect(base_url()."admin/categories","refresh");			
	}
}
?>