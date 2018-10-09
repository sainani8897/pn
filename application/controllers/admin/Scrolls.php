<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scrolls extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
				
		$this->load->model("admin/scroll_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');
		 
      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
        else{

        	$this->session->set_userdata('admin_id',$this->session->userdata('isLoggedIn'));
        }	
	}

public function scroll()
  { 
    
    $data['scrolling']=$this->scroll_model->getorderbyid('scrolling_home','sid');   
    $this->load->view('admin/home-scrolling',$data);
  
 
  }


  public function scroll_view($id){
            $admin_id = $this->session->userdata('admin_id');if(!$admin_id){
            redirect('welcome/index');
       }
       else{
              
            $result['scrolls']=$this->scroll_model->edit('scrolling_home',array('sid' => $id));
                       $this->load->view('admin/view-home-scrolling',$result);   
              
            }
          }
             public function scroll_edit($id){
         
                 $result['scrolls']=$this->scroll_model->edit('scrolling_home',array('sid' => $id));
                
                   $this->load->view('admin/edit-home-scrolling',$result);   
              
            
          }

        public function scroll_delete(){
             	$id=$this->input->post('scroll_id');
              $admin_id = $this->session->userdata('admin_id');if(!$admin_id){
            redirect('welcome/index');
       }
       else{
                  $result = $this->scroll_model->delete_norm('scrolling_home',array('sid' => $id));
           print_r($result);
                  if($result == 1){             
                $this->session->set_flashdata('success_msg', ' Deleted Successfully.'); 
                redirect('admin/scrolls/scroll');
              }else{ 
                $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
               redirect('admin/scrolls/scroll'); 
              }                  
            }
          } 

    public function scroll_add()
  {
  	//$data['banner']=$this->admin_model->get('banner');
    
      $this->load->view('admin/add-home-scrolling');
   
  }

  public function scroll_insert(){
    
  	 
      $this->form_validation->set_rules('status', ' Status', 'required|xss_clean');

       if (empty($_FILES['photo']['name'])){
      $this->form_validation->set_rules('photo', 'Photo', 'required|xss_clean');} 

      


             $data = array(
                  		  'scroll_name' => $this->input->post('scroll_text'),
                        'link' => $this->input->post('url'),
                        'sort_order' => $this->input->post('sort_order'),
                        'status' => $this->input->post('status'),
                    );

           
          if($data){

           $result =  $this->scroll_model->insert('scrolling_home',$data);  
               if($result == 1){              
                $this->session->set_flashdata('success_msg', ' Added Successfully.');
                redirect('admin/scrolls/scroll'); 
              }else{ 
                $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
                redirect('admin/scrolls/scroll'); 
              }
            

           
          }else{ 

            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            redirect('admin/banner/banner'); 
          }

                 
                
            
          }

   public function scroll_update()  {   
    
                                   //Check whether user upload picture
            $id = $this->input->post('scroll_id');
    
                              
                            
  
		
		$id = $this->input->post('scroll_id');

                  $data = array(
                        'scroll_name' => $this->input->post('scroll_text'),
                        'link' => $this->input->post('url'),
                        'sort_order' => $this->input->post('sort_order'),
                        'status' => $this->input->post('status'),
                    );

           
          if($data){


           $result =  $this->scroll_model->update('scrolling_home',$data,array('sid' => $id));       
               if($result == 1){       

                $this->session->set_flashdata('success_msg', 'Updated Successfully.');
                redirect('admin/scrolls/scroll_edit/'.$id.'/');

              }else{ 
                $this->session->set_flashdata('error_msg', 'No Changes Done.');
                redirect('admin/scrolls/scroll_edit/'.$id.'/'); 
              } 
          }else{ 

            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            redirect('admin/scrolls/scroll'); 
          }

                 
                
            

           }
}


