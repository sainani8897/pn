<?php
class Media extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');					
		$this->load->model("admin/media_model");	
		$isLoggedIn = $this->session->userdata('isLoggedIn');      
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
           redirect(base_url()."admin/login","refresh");
        }	
	}
	
	public function index()
	{
		
		$data['medias']=$this->media_model->getmedialist();
		$this->load->view("admin/media_view",$data);		
	   
	}
	
	public function addmedia()
	{
		
		 $fckeditorConfig = array(
          'instanceName' => 'content',
          'BasePath' => base_url().'assets/fckeditor/',
          'ToolbarSet' => 'Basic',
          'Width' => '100%',
          'Height' => '200',
          'Value' => '');
   $this->load->library('fckeditor', $fckeditorConfig);
  // $this->load->view('fckeditorView');
 
  
		if(!(empty($_POST)) && ($_POST['media_func'] == "add"))
		{			
		    $data=array("media_name"=>$this->input->post('name'),"description"=>$this->input->post('description'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'));				
			$this->media_model->addmedia($data);	
			$this->session->set_flashdata("success_add","Media Added successfully.");
			redirect(base_url()."admin/media","refresh");			
		} else {		
		 
		$this->load->view("admin/media_add");		
	   }
	}
	public function editmedia($id)
	{
		
		if(!(empty($_POST)) && ($_POST['media_func'] == "edit"))
		{			
			 $data=array("media_name"=>$this->input->post('name'),"description"=>$this->input->post('description'),"status"=>$this->input->post('status'),"sort_order"=>$this->input->post('sort_order'));	
			
			$this->media_model->updatemedia($id,$data);	
			$this->session->set_flashdata("success","Media updated successfully.");			
			redirect(base_url()."admin/media","refresh");
			
		} else {			
		 		   
           $data['media']=$this->media_model->getmedia($id);
		   $this->load->view("admin/media_edit",$data);
			
		}		
	}
	
		
	public function deletemedia($bid)
	{
				
		$this->media_model->deletemedia($bid);
		$this->session->set_flashdata("success", "Media deleted successfully.");
		redirect(base_url()."admin/media","refresh");			
	}
	
	
	function fckeditorform(){
    
   $fckeditorConfig = array(
          'instanceName' => 'content',
          'BasePath' => base_url().'assets/fckeditor/',
          'ToolbarSet' => 'Basic',
          'Width' => '100%',
          'Height' => '200',
          'Value' => '');
   $this->load->library('fckeditor', $fckeditorConfig);
  // $this->load->view('fckeditorView');
  $data['fck1'] = $this->fckeditor->CreateHtml();
        
}
function fckeditorshowpost(){
    
        echo $this->input->post('content');
        
}
	
	
}
?>