<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_model extends CI_Model
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
			$result = $this->db->insert('groups',$data);
			
			return $result;
			
		}else{
		
			$this->db->where('group_id', $data_id);
			$result = $this->db->update('groups',$data);
		
			return $result;
			
			}	
		}

	function insert_access($rowId, $group, $columns, $value)
	{
		$this->load->database();
		
		$newData = array(
						'access_module_id' => $rowId,
						'access_group_id' => $group,
						$columns => $value
					);
		$this->db->insert('access', $newData);
	}
	
	function update_access($Ids, $columns, $value)
	{
		$this->load->database();
			
		$newData = array(
						$columns => $value
					);
		$this->db->where('access_id', $Ids);
		$this->db->update('access', $newData);
	}		
	
	/*
	Remove 
	*/
	function remove($data_id)
	{
		
	 	return $this->db->delete('groups', array('group_id' => $data_id));
				
	}
	
	
	
}