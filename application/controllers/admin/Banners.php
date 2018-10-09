<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
				
		$this->load->model("admin/banner_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');
		 
      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
        else{

        	$this->session->set_userdata('admin_id',$this->session->userdata('isLoggedIn'));
        }	
	}

public function banner()
  { 
    
    $data['banner']=$this->banner_model->getorderbyid('banners_home','banner_id');   
    $this->load->view('admin/home-banner',$data);
  
 
  }


  public function banner_view($id){
            $admin_id = $this->session->userdata('admin_id');if(!$admin_id){
            redirect('welcome/index');
       }
       else{
              
            $result['banner']=$this->banner_model->edit('banners_home',array('banner_id' => $id));
                       $this->load->view('admin/view-home-banner',$result);   
              
            }
          }
             public function banner_edit($id){
         
                 $result['banner']=$this->banner_model->edit('banners_home',array('banner_id' => $id));
                // $result['city']=$this->admin_model->get('city'); 
                        $this->load->view('admin/edit-home-banner',$result);   
              
            
          }

        public function banner_delete(){
             	$id=$this->input->post('banner_id');
              $admin_id = $this->session->userdata('admin_id');if(!$admin_id){
            redirect('welcome/index');
       }
       else{
                  $result = $this->banner_model->delete('banners_home',array('banner_id' => $id));
           print_r($result);
                  if($result == 1){             
                $this->session->set_flashdata('success_msg', ' Deleted Successfully.'); 
                redirect('admin/banners/banner');
              }else{ 
                $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
               // redirect('admin/banners/banner'); 
              }                  
            }
          } 

    public function banner_add()
  {
  	//$data['banner']=$this->admin_model->get('banner');
    
      $this->load->view('admin/add-home-banner');
   
  }

  public function banner_insert(){
    
  	 
      $this->form_validation->set_rules('status', ' Status', 'required|xss_clean');

       if (empty($_FILES['photo']['name'])){
      $this->form_validation->set_rules('photo', 'Photo', 'required|xss_clean');} 

        if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('banner-add');
                }
                else
                {
                 
                 if(!empty($_FILES['photo']['name'])){
                              $config['upload_path'] = 'uploads/banners/home/';
                              $config['allowed_types'] = 'jpg|jpeg|png|gif';
                              $config['file_name'] = rand().$_FILES['photo']['name'];
                              
                              //Load upload library and initialize configuration
                              $this->load->library('upload',$config);
                              $this->upload->initialize($config);
                              
                              if($this->upload->do_upload('photo')){
                                //   $uploadData = $this->upload->data();
                                //   $image = $config['upload_path'].$uploadData['file_name'];
                                $data = array('upload_data' => $this->upload->data());
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = $data['upload_data']['full_path'];
            
                                $config['maintain_ratio'] = FALSE;
                                $config['width'] = 545;
                                $config['height'] = 200;
                                $this->load->library('image_lib', $config);
                                if (!$this->image_lib->resize()) {
                                    return $this->handle_error($this->image_lib->display_errors());
                                }
                                $img_url = "uploads/banners/home/".$data['upload_data']['file_name'];
                                //$this->posteddata["image"] = $img_url;
                                // print_r($img_url);
                                // exit();
                                $image = $img_url;
                                
                              }else{
                                  $image = '';
                              }
                          }else{
                              $image = '';
                          }


             $data = array(
                  		'title' => $this->input->post('title'),
                        'url' => $this->input->post('url'),
                        'image' =>  $image,
                        'sort_order' => $this->input->post('sort_order'),
                        'status' => $this->input->post('status'),
                    );

           
          if($data){

           $result =  $this->banner_model->insert('banners_home',$data);  
               if($result == 1){              
                $this->session->set_flashdata('success_msg', ' Added Successfully.');
                redirect('admin/banners/banner'); 
              }else{ 
                $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
                redirect('admin/banners/banner'); 
              }
            

           
          }else{ 

            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            redirect('admin/banner/banner'); 
          }

                 
                }
            
          }

   public function banner_update()  {   
    
                                   //Check whether user upload picture
            $id = $this->input->post('banner_id');
                   if(!empty($_FILES['photo']['name'])){
                              $config['upload_path'] = 'uploads/banners/home/';
                              $config['allowed_types'] = 'jpg|jpeg|png|gif';
                              $config['file_name'] = rand().$_FILES['photo']['name'];
                              
                              //Load upload library and initialize configuration
                               $photo=$this->input->post('old_photo');
                                  if (is_file(FCPATH.$photo))
                                          unlink($photo); 
                             
                              $this->load->library('upload',$config);
                              $this->upload->initialize($config);
  
                      if($this->upload->do_upload('photo')){
                                 $uploadData = $this->upload->data();
                                  $image = $config['upload_path'].$uploadData['file_name'];
                                
                                $data = array('upload_data' => $this->upload->data());
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = $data['upload_data']['full_path'];
            
                               
                                $config['maintain_ratio'] = FALSE;
                                $config['width'] = 545;
                                $config['height'] = 200;
                               
                               
                                $this->load->library('image_lib', $config);
                                if (!$this->image_lib->resize()) {
                                    return $this->handle_error($this->image_lib->display_errors());
                                }
                                $img_url = "uploads/banners/home/".$data['upload_data']['file_name'];
                                
                                $image = $img_url;
                                

                              }else{
                                  $image = $this->input->post('old_photo');
                              }
                          }else{
                                    $image=$this->input->post('old_photo');
                           }
		
		$id = $this->input->post('banner_id');

               $data = array(
                  		'title' => $this->input->post('title'),
                        'url' => $this->input->post('url'),
                        'image' =>  $image,
                        'sort_order' => $this->input->post('sort_order'),
                        'status' => $this->input->post('status'),
                    );

           
          if($data){


           $result =  $this->banner_model->update('banners_home',$data,array('banner_id' => $id));       
               if($result == 1){       
              

                $this->session->set_flashdata('success_msg', 'Updated Successfully.');
                redirect('admin/banners/banner_edit/'.$id.'/');

              }else{ 
                $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
                redirect('admin/banners/banner_edit/'.$id.'/'); 
              } 
          }else{ 

            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            redirect('admin/banners/banner'); 
          }

                 
                
            

           }
}


