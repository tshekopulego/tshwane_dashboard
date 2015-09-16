<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language extends CI_Controller
{
	public function index()
	{
		$this->load->view('language');
	}

	/*
	Get requst data from datatables.
	*/
	public function get()
	{
		// Get data user
		$result = $this->datatables->getData('language', array('language_code','language_name','language_desc','language_id'), 'language_id');
		echo $result;
	}

	/*
	Get action handle insert and update data.
	*/	
	public function insert()
	{	

		$insert_id = $this->input->post('language_id');

		$data = array(
		'language_name'=>$this->input->post('language_name'),
		'language_code'=>$this->input->post('language_code'),
		'language_desc'=>$this->input->post('language_desc')
		);		
		
		$this->load->model('language_model');
		$result = $this->language_model->insert($data,$insert_id);

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
		$data_id = $this->input->post('remove_language_id');
		
		$this->load->model('language_model');
		$result = $this->language_model->remove($data_id);
		
		if($result)
		echo "Data remove was successful!";
		else
		echo "Data remove not successful!";
		
	}
}

/* End of file language.php */
/* Location: ./application/controller/language.php */