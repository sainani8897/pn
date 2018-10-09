<?php
class Banner_model extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	function getsliderlist()
	{
		$sql="SELECT * FROM sliders order by s_id desc";
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->result_array();			
		} else {
		 
		   return $result->result_array();
		}
		
	}


	public function getorderbyid($table, $id)
    {
        $this->db->order_by($id, "desc");
        $query = $this->db->get($table);
        //print_r($query->result_array());
        return $query;
    }
      public function getserorderbyid($table, $id,$type)
    { 
        $this->db->where('type', $type);
        $this->db->order_by($id, "desc");
        $query = $this->db->get($table);
       // print_r($query->result_array());
        return $query;
    }

     public function insert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        //  $insert_id = $this->db->insert_id();        
        //  $number = sprintf('%04d',$insert_id);
        //   $adminid = 'ADM'.$number;
        //   $aid = array('first_name'=>$adminid);
        //   $this->db->where('admin_id',$insert_id);
        //   $this->db->update('admins', $aid);  
        // return  $insert_id;      
        
        return $query;
    }


	
	function addslider($data)
	{
		$this->db->insert('sliders',$data);
	}
	
	function getslider($id)
	{
		$sql = "SELECT * from sliders WHERE s_id = '$id' ";	
		$result = $this->db->query($sql);
		if($result && $result->num_rows()>0)
		{
			return $result->row_array();			
		}
		
	}
	
	function updateslider($bid,$data)
	{
		if(!(isset($data[0])))$data[0] = $data;
		$arr = array('s_id' => $bid);		
		$this->db->where($arr); 
		$this->db->update("sliders", $data[0]);		
		return TRUE;
		
	}
	
	function deleteslider($id)
	{
		$this->db->where('s_id', $id);
        $this->db->delete('sliders');
		return TRUE;		
	}
	
	function sliderslist()
	{
		$sql="SELECT * FROM sliders where status=1 order by sort_order asc";
		$result = $this->db->query($sql);
		return $result->result_array();		
	}


	 public function view($table, $id)
    {
        $query = $this->db->get_where($table, $id);
        return $query->row_array();
    }
    
    public function edit($table, $id)
    {
        $query = $this->db->get_where($table, $id);
        return $query->row_array();
    }

    public function update($table, $data, $id)
    {
        //$this->db->where('admin_id', $id);
        $this->db->update($table, $data, $id);
        $query = $this->db->affected_rows();
        return $query;
    }


    public function delete($table, $id)
    {
        // $query = $this->db->delete($table,$id);
        // return $query; 
        print_r($id);
        $query = $this->db->get_where($table, $id);
        print_r($query->num_rows()); 
        if ($query->num_rows() > 0) {
            $row           = $query->row();
            $photo         = $row->image;
            if (is_file(FCPATH.$photo)) 
            unlink(realpath($photo));
            $this->db->delete($table, $id);
            return true;
        }
        return false;
    }
    
    
	
}
?>