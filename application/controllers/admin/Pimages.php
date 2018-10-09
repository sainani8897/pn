<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pimages extends CI_Controller {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/productimages_model');
		
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
	}
	
	public function view($pid)
	{
		
        
		$data['images']=$this->productimages_model->getimageslist($pid);
		$data['pid']=$pid;

		$this->load->view('admin/productimages_view',$data);
	}

	
	
	public function addimage($pid)
	{
		
		
		if(!(empty($_POST)) && ($_POST['image_func'] == "add"))
		{
			$imgup=$this->uploadProductFiles($_FILES);
			//print_r($this->posteddata['image']); die;
			$data=array("image_title"=>$this->input->post('title'),"product_id"=>$this->input->post('pid'),"alternate_text"=>$this->input->post('text'),"sort_order"=>$this->input->post('sort'),"status"=>$this->input->post('status'),"image"=>$this->posteddata['image']);
				
			$this->productimages_model->addimage($data);	
			$this->session->set_flashdata("success_add","Produc Image Added successfully.");
			redirect(base_url()."admin/pimages/view/".$this->input->post('pid')."","refresh");
			
		} else {
			$data['pid']=$pid;

			$this->load->view("admin/productimage_add",$data);
		}
	}
	
	public function editimage($id)
	{
		
		
		if(!(empty($_POST)) && ($_POST['image_func'] == "edit"))
		{
			$imgup=$this->uploadProductFiles($_FILES);
			if($this->posteddata['image']!=""){
			$data=array("image_title"=>$this->input->post('title'),"alternate_text"=>$this->input->post('text'),"sort_order"=>$this->input->post('sort'),"status"=>$this->input->post('status'),"image"=>$this->posteddata['image']);
			} else {
					$data=array("image_title"=>$this->input->post('title'),"alternate_text"=>$this->input->post('text'),"sort_order"=>$this->input->post('sort'),"status"=>$this->input->post('status'));
				
			}
				
			$this->productimages_model->editimage($id,$data);	
			$this->session->set_flashdata("success","Product Image Updated successfully.");
			redirect(base_url()."admin/pimages/view/".$this->input->post('pid')."","refresh");
			
		} else {
			$data['pimage']=$this->productimages_model->getimage($id);

			$this->load->view("admin/image_edit",$data);
		}
	}
	
	public function deleteimage($ids)
	{
		$id=explode("-",$ids);		
		$this->productimages_model->deleteimage($id[0]);
		$this->session->set_flashdata("delete","Image deleted successfully.");	
		redirect(base_url()."admin/pimages/view/".$id[1]."","refresh");
	}

    private function uploadProductFiles($files)
	{
		$config['upload_path'] = './uploads/products/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg ';
		
			if(isset($files["image"]))
			{				
				$config['file_name']  = "productimage_".strtotime(date('Y-m-d H:i:s'));	
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
