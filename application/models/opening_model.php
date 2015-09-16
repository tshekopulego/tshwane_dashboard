<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Opening_model extends CI_Model
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
		$this->db->where('opening_hours_id', $data_id);
		$result = $this->db->update('opening_hours',$data);
		
		return $result;
	}
	
	/*
	Remove 
	*/
	function remove($data_id)
	{
		
	 	return $this->db->delete('`table`', array('opening_hours_id' => $data_id));
				
	}
}