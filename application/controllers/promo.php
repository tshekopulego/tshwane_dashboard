<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promo extends CI_Controller
{

	public function index()
	{	
		$this->load->view('promo');
	}

	/*
		Get requst data from datatables.
	*/
	public function get()
	{
		// Get data menu
		//promo_id 	promo_name 	promo_desc 	promo_img 	promo_start_date 	promo_end_date
		$result = $this->datatables->getData('assets', array('call_sign','reg_num','veh_type','region','status','captured_date','capturedby','assets_id'), 'assets_id');
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
		
			
		$insert_id = $this->input->post('assets_id');
		$today = date("Y-m-d H:i:s");

		$data = array();
		$data['reg_num']		=	$this->input->post('reg_num');
		$data['veh_type']		=	$this->input->post('veh_type');
		$data['call_sign']		=	$this->input->post('call_sign');
		$data['status']			=	$this->input->post('status');
		$data['region']			=	$this->input->post('menu_region');
		$data['captured_date']		=	date("Y-m-d H:i:s", strtotime($today . " +2 hours")); 
		$data['capturedby']		=	"$user_name";
		
		
		$this->load->model('promo_model');
		$result = $this->promo_model->insert($data,$insert_id);
		
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
	Get type data.
	*/		
	public function get_regions()
	{
		$this->load->model('promo_model');
		$region= $this->promo_model->regions();
		
		echo json_encode($region);
	}
	
	/*
	Get action handle remove data.
	*/	
	public function remove()
	{
		$data_id = $this->input->post('remove_menu_id');
		
		$this->load->model('promo_model');
		$result = $this->promo_model->remove($data_id);
		
		if($result)
			echo "Data remove was successful!";
		else
			echo "Data remove not successful!";
	}
}

/* End of file category.php */
/* Location: ./application/controller/promo.php */