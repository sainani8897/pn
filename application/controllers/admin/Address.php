<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/address_model');	
		$this->load->model('admin/state_model');	
		$this->load->model('admin/city_model');	
		$isLoggedIn = $this->session->userdata('isLoggedIn');        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
         redirect(base_url()."admin/login","refresh");
        }
	}
	
	public function view($uid)
	{		       
	$data['address']=$this->address_model->getaddresslist($uid);
	$data['uid']=$uid;
	$this->load->view('admin/address_view',$data);
	}

	public function index()
	{	
	 $this->load->view('admin/address_view');
	}
	
	public function addaddress($uid)
	{	
		
	if(!(empty($_POST)) && ($_POST['address_func'] == "add"))
	{			
	$data=array("firstname"=>$this->input->post('fname'),"lastname"=>$this->input->post('lname'),"user_id"=>$this->input->post('uid'),"phone"=>$this->input->post('phone'),"address"=>$this->input->post('address'),"city"=>$this->input->post('city'),"state"=>$this->input->post('state'),"country"=>$this->input->post('country'));				
	$this->address_model->addaddress($data);	
	$this->session->set_flashdata("success_add","Address Added successfully.");
	redirect(base_url()."admin/address/view/".$this->input->post('uid')."","refresh");
			
	} else {
	$data['uid']=$uid;
	$data['states']=$this->state_model->getstatelist();
    $this->load->view("admin/address_add",$data);
	}
	}
	
	public function editaddress($id)
	{
		
		
		if(!(empty($_POST)) && ($_POST['address_func'] == "edit"))
		{
			
			$data=array("title"=>$this->input->post('title'),"firstName"=>$this->input->post('fname'),"lastName"=>$this->input->post('lname'),"phone"=>$this->input->post('phone'),"address"=>$this->input->post('address'),"city"=>$this->input->post('city'),"state"=>$this->input->post('state'),"country"=>$this->input->post('country'));
				
			$this->address_model->editaddress($id,$data);	
			$this->session->set_flashdata("success","Address Updated successfully.");
			redirect(base_url()."admin/address/view/".$this->input->post('uid')."","refresh");
			
		} else {
			$data['states']=$this->state_model->getstatelist();
			$data['address']=$this->address_model->getaddress($id);
			$this->load->view("admin/address_edit",$data);
		}
	}
	
	public function deleteaddress($ids)
	{
		$id=explode("-",$ids);		
		$this->address_model->deleteaddress($id[1]);
		$this->session->set_flashdata("delete","Address deleted successfully.");	
		redirect(base_url()."admin/address/view/".$id[0]."","refresh");
	}

   public function ajax_city()
   {
		
    $sid=$this->input->post('state');	
    $data['cities'] = $this->city_model->ajaxlist($sid);
    $data['selected_city']=$this->input->post('city');	
    $this->load->view('admin/ajax_get_city',$data);
	
    }
	
}
