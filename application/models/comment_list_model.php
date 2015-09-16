<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_list_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function active($data,$data_id)
	{
		
			$this->db->where('comment_id', $data_id);
			$result = $this->db->update('comment',$data);
		
			return $result;
			
	}
	
}