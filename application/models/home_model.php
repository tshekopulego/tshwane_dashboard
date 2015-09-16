<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get($category)
	{
		if($category != 'test'){
			$this->db->where('markers_category_id', $category);
		}

		$query = $this->db->get('markers');
		$result = $query->result_array();
		
		return $result;
	}

	function route()
	{

		$query = $this->db->get('route_view');
		$result = $query->result_array();
		
		return $result;
	}
	
	function category()
	{
		$this->db->select('category.category_id, category.category_name, COUNT(markers_category_id) AS count');
        $this->db->from('category');
        $this->db->order_by('count', 'desc');

		$this->db->join('markers', 'category.category_id = markers.markers_category_id','left');
        $this->db->group_by('category.category_name');
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
}