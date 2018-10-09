<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{	


	public $isLogin = TRUE;
	function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/login_model');
		$this->load->library('form_validation');
	}
	public function index()
	{	
       
		$isLoggedIn = $this->session->userdata('isLoggedIn');        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
		   $data['settings']=$this->login_model->settings();	
           $this->load->view('admin/login_view',$data);
        }
        else
        {
           redirect(base_url()."admin/dashboard","refresh");
        }
	}
	
	function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           $this->load->view('admin/login_view');
        }
        else
        {
           redirect(base_url()."admin/dashboard","refresh");
        }
    }
	
	public function user_login()
    {
       
        
       // $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|xss_clean|trim');
        //$this->form_validation->set_rules('password', 'Password', 'required|max_length[32]|');
       if($this->input->post('email')!=NULL){
         
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
			
			$loginattempt = $this->login_model->loginattempt();
            
            $result = $this->login_model->loginMe($email, $password);
          
            if($result!=NULL)
            {
                foreach ($result as $res)
                {
                    $sessionArray = array('userId'=>$res['admin_id'],
                                           'name'=>$res['admin_username']
                                           );
                                    
                    $this->session->set_userdata($sessionArray);
					$this->session->set_userdata('isLoggedIn','TRUE');
					
					redirect(base_url()."admin/dashboard","refresh");
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');
                
                redirect(base_url()."admin/login","refresh");
            }
	   } else {
		   
		   redirect(base_url()."admin/login","refresh"); 
		   
	   }
      
    }
	
	protected function sendSMS($to,$msg){
		
		$curl = curl_init();
		$url = "http://speed.igrandsms.in/websms/sendsms.aspx";
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt ($curl, CURLOPT_POST, 1);
		$post_params = "userid=igdemo&password=IgDemo@2017&sender=IGrand&mobileno=".$to."&msg=".$msg;
		curl_setopt ($curl, CURLOPT_POSTFIELDS, $post_params);
		//curl_setopt ($curl, CURLOPT_COOKIEJAR, '/tmp/sms_cookie.txt');
		curl_setopt ($curl, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec ($curl);
		
		return $result;
	
	}
	
	
	
	
}
?>