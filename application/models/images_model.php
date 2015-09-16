<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Images_model extends CI_Model
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
			$result = $this->db->insert('images',$data);
			
			return $result;
			
		}else{
		
			$this->db->where('images_id', $data_id);
			$result = $this->db->update('images',$data);
		
			return $result;
			
			}	
		}
		
	
	/*
	Remove 
	*/
	function remove($data_id)
	{
		
	 	return $this->db->delete('images', array('images_id' => $data_id));
				
	}
	
	
	
}