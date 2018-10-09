<?php
class Settings extends CI_Controller
{
	function __construct()
	{
		parent::__construct();	
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/settings_model');		
		
		$isLoggedIn = $this->session->userdata('isLoggedIn');        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
        
	}
	public function index()
	{
		
		if(!(empty($_POST)) && ($_POST['settings_func'] == "edit"))
		{
			
			$imgup=$this->uploadCategoryFiles($_FILES);
			
			
			 $payment_method = implode(",", $this->input->post('payment_method'));
		
			if($this->posteddata['image']!="")
			{	
			
$data=array("company_name"=>$this->input->post('name'),"address"=>$this->input->post('address'),"phone"=>$this->input->post('phone'),"mobile"=>$this->input->post('mobile'),"email"=>$this->input->post('email'),"facebook"=>$this->input->post('facebook'),"twitter"=>$this->input->post('twitter'),"gplus"=>$this->input->post('gplus'),"logo"=>$this->posteddata['image'],"payment_method"=>$payment_method,"copy_right"=>$this->input->post('copy_right'),"meta_title"=>$this->input->post('meta_title'),"meta_keywords"=>$this->input->post('meta_keywords'),"meta_description"=>$this->input->post('meta_description'));
			
			} else {
				
			$data=array("company_name"=>$this->input->post('name'),"address"=>$this->input->post('address'),"phone"=>$this->input->post('phone'),"mobile"=>$this->input->post('mobile'),"email"=>$this->input->post('email'),"prod_max_limit"=>$this->input->post('prod_max_limit'),"facebook"=>$this->input->post('facebook'),"twitter"=>$this->input->post('twitter'),"gplus"=>$this->input->post('gplus'),"payment_method"=>$payment_method,"copy_right"=>$this->input->post('copy_right'),"meta_title"=>$this->input->post('meta_title'),"meta_keywords"=>$this->input->post('meta_keywords'),"meta_description"=>$this->input->post('meta_description'));
			}
			
			if($this->posteddata['image1']!=""){ $data=array_merge($data,array("another_logo"=>$this->posteddata['image1'])); }
			
			
			$this->settings_model->editsetting($data);	
			$res1=$this->settings_model->getsettings();
			$this->session->set_userdata('settings_admin',$res1);
			$this->session->set_flashdata("success","Settings Updated Successfully.");
			redirect(base_url()."admin/settings","refresh");
			
		} else {
      
		$data['settings']=$this->settings_model->getsettings();
        
		$this->load->view("admin/settings",$data);
		
		}
		
	}
	
	
	

	
	private function uploadCategoryFiles($files)
	{
		$config['upload_path'] = './uploads/logo/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			if(isset($files["image"]))
			{				
				$config['file_name']  = "logo_".strtotime(date('Y-m-d H:i:s'));	
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
                    $config['source_image'] = $data['upload_data']['full_path']; 
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 260;
                    $config['height'] = 75;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }
										
					$img_url ="uploads/logo/".$data['upload_data']['file_name'];
										
					$this->posteddata["image"] = $img_url;	
                  
				}				
			}
			else
			{
				$this->posteddata["image"] = "";
			}		
			
			
			if(isset($files["logo"]))
			{				
				$config['file_name']  = "logo_".strtotime(date('Y-m-d H:i:s'));	
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload("logo"))
				{
					$error = array('info' => $this->upload->display_errors());
					$this->session->set_flashdata("error", $this->upload->display_errors());			
					$this->posteddata["image1"] = "";
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());				
					$config['image_library'] = 'gd2';
                    $config['source_image'] = $data['upload_data']['full_path']; 
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 200;
                    $config['height'] = 100;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }
										
					$img_url ="uploads/logo/".$data['upload_data']['file_name'];										
					$this->posteddata["image1"] = $img_url;	
                  
				}				
			}
			else
			{
				$this->posteddata["image1"] = "";
			}		
		
	}
	
	 
	
}
?>