<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	/*
	Attempts to login user and set session. Returns boolean based on outcome.
	*/
	function login_val($username, $password)
	{
		$query = $this->db->get_where('user', array('user_name' => $username,'user_password'=>md5($password)),1);
		if ($query->num_rows() ==1)
		{
			$row=$query->row();
			$this->session->set_userdata('user_id', $row->user_id);
			$this->session->set_userdata('user_group', $row->user_group);
			$this->session->set_userdata('user_region', $row->user_region);
			return true;
			
		}
		
		return false;
		
	}
	/*
	Reset the password from the database
	*/
	function reset_password($user_reset_payno,$user_username,$user_idno,$user_password,$data)
	{
	      
		$query = $this->db->get_where('user', array('user_paysal' => $user_reset_payno,'user_identityNo'=>$user_idno,'user_name'=>$user_username),1);
		if ($query->num_rows() ==1)
		{
			$this->db->where('user_paysal', $user_reset_payno);
			$result = $this->db->update('user',$data);
			if($result>0){
			      $query = $this->db->get_where('user', array('user_name' => $user_username,'user_password'=>md5($user_password)),1);
				if ($query->num_rows() ==1)
				{
					$row=$query->row();
					$this->session->set_userdata('user_id', $row->user_id);
					$this->session->set_userdata('user_group', $row->user_group);
					$this->session->set_userdata('user_region', $row->user_region);
					return true;
					
				}
				
			}
		
	   	}
	   return false;
	}	
	/*
	Logs out a user by destorying all session data and redirect to login
	*/
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	
	
	
   /*
	Gets information about a particular user
	*/
	function get_info($user_id)
	{
		$this->db->from('user');	
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			//Get empty base parent object, as $employee_id is NOT an employee
			$person_obj = parent::get_info(-1);
			
			//Get all the fields from employee table
			$fields = $this->db->list_fields('user_name');
			
			//append those fields to base parent object, we we have a complete empty object
			foreach ($fields as $field)
			{
				$person_obj->$field='';
			}
			
			return $person_obj;
		}
	}
	
	/*
	Determins if a user is logged in
	*/
	function is_logged_in()
	{
		return $this->session->userdata('user_id')!=false;
	}
	
	/*
	Gets information about the currently logged in user.
	*/
	function get_logged_in_user_info()
	{
		if($this->is_logged_in())
		{
			return $this->get_info($this->session->userdata('user_id'));
		}
		
		return false;
	}
}	
	

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */