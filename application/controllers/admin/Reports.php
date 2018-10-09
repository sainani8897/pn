<?php
class Reports extends CI_Controller
{
	function __construct()
	{
		parent::__construct();	
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/reports_model');
		
		
		$isLoggedIn = $this->session->userdata('isLoggedIn');        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
        
	}
	public function index()
	{
		
		if(!(empty($_POST)) && ($_POST['report'] == "search"))
		{
		$data=$this->input->post();
		$result['data']=$data;
		$result['reports']=$this->reports_model->filters($data);	
		$this->load->view("admin/reports",$result);	
		} else {
			$data['data']=array("username"=>"","fromdate"=>"","todate"=>"","status"=>"");
        $data['reports']=$this->reports_model->totalreports();		
		$this->load->view("admin/reports",$data);
		}
		
	}
	
	public function addproduct()
	{
				
		if(!(empty($_POST)) && ($_POST['product_func'] == "add"))
		{
			
			$imgup=$this->uploadProductFiles($_FILES);		  
			$data=array("product_name"=>$this->input->post('name'),"category_id"=>$this->input->post('category'),"display_status"=>$this->input->post('status'),"created_date"=>date('Y-m-d H:i:s'),"created_id"=>$this->session->userdata('userId'),"product_image"=>$this->posteddata['image'],"product_price"=>$this->input->post('price'),"discount_price"=>$this->input->post('discount_price'),"item_code"=>$this->input->post('item'),"discount_percent"=>$this->input->post('discount'),"total_stock"=>$this->input->post('stock'),"sort_order"=>$this->input->post('sort_order'),"description"=>$this->input->post('description'),"brands_id"=>$this->input->post('brand'),"discount_price"=>$this->input->post('discount_price'),"availability"=>$_POST['available']);
				
			$this->products_model->addproduct($data);	
			$this->session->set_flashdata("success_add","Product Added successfully.");
			redirect(base_url()."admin/products","refresh");
			
		} else {
		
	       $data['categories']=$this->category_model->getcategorylist();	
           $data['brands']=$this->brands_model->getbrandlist();
		  
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
		$data=array("product_name"=>$this->input->post('name'),"subcategory_id"=>$this->input->post('subcategory'),"category_id"=>$this->input->post('category'),"display_status"=>$this->input->post('status'),"updated_date"=>date('Y-m-d H:i:s'),"updated_id"=>$this->session->userdata('userId'),"product_image"=>$this->posteddata['image'],"product_price"=>$this->input->post('price'),"item_code"=>$this->input->post('item'),"discount_percent"=>$this->input->post('discount'),"total_stock"=>$this->input->post('stock'),"sort_order"=>$this->input->post('sort_order'),"description"=>$this->input->post('description'),"brands_id"=>$this->input->post('brand'),"discount_price"=>$this->index->post('discount_price'),"availability"=>$_POST['available']);
		} else {
			
			$data=array("product_name"=>$this->input->post('name'),"category_id"=>$this->input->post('category'),"display_status"=>$this->input->post('status'),"updated_date"=>date('Y-m-d H:i:s'),"updated_id"=>$this->session->userdata('userId'),"product_price"=>$this->input->post('price'),"item_code"=>$this->input->post('item'),"discount_percent"=>$this->input->post('discount'),"total_stock"=>$this->input->post('stock'),"sort_order"=>$this->input->post('sort_order'),"description"=>$this->input->post('description'),"brands_id"=>$this->input->post('brand'),"discount_price"=>$this->input->post('discount_price'),"availability"=>$_POST['available']);
		
		}
			
			$this->products_model->updateProduct($id,$data);	
			$this->session->set_flashdata("success","Product updated successfully.");
			redirect(base_url()."admin/products","refresh");
			
		} else {
			

		   $data['products']=$this->products_model->getproduct($id);
		   $data['categories']=$this->category_model->getcategorylist();
	        $data['brands']=$this->brands_model->getbrandlist();
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
    $catid=$this->input->post('category');
	
    $data['state'] = $this->subcategory_model->ajaxlist($catid);
    $data['subcategory']=$this->input->post('subcategory');
	
    $this->load->view('admin/ajax_get_subcat',$data);
	
    }
	
	public function images($prod)
	{
		
	}
	 
	
}
?>