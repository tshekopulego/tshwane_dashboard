<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller
{

	public function index()
	{	

		$this->load->view('message');
	}

	/*
	Get requst data from datatables.
	*/
	
	public function get()
	{
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$region = $get_logged_in_user_info->user_region;

		if($region != '')
		{
			if($region == 'Nodal Point')
			{
	
				$result = $this->datatables->getData('deployment_plan', array('date', 'shift','region', 'region_ob','members', 'vehicles','bikes','reported_by','supervisor','nodal_ob','remarks','nodal_remarks','id'), 'id');

			}else
			{
	
				$result = $this->datatables->getData('deployment_plan', array('date','shift', 'region','region_ob', 'members', 'vehicles','bikes', 'reported_by','supervisor','nodal_ob','remarks','nodal_remarks','id'), 'id', '','',array('region',$region ));
			}



		}
		
		echo $result;
	}
	
	public function get_daily_deployment($shift,$date)
	{
		
		
		$this->load->model('message_model');
		$daily_dep= $this->message_model->day_dep(str_replace("_"," ",$shift),$date);
		
		echo json_encode($daily_dep);
	}
	
	/*
	Get action handle insert and update data.
	*/	
	public function insert()
	{
$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$user_name = $get_logged_in_user_info->user_full_name;
		
		
		$insert_id = $this->input->post('id');

		$data = array();
		$data['shift']		=	$this->input->post('hidden_shifts');
		$data['region']		=	$this->input->post('menu_region');
$data['region_ob']		=	$this->input->post('region_ob');
		$data['members']	=	$this->input->post('members');
$data['remarks']	=	$this->input->post('remarks');
		$data['supervisor']	=	$this->input->post('supervisor');
		$data['date']	= date("Y-m-d H:i:s");
		$data['reported_by']	=	$user_name;
$data['vehicles']		=	$this->input->post('vehicles');
		$data['bikes']		=	$this->input->post('bikes');
		
		$this->load->model('message_model');
		$result = $this->message_model->insert($data,$insert_id);
		
		// Check data insert or data update
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
	
	public function update()
	{

		
		
		$insert_id = $this->input->post('update_id');

		$data = array();
		$data['nodal_ob']		=	$this->input->post('nodal_ob');
		$data['nodal_remarks']		=	$this->input->post('nodal_remarks');

		$this->load->model('message_model');
		$result = $this->message_model->insert($data,$insert_id);
		
		// Check data insert or data update
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
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$user_region = $get_logged_in_user_info->user_region;

		
		$this->load->model('message_model');
		$region= $this->message_model->regions($user_region);
		
		echo json_encode($region);
	}


	public function get_logged()
	{
	
	$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$region = $get_logged_in_user_info->user_region;
		
		echo json_encode($region );
	
	}
	
	

}

/* End of file message.php */
/* Location: ./application/controller/message.php */