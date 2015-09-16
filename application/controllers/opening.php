<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Opening extends CI_Controller
{

	public function index()
	{	

		$this->load->view('opening');
	}

	/*
	Get requst data from datatables.
	*/
	
	public function get()
	{
		// Get data opening hours
		$result = $this->datatables->getData('opening_hours', array('opening_hours_day','opening_hours_open','opening_hours_close','opening_hours_id'), 'opening_hours_id');
		echo $result;
	}

	/*
	Get action handle insert and update data.
	*/	
	public function insert()
	{
		
		$insert_id = $this->input->post('opening_hours_id');

		$data = array();
		$data['opening_hours_day']		=	$this->input->post('opening_hours_day');
		$data['opening_hours_open']		=	$this->input->post('opening_hours_open');
		$data['opening_hours_close']	=	$this->input->post('opening_hours_close');
		
		$this->load->model('opening_model');
		$result = $this->opening_model->insert($data,$insert_id);
		
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
	Get action handle remove data.
	*/	
	public function remove()
	{
		$data_id = $this->input->post('remove_table_id');
		
		$this->load->model('table_model');
		$result = $this->table_model->remove($data_id);
		
		if($result)
		echo "Data remove was successful!";
		else
		echo "Data remove not successful!";
		
	}
}

/* End of file category.php */
/* Location: ./application/controller/category.php */