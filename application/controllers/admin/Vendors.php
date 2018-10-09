<?php
class Vendors extends CI_Controller
{
	function __construct()
	{
		parent::__construct();	
		$this->load->helper('url');
		$this->load->library('session');
	
		$this->load->model('admin/vendors_model');
		
		$isLoggedIn = $this->session->userdata('isLoggedIn');        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
        
	}
	public function index()
	{
		
      
		$data['vendors']=$this->vendors_model->getvendorslist();
	
		$this->load->view("admin/vendors_view",$data);
		
	}
	
	public function addvendor()
	{
		
		
		if(!(empty($_POST)) && ($_POST['vendor_func'] == "add"))
		{
			
			//$imgup=$this->uploadProductFiles($_FILES);
		   
			$data=array("vendor_company"=>$this->input->post('cname'),"vendor_name"=>$this->input->post('pname'),"vendor_address"=>$this->input->post('address'),"display_status"=>$this->input->post('status'),"created_date"=>date('Y-m-d H:i:s'),"created_id"=>$this->session->userdata('userId'),"vendor_email"=>$this->input->post('email'),"vendor_phone"=>$this->input->post('phone'),"vendor_gst"=>$this->input->post('gst'),"vendor_pan"=>$this->input->post('pan'),"vendor_bank"=>$this->input->post('bank'));
				
			$this->vendors_model->addvendor($data);	
			$this->session->set_flashdata("success_add","Vendor Added successfully.");
			redirect(base_url()."admin/vendors","refresh");
			
		} else {
		
		
	 
	 $this->load->view("admin/vendor_add");
	 
		}
		
	}
	
	public function editvendor($id)
	{
		//print_r($_POST); die;
	   if(!(empty($_POST)) )
		{
			
						$data=array("vendor_company"=>$this->input->post('cname'),"vendor_name"=>$this->input->post('pname'),"vendor_address"=>$this->input->post('address'),"display_status"=>$this->input->post('status'),"updated_date"=>date('Y-m-d H:i:s'),"updated_id"=>$this->session->userdata('userId'),"vendor_email"=>$this->input->post('email'),"vendor_phone"=>$this->input->post('phone'),"vendor_gst"=>$this->input->post('gst'),"vendor_pan"=>$this->input->post('pan'),"vendor_bank"=>$this->input->post('bank'));
			//print_r($data); die;
			$this->vendors_model->updatevendor($id,$data);	
			$this->session->set_flashdata("success","Vendor updated successfully.");
			redirect(base_url()."admin/vendors","refresh");
			
		} else {
			

		   $data['vendor']=$this->vendors_model->getvendor($id);
		     
		   $this->load->view("admin/vendor_edit",$data);
			
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
					$arrImg = array
					(
						"base"=>"uploads",
						"type"=>"categories",
						"img"=>$data['upload_data']['file_name'],
						"width"=>100,
						"height"=>100
					);
					$img_url = base_url()."uploads/products/".$data['upload_data']['file_name'];
										
					$this->posteddata["image"] = $img_url;
				}				
			}
			else
			{
				$this->posteddata["image"] = "";
			}			
		
	}
	
	public function deletevendor($pid)
	{
		
		$deleteUser = array("deleted_id"=>$this->session->userdata('userId'),"deleted_date"=>date('Y-m-d H:i:s'));
		
		$this->vendors_model->deleteVendor($pid,$deleteUser);
		$this->session->set_flashdata("info", "Vendor deleted successfully.");
		redirect(base_url()."admin/vendors","refresh");			
	}
	
	
	public function products($vid)
	{
		   $data['vendorproducts']=$this->vendors_model->getproducts($vid);
		     
		   $this->load->view("admin/vendors_products",$data);
	}
	
	public function orders($vid)
	{
		   $data['vendorproducts']=$this->vendors_model->getorders($vid);
		     
		   $this->load->view("admin/vendors_orders",$data);
	}
	
}
?>