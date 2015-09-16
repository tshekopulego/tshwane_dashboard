<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

   /*
	Gets information about a particular user
	*/
	function get()
	{
		$this->db->where('user_id', 1);
		$query = $this->db->get('user');
		
		return $query;
	}
	/*
	Action update data user
	*/
	function update($data, $data_id)
	{

			$this->db->where('user_id', $data_id);
			$result = $this->db->update('user',$data);
		
			return $result;
			
	}
		
}