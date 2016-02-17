<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class supervisor_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	/*update model*/
	function update($data,$data_id)
	       {
		
			$this->db->where('report_id', $data_id);
			$result = $this->db->update('sup_report',$data);
		
			return $result;
			
				
		}

	/*
	Action insert or update
	*/
	function insert($data,$data_id)
	{
		if ($data_id == '')
		{
			$result = $this->db->insert('sup_report',$data);
			
			return $result;
			
		}else{
		
			$this->db->where('report_id', $data_id);
			$result = $this->db->update('sup_report',$data);
		
			return $result;
			
			}	
		}
		
	function regions()
	{

		$query = $this->db->get("regions");
		$result = $query->result_array();
		
		return $result;
	}

	/*
	Remove 
	*/
	function remove($data_id)
	{
		
	 	return $this->db->delete('assets', array('assets_id' => $data_id));
				
	}
	
	
	
}