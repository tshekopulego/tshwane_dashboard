<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function getUser($logged_user_name)
	{
		$this->db->select('*');
                $this->db->from('user');
                $this->db->where('user_name',$logged_user_name);
                
		
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
	
	/*
	Action insert or update
	*/
	function insert($data,$data_id)
	{
		
			$this->db->where('user_id', $data_id);
			$result = $this->db->update('user',$data);
			return $result;
			
	}

	function reset($data,$user_id)
	{
	      $this->db->where('user_id', $user_id);
	      $result = $this->db->update('user',$data);
	    return $result;
	}
	/*
	Remove  NB Never used
	*/
	function remove($data_id)
	{
		
	 	return $this->db->delete('`table`', array('table_id' => $data_id));
				
	}
}