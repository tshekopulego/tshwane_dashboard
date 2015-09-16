<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller
{

	public function index()
	{	

		$this->load->view('category');
	}

	/*
	Get requst data from datatables.
	*/
	public function get()
	{
		// Get data category
		$result = $this->datatables->getData('category', array('category_name','category_desc','category_image','category_id'), 'category_id');
		echo $result;
	}

	/*
	Get action handle insert and update data.
	*/	
	public function insert()
	{	
	
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$user_name = $get_logged_in_user_info->user_name;

		// Upload logo
		$config['path']   = './upload/gambar/';
		$config['format'] =	array("jpg", "png", "gif", "bmp");
		$config['size']   = '1024';
	   
		$this->load->library('ajaxupload');
		$this->ajaxupload->getUpload($config,"category_img");
		$query = $this->ajaxupload->query();
		
		$insert_id = $this->input->post('category_id');
		
		$data = array();
		
		$data['category_name']	=	$this->input->post('category_name');
		$data['category_desc']	=	$this->input->post('category_desc');

		if($query['file_name'] != ''){
			$data['category_image'] = '<img src="upload/gambar/'.$query['file_name'].'" width="100%"></img>';
			$data['category_img'] = $query['file_name'];
		}
		
		//118
		$this->load->model('category_model');
		$result = $this->category_model->insert($data,$insert_id);
		
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
		$data_id = $this->input->post('remove_category_id');
		
		$this->load->model('category_model');
		$result = $this->category_model->remove($data_id);
		
		if($result)
		echo "Data remove was successful!";
		else
		echo "Data remove not successful!";
		
	}
}

/* End of file category.php */
/* Location: ./application/controller/category.php */