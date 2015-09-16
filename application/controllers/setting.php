<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller
{

	public function index()
	{	

		$this->load->view('setting');
	}
	/*
	Get type data.
	*/		
	public function get_regions()
	{
		$this->load->model('setting_model');
		$region= $this->setting_model->regions();
		
		echo json_encode($region);
	}
	

	/*
	Get requst data from datatables.
	*/
	public function get()
	{
		// Get data menu 
		$result = $this->datatables->getData('setting', array('setting_name','setting_address','setting_telephone','setting_email','setting_region','setting_code','setting_images','setting_commander','setting_latitude','setting_longitude','setting_id'), 'setting_id');
		echo $result;
	}

	/*
	Get action handle insert and update data.
	*/	
	public function insert()
	{
		
		$insert_id = $this->input->post('setting_id');
		$data = array();
		$data['setting_name']			=	$this->input->post('setting_name');
		$data['setting_address']		=	$this->input->post('setting_address');
		$data['setting_telephone']		=	$this->input->post('setting_telephone');
		$data['setting_email']			=	$this->input->post('setting_email');
		$data['setting_region']			=	$this->input->post('setting_region');
		$data['setting_code']			=	$this->input->post('setting_code');
		$data['setting_latitude']		=	$this->input->post('setting_latitude');
		$data['setting_longitude']		=	$this->input->post('setting_longitude');
		$data['setting_commander']		=	$this->input->post('setting_commander');
		
		// Upload Foto
		$config['path']   = './upload/gambar/';
		$config['format'] =	array("jpg", "png", "gif", "bmp");
		$config['size']   = '1024';
	   
		$this->load->library('ajaxupload');
		$this->ajaxupload->getUpload($config,"setting_images");
		$query = $this->ajaxupload->query();
		
		if($query['file_name'] != ''){
			$data['setting_images'] = '<img src="../upload/gambar/'.$query['file_name'].'" width="100%"></img>';
			$data['setting_img'] = $query['file_name'];		
		}
		
		$this->load->model('setting_model');
		$result = $this->setting_model->insert($data,$insert_id);
		
		// Cek data insert or data update
		if($result)
			echo "Data insert was successful!";
		else
			echo "Data insert not success!";
	}
	
	/*
	Get action handle remove data.
	*/	
	public function remove()
	{
		$data_id = $this->input->post('remove_setting_id');

		$this->load->model('setting_model');
		$result = $this->setting_model->remove($data_id);
		
		if($result)
		echo "Data remove was successful!";
		else
		echo "Data remove not successful!";
		
	}
}

/* End of file category.php */
/* Location: ./application/controller/category.php */