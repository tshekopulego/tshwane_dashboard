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
		$result = $this->datatables->getData('enquiry', array('fullname','address','phone','name','notes','enquirydate','capturedby','id'), 'id',array('enquiry_type','enquiry.type = enquiry_type.type_id','inner'));
		echo $result;
	}

	/*
	Get action handle insert and update data.
	*/	
	public function insert()
	{	
	
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$user_name = $get_logged_in_user_info->user_full_name;
		
		$insert_id = $this->input->post('category_id');
		$today = date("Y-m-d H:i:s");
		$data = array();
		
		$data['type']				=	$this->input->post('enquiry_type_id2');
		$data['fullname']			=	$this->input->post('category_name');
		$data['address']			=	$this->input->post('category_addrs');
		$data['phone']				=	$this->input->post('category_phone');
		$data['notes']				=	$this->input->post('category_notes');
		$data['enquirydate']		=	$today;
		$data['capturedby']			=	$user_name;
		
		
		
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
	Get enquiry data.
	*/		
	public function get_enquiry_type()
	{
		$this->load->model('menu_model');
		$name = $this->menu_model->enquiry();
		
		echo json_encode($name);
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