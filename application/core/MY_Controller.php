<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Controller extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		
	}

	function index()
	{

		//if(!$this->session->userdata('session_id'))
		//{
		redirect('login');
		//}
		
	}
		
}

class MY_controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */