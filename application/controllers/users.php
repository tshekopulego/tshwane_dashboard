<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{

	public function index()
	{
		$this->load->model('user_model');
		$data['query'] = $this->user_model->get()->row();
		$this->load->view('user', $data);
	}

	/*
	Get action handle update data.
	*/	
	public function update()
	{
		$data = array();	
		$data['user_name']  = $this->input->post('user_name');
		if($this->input->post('user_password') != ''){
			$data['user_password'] = md5($this->input->post('user_password'));
		}
		$this->load->model('user_model');
		$result = $this->user_model->update($data,1);
		// Cek status data update
		if($result)
			echo "Data update was successful!";
		else
			echo "Data update was successful!";
	}

}
/* End of file user.php */
/* Location: ./application/controller/user.php */