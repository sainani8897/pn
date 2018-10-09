<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catslides extends CI_Controller {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/catslides_model');
		
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
	}
	
	public function view($cid)
	{
		if(!(empty($_POST)) && ($_POST['catslide_func'] == "add"))
		{
			$imgup=$this->uploadProductFiles($_FILES);
			//print_r($this->posteddata['image']); die;
			$data=array("title"=>$this->input->post('title'),"category_id"=>$this->input->post('cid'),"link"=>$this->input->post('link'),"sort_order"=>$this->input->post('sort_order'),"status"=>$this->input->post('status'),"image"=>$this->posteddata['image']);
				
			$this->catslides_model->addimage($data);	
			$this->session->set_flashdata("success_add","Category Slider Added successfully.");
			redirect(base_url()."admin/catslides/view/".$this->input->post('cid')."","refresh");
			
		} else {
        
		$data['images']=$this->catslides_model->getimageslist($cid);
		$data['cid']=$cid;
		$this->load->view('admin/catslides_view',$data);
		
		}
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
	
	public function edit($id)
	{
		
		
		if(!(empty($_POST)) && ($_POST['image_func'] == "edit"))
		{
			$imgup=$this->uploadProductFiles($_FILES);
			if($this->posteddata['image']!=""){
			$data=array("title"=>$this->input->post('title'),"link"=>$this->input->post('link'),"sort_order"=>$this->input->post('sort_order'),"status"=>$this->input->post('status'),"image"=>$this->posteddata['image']);
			} else {
					$data=array("title"=>$this->input->post('title'),"link"=>$this->input->post('link'),"sort_order"=>$this->input->post('sort_order'),"status"=>$this->input->post('status'));
				
			}
				
			$this->catslides_model->editimage($id,$data);	
			$this->session->set_flashdata("success","Category Slider Image Updated successfully.");
			redirect(base_url()."admin/catslides/view/".$this->input->post('cid')."","refresh");
			
		} else {
			$data['pimage']=$this->catslides_model->getimage($id);

			$this->load->view("admin/catslides_edit",$data);
		}
	}
	
	public function deleteimage($ids)
	{
		$id=explode("-",$ids);		
		$this->catslides_model->deleteimage($id[0]);
		$this->session->set_flashdata("delete","Category Slider deleted successfully.");	
		redirect(base_url()."admin/catslides/view/".$id[1]."","refresh");
	}

    private function uploadProductFiles($files)
	{
		$config['upload_path'] = './uploads/categories/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg ';
		
			if(isset($files["image"]))
			{				
				$config['file_name']  = "catslide_".strtotime(date('Y-m-d H:i:s'));	
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
                    $config['width'] = 1140;
                    $config['height'] = 180;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }
					
					$img_url = "uploads/categories/".$data['upload_data']['file_name'];
										
					$this->posteddata["image"] = $img_url;
				}				
			}
			else
			{
				$this->posteddata["image"] = "";
			}			
		
	}
	

}
