<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class List_model extends CI_Controller
{

	public function index()
	{	

		$this->load->view('list_order');
	}
	
	function get_log_id($incident_id)
	{
	   
	    $query = $this->db->get_where('log_incident', array('incident_id'=> $incident_id),1);
	
		if ($query->num_rows() == 1)
		{
			$this->db->select('*');
			$this->db->from('log_incident');
			$this->db->where('incident_id',$incident_id);
			
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		
		 return 0;	
	}
	function insert_log_id($incident_id)
	{
		
		$result = $this->db->insert('log_incident',$incident_id);	
		return $result;
		

	}
	function delete_log_id($incident_id)
	{
		 return $this->db->delete('log_incident', array('incident_id' => $incident_id));
	}
	/*
	Action insert or update the assigned incidents
	*/
	
	function insert_history($data,$data_id)
	{
		if ($data_id == '')
		{
			$result = $this->db->insert('history',$data);	
			return $result;
			
		}
		else
		{
		
			$this->db->where('incident_id', $data_id);
			$result = $this->db->update('history',$data);
		
			return $result;
			
		}	
	}

 	/*
	Action insert or update the incidents
	*/
	function insert($data,$data_id)
	{
		if ($data_id == '')
		{
			$result = $this->db->insert('crimereport',$data);
			
			return $result;
			
		}
		else
		{
		
			$this->db->where('category_id', $data_id);
			$result = $this->db->update('crimereport',$data);
		
			return $result;
			
		}	
	}
		
	/*
	Action recapture the incidents
	*/
	function recapture($data,$data_id)
	{
		if ($data_id == '')
		{
			$result = $this->db->insert('crimereport',$data);
			
			return $result;
			
		}else{
		
			$this->db->where('category_id', $data_id);
			$result = $this->db->update('crimereport',$data);
		
			return $result;
			
			}	
		}
	
	function get_incidents_by(){
	
	   $this->db->select('RefNum, description, car_reg_num, num_persons, area, type, reportedon, location, region, address, lat AS latidute, lot AS longidute, user, reportedby, mobile,status, capturedby, RecapRefNum, channel');
	
        $this->db->from('crimereport');

        $this->db->order_by('RefNum', 'DESC');
		
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	
	}
	function get_incidents(){
	
	     $query = $this->db->get("crimereport");
	     $result = $query->result_array();
	     
	     return $result;
	}

	function category_area()
	{

		$query = $this->db->get("category");
		$result = $query->result_array();
		
		return $result;
	}
	
	function get_crimetype()
	{
		$query = $this->db->get("type");
		$result = $query->result_array();
		
		return $result;
	}
		
	function channels()
	{

		$query = $this->db->get("channel");
		$result = $query->result_array();
		
		return $result;
	}
	
	function regions()
	{

		$query = $this->db->get("regions");
		$result = $query->result_array();
		
		return $result;
	}
	function get_dept()
	{

		$query = $this->db->get("department");
		$result = $query->result_array();
		
		return $result;
	}

function get_group_id()
	{

$user_group_id = $this->session->userdata('user_group');

$this->db->select('escalation_id');
                $this->db->from('groups');
                $this->db->where('group_id',$user_group_id);

$query = $this->db->get();
$result = $query->result_array();
return  $result ;


}
	
	 function managers($escalation_id)
	{

	       $user_region =   $this->session->userdata('user_region');


		  $this->db->select('user_full_name');
              	  $this->db->from('user');
               	  $this->db->where('user_group', $escalation_id);
		  $this->db->where('user_region', $user_region );
 
		  $query = $this->db->get();
		
		  $result = $query->result_array();
	
		return $result;
		
	}
	
	function vehicle_type()
        {
                 $user_id =  $this->session->userdata('user_id');
		 $user_manager =  $this->session->userdata('user_group');
		 $user_region =   $this->session->userdata('user_region');
		
		$this->db->select('*');
                $this->db->from('assets');
                $this->db->where('region',$user_region);
 		$this->db->where('status','Operational');
                
		
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
        }

        function get_category($category_id)
	{
	   $query = $this->db->get('category', array('category_id' => $category_id));
	    
	   return $query->row();
	   
		
	}

	function remove($data_id)
	{
	    return $this->db->delete('crimereport', array('id' => $data_id));
		
	}


	function activity($case_num)
	{
	    
		$this->db->select('*');
                $this->db->from('crimereport_history');
                $this->db->where('RefNum',str_replace("_","/",$case_num));
                
		
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
		
	}
}