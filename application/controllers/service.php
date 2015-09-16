<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller
{
	//Get request menu
	public function get_menu()
	{
		//Check token
	    $CI =& get_instance();
        $CI->load->database();
        $token = @$CI->db->token;
		
		if($this->input->post('token') == $token || $this->input->get('token') == $token){
			$filter   = $this->input->post('data');
			$category = $this->input->post('category');
			
			$this->load->model('service_model');
			$query = $this->service_model->get_menu($filter,$category);
			
			header("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Methods: GET, POST');
			echo json_encode($query);
		}
	}
	
	//Get request menu detail
	public function get_menu_detail()
	{
		//Check token
	    $CI =& get_instance();
        $CI->load->database();
        $token = @$CI->db->token;
		
		if($this->input->post('token') == $token || $this->input->get('token') == $token){
			$id 	= $this->input->post('id');
			
			$this->load->model('service_model');
			$query 	= $this->service_model->get_menu_detail($id);
			
			header("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Methods: GET, POST');
			echo json_encode($query);
		}
	}
	
	public function get_promo_detail()
	{
		//Check token
	    $CI =& get_instance();
        $CI->load->database();
        $token = @$CI->db->token;
		
		if($this->input->post('token') == $token || $this->input->get('token') == $token){
			$id 	= $this->input->post('id');
			
			$this->load->model('service_model');
			$query 	= $this->service_model->get_promo_detail($id);
			
			header("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Methods: GET, POST');
			echo json_encode($query);
		}
	}
	
	//Get request category
	public function get_category()
	{	
		//Check token
	    $CI =& get_instance();
        $CI->load->database();
        $token = @$CI->db->token;
		
		if($this->input->post('token') == $token || $this->input->get('token') == $token){	
			$this->load->model('service_model');
			$query = $this->service_model->get_category();

			header("Access-Control-Allow-Origin: *"); 
			header('Access-Control-Allow-Methods: GET, POST');		
			echo json_encode($query);
		}
	}

//Get emergency contacts
	public function get_emergencycontacts()
	{	
		//Check token
	    $CI =& get_instance();
        $CI->load->database();
       			
        $this->load->model('service_model');
		$query = $this->service_model->get_emergencycontacts();

		header("Access-Control-Allow-Origin: *"); 
		header('Access-Control-Allow-Methods: GET, POST');		
		echo json_encode($query);
		
	}
    
     //Get reported incidents
	public function get_reportedincidents()
	{	
		//Check token
	    $CI =& get_instance();
        $CI->load->database();
       			
        $this->load->model('service_model');
		$query = $this->service_model->get_reportedincidents();

		header("Access-Control-Allow-Origin: *"); 
		header('Access-Control-Allow-Methods: GET, POST');		
		echo json_encode($query);
		
	}
    
    //Get notifications
	public function get_notifications()
	{	
		//Check token
	    $CI =& get_instance();
        $CI->load->database();
       			
        $this->load->model('service_model');
		$query = $this->service_model->get_notifications();

		header("Access-Control-Allow-Origin: *"); 
		header('Access-Control-Allow-Methods: GET, POST');		
		echo json_encode($query);
		
	}
	
	//Get notification detail
	public function get_notification_detail()
	{	
		//Check token
	    	$CI =& get_instance();
        	$CI->load->database();
       	//$token = @$CI->db->token;
		
		//if($this->input->post('token') == $token || $this->input->get('token') == $token)
		//{
			$id 	= $this->input->post('id');
			
			$this->load->model('service_model');
			$query 	= $this->service_model->get_notification_detail($id);
        
        		header("Access-Control-Allow-Origin: *"); 
			header('Access-Control-Allow-Methods: GET, POST');		
			echo json_encode($query);
		//}
		
	}
	

	//Get request promo
	public function get_promo()
	{		
		//Check token
	    $CI =& get_instance();
        $CI->load->database();
        $token = @$CI->db->token;
		
		if($this->input->post('token') == $token || $this->input->get('token') == $token){
			$this->load->model('service_model');
			$query = $this->service_model->get_promo();

			header("Access-Control-Allow-Origin: *"); 
			header('Access-Control-Allow-Methods: GET, POST');		
			echo json_encode($query);
		}
	}

      //Get reported incidents
	public function get_crime_category()
	{	
		//Check token
	    $CI =& get_instance();
        $CI->load->database();
       			
        $this->load->model('service_model');
		$query = $this->service_model->get_crimecategory();

		header("Access-Control-Allow-Origin: *"); 
		header('Access-Control-Allow-Methods: GET, POST');		
		echo json_encode($query);
		
	}
	
	
	 public function get_categoryname()
	{
		//Check token
	    $CI =& get_instance();
            $CI->load->database();
        
		
		
			$id		= $this->input->post('category_id');
			
			$this->load->model('service_model');
			$query 	= $this->service_model->get_categoryname($id);
			
			
			header("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Methods: GET, POST');
			echo json_encode($query);
		
	}

        public function get_categorytypebycrime()
	{
		//Check token
	    $CI =& get_instance();
            $CI->load->database();
        
		
	    $id		= $this->input->post('id');
			
	    $this->load->model('service_model');
	    $query 	= $this->service_model->get_crimetype_by_category($id);
			
			
	     header("Access-Control-Allow-Origin: *");
	     header('Access-Control-Allow-Methods: GET, POST');
	     echo json_encode($query);
		
	}

	//Get request best seller
	public function get_best_seller()
	{	
		//Check token
	    $CI =& get_instance();
        $CI->load->database();
        $token = @$CI->db->token;
		
		if($this->input->post('token') == $token || $this->input->get('token') == $token){
			$this->load->model('service_model');
			$query = $this->service_model->get_best_seller();

			header("Access-Control-Allow-Origin: *"); 
			header('Access-Control-Allow-Methods: GET, POST');		
			echo json_encode($query);
		}
	}
	
	//Get request historical orders
	public function get_historical_orders()
	{	
		//Check token
	    $CI =& get_instance();
        $CI->load->database();
        $token = @$CI->db->token;
		
		if($this->input->post('token') == $token || $this->input->get('token') == $token){	
			$email 	= $this->input->post('email');
			$this->load->model('service_model');
			$query 	= $this->service_model->get_historical_orders($email);

			header("Access-Control-Allow-Origin: *"); 
			header('Access-Control-Allow-Methods: GET, POST');		
			echo json_encode($query);
		}
	}
	
	//Get Register
	public function send_register()
	{

		//Check token
	    $CI =& get_instance();
        $CI->load->database();
        $token = @$CI->db->token;
		
		if($this->input->post('token') == $token || $this->input->get('token') == $token){
			header("Access-Control-Allow-Origin: *"); 
			header('Access-Control-Allow-Methods: GET, POST');
			
			$register_email 	= $this->input->post('email');
			$register_password 	= $this->input->post('password');
			$register_name 		= $this->input->post('name');
			$register_address 	= $this->input->post('address');
			$register_street 	= $this->input->post('street');
			$register_phone 	= $this->input->post('phone');
			$register_type 		= $this->input->post('type');
			
			
			$data = array(
				'register_email'=>$register_email ,
				'register_password'=>$register_password ,
				'register_name'=>$register_name,
				'register_address'=>$register_address,
				'register_street'=>$register_street,
				'register_phone'=>$register_phone,
				'register_type'=>$register_type
			);	
			
			$this->load->model('service_model');
			$query = $this->service_model->send_register($data);
			
			if($query)
				echo "Your registration complete!";
			else
				echo "Your register not complete!";
		}
	}
	
	
       //Send Crime Report
	public function send_crimereport()
	{

		//Check token
	    	$CI =& get_instance();
        	$CI->load->database();
		
			header("Access-Control-Allow-Origin: *"); 
			header('Access-Control-Allow-Methods: GET, POST');
			
			
			$this->get_ref_no();
		
			$RefNum		= $this->get_ref_no();
			$description 	= $this->input->post('description');
			$area 		= $this->input->post('area');//area is the category_id
			$type 		= $this->input->post('type');
			$reportedon	= $this->input->post('reportedon');
			$location 	= $this->input->post('location');			
			$lat 		= $this->input->post('lat');
		        $lot 		= $this->input->post('lot');
		        $reportedby 	= $this->input->post('reportedby');
		        $mobile 	= $this->input->post('mobile');
		        $channel= $this->input->post('channel');
							
			$data = array(
				'RefNum'	=>$RefNum,
				'description'	=>$description ,
				'area'		=>$area,
				'type'		=>$type,
				'reportedon'	=>$reportedon,
				'location'	=>$location,
				'lat'		=>$lat,
		                'lot'		=>$lot,
		                'reportedby'	=>$reportedby,
				'mobile'	=>$mobile,
				'channel'	=>$channel
			);	
			
			$this->load->model('service_model');
			$query = $this->service_model->send_crimereport($data);
			
			if($query)
				echo "Your Report has been sent!";
			else
				echo "Report has not been sent!";
		
	}
	
	//Send message
	public function send_message()
	{

		//Check token
	    $CI =& get_instance();
        $CI->load->database();
        $token = @$CI->db->token;
		
		if($this->input->post('token') == $token || $this->input->get('token') == $token){
			header("Access-Control-Allow-Origin: *"); 
			header('Access-Control-Allow-Methods: GET, POST');
			
			$data 			 	=  array();
			$data['message_name'] 		= $this->input->post('name');
			$data['message_email']	 	= $this->input->post('email');
			$data['message_phone']		= $this->input->post('phone');
			$data['message_value'] 		= $this->input->post('message');
			
			$this->load->model('service_model');
			$query = $this->service_model->send_message($data);

			if($query)
				echo "Thanks for your message!";
			else
				echo "Your message not send!";
		}
	}
	
	//Get message
	public function get_login()
	{
		//Check token
	    $CI =& get_instance();
        $CI->load->database();
        $token = @$CI->db->token;
		
		if($this->input->post('token') == $token || $this->input->get('token') == $token){
		
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');
			
			$this->load->model('service_model');
			$query = $this->service_model->get_login($email, $password);
			
			header("Access-Control-Allow-Origin: *"); 
			header('Access-Control-Allow-Methods: GET, POST');
			
			echo json_encode($query);
		}
	}
	
	//Get setting
	public function get_setting()
	{

		//Check token
	    $CI =& get_instance();
        $CI->load->database();
        $token = @$CI->db->token;
		
		if($this->input->post('token') == $token || $this->input->get('token') == $token){
			$this->load->model('service_model');
			$query = $this->service_model->get_setting();
			
			header("Access-Control-Allow-Origin: *"); 
			header('Access-Control-Allow-Methods: GET, POST');
			
			echo json_encode($query);
		}
	}
	
	//Get opening hours
	public function get_opening()
	{

		//Check token
	    $CI =& get_instance();
        $CI->load->database();
        $token = @$CI->db->token;
		
		if($this->input->post('token') == $token || $this->input->get('token') == $token){
			$this->load->model('service_model');
			$query = $this->service_model->get_opening();
			
			header("Access-Control-Allow-Origin: *"); 
			header('Access-Control-Allow-Methods: GET, POST');
			
			echo json_encode($query);
		}
		
	}	
	
	//Get checkout
	public function checkout()
	{

		//Check token
	    $CI =& get_instance();
        $CI->load->database();
        $token = @$CI->db->token;
		
		if($this->input->post('token') == $token || $this->input->get('token') == $token){
			header("Access-Control-Allow-Origin: *"); 
			header('Access-Control-Allow-Methods: GET, POST');
			
			$json_header = json_decode($this->input->get('header'), true);
			
				$data 	= array();
				$data['order_header_ref'] 				= $json_header["OrdersID"];
				$data['order_header_customers_name']	= $json_header["ordersToName"];
				$data['order_header_customers_email'] 	= $json_header["ordersToEmail"];
				$data['order_header_customers_telp'] 	= $json_header["ordersToTelp"];
				$data['order_header_customers_address'] = $json_header["ordersToAddress"];
				$data['order_header_customers_street'] 	= $json_header["ordersToStreet"];
				$data['order_header_delivery_fee'] 		= $json_header["ordersToDeliveryFee"];
				$data['order_header_tax'] 				= $json_header["ordersToTax"];
				$data['order_header_tax_total'] 		= $json_header["ordersToTaxTotal"];
				$data['order_header_subtotal'] 			= $json_header["ordersToSubTotal"];
				$data['order_header_total'] 			= $json_header["OrdersTotal"];
				$data['order_header_status'] 			= $json_header["ordersToStatus"];
				
				if(@$json_header["ordersToNote"] != null || @$json_header["ordersToNote"] != ''){
					$data['order_header_note'] 	 = $json_header["ordersToNote"];
				}
			
			$json_data = json_decode($this->input->get('line'), true);
			
			$data_line  =  array();
			
			foreach($json_data as $item) {
				
				$data_line['order_line_header_ref'] 	= $this->input->get('orderID');
				$data_line['order_line_menu_id'] 		= $item["id"];
				$data_line['order_line_category_name'] 	= $item["category"];
				$data_line['order_line_name'] 			= $item["name"];
				$data_line['order_line_image'] 			= $item["img"];
				$data_line['order_line_price'] 			= $item["price"];
				$data_line['order_line_disc'] 			= $item["disc"];
				$data_line['order_line_qty']			= $item["qty"];
				$data_line['order_line_subtotal'] 		= $item["subtotal"];
				
				$this->load->model('service_model');
				$query = $this->service_model->checkout_line($data_line);
			}
			
			$this->load->model('service_model');
			$query = $this->service_model->checkout_header($data);

			if($query)
				echo "Thanks for your orders!";
			else
				echo "Your orders not send!";
		}
	}
	
	
	

public function get_ref_no()
	{
		$CI =& get_instance();
        	$CI->load->database();
       		$token = @$CI->db->token;
       		 
		$this->load->model('service_model');
		$query 	= $this->service_model->get_ref_no();
		
		header("Access-Control-Allow-Origin: *"); 
		header('Access-Control-Allow-Methods: GET, POST');
		
		json_encode($query);
		
		//'Generating the reference number here';
		'Raw Ref Num : '.$raw_ref_num = json_encode($query[0]['RefNum']).'</br></br>';

		
		'Substringed : '.$counter = substr($raw_ref_num, 1, strpos($raw_ref_num, '/')-2).'</br></br>';

		
		$day = date('d') ;
		
		if($day == 01)
		{
			'Counter at day one : '.$counter = 1;

			$compare = substr($raw_ref_num, 1, strpos($raw_ref_num, '/')-2);
			'MONTH : '.$month = substr($raw_ref_num,strpos($raw_ref_num, '/')+1,strpos($raw_ref_num, '/')-1);

			if($month == date('m'))
			{
				'Compare at day one : '.$compare = $compare+1;
				'Counter to Compare : '.$counter = $compare;
			}

		}
		else{
			'Counter at else: '.$counter = $counter+1;
			
		}

		


		
		return  $counter.'/'.date('m').'/'.date('Y');
		
	}

	

}

/* End of file service.php */
/* Location: ./application/controller/service.php */