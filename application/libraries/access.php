<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access
{
	
	public $user
	
	function __construct()
	{
		$this->CI =& get_instance();
		$auth = $this->CI->config->item('auth');
		
		$this->CI->load->helper('cookie');
		$this->CI->load->model('user_model');
		
		$this->user_model =& $this->CI->user_model;
	}

	/* Cek Login */
		
	function login($username, $password)
	{
		$result = $this->user_model->get_login_info($username);
		if ($result)
			{
				$password = md5($password);
				if ($password === $result->password)
			{	
				//Start session
				$this->CI->session->set userdata('user_id',$result->user_id);
				return TRUE;
			 }
		}
		return FALSE	
	}
	
	/* Cek apa bila user sudah login */
	
	function is_login()
	{
		return (($this->CI->session->userdata('user_id')) ? TRUE : FALSE);
	}
	
	/* Logout */
	
	function logout()
	{
		$this->CI->session->unset_userdata('user_id');
	}	
		
}
?>