<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model
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
			$result = $this->db->insert('notifications',$data);
			
			return $result;
			
		}else{
		
			$this->db->where('id', $data_id);
			$result = $this->db->update('notifications',$data);
		
			return $result;
			
			}	
		}
		function send($data,$data_id)
	       {
		
			$this->db->where('id', $data_id);
			$result = $this->db->update('notifications',$data);
		
			return $result;
			
				
		}

	/*
	Get category
	*/
	function category()
	{

		$query = $this->db->get("notifications");
		$result = $query->result_array();
		
		return $result;
	}
	
	function language()
	{

		$query = $this->db->get("language");
		$result = $query->result_array();
		
		return $result;
	}
	
	/**Action insert or update
	*/
	function preview($data,$data_id)
	{
		
		
		if ($data_id == '')
		{
			$result = $this->db->insert('notifications',$data);
			
			return $result;
			
		}else{
		
			$this->db->where('id', $data_id);
			$result = $this->db->update('notifications',$data);
		
			return $result;
			
			}
			
				
	}
	
		
	/*
	Remove 
	*/
	function remove($data_id)
	{
		
	 	return $this->db->delete('notifications', array('id' => $data_id));
				
	}
	
	
	
	
}