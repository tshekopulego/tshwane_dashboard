<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Images extends CI_Controller
{

	public function index()
	{	

		
		$this->load->view('images');
	}
	
	public function get()
	{
		
		$data_id = $this->input->get('id');
		$result = $this->datatables->getData('images', array('images_name','images_desc','images_update','images_url','images_markers_id','images_id'), 'markers_id','','', array('images_markers_id',$data_id));
		echo $result;
		
	}

	public function insert()
	{
	   $config['path']   = './upload/images/';
	   $config['format'] =	array("jpg", "png", "gif", "bmp");
	   $config['size']   = '1024';
	   
	    $this->load->library('ajaxupload');
		// Set image field	   
	    $this->ajaxupload->getUpload($config,"images_url");
		
		$query = $this->ajaxupload->query();
		
		$data_id = $this->input->post('images_id');

		$data = array();	
		$data['images_name']  = $this->input->post('images_name');
		$data['images_desc']  = $this->input->post('images_desc');
		$data['images_markers_id']  = $this->input->post('images_markers_id');

		if($query['file_name'] != ''){
			$data['images_url'] = $query['file_name'];
		}	
		
		$this->load->model('images_model');
		$result = $this->images_model->insert($data,$data_id);
		
		if(!$data_id)
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

	public function remove()
	{
		$data_id = $this->input->post('remove_images_id');
		
		$this->load->model('images_model');
		$result = $this->images_model->remove($data_id);
		
		if($result)
			echo "Data remove was successful!";
		else
			echo "Data remove not successful!";
		
	}
			
	
}

/* End of file images.php */
/* Location: ./application/controller/images.php */