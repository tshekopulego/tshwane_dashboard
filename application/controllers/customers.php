<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller
{

	public function index()
	{	

		$this->load->view('customers');
	}
	
	
	/*
	Get request data from datatables.
	*/
	public function getUser()
	{
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$logged_user_name = $get_logged_in_user_info->user_name;
		
		$this->load->model('customers_model');
		$result = $this->customers_model->getUser($logged_user_name);
		
		
		echo json_encode($result);
	}
	
	
	/*
	Get request data from Current loggedin user.
	*/
	
	public function getLoggedUser()
	{
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$logged_user = $get_logged_in_user_info->user_name;
		if(!$logged_user)
			echo "Error Testing";
		else
			echo "Success";
		
	}	
	
	/*
	Get request data from datatables.
	*/
	
	public function get()
	{
		/** 
		Get data menu
		**/
		
		//Get current logged user
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$logged_user_name = $get_logged_in_user_info->user_name;
		
		if($logged_user_name != ''){
			$result = $this->datatables->getData('user', array('user_name','user_email','user_phone','user_address','user_update','user_id'), 'user_id', '','',array('user_name',$logged_user_name ));	
		//$result = $this->datatables->getData('user', array('user_name','user_email','user_phone','user_address','user_update','user_id'), 'user_id');
		echo $result;
		}
	}
        
        public function reset_password()
	{
	   $user_id = $this->session->userdata('user_id');
	   if($user_id!=""){
	       $data = array();
		
		$data['user_password']	=	md5($this->input->post('user_password'));
		
            
	            $this->load->model('customers_model');
		    $result = $this->customers_model->reset($data,$user_id);
			
			// Check data insert or data update
		    if($result)
			echo "Data insert was successful!";
		    else
		        echo "Data insert not success!";    
	   }
	
	}
	
	/*
	Get action handle insert and update data.
	*/	
	public function update_profile()
	{

		// Upload images
		$config['path']   = './upload/profile/';
		$config['format'] =	array("jpg", "png", "gif", "bmp");
		$config['size']   = '1024';
	   
		$this->load->library('ajaxupload');
		$this->ajaxupload->getUpload($config,"profile_img");
		$query = $this->ajaxupload->query();




		/* User update */
		
		$insert_id = $this->input->post('user_id');
		$data = array();
		
		$data['user_phone']			=	$this->input->post('update_user_phone');
		$data['user_address']			=	$this->input->post('update_user_address');
		

		if($query['file_name'] != ''){
			$data['profile_img'] = $query['file_name'];
		}


		$this->load->model('customers_model');
		$result = $this->customers_model->insert($data,$insert_id);
		
		// Check data insert or data update
		if($result)
			echo "Data insert was successful!";
		else
			echo "Data insert not success!";
		/* End User update */
		
	}
	
	
	/*
	Get action handle remove data.
	*/	
	public function remove()
	{
		$data_id = $this->input->post('remove_table_id');
		
		$this->load->model('table_model');
		$result = $this->table_model->remove($data_id);
		
		if($result)
			echo "Data remove was successful!";
		else
			echo "Data remove not successful!";
		
	}
}

/* End of file category.php */
/* Location: ./application/controller/category.php */