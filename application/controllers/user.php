<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	public function index()
	{
		$this->load->view('user');
	}

	/*
	Get requst data from datatables.
	*/
	public function get()
	{
	       

		// Get data user
		$result = $this->datatables->getData('user', array('user_paysal','user_identityNo','user_name','user_full_name','user_email','user_phone','user_address','group_name','user_region','user_group','user_password','user_id'), 'user_id', array('groups','groups.group_id = user.user_group','inner'));
		
		
		
		echo $result;
	}
/*
	/*
	Get action handle insert and update data.
	*/	
	public function viewinsert()
	{	

		$insert_id = $this->input->post('user_id');
                
		$data = array(
		'user_paysal'=>$this->input->post('paynum1'),
		'user_name'=>$this->input->post('user_name1'),
		
		'user_identityNo'=>$this->input->post('user_idno1'),
		'user_region'=>$this->input->post('user_region'),
		'user_group'=>$this->input->post('user_group1'),
		'user_full_name'=>$this->input->post('user_full_name1'),
		'user_email'=>$this->input->post('user_email1'),
		'user_phone'=>$this->input->post('user_phone1'),
		'user_address'=>$this->input->post('user_address1')
		
		
		);		
		
		$this->load->model('user_model');
		$result = $this->user_model->insert($data,$insert_id);

		// Cek data insert or data update
		if(!$insert_id)
			if($result)
				echo "Data insert was successful!";
			else
				echo "Data insert not success!";
		else
			if($result)
				echo "Data update was successful!";
			else
				echo "Data update not successful!";
	}



	/*
	Get action handle insert and update data.
	*/	
	public function insert()
	{	

		$insert_id = $this->input->post('user_id');
                
		$data = array(
		'user_paysal'=>$this->input->post('paynum'),
		'user_name'=>$this->input->post('user_name'),
		'user_password'=>md5($this->input->post('password')),
		'user_identityNo'=>$this->input->post('user_idno'),
		'user_group'=>$this->input->post('user_group'),
		'user_full_name'=>$this->input->post('user_full_name'),
		'user_email'=>$this->input->post('user_email'),
		'user_phone'=>$this->input->post('user_phone'),
		'user_address'=>$this->input->post('user_address'),
		'user_aktif'=>$this->input->post('user_aktif'),
		'user_region'=>$this->input->post('user_reg')
		);		
		
		$this->load->model('user_model');
		$result = $this->user_model->insert($data,$insert_id);

		// Cek data insert or data update
		if(!$insert_id)
			if($result)
				echo "Data insert was successful!";
			else
				echo "Data insert not success!";
		else
			if($result)
				echo "Data update was successful!";
			else
				echo "Data update not successful!";
	}
	
	public function get_group()
	{
		$this->load->model('user_model');
		$group = $this->user_model->group();
		
		echo json_encode($group);
	}
		
	public function get_regions()
	{
		$this->load->model('user_model');
		$region= $this->user_model->regions();
		
		echo json_encode($region);
	}
	/*
	Get action handle remove data.
	*/	
	public function remove()
	{
		$data_id = $this->input->post('remove_user_id');
		
		$this->load->model('user_model');
		$result = $this->user_model->remove($data_id);
		
		if($result)
		echo "Data remove was successful!";
		else
		echo "Data remove not successful!";
		
	}
	
	public function get_managers($region,$group)
	{
		$this->load->model('user_model');
		$result = $this->user_model->managers($region,$group);
		
		echo json_encode($result);
	}
}

/* End of file category.php */
/* Location: ./application/controller/category.php */