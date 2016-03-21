<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class new_message_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	/* inserts deployment calculations*/
	function insert_delpoy_calc($data,$data_id,$deploy_date,$shift,$mem,$veh,$bik)
	{
		$data_calc = array();
		$data_calc['total_members']		=	$mem;
		$data_calc['total_vehicles']		=	$veh;
		$data_calc['total_bikes']		=	$bik;

		$this->db->where('date', $deploy_date);
		$this->db->where('shift', $shift);
		
	 	$this->db->update('deployment_calculations',$data_calc);


	}

	function update_delpoy_calc($data,$deploy_date,$shift)
	{
		//deployment header
		$this->db->where('date', $deploy_date);
		$this->db->where('shift', $shift);
	 	$this->db->update('deployment_calculations',$data);

	}

	

	/*
	Action insert or update
	*/
	function insert($data,$data_id)
	{	
		
		if ($data_id == '')
		{
			//update deployment plan
			$result = $this->db->insert('deployment_plan',$data);
	
			return $result;
			
		}
		else
		{
		
			$this->db->where('id', $data_id);
			$result = $this->db->update('deployment_plan',$data);
		
			return $result;
		
		}	
	}
	
	/*
	Remove not used
	*/
	function remove($data_id)
	{
		
	 	return $this->db->delete('`table`', array('id' => $data_id));
				
	}
	
	function regions($user_region)
	{
	
	
	if($user_region != 17)
	{
		$this->db->select('*');
		$this->db->from('deployment_regions');
		$this->db->where('region_id',$user_region);	
		

		$query = $this->db->get();
		}else{
		
		$query = $this->db->get('deployment_regions');
		
		
		}
		$result = $query->result_array();
		
		return $result;
	}
	
	function day_dep($shift,$date)
	{

		$this->db->select('*');
		$this->db->from('deployment_plan');
		$this->db->like('date', $date);	
		$this->db->where('shift', $shift);	
		
		$query = $this->db->get();
		$result = $query->result_array();

		return $result;
	}
	
	function update($data_id,$data)
	{
		$query = $this->db->get_where('deployment_plan', array('id' => $data_id),1);
		if ($query->num_rows() ==1)
		{
			$this->db->where('id', $data_id);
		        $result = $this->db->update('deployment_plan',$data);
			return $result;
			
		}
		
		return 0;
		
		
		
	}
	
	/*
	Conclude 
	*/
	function conclude($data_id,$data)
	{
		$query = $this->db->get_where('deployment_calculations', array('id' => $data_id),1);
		if ($query->num_rows() ==1)
		{
			$this->db->where('id', $data_id);
			$result = $this->db->update('deployment_calculations',$data);
			return $result;
			
		}
		
		return 0;
				
	}

function get_shifts()
	{
		$this->db->select('*');
        $this->db->from('shifts');
		
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
	
function get_totals($date,$shift)
	{
		$this->db->select('*');
        	$this->db->from('deployment_calculations');
		$this->db->where('date', $date);
		$this->db->where('shift', $shift);

        	/*$this->db->order_by('id', 'DESC');
         	$this->db->limit(1);*/
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}



}