<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model
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
			$result = $this->db->insert('enquiry',$data);
			
			return $result;
			
		}else{
		
			$this->db->where('category_id', $data_id);
			$result = $this->db->update('enquiry',$data);
		
			return $result;
			
			}	
		}

	/*
	Get category
	*/
	function enquiry()
	{

		$query = $this->db->get("enquiry_type");
		$result = $query->result_array();
		
		return $result;
	}
	
	/*
	Remove 
	*/
	function remove($data_id)
	{
		
	 	return $this->db->delete('menu', array('menu_id' => $data_id));
				
	}
	
	
	
}