<?php
class Products extends CI_Controller
{
	function __construct()
	{
		parent::__construct();	
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/category_model');
		$this->load->model('admin/subcategory_model');
		$this->load->model('admin/vendors_model');
		$this->load->model('admin/brands_model');
		$this->load->model('admin/products_model');
		$this->load->model('admin/weight_model');
		
		$isLoggedIn = $this->session->userdata('isLoggedIn');        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
        
	}
	public function index()
	{
		
        $data['totalproducts']=$this->products_model->totalproducts();
		$data['activeproducts']=$this->products_model->activeproducts();
		$data['inactiveproducts']=$this->products_model->inactiveproducts();		 
		$data['products']=$this->products_model->getproductslist();

		$this->load->view("admin/products_view",$data);
		
	}
	
	public function addproduct()
	{
				
		if(!(empty($_POST)) && ($_POST['product_func'] == "add"))
		{
			
			$imgup=$this->uploadProductFiles($_FILES);		  
			
			$data=array("product_name"=>$_POST['name'],"category_id"=>$_POST['category'],"display_status"=>$_POST['status'],"created_date"=>date('Y-m-d H:i:s'),"created_id"=>$this->session->userdata('userId'),"product_image"=>$this->posteddata['image'],"product_price"=>$_POST['price'],"discount_price"=>$_POST['discount_price'],"item_code"=>$_POST['item'],"discount_percent"=>$_POST['discount'],"total_stock"=>$_POST['stock'],"sort_order"=>$_POST['sort_order'],"description"=>$_POST['description'],"brands_id"=>$_POST['brand'],"discount_price"=>$_POST['discount_price'],"availability"=>$_POST['available'],"cooking_tips"=>$_POST['cooking_tips'],"free_bee"=>$_POST['free_bee'],"display_home"=>$_POST['display_home'],"weight"=>$_POST['weight'],"meta_title"=>$_POST['meta_title'],"meta_keywords"=>$_POST['meta_keywords'],"meta_description"=>$_POST['meta_description'],"maxlimit"=>$_POST['maxlimit']);
				
			$this->products_model->addproduct($data);	
			$this->session->set_flashdata("success_add","Product Added successfully.");
			redirect(base_url()."admin/products","refresh");
			
		} else {
		
	       $data['categories']=$this->category_model->getcategorylist1();	
           $data['brands']=$this->brands_model->getbrandlist1();
		   $data['weights']=$this->weight_model->getweightlist1();
	       $this->load->view("admin/products_add",$data);
	 
		}
		
	}
	
	public function editproduct($id)
	{
	   if(!(empty($_POST)) && ($_POST['product_func'] == "edit"))
		{			
		   
			$imgup=$this->uploadProductFiles($_FILES);
		    if($this->posteddata['image']!="")
			{
		
		
		$data=array("product_name"=>$_POST['name'],"category_id"=>$_POST['category'],"display_status"=>$_POST['status'],"created_date"=>date('Y-m-d H:i:s'),"created_id"=>$this->session->userdata('userId'),"product_image"=>$this->posteddata['image'],"product_price"=>$_POST['price'],"discount_price"=>$_POST['discount_price'],"item_code"=>$_POST['item'],"discount_percent"=>$_POST['discount'],"total_stock"=>$_POST['stock'],"sort_order"=>$_POST['sort_order'],"description"=>$_POST['description'],"brands_id"=>$_POST['brand'],"discount_price"=>$_POST['discount_price'],"availability"=>$_POST['available'],"cooking_tips"=>$_POST['cooking_tips'],"free_bee"=>$_POST['free_bee'],"display_home"=>$_POST['display_home'],"weight"=>$_POST['weight'],"meta_title"=>$_POST['meta_title'],"meta_keywords"=>$_POST['meta_keywords'],"meta_description"=>$_POST['meta_description'],"maxlimit"=>$_POST['maxlimit']);
		
		} else {
			
		$data=array("product_name"=>$_POST['name'],"category_id"=>$_POST['category'],"display_status"=>$_POST['status'],"created_date"=>date('Y-m-d H:i:s'),"created_id"=>$this->session->userdata('userId'),"product_price"=>$_POST['price'],"discount_price"=>$_POST['discount_price'],"item_code"=>$_POST['item'],"discount_percent"=>$_POST['discount'],"total_stock"=>$_POST['stock'],"sort_order"=>$_POST['sort_order'],"description"=>$_POST['description'],"brands_id"=>$_POST['brand'],"discount_price"=>$_POST['discount_price'],"availability"=>$_POST['available'],"cooking_tips"=>$_POST['cooking_tips'],"free_bee"=>$_POST['free_bee'],"display_home"=>$_POST['display_home'],"weight"=>$_POST['weight'],"meta_title"=>$_POST['meta_title'],"meta_keywords"=>$_POST['meta_keywords'],"meta_description"=>$_POST['meta_description'],"maxlimit"=>$_POST['maxlimit']);
		
		}
			
			$this->products_model->updateProduct($id,$data);	
			$this->session->set_flashdata("success","Product updated successfully.");
			redirect(base_url()."admin/products","refresh");
			
		} else {
			

		   $data['products']=$this->products_model->getproduct($id);
	       $data['categories']=$this->category_model->getcategorylist1();	
           $data['brands']=$this->brands_model->getbrandlist1();
		   $data['weights']=$this->weight_model->getweightlist1();
		   $this->load->view("admin/products_edit",$data);
			
		}
		
	}
	
	private function uploadProductFiles($files)
	{
		$config['upload_path'] = './uploads/products/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg ';
		
			if(isset($files["image"]))
			{				
				$config['file_name']  = "product_".strtotime(date('Y-m-d H:i:s'));	
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
                    $config['width'] = 650;
                    $config['height'] = 650;
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
	
	public function deleteproduct($pid)
	{
		
		$deleteUser = array("deleted_id"=>$this->session->userdata('userId'),"deleted_date"=>date('Y-m-d H:i:s'));
		
		$this->products_model->deleteProduct($pid,$deleteUser);
		$this->session->set_flashdata("info", "Product deleted successfully.");
		redirect(base_url()."admin/products","refresh");			
	}
	
	public function ajax_subcat()
    {
    $catid=$_POST['category'];
	
    $data['state'] = $this->subcategory_model->ajaxlist($catid);
    $data['subcategory']=$_POST['subcategory'];
	
    $this->load->view('admin/ajax_get_subcat',$data);
	
    }
	
	public function images($prod)
	{
		
	}
	 
	
}
?>