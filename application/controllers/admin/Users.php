<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/users_model');
		$this->load->model("admin/state_model");
		$this->load->model("admin/city_model");
		$isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }
	}

	public function index()
	{		       
	   $data['users']=$this->users_model->getuserlist();
	   
		$this->load->view('admin/users_view',$data);
	}
	
	public function adduser()
	{		
		
		if(!(empty($_POST)) && ($_POST['user_func'] == "add"))
		{
						
			$data=array("firstName"=>$this->input->post('fname'),"lastName"=>$this->input->post('lname'),"email"=>$this->input->post('email'),"phone"=>$this->input->post('phone'),"address"=>$this->input->post('address'),"state"=>$this->input->post('state'),"city"=>$this->input->post('city'),"status"=>$this->input->post('status'),"password"=>$this->input->post('password'));
				
			$this->users_model->adduser($data);	
			$this->session->set_flashdata("success_add","User Added successfully.");
			redirect(base_url()."admin/users","refresh");
			
		} else {
			
			$data['states']=$this->state_model->getstatelist();
			$this->load->view("admin/user_add",$data);
		}
	}
	
	public function edituser($id)
	{
		
		
		if(!(empty($_POST)) && ($_POST['user_func'] == "edit"))
		{
			
			$data=array("firstName"=>$this->input->post('fname'),"lastName"=>$this->input->post('lname'),"email"=>$this->input->post('email'),"phone"=>$this->input->post('phone'),"address"=>$this->input->post('address'),"state"=>$this->input->post('state'),"city"=>$this->input->post('city'),"status"=>$this->input->post('status'),"updated_on"=>date('Y-m-d H:i:s'));
				
			$this->users_model->edituser($id,$data);	
			$this->session->set_flashdata("success","User Updated successfully.");
			redirect(base_url()."admin/users","refresh");
			
		} else {
			$data['states']=$this->state_model->getstatelist();
			$data['user']=$this->users_model->getuser($id);
			
			$this->load->view("admin/user_edit",$data);
		}
	}


	public function ajax_list()
	{
		$list = $this->users_model->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $customers) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $customers->firstName;
			$row[] = $customers->lastName;
			$row[] = $customers->phone;
			$row[] = $customers->address;
			
			$row[] = '<a href="'.base_url().'admin/users/edituser/'.$customers->id.'"><button class="btn bg-cyan waves-effect" type="button">Edit</button></a>
										<a href="'.base_url().'admin/users/deleteuser/'.$customers->id.'" onclick="return confirm("Are you sure you want to delete this item?");">  <button class="btn bg-red waves-effect" type="button">Delete</button></a> <a href="'.base_url().'admin/address/view/'.$customers->id.'"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAATzSURBVGhD7VhbiBxFFB3f7zfiE6MSMJntx66LUfwwiuKHBvRnRaN+5CPri5mp6nVRMLhqNEKCiAZZkERQUTD+qBHR5GN/YrLb1Z2Xq6BRgx9qFJQ8jI/oup57++6me2eSDdNtrUgfuMzMqVtV93TdW1U9lRIlSuTDFRv6T3MjtQq224v0uFUzaocfqTsklHzAYK/QoG6k/8L3n61ZpPaKmLGOMLhWwmkPPWt6jnGN3g874G9pXCq0NWDeJ+QhvihUe+iOHjkjGUjtFsoqfKNulVV5Q6j2UAopCKWQNGZ/UTuhK+6blQjRe9ztj55FxS/NVpBbCInA9vc9D5IyCBoSFyvILYSePISswyBfpc016gVxsYLCaqQyPnC0G6rLZ+IMIfynip1W90qjLqAaE+qIMeNCOjZrH5M/D9vBVxsKhgPS+/D5jhcFC8T1sChESHWjPpsD4iDUXkqxWUMDJ0pzS9BTR+CrMfEY7EtcMVZ4obrXMfoWJ1J3g1sObieNic8PaQ7p2hK5haAmzpy8tGVMfSwuTahG9UuwGXxKq+fEehHVlzRlUB0dOB4ilojY7d1R78nS1ITcQpLtV38AO7hr8RNWy8QlAwoGK/EJ2n/wR1SH0IcF/BUFic9BoZpQWI3w7Tfu6/ZHGp1CtQQmegk25oR6vlAMEoVVfBrBoC7wYPBK4Maqd95w7fTKeOUo1EyMFfyTDl7pkoHVYqeUwkR/wO9NoSrzhwaOhYCVJI4DmWJOFMwhP9/o+5gzus4dp8CqEAS8lHzSLz9Il9c4gEjvQj0spBVA0PN4LLzbkFDyc+K6x35YKe44BYUIqY48fD6lSjKQ3kcpRq+90jwJBB1CzE8T9zDUyW0cMFLGC4MudgLcOLgx4fWoUDwHc0atFSqD3EKu2ahPQnBNuxYFLS4JkOcUMJ7ysDD0VvdR4qtWCcXwTBDIOG8LJTWU5dLIvyJ0NYnUqxggSptrgsfEg9G5uXYuTYTg3xOKUu034ujcEIoBn/fF9ymh4BssSALVzwiVQWE1Mt2u5Wyqn8cT4YJJv2kbTn4jYKQSOwFU3AiGNoRxPmMEFGDi27hOqAysFTvfkvlg058JhaesdyV99Gpq74gbc6md6kz4xeSHIG9mcUZt4o4tYE0IAQHG5ONv0Rfx7+Tc4FWZSDP0/5yuKfzd6O/Av4t+v6PIv63GejYP1AKFCPGG+y6b3IGM+oVSpdXdCO2PS4DP0u/kCqKWgcP7i96JFRicM/LQOYmvWkrBUxu+r6TUJP5QyC2ErxxG7+dB0mbUVnGZBImjFYP9SvUkdCHIvyK8repBDLI+bXiaWjwygOiFSJW/8fkjDr4bhM6NwmqETmBc32/yTeN6oQ4JTHY/hBxIBKm1tP1SofOhF9Yd3mqNehk+K6TLtLBa7Gl0hvWrkPv0rp9NyQlLVu0tcZ8WMyZkAu5w7WI/1vcg6CVYnScRSM2Ngh7ixeWIUIgQOsQQxMFdCynWFfdfKM1WkFuIt7XvFNrneZC0Gb1NXKygkBVB5+XI9zUZM8ED0mwFBdZI73GU207UuF0oq5jxYi8KpZCp+N8IqY4+eGoiRO8RyiqoNnl+o14Xqn1gy/2GnwrdXOlQs2WmcRce4IZESPbNtC14ob4TS9vybx0bhrT+up0/wFvCM42rMeBzTefKv2moC6xIP9WphFGiRIm2Uan8A5P1VUFegHYqAAAAAElFTkSuQmCC"></a> <a href="'.base_url().'admin/users/orders/'.$customers->id.'"> <i class="material-icons md-24" >shopping_cart</i></a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->users_model->count_all(),
						"recordsFiltered" => $this->users_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	
	public function orders($uid)
	{      $data['user']=$this->users_model->getuser($uid);
		   $data['userorders']=$this->users_model->getorders($uid);
		     
		   $this->load->view("admin/users_orders",$data);
	}
	
	public function details($uid)
	{      $data['user']=$this->users_model->getuser($uid);
		  
		     
		   $this->load->view("admin/user_detail",$data);
	}
	
	public function deleteuser($id)
	{
		$this->users_model->deleteuser($id);
		$this->session->set_flashdata("success", "Users deleted successfully.");
		redirect(base_url()."admin/users","refresh");
	}
	
	public function ajax_city()
    {
		//echo "fgfdgf"; exit;
    $sid=$this->input->post('state');
	
    $data['cities'] = $this->city_model->ajaxlist($sid);
    $data['selected_city']=$this->input->post('city');
	
    $this->load->view('admin/ajax_get_city',$data);
	
    }

}
