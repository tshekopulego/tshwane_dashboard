<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class supervisor extends CI_Controller
{

	public function index()
	{	
		$this->load->view('supervisor');
	}

	/*
		Get requst data from datatables.
	*/
	public function get()
	{
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$region = $get_logged_in_user_info->user_region;

		// Get data menu
		if($region != '')
		{
			if($region == 17)
			{
                            $result = $this->datatables->getData('sup_report', array('date','shift','region','supname','time',
		                     'handover_true_and_false','handover_comment','complaint_reg','complaint_reg_comment','manage_leave',
							 'manage_leave_comment','office_duties','office_duties_comment','pool_phone','pool_phone_comment','private_calls',
							 'private_calls_comment','lunch_cleanup','lunch_cleanup_comment','phone_etiquette','phone_etiquette_comment','radio_protocol',
							 'radio_protocol_comment','shift_complete','shift_complete_comment','check_mails','check_mails_comment',
							 'kitchen_cleanup','kitchen_cleanup_comment','standby_list','standby_list_comment','working_radios','working_radios_comment','working_phones',
							 'working_phones_comment','time_sheet','time_sheet_comment','man_feedback','man_feedback_comment','check_arbook','check_arbook_comment','check_obbook',
							 'check_obbook_comment','book_onduty','book_onduty_comment','takeover_shift','takeover_shift_comment','other','other_comment',
							 'report_id'), 'report_id');
		        }else{
                           $result = $this->datatables->getData('sup_report', array('date','shift','region','supname','time',
		                     'handover_true_and_false','handover_comment','complaint_reg','complaint_reg_comment','manage_leave',
							 'manage_leave_comment','office_duties','office_duties_comment','pool_phone','pool_phone_comment','private_calls',
							 'private_calls_comment','lunch_cleanup','lunch_cleanup_comment','phone_etiquette','phone_etiquette_comment','radio_protocol',
							 'radio_protocol_comment','shift_complete','shift_complete_comment','check_mails','check_mails_comment',
							 'kitchen_cleanup','kitchen_cleanup_comment','standby_list','standby_list_comment','working_radios','working_radios_comment','working_phones',
							 'working_phones_comment','time_sheet','time_sheet_comment','man_feedback','man_feedback_comment','check_arbook','check_arbook_comment','check_obbook',
							 'check_obbook_comment','book_onduty','book_onduty_comment','takeover_shift','takeover_shift_comment','other','other_comment',
							 'report_id'), 'report_id', '','',array('region',$region ));

			}
			
		}
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
		
			
		$insert_id = $this->input->post('shift_id');
		$today = date("Y-m-d H:i:s");
		
		$data = array();
		
		$date1 		= $this->input->post('report_date');
		$shift  	= $this->input->post('drop_shifts');
		$region 	= $this->input->post('menu_region');
		
		
		// add validate
			$data_to_validate = array($date1,$shift,$region);
			$validated_data  = $this->validate($data_to_validate);
			
			if($validated_data < 1)
			{
		
				$data['supname']					=	"$user_name";
				$data['captureddatetime']				=	"$today";
				$data['region']						=	"$region";
				$data['shift']						=	"$shift";
				$data['date']						=	"$date1";
				$data['time']						=	$this->input->post('timepicker');
		
		
				$data['handover_comment']			=	$this->input->post('handover1');
				$data['handover_true_and_false'] 	=	$this->input->post('checkboxvalue1');
		
				$data['complaint_reg_comment']		=	$this->input->post('complaints1');
				$data['complaint_reg'] 				=	$this->input->post('checkboxvalue2');
		
				$data['manage_leave_comment']		=	$this->input->post('manage1');
				$data['manage_leave']				=	$this->input->post('checkboxvalue3');
		
				$data['office_duties_comment']		=	$this->input->post('assist1');
				$data['office_duties'] 				=	$this->input->post('checkboxvalue4');
		
				$data['pool_phone_comment']			=	$this->input->post('pool1');
				$data['pool_phone'] 				=	$this->input->post('checkboxvalue5');
		
				$data['private_calls_comment']		=	$this->input->post('private1');
				$data['private_calls'] 				=	$this->input->post('checkboxvalue6');
		
				$data['lunch_cleanup_comment']		=	$this->input->post('lunch1');
				$data['lunch_cleanup'] 				=	$this->input->post('checkboxvalue7');
		
				$data['phone_etiquette_comment']	=	$this->input->post('etiquette1');
				$data['phone_etiquette'] 			=	$this->input->post('checkboxvalue8');
		
				$data['radio_protocol_comment']		=	$this->input->post('protocol1');
				$data['radio_protocol'] 			=	$this->input->post('checkboxvalue9');
			
				$data['shift_complete_comment']		=	$this->input->post('check_register1');
				$data['shift_complete'] 			=	$this->input->post('checkboxvalue10');
		
				$data['check_mails_comment']		=	$this->input->post('check_emails1');
				$data['check_mails'] 				=	$this->input->post('checkboxvalue11');
		
				$data['kitchen_cleanup_comment']	=	$this->input->post('check_office1');
				$data['kitchen_cleanup'] 			=	$this->input->post('checkboxvalue12');
		
				$data['standby_list_comment']		=	$this->input->post('check_standby1');
				$data['standby_list'] 				=	$this->input->post('checkboxvalue13');
		
				$data['working_radios_comment']		=	$this->input->post('check_radios1');
				$data['working_radios'] 			=	$this->input->post('checkboxvalue14');
		
				$data['working_phones_comment']		=	$this->input->post('check_phones1');
				$data['working_phones'] 			=	$this->input->post('checkboxvalue15');
		
				$data['time_sheet_comment']			=	$this->input->post('daily1');
				$data['time_sheet'] 				=	$this->input->post('checkboxvalue16');
		
				$data['man_feedback_comment']		=	$this->input->post('feedback1');
				$data['man_feedback'] 				=	$this->input->post('checkboxvalue17');
		
				$data['check_arbook_comment']		=	$this->input->post('check_ar1');
				$data['check_arbook'] 				=	$this->input->post('checkboxvalue18');
		
				$data['check_obbook_comment']		=	$this->input->post('check_ob1');
				$data['check_obbook'] 				=	$this->input->post('checkboxvalue19');
		
				$data['book_onduty_comment']		=	$this->input->post('ob_duty1');
				$data['book_onduty'] 				=	$this->input->post('checkboxvalue20');
		
				$data['takeover_shift_comment']		=	$this->input->post('take_over1');
				$data['takeover_shift'] 			=	$this->input->post('checkboxvalue21');
		
				$data['other_comment']				=	$this->input->post('other1');
				$data['other']						=	$this->input->post('checkboxvalue22');
			
			}
			
		$this->load->model('supervisor_model');
		$result = $this->supervisor_model->insert($data,$insert_id);
		
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
	/*update function
	public function update()
	{
		
		$data			= array();
		$shift_id		= $this->input->post('shift_id');
		$insert_id = $this->input->post('shift_id');
		
		
				$data['handover_comment']			=	$this->input->post('handover_up');
				$data['handover_true_and_false'] 	=	$this->input->post('checkboxvalue1');
		
				$data['complaint_reg_comment']		=	$this->input->post('complaints_up');
				$data['complaint_reg'] 				=	$this->input->post('checkboxvalue2');
		
				$data['manage_leave_comment']		=	$this->input->post('manage_up');
				$data['manage_leave']				=	$this->input->post('checkboxvalue3');
		
				$data['office_duties_comment']		=	$this->input->post('assist_up');
				$data['office_duties'] 				=	$this->input->post('checkboxvalue4');
		
				$data['pool_phone_comment']			=	$this->input->post('pool_up');
				$data['pool_phone'] 				=	$this->input->post('checkboxvalue5');
		
				$data['private_calls_comment']		=	$this->input->post('private_up');
				$data['private_calls'] 				=	$this->input->post('checkboxvalue6');
		
				$data['lunch_cleanup_comment']		=	$this->input->post('lunch_up');
				$data['lunch_cleanup'] 				=	$this->input->post('checkboxvalue7');
		
				$data['phone_etiquette_comment']	=	$this->input->post('etiquette_up');
				$data['phone_etiquette'] 			=	$this->input->post('checkboxvalue8');
		
				$data['radio_protocol_comment']		=	$this->input->post('protocol_up');
				$data['radio_protocol'] 			=	$this->input->post('checkboxvalue9');
			
				$data['shift_complete_comment']		=	$this->input->post('check_register_up');
				$data['shift_complete'] 			=	$this->input->post('checkboxvalue10');
		
				$data['check_mails_comment']		=	$this->input->post('check_emails_up');
				$data['check_mails'] 				=	$this->input->post('checkboxvalue11');
		
				$data['kitchen_cleanup_comment']	=	$this->input->post('check_office_up');
				$data['kitchen_cleanup'] 			=	$this->input->post('checkboxvalue12');
		
				$data['standby_list_comment']		=	$this->input->post('check_standby_up');
				$data['standby_list'] 				=	$this->input->post('checkboxvalue13');
		
				$data['working_radios_comment']		=	$this->input->post('check_radios_up');
				$data['working_radios'] 			=	$this->input->post('checkboxvalue14');
		
				$data['working_phones_comment']		=	$this->input->post('check_phones_up');
				$data['working_phones'] 			=	$this->input->post('checkboxvalue15');
		
				$data['time_sheet_comment']			=	$this->input->post('daily_up');
				$data['time_sheet'] 				=	$this->input->post('checkboxvalue16');
		
				$data['man_feedback_comment']		=	$this->input->post('feedback_up');
				$data['man_feedback'] 				=	$this->input->post('checkboxvalue17');
		
				$data['check_arbook_comment']		=	$this->input->post('check_ar_up');
				$data['check_arbook'] 				=	$this->input->post('checkboxvalue18');
		
				$data['check_obbook_comment']		=	$this->input->post('check_ob_up');
				$data['check_obbook'] 				=	$this->input->post('checkboxvalue19');
		
				$data['book_onduty_comment']		=	$this->input->post('ob_duty_up');
				$data['book_onduty'] 				=	$this->input->post('checkboxvalue20');
		
				$data['takeover_shift_comment']		=	$this->input->post('take_over_up');
				$data['takeover_shift'] 			=	$this->input->post('checkboxvalue21');
		
				$data['other_comment']				=	$this->input->post('other_up');
				$data['other']		
		
		//118
		$this->load->model('supervisor_model');
		$result = $this->supervisor_model->update($data,$insert_id);
		
		// Cek data insert or data update
		
		if($insert_id)
			if($result)
				echo "Data insert was successful!";
			else
				echo "Data insert not success!";
		else
			if($result)
				echo "Data update was successful!";
			else
				echo "Data update not successful!";
		
			
	}*/
		public function update()
	{
	  	
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$user_name = $get_logged_in_user_info->user_full_name;
				
		$insert_id = $this->input->post('shift_update_id');
		echo 
		$today = date("Y-m-d H:i:s");
		$date1 = $this->input->post('report_date_up');
		$shift = $this->input->post('drop_shifts_up');
		$region = $this->input->post('menu_region_id_up');
		// add validate
			$data_to_validate = array($date1,$shift,$region);
			$validated_data  = $this->validate($data_to_validate);
			
			if($validated_data < 1)
			{
				
		$data = array();
		
				$data['handover_comment']			=	$this->input->post('handover_up1');
				$data['handover_true_and_false'] 	=	$this->input->post('checkboxvalue_up1');
		
				$data['complaint_reg_comment']		=	$this->input->post('complaints_up1');
				$data['complaint_reg'] 				=	$this->input->post('checkboxvalue_up2');
		
				$data['manage_leave_comment']		=	$this->input->post('manage_up1');
				$data['manage_leave']				=	$this->input->post('checkboxvalue_up3');
		
				$data['office_duties_comment']		=	$this->input->post('assist_up1');
				$data['office_duties'] 				=	$this->input->post('checkboxvalue_up4');
		
				$data['pool_phone_comment']			=	$this->input->post('pool_up1');
				$data['pool_phone'] 				=	$this->input->post('checkboxvalue_up5');
		
				$data['private_calls_comment']		=	$this->input->post('private_up1');
				$data['private_calls'] 				=	$this->input->post('checkboxvalue_up6');
		
				$data['lunch_cleanup_comment']		=	$this->input->post('lunch_up1');
				$data['lunch_cleanup'] 				=	$this->input->post('checkboxvalue_up7');
		
				$data['phone_etiquette_comment']	=	$this->input->post('etiquette_up1');
				$data['phone_etiquette'] 			=	$this->input->post('checkboxvalue_up8');
		
				$data['radio_protocol_comment']		=	$this->input->post('protocol_up1');
				$data['radio_protocol'] 			=	$this->input->post('checkboxvalue_up9');
			
				$data['shift_complete_comment']		=	$this->input->post('check_register_up1');
				$data['shift_complete'] 			=	$this->input->post('checkboxvalue_up10');
		
				$data['check_mails_comment']		=	$this->input->post('check_emails_up1');
				$data['check_mails'] 				=	$this->input->post('checkboxvalue_up11');
		
				$data['kitchen_cleanup_comment']	=	$this->input->post('check_office_up1');
				$data['kitchen_cleanup'] 			=	$this->input->post('checkboxvalue_up12');
		
				$data['standby_list_comment']		=	$this->input->post('check_standby_up1');
				$data['standby_list'] 				=	$this->input->post('checkboxvalue_up13');
		
				$data['working_radios_comment']		=	$this->input->post('check_radios_up1');
				$data['working_radios'] 			=	$this->input->post('checkboxvalue_up14');
		
				$data['working_phones_comment']		=	$this->input->post('check_phones_up1');
				$data['working_phones'] 			=	$this->input->post('checkboxvalue_up15');
		
				$data['time_sheet_comment']			=	$this->input->post('daily_up1');
				$data['time_sheet'] 				=	$this->input->post('checkboxvalue_up16');
		
				$data['man_feedback_comment']		=	$this->input->post('feedback_up1');
				$data['man_feedback'] 				=	$this->input->post('checkboxvalue_up17');
		
				$data['check_arbook_comment']		=	$this->input->post('check_ar_up1');
				$data['check_arbook'] 				=	$this->input->post('checkboxvalue_up18');
		
				$data['check_obbook_comment']		=	$this->input->post('check_ob_up1');
				$data['check_obbook'] 				=	$this->input->post('checkboxvalue_up19');
		
				$data['book_onduty_comment']		=	$this->input->post('ob_duty_up1');
				$data['book_onduty'] 				=	$this->input->post('checkboxvalue_up20');
		
				$data['takeover_shift_comment']		=	$this->input->post('take_over_up1');
				$data['takeover_shift'] 			=	$this->input->post('checkboxvalue_up21');
		
				$data['other_comment']				=	$this->input->post('other_up1');
				$data['other']						=	$this->input->post('checkboxvalue_up22');

	
		
				//118
				$this->load->model('supervisor_model');
				$result = $this->supervisor_model->update($data,$insert_id);
			}
		// Cek data insert or data update
		
		if($insert_id)
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
		$this->load->model('supervisor_model');
		$region= $this->supervisor_model->regions();
		
		echo json_encode($region);
	}
	
	/*
	Get action validate sup_report.
	*/	
	public function validate($data)
	{
	
		$query = $this->db->get_where('sup_report', array('date'=> $data[0],'shift'=> $data[1],'region'=> $data[2]),1);
		return $query->num_rows();
		
	}

	
	/*
	Get action handle remove data.
	*/	
	public function remove()
	{
		$data_id = $this->input->post('remove_menu_id');
		
		$this->load->model('supervisor_model');
		$result = $this->supervisor_model->remove($data_id);
		
		if($result)
			echo "Data remove was successful!";
		else
			echo "Data remove not successful!";
	}
	public function checkboxischecked($checkbox)
	{
	    $is_valid = 0;
	    if($checkbox == true){
		 $is_valid = 1;
		}
		return $is_valid;
	}
	// Get check update for list_order
	
	public function check()
	{
		//get region from session
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$region = $get_logged_in_user_info->user_region;

    		if($region == "Nodal Point"){
			$query = $this->db->query("SELECT COUNT(*) AS total FROM sup_report");
			$result = $query->result();
			echo $result[0]->total;	
		}else{
			$query = $this->db->query("SELECT COUNT(*) AS total FROM sup_report WHERE region = '$region'");
			$result = $query->result();
			echo $result[0]->total;	
		}
	}
}

/* End of file category.php */
/* Location: ./application/controller/promo.php */