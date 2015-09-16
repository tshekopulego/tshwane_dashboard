<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller
{

	public function index()
	{	

		$this->load->view('menu');
	}

	/*
	Get requst data from datatables.
	*/
	public function get()
	{
		// Get data menu
		$result = $this->datatables->getData('menu', array('menu_name','category_name','menu_price','menu_disc','menu_desc','menu_image','menu_id','menu_category_id'), 'menu_id', array('category','menu.menu_category_id = category.category_id','inner'));
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
	   $this->ajaxupload->getUpload($config,"menu_image");
	   
	   $query = $this->ajaxupload->query();
		
		$insert_id = $this->input->post('menu_id');

		$data = array();
		$data['menu_name']			=	$this->input->post('menu_name');
		$data['menu_category_id']	=	$this->input->post('menu_category_id');
		$data['menu_price']			=	$this->input->post('menu_price');
		$data['menu_disc']			=	$this->input->post('menu_disc');
		$data['menu_desc']			=	$this->input->post('menu_desc');
		if($query['file_name'] != ''){
			$data['menu_image'] = '<img src="../upload/gambar/'.$query['file_name'].'" width="100%"></img>';
			$data['menu_img'] = $query['file_name'];
		}
		
		//118
		$this->load->model('menu_model');
		$result = $this->menu_model->insert($data,$insert_id);
		
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
	Get category data.
	*/		
	public function get_category()
	{
		$this->load->model('category_model');
		$category = $this->category_model->category();
		
		echo json_encode($category);
	}		
	/*
	Get action handle remove data.
	*/	
	public function remove()
	{
		$data_id = $this->input->post('remove_menu_id');
		
		$this->load->model('menu_model');
		$result = $this->menu_model->remove($data_id);
		
		if($result)
		echo "Data remove was successful!";
		else
		echo "Data remove not successful!";
		
	}
}

/* End of file category.php */
/* Location: ./application/controller/menu.php */