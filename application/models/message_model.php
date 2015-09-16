<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class message_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	/*
	Action insert or update
	*/
	function insert($data,$data_id)
	{	
		
		
		
		
		if ($data_id == '')
		{
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
	Remove 
	*/
	function remove($data_id)
	{
		
	 	return $this->db->delete('`table`', array('id' => $data_id));
				
	}
	
	function regions($user_region)
	{
	
	
	if($user_region != 'Nodal Point')
	{
	$this->db->select('*');
		$this->db->from('deployment_regions');
		$this->db->where('region_name',$user_region);	
		

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
}