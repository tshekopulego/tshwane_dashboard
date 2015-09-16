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
		$result = $this->datatables->getData('notifications', array('title','message','notificationdate','publishedby','pictureurl','status','category_img','id'), 'id');
		echo $result;
	}
	/*
	Get requst data from datatables.
	*/
	public function preview()
	{
	  	
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$user_name = $get_logged_in_user_info->user_full_name;

		// Upload logo
		$config['path']   = './notification/img/';
		$config['format'] =	array("jpg", "png", "gif", "bmp");
		$config['size']   = '1024';
	   
		$this->load->library('ajaxupload');
		$this->ajaxupload->getUpload($config,"category_img");
		$query = $this->ajaxupload->query();
		
		$insert_id = $this->input->post('category_view_id');
		
		$today = date("Y-m-d H:i:s");
		
		$data = array();
		
		$data['title']			=	$this->input->post('title1');
		$data['message']		=	$this->input->post('message1');
		$data['updated_date']		= 	$today; 
		$data['updated_by']		=	"$user_name";

		if($query['file_name'] != ''){
			$data['pictureurl'] 	=       '<img src="../notification/img/'.$query['file_name'].'" width="100%"></img>';
			$data['category_img'] = $query['file_name'];
		}
		
		//118
		$this->load->model('category_model');
		$result = $this->category_model->preview($data,$insert_id);
		
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
	Get action handle insert and update data.
	*/	
	public function send()
	{	
	       
		$insert_id = $this->input->post('category_send_id');
				
		$data = array();
		
		$data['title']			=	$this->input->post('title2');
		$data['message']		=	$this->input->post('message2');
		$data['category_img']		= 	$this->input->post('notitficationDiv2');
		
		
						
	   		// Get cURL resource - sends out the notifications to the app
			$curl = curl_init();
			
			        $title = urlencode(stripslashes($data['title']));
			        $message= urlencode(stripslashes(strip_tags($data['message'])));
		
			        $pictureurl= urlencode("http://test.tshwanesafety.co.za/dashboard/notification/img/".$data['category_img']);
		      
			// Set some options - we are passing in a useragent too here
			curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => "http://test.tshwanesafety.co.za/dashboard/notification/sendmessage.php?title=$title&message=$message&pictureurl=$pictureurl"	));
			
			// Send the request & save response to $resp
			$resp = curl_exec($curl);
			
			// Close request to clear up some resources
			curl_close($curl);
		
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$user_name = $get_logged_in_user_info->user_full_name;
		
		$today = date("Y-m-d H:i:s");
		
		$data['status']			=	"Published";
		$data['date_sent']		= 	$today; 
		$data['sent_by']		=	"$user_name";
		
		//118
		$this->load->model('category_model');
		$result = $this->category_model->send($data,$insert_id);
		
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
	Get action handle insert and update data.
	*/	
	public function insert()
	{	
	
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$user_name = $get_logged_in_user_info->user_full_name;

		// Upload logo
		$config['path']   = './notification/img/';
		$config['format'] =	array("jpg", "png", "gif", "bmp");
		$config['size']   = '1024';
	   
		$this->load->library('ajaxupload');
		$this->ajaxupload->getUpload($config,"category_img");
		$query = $this->ajaxupload->query();
		
		$insert_id = $this->input->post('category_id');
		
		$today = date("Y-m-d H:i:s");
		
		$data = array();
		
		$data['title']			=	$this->input->post('title');
		$data['message']		=	$this->input->post('message');
		$data['notificationdate']	= 	$today; 
		$data['publishedby']		=	"$user_name";

		if($query['file_name'] != ''){
			$data['pictureurl'] 	=       '<img src="../notification/img/'.$query['file_name'].'" width="100%"></img>';
			$data['category_img'] = $query['file_name'];
		}


		//118
		$this->load->model('category_model');
		$result = $this->category_model->insert($data,$insert_id);
		
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