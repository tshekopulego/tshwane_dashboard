<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class new_message extends CI_Controller
{

	public function index()
	{	

		$this->load->view('new_message');
	}


	/*
	Get requst data from datatables.
	*/
	
	public function get()
	{
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$region = $get_logged_in_user_info->user_region;

		$date = $this->input->get('post_date');
		$shift = $this->input->get('post_shift');

		if($region != '')
		{
			if($region == 'Nodal Point')
			{
				$result = $this->datatables->getData('deployment_plan', array('date', 'shift','region_name', 'region_ob','members', 'vehicles','bikes','reported_by','supervisor','nodal_ob','remarks','nodal_remarks','id'), 'id',array('deployment_regions','deployment_plan.region = deployment_regions.region_id','inner'),'',array('date',$date),array('shift',$shift));
			}
			else
			{
				$result = $this->datatables->getData('deployment_plan', array('date','shift', 'region_name','region_ob', 'members', 'vehicles','bikes', 'reported_by','supervisor','nodal_ob','remarks','nodal_remarks','id'), 'id', array('deployment_regions','deployment_plan.region = deployment_regions.region_id','inner'),'',array('region',$region ),array('date',$date),array('shift',$shift));
			}

		}
		
		echo $result;
	}
/*get data for the first table*/
public function get_deployment_calc()
	{
			
		$result = $this->datatables->getData('deployment_calculations', array('date', 'shift','total_members', 'total_vehicles','total_bikes','progress','id'), 'id');

		echo $result;
	}
	/*not used anymore*/
	public function get_daily_deployment($shift,$date)
	{
		
		
		$this->load->model('new_message_model');
		$daily_dep= $this->new_message_model->day_dep(str_replace("_"," ",$shift),$date);
		
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

		//get all values
		$shift			=	str_replace('-', ' - ', $this->input->post('drop_shifts'));
		$deploy_date		=	$this->input->post('deploy_date');

		/*a counter of regions is recieved from the view to use as size as the for loop below*/
		$fields		=	$this->input->post('fields');

		
		$total_members = 0;
		$total_vehicles = 0;
		$total_bikes = 0;

		$data = array();
		for ($i = 0; $i < $fields; $i++) 
		{
			$region = $this->input->post('hidden_region_id_' . $i);
			$members = $this->input->post('mem_' . $i);
			$vehicles = $this->input->post('veh_' . $i);
			$bikes = $this->input->post('bik_' . $i);
			$today = date("Y-m-d");
			$today_date_time = date("Y-m-d H:i:s");
			// add validate
			$data_to_validate = array($deploy_date,$shift,$region);
			$validated_data  = $this->validate($data_to_validate);
			
			/*validating if data exists in the database*/
			if($validated_data < 1)
			{
				$data['shift']			= 	$shift;
				$data['date']			= 	$deploy_date;

				$data['date_time']		= 	$today_date_time;
				$data['region']			=	$region;
				
				$data['region_ob']		=	$this->input->post('ob_num_' . $i);
				$data['nodal_ob']		=	$this->input->post('nod_ob_num_' . $i);

				$data['members']		= 	$members;
				$data['vehicles']		= 	$vehicles;
				$data['bikes']			=       $bikes;
				$data['remarks']		=	$this->input->post('remarks_' . $i);
				$data['supervisor']		=	$this->input->post('sup_' . $i);
				$data['reported_by']		=	$user_name;

				//calculate
				$total_members = $total_members + $members ;
				$total_vehicles = $total_vehicles + $vehicles ;
				$total_bikes = $total_bikes + $bikes ;


				$this->load->model('new_message_model');
				$result = $this->new_message_model->insert($data,$insert_id);


			}

		
		}

		
/*calculates data*/
		$calc_result = $this->new_message_model->insert_delpoy_calc($data,$insert_id,$deploy_date,$shift,$total_members,$total_vehicles,$total_bikes);

		// Check data insert or data update
		if(!$insert_id)
		{
			if($result)
			{
				echo "Data insert was successful!";
			}
			else{
				echo "Data insert not success!";
			}	
		}
		else
		{
			if($result)
			{
				echo "Data update was successful!";
			}
			else{
				echo "Data update not successful!";
			}
		}
	}

		public function update()
	{

		$insert_id 			= 	$this->input->post('nodal_update_id');
		
		$deploy_date 			=	$this->input->post('nodal_update_date');
		$shift 				=	$this->input->post('nodal_update_shift');
		
		$members			=	$this->input->post('nodal_update_members');
		$vehicles			=	$this->input->post('nodal_update_vehicles');
		$bikes				=	$this->input->post('nodal_update_bikes');
		
		//get priviouse values
		$old_members_val		=	$this->input->post('hidden_nodal_update_members');
		$old_vehicles_val		=	$this->input->post('hidden_nodal_update_vehicles');
		$old_bikes_val			=	$this->input->post('hidden_nodal_update_bikes');

		$data = array();
		$data['region_ob']		=	$this->input->post('region_nodal_ob');
		$data['nodal_ob']		=	$this->input->post('nodal_ob');
		$data['supervisor']		=	$this->input->post('nodal_sup');
		$data['nodal_remarks']		=	$this->input->post('nodal_remarks');
		$data['members']		=	$this->input->post('nodal_update_members');
		$data['vehicles']		=	$this->input->post('nodal_update_vehicles');
		$data['bikes']			=	$this->input->post('nodal_update_bikes');
		

		//get totals from depoyment calculations table. see method get_totals(date,shift) bellow
		$totals = array();
		$totals = $this->get_totals($deploy_date,$shift);
		
		$diff_mem = 0;
		$diff_veh = 0;
		$diff_bik = 0;

		$data_cal = array();

/*calculates the difference between the old and new value. and determins if its a addition or subtract*/
		if($old_members_val > $members)
		{
			$diff_mem = $old_members_val - $members;
			$data_cal['total_members'] = $totals[0] - $diff_mem ;
		}else{
			$diff_mem =  $members - $old_members_val;
			$data_cal['total_members'] = $totals[0] + $diff_mem;

		}

		if($old_vehicles_val > $vehicles)
		{
			$diff_veh = $old_vehicles_val - $vehicles;
			$data_cal['total_vehicles'] = $totals[1] - $diff_veh ;
		}else{
			$diff_veh =  $vehicles - $old_vehicles_val;
			$data_cal['total_vehicles'] = $totals[1] + $diff_veh;

		}

		if($old_bikes_val > $bikes)
		{
			$diff_bik  = $old_bikes_val - $bikes;
			$data_cal['total_bikes'] = $totals[2] - $diff_bik ;
		}else{
			$diff_bik =  $bikes - $old_bikes_val;
			$data_cal['total_bikes'] = $totals[2]  + $diff_bik;

		}


		$this->load->model('new_message_model');
		$result = $this->new_message_model->insert($data,$insert_id,$deploy_date,$shift);
		
		/*
			get the difference between values
		*/

		$update_result = $this->new_message_model->update_delpoy_calc($data_cal,$deploy_date,$shift);


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

		
		$this->load->model('new_message_model');
		$region= $this->new_message_model->regions($user_region);
		
		echo json_encode($region);
	}


	public function get_logged()
	{
	
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$region = $get_logged_in_user_info->user_region;
		
		echo json_encode($region);
	
	}
	
	public function conclude()
	{
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();

	     	$data_id=$this->input->post('conclude_deploy_id');
		

		$data = array();
		$data['progress']		=	$get_logged_in_user_info->user_full_name;

		 
		$this->load->model('new_message_model');
		$result=$this->new_message_model->conclude($data_id,$data);


		 
		if($result)
			echo "Data conclude was successful!";
		else
			echo "Data conclude not success!";
		
				
	}

	public function validate($data)
	{
	
		$query = $this->db->get_where('deployment_plan', array('date'=> $data[0],'shift'=> $data[1],'region'=> $data[2]),1);
		return $query->num_rows();
		
	}

public function get_totals($date,$shift)
	{

		$CI =& get_instance();
        	$CI->load->database();
       		$token = @$CI->db->token;
		

		$this->load->model('new_message_model');
		$query 	= $this->new_message_model->get_totals($date,$shift);
		
		header("Access-Control-Allow-Origin: *"); 
		header('Access-Control-Allow-Methods: GET, POST');
		
		json_encode($query);
		
		//'Generating the totals number here';
		echo $tot_mem = json_encode($query[0]['total_members']);
		echo $tot_veh = json_encode($query[0]['total_vehicles']);
		echo $tot_bik = json_encode($query[0]['total_bikes']);
		
		$data_totals = array();

/*clean string*/
		echo $data_totals[0]  = str_replace('"', ' ', $tot_mem);
		echo $data_totals[1] = str_replace('"', ' ', $tot_veh);
		echo $data_totals[2] = str_replace('"', ' ', $tot_bik);
		 


		return $data_totals;
		
	}

	

}

/* End of file new_message.php */
/* Location: ./application/controller/new_message.php */