<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('login_model');
		
	}
	
	function index()
	{

		if($this->login_model->is_logged_in())
		{
		redirect('main');
		}
		else
		{
		$this->load->view('login');
		}
		
	}
		
	function login_check()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$login = $this->login_model->login_val($username,$password);
		if($login){ echo "success"; }else{ echo "failed"; }
		
	}
	function reset_password()
	{
		$payno =  $this->input->post("pay_no");
		$username =  $this->input->post("user_name");
		$user_idno =$this->input->post("identity_no");
		$password =  $this->input->post("password");
		//echo $username;
	       
		    	$data=array();
			$data['user_password'] = md5($password);
			
			$results=$this->login_model->reset_password($payno,$username,$user_idno,$password,$data);
			
			
			//return echo json_encode($results);
			if($results){
			   echo "success";
			}else{
			   echo "failed ";
			}
	
		//echo json_encode($this->input->post("pay_no"));
		
	}
		
	function logout()
	{
		$this->login_model->logout();
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */