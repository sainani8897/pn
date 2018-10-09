<?php
class Subcategories extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();	
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/category_model');
		$this->load->model('admin/subcategory_model');
	}
	public function index()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
        
       
		//$data['oObj'] = $this;
		
		//$this->load->view("admin/includes/header");
		//$this->load->view("admin/includes/leftside");
		$data["subcategoriesn"]=$this->subcategory_model->getsubcategorylist();
	
		$this->load->view("admin/subcategories_view",$data);
		
	}
	
	public function addsubcategory()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
		
		if(!(empty($_POST)) && ($_POST['subcategory_func'] == "add"))
		{
			
			$imgup=$this->uploadSubCategoryFiles($_FILES);
		   
			$data=array("subcategory_name"=>$this->input->post('name'),"category_id"=>$this->input->post('category'),"status"=>$this->input->post('status'),"created_date"=>date('Y-m-d H:i:s'),"created_id"=>$this->session->userdata('userId'),"subcategory_image"=>$this->posteddata['image']);
				
			$this->subcategory_model->addsubcategory($data);	
			$this->session->set_flashdata("success_add","Sub Category Added successfully.");
			redirect(base_url()."admin/subcategories","refresh");
			
		} else {
		
		$data['categories']=$this->category_model->getcategorylist();
		$this->load->view("admin/subcategories_add",$data);
			
		}
        
      
		
		
	}
	
	public function edit()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');
	    if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
	   if(!(empty($_POST)) && ($_POST['subcategory_func'] == "edit"))
		{
			$data=$this->uri->uri_to_assoc();
		    $id=$data['edit'];
			$category_id = $id;
		
			$imgup=$this->uploadSubCategoryFiles($_FILES);
		    if($this->posteddata['image']!="")
			{
			$data=array("subcategory_name"=>$this->input->post('name'),"category_id"=>$this->input->post('category'),"status"=>$this->input->post('status'),"updated_date"=>date('Y-m-d H:i:s'),"subcategory_image"=>$this->posteddata['image']);
		} else {
			$data=array("subcategory_name"=>$this->input->post('name'),"category_id"=>$this->input->post('category'),"status"=>$this->input->post('status'),"updated_date"=>date('Y-m-d H:i:s'));
			
		}
			
			$this->subcategory_model->updateSubcategory($category_id,$data);	
			$this->session->set_flashdata("success","Sub Category updated successfully.");
			redirect(base_url()."admin/subcategories","refresh");
			
		} else {
			
		   $data=$this->uri->uri_to_assoc();
		   $id=$data['edit'];
		   $data['subcategory']=$this->subcategory_model->getsubcategory($id);
		   $data['categories']=$this->category_model->getcategorylist();	   
		   $this->load->view("admin/subcategories_edit",$data);
			
		}
	}
	
	private function uploadSubCategoryFiles($files)
	{
		$config['upload_path'] = './uploads/subcategories/';
		$config['allowed_types'] = 'gif|jpg|png';
		
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
					$img_url = base_url()."uploads/subcategories/".$data['upload_data']['file_name'];
										
					$this->posteddata["image"] = $img_url;
				}				
			}
			else
			{
				$this->posteddata["image"] = "";
			}			
		
	}
	
	public function deletesubcategories($category_id)
	{
		
		$deleteUser = array("deleted_id"=>$this->session->userdata('userId'),"deleted_date"=>date('Y-m-d H:i:s'));
		
		$this->subcategory_model->deletesubCategory($category_id,$deleteUser);
		$this->session->set_flashdata("info", "Sub Category deleted successfully.");
		redirect(base_url()."admin/subcategories","refresh");			
	}
}
?>