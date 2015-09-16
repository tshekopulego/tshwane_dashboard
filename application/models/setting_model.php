<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_model extends CI_Model
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
			$result = $this->db->insert('setting',$data);
			
			return $result;
			
		}else{
		/*
		$this->db->where('setting_id', $data_id);
		$result = $this->db->update('setting',$data);
	*/
	$this->db->where('setting_id',$data_id);
			$result = $this->db->update('setting',$data);
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
	Get category
	
	function setting()
	{

		$query = $this->db->get("setting");
		$result = $query->result_array();
		
		return $result;
	}		*/
	/*
	Remove 
	*/
	function remove($data_id)
	{
		
	 	return $this->db->delete('setting', array('setting_id' => $data_id));
				
	}
}