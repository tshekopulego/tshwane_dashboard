<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include ("service.php");
class List_order extends CI_Controller
{


	public function index()
	{	

		$this->load->view('list_order');
	}
	
	/*
	Get type data.
	*/		
	public function get_log_id($incident_id)
	{
		$this->load->model('list_model');
		$log= $this->list_model->get_log_id($incident_id);
		
		echo json_encode($log);
			
	}
        public function exportfile(){
	   //$data_id =$this->input-post('file_id');
	   //if($data_id=="csv"){
	     
	    
               $this->load->model('list_model');
	   //   $data=$this->list_model->get_incidents();
	       $data=$this->list_model->get_incidents_by();
            echo json_encode($data);	
	    //  }
	}
	public function get_incident_data(){
	     $this->load->model('list_model');
	     $data=$this->list_model->get_incidents();
	    
            echo json_encode($data);	
	}
	/*
	for list order page
	Get requst data from datatables.
	*/

	public function get_corruption(){
	
		
		$result = $this->datatables->getData2('crimereport', array('RefNum','area','type','reportedon','location','status', 
'region_name','channel','capturedby','description','feedback','address','reportedby','mobile','imagelocation','videolocation',
'audiolocation','lat','lot','ar_number','car_reg_num','num_persons','id'), 'id', array('regions','crimereport.region = regions.region_id','inner'),'',array('area','Corruption'));
		
		
		echo $result;	

	}

	
	public function send_log_id($incident_id)
	{
		
		
		$data = array();
		
		$this->load->model('list_model');
		$data['incident_id']	= $incident_id;
		$result = $this->list_model->insert_log_id($data);
		
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
	public function delete_log_id($incident_id)
	{
		$this->load->model('list_model');
		$log= $this->list_model->delete_log_id($incident_id);
		
		echo json_encode($log);	
	}
	
	
	
	public function get_escalation_group()
	{
		$this->load->model('list_model');
		$group_id = $this->list_model->get_group_id();		
		echo json_encode($group_id);
	}

public function get_managers($escalation_id)
	{
		$this->load->model('list_model');
		$managers = $this->list_model->managers($escalation_id);
		
		echo json_encode($managers);
	}


      /*  public function get_vehicle_type()
	{
	      $this->load->model('list_model');
		$cars= $this->list_model->vehicle_type();
		
		echo json_encode($cars);
	}*/

	
        public function get_vehicle_type($dispatchRegionName)
	{
	      $this->load->model('list_model');
		$cars= $this->list_model->vehicle_type(str_replace("_"," ",$dispatchRegionName));
		
		echo json_encode($cars);
     
	  	//$value = $this->input->get('dispatchregion');
		//if($value != ''){
			//$result = $this->datatables->getData('assets', array('call_sign','assets_id'), 'assets_id', '','',array('region',$value));
		//}else{
			//$result = "Unable to locate the car ";
		//}
		//echo $result;
	

	}


/*
	Get requst data from datatables.
	*/
	public function get(){

//get region from session
$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$region = $get_logged_in_user_info->user_region;
		
		
		if($region != '')
		{
			if($region == 17)
			{
			
				$result = $this->datatables->getData('crimereport', array('RefNum','area','type','reportedon','location','status', 
'region_name','channel','capturedby','description','feedback','address','reportedby','mobile','imagelocation','videolocation',
'audiolocation','lat','lot','ar_number','car_reg_num','num_persons','id'), 'id',array('regions','crimereport.region = regions.region_id','inner'),'','','','',array('area','Corruption'));

			}
			else{
				
				$result = $this->datatables->getData('crimereport', array('RefNum','area','type','reportedon','location','status', 
'region_name','channel','capturedby','description','feedback','address','reportedby','mobile','imagelocation','videolocation',
'audiolocation','lat','lot','ar_number','car_reg_num','num_persons','id'), 'id', array('regions','crimereport.region = regions.region_id','inner'),'',array('region',$region ));
				
			}
		}
		echo $result;	

	}


	/*
	Get requst data from datatables.
	*/
	public function history()
	{
	  	$value = $this->input->get('getRef');
		if($value != ''){
		//array('regions','history.region = regions.region_id','inner')
			$result = $this->datatables->getData('history', array('ref_num','status','department','region','dispatched_car','officer_name','manager_name','notes','time_diff','capturedby','date','id'), 'id','','',array('incident_id',$value));
		}else{
			$result = "Unable to locate incident";
}
		echo $result;
	}
	
        /*
     Get request data from datatable
*/			
	public function file_export()
	{
	  	
//get region from session
$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$region = $get_logged_in_user_info->user_region;
		
		
		if($region != '')
		{
			if($region == 17)
			{
			
				$result = $this->datatables->getData('crimereport', array('RefNum','area','type','reportedon','location','status', 'region_name','channel','capturedby','description','feedback','address','reportedby','mobile','imagelocation','videolocation','audiolocation','lat','lot','car_reg_num','num_persons','id'), 'id',array('regions','crimereport.region = regions.region_id','inner'));

			}
			else{
				
				$result = $this->datatables->getData('crimereport', array('RefNum','area','type','reportedon','location','status', 'region_name','channel','capturedby','description','feedback','address','reportedby','mobile','imagelocation','videolocation','audiolocation','lat','lot','car_reg_num','num_persons','id'), 'id', array('regions','crimereport.region = regions.region_id','inner'),'',array('region',$region ));
				
			}
		}
		echo $result;	
	}	
	
	/*
	Get requst data from datatables.
	*/
	public function view()
	{
	  	$value = $this->input->get('category_id');
		if($value != ''){
			$result = $this->datatables->getData('crimereport', array('RefNum','description','area','type','location','region_name','address','reportedby','mobile','status', 'capturedby','reportedon','channel', 'id'), 'id', array('regions','assets.region = regions.region_id','inner'),'',array('status',$value));
			}else{
			$result = $this->datatables->getData('crimereport', array('RefNum','description','area','type','location','region_name','address','reportedby','mobile','status', 'capturedby','reportedon','channel', 'id'), 'id',array('regions','assets.region = regions.region_id','inner'));
		}
		
		echo $result;
	}
	
        public function get_incident_list($id){
	    
	//get region from session
	$this->load->model('login_model');
			$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
			$region = $get_logged_in_user_info->user_region;
			
			
			if($region != '')
			{
				if($region == 17)
				{
				
					$result = $this->datatables->getData('crimereport', array('RefNum','area','type','reportedon','location','status', 'region_name','channel','capturedby','description','feedback','address','reportedby','mobile','imagelocation','videolocation','audiolocation','lat','lot','car_reg_num','num_persons','id'), 'id', array('regions','crimereport.region = regions.region_id','inner'),'',array('id',$id));
	
				}
				else{
					
					$result = $this->datatables->getData('crimereport', array('RefNum','area','type','reportedon','location','status', 'region_name','channel','capturedby','description','feedback','address','reportedby','mobile','imagelocation','videolocation','audiolocation','lat','lot','car_reg_num','num_persons','id'), 'id', array('regions','crimereport.region = regions.region_id','inner'),'',array('region',$region,'id',$id ));
					
				}
			}
			echo $result;	
	
	}

	/*
	Get requst data from datatables.
	*/
    function get_order()
	{
		$value = $this->input->get('getRef');
		if($value != ''){
			$result = $this->datatables->getData('history', array('order_line_header_ref','order_line_category_name','order_line_name','order_line_price','order_line_disc','order_line_qty','order_line_subtotal','order_line_id'), 'order_line_id', '','',array('order_line_header_ref',$value));
			echo $result;
		}
	}
	
	/*
	Get category data.
	*/		
	public function get_category()
	{
		$this->load->model('list_model');
		$category = $this->list_model->category_area();
		
		echo json_encode($category);
	}
	
	/*
	public function get_categoryname()
	{
		$this->load->model('service_model');
		$categoryid =$this->input->get_category('category_id');
		$type= $this->service_model->get_categoryname(categoryid);
		
		echo json_encode($type);
	}	*/
	/*
	Get type data.
	*/		
	public function get_crimetype($category_id)
	{
		$this->load->model('service_model');
		$type= $this->service_model->get_crimetype_by_category($category_id);
		
		echo json_encode($type);
	}
	/*
	Get type data.
	*/		
	public function get_regions()
	{
		$this->load->model('list_model');
		$region= $this->list_model->regions();
		
		echo json_encode($region);
	}
	
	/*
	Get type data.
	*/		
	public function get_dept()
	{
		$this->load->model('list_model');
		$dept= $this->list_model->get_dept();
		
		echo json_encode($dept);
	}

/*
	get_incidents_by_id.
	*/		
	public function get_incidents_by_id($casenum)
	{
                //$casenum = "688/10/2015";
		$this->load->model('list_model');
		$casedetails= $this->list_model->get_incidents_by_id($casenum);
		return $casedetails->id;
	}


	
	 function update_status()
	{
		
		$data			= array();
		$status_data		= $this->input->post('status_data');
		$orders_id	 	= $this->input->post('orders_id');
		$order_id	 	= $this->input->post('order_id');
		$reportedon	 	= $this->input->post('date');

		
		if($status_data ==="Assigned"){
		$data['status']	=	$status_data;
		$data['region']	= $this->input->post('string_handover_region_id');
		}
		if($status_data ==="Dispatched"){
		$data['ar_number']	=	$this->input->post('ar_num');
		$data['car_reg_num']	=	$this->input->post('reg_num');
		$data['num_persons']	=	$this->input->post('persons');
		$data['status']		=	$status_data;
		$data['officer_name']	= $this->input->post('dispatch_officer');
		$data['dispatched_car']	= $this->input->post('string_car_data');
		}
		if($status_data ==="Feedback"){
		$data['feedback']	=	"Yes";
		$data['status']		=	$status_data;
		$data['ar_number']	=	$this->input->post('ar_num');
		$data['car_reg_num']	=	$this->input->post('reg_num');
		$data['num_persons']	=	$this->input->post('persons');

		
		}
		if($status_data ==="Referred"){
		$data['status']	=	$status_data;
		$data['region']	= 17;
		}
		if($status_data ==="Escalated"){
		$data['status']	=	$status_data;
		$data['manager_name']	= $this->input->post('supervisor_hidden_id');
		}
		if($status_data ==="Re-assign"){
		$data['region']	= $this->input->post('string_handover_region_id');
		}
		if($status_data ==="Handedover"){
		$data['status']	=	$status_data;
		$data['department'] = $this->input->post('string_referred_id');		
		}
		if($status_data ==="Closed"){
		$data['status']	= $status_data;
		}
		

		$today1 = date("Y-m-d H:i:s");
		$average1 =    strtotime($today1) - strtotime($reportedon);
                $days1 = floor($average1 /(60*60*24));

		$data['time_diff']	= $days1." day/s  ".gmdate("H:i:s", $average1);
		
		
		
		
		$this->db->where('id', $orders_id);
		$result = $this->db->update('crimereport',$data);

		if($result)
			echo "Data insert was successful!";
		else
			echo "Data insert not success!";
			
			
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$user_name = $get_logged_in_user_info->user_full_name;	
		$order_id	 	= $this->input->post('order_id');
		$reportedon	 	= $this->input->post('date');
		
		$today = date("Y-m-d H:i:s");

		$average =    strtotime($today) - strtotime($reportedon);
                $days = floor($average /(60*60*24));
	
		$insert_id = $this->input->post('category_id');

		//$interval = $today->diff($reportedon);
		//$elapsed = $interval->format('%i minutes');		
			
		
		$data = array();

		if($status_data ==="Assigned"){
		 $data['region']	= $this->input->post('string_handover_region_id');
		}
		if($status_data ==="Dispatched"){
		$data['officer_name']	= 	$this->input->post('dispatch_officer');
		$data['dispatched_car']	= 	$this->input->post('string_car_data');
		$data['manager_name']	= 	$this->input->post('supervisor_hidden_id');
		}

		if($status_data ==="Feedback"){
		$data['ar_number']	=	$this->input->post('ar_num');
		$data['car_reg_num']	=	$this->input->post('reg_num');
		$data['num_persons']	=	$this->input->post('persons');		
		$data['officer_name']	= 	$this->input->post('dispatch_officer1');
		$data['dispatched_car']	= 	$this->input->post('string_car_data1');


		}

		if($status_data ==="Referred"){
		
		$data['region']	= 17;
		}

		if($status_data ==="Escalated"){
		
		$data['manager_name']	= $this->input->post('supervisor_hidden_id');
		}
		
		
		if($status_data ==="Handedover"){
		
		$data['department'] = $this->input->post('string_referred_id');		
		}
		if($status_data ==="Closed"){
		$data['status']	= $status_data;
		}

		$data['incident_id']	=	"$orders_id";
		$data['ref_num']	=	$this->input->post('casenum1');
		$data['date']		=	$today ; 
		$data['status']		=	"$status_data";
		$data['capturedby']	=	"$user_name";
		$data['notes']		=	$this->input->post('notes');
		$data['message']	=	$this->input->post('message');
		$data['time_diff']	=	 $days." day/s  ".gmdate("H:i:s", $average);

		
		//118
		$this->load->model('list_model');
		$result = $this->list_model->insert_history($data,$insert_id);

      				
		// Check data insert or data update
		if(!$insert_id)

			if($result)
				echo "Data insert was successful!";
			else
				echo "Data insert not successful!";
			
			
			 if($result)
				echo "Data update was successful!";
			else
				echo "Data update not successful!";
			


				 // Get cURL resource - sends out the report update to the app
				$curl = curl_init();
			        $title = "Case Update";
				$message = $this->input->post('message');
		                $uid = $this->input->post('orders_id');
			        $caseNum= $this->input->post('casenum1');
                                $status= $status_data;
                             
                                $url = 'http://www.tshwanesafety.co.za/dashboard/notification/sendupdatemessage.php';
 
                               $fields = array(
						'title' => urlencode($title),
						'message' => urlencode($message),
						'caseNum' => urlencode($caseNum),
                                                'uid' => urlencode($uid),
                                                'status' => urlencode($status)

					);
                                //url-ify the data for the POST
				foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
				rtrim($fields_string, '&');

                                //set the url, number of POST vars, POST data
				curl_setopt($curl,CURLOPT_URL, $url);
				curl_setopt($curl,CURLOPT_POST, count($fields));
				curl_setopt($curl,CURLOPT_POSTFIELDS, $fields_string);
                                curl_setopt($curl, CURLOPT_VERBOSE, 1);
		      
				// Send the request & save response to $resp
				$resp = curl_exec($curl);
			
				// Close request to clear up some resources
				curl_close($curl);
				
			
	}
	// Get check update
	
	public function average()
	{
		$average = $this->db->query("SELECT TIMESTAMPDIFF(MINUTE ,'CURRENT_TIMESTAMP','2015-07-30 11:50:08') ");
		$result = $average ->result();
		echo $result;	
	}

	
	// Get check update for list_order
	
	public function check()
	{
		//get region from session
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$region = $get_logged_in_user_info->user_region;

    		if($region == 17){
			$query = $this->db->query("SELECT COUNT(*) AS total FROM crimereport WHERE status = 'New'");
			$result = $query->result();
			echo $result[0]->total;	
		}else{
			$query = $this->db->query("SELECT COUNT(*) AS total FROM crimereport WHERE status = 'New' AND region = $region");
			$result = $query->result();
			echo $result[0]->total;	
		}
	}
	
	// Get check update for opening/corruption cases
	
	public function check_corruption()
	{
		//get region from session
		
			$query = $this->db->query("SELECT COUNT(*) AS total FROM crimereport WHERE status = 'New' AND area = 'Corruption'");
			$result = $query->result();
			echo $result[0]->total;	
		
	}
	
	
	/*
	Get action handle insert and update data.
	*/	
	public function insert()
	{	
	
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$user_name = $get_logged_in_user_info->user_full_name;
		$payno = $get_logged_in_user_info->user_paysal;


//Declaration of all variables
		$description	=	$this->input->post('description');//unique
		$area	=	$this->input->post('string_menu_category_name');//unique
		$type	=	$this->input->post('string_category_type_name');
		$location	=	$this->input->post('location');//unique
		$region	=	$this->input->post('menu_region');
		$mobile =	$this->input->post('mobile');
		$channel 	=   	$this->input->post('menu_channel'); 
		
		


		$data_to_validate = array($description,$area,$type,$location,$region,$mobile,$channel);
		$validated_date  = $this->validate($data_to_validate);



		if($validated_date < 1)
		{
		// Upload images
		$config['path']   = './upload/gambar/';
		$config['format'] =	array("jpg", "png", "gif", "bmp");
		$config['size']   = '1024';
	   
	   	
		$this->load->library('ajaxupload');
		$this->ajaxupload->getUpload($config,"category_img");
		$query = $this->ajaxupload->query();
			
		$insert_id = $this->input->post('category_id');
		
		$today = date("Y-m-d H:i:s");
		
		$data = array();
		
		$this->load->model('list_model');
		
		$get_categoryname = $this->list_model->get_category($this->input->post('category_name'));
		
		
		
		$class = new Service();
		$ref = $class->get_ref_no();
		
		
		
		$data['RefNum']		=	$ref;
        	
		$data['description']	=	$this->input->post('description');
		
		$data['num_persons']	=	$this->input->post('persons');
		$data['car_reg_num']	=	$this->input->post('reg_num');
		
		$data['area']		=	$this->input->post('string_menu_category_name');
		$data['type']		=	$this->input->post('string_category_type_name');
		$data['reportedon']	= 	$today; 
		$data['location']	=	$this->input->post('location');
		$data['region']		=	$this->input->post('menu_region');
		$data['address']	=	$this->input->post('address');
		$data['reportedby']	=	$this->input->post('reportedby');
		$data['mobile']		=	$this->input->post('mobile');
		//$data['videolocation'] 	=   	$this->input->post('videolocation'); 
		$data['channel'] 	=   	$this->input->post('menu_channel'); 
		$data['status']		=	"New";
		$data['capturedby']	=	"$user_name";
		$data['payno']		=	"$payno";
		
		
		
		


		if($query['file_name'] != ''){
	
			//$data['imagelocation'] = '<img src="../upload/gambar/'.$query['file_name'].'" width="100%"></img>';
			$data['imagelocation'] = $query['file_name'];
		
		}
		//$config1['path']   = './video/';
		//$config1['format'] =	array("wmv", "flv", "mp4", "webm", "avi", "mkv");
		//$config1['size']   = '5120';
		
		//$this->load->library('ajaxupload');
		//$this->ajaxupload->getUploadAudioOrVideo($config1,"videolocation");
		//$query = $this->ajaxupload->query();
		//if($query['file_name'] != ''){
		//$data['videolocation'] =       '<video width="320" height="240" controls></br><source  src="../video/'.$query['file_name'].'" width="100%" 				type="video/'.$query['file_ext'].'"></source></video>';
		//$data['video_name'] = $query['file_name'];
		//}
       		//$config2['path']   = './audio/';
		//$config2['format'] =	array("mp3", "amr", "wma", "wav");
		//$config2['size']   = '5120';
		
		//$this->load->library('ajaxupload');
		//$this->ajaxupload->getUploadAudioOrVideo($config2,"audiolocation");
		//$query = $this->ajaxupload->query();		
		//if($query['file_name'] != ''){
			//$data['audiolocation'] =       '<audio controls><source  src="../audio/'.$query['file_name'].'" width="100%" type="audio/'.$query['file_ext'].'"></source></audio>';*/
			
			//$data['audiolocation'] = $query['file_name'];
		//}
		
		//118
		
		$result = $this->list_model->insert($data,$insert_id);
		
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
	   					
	}
	public function addAudio()
	{
		
		$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
		$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		 
		if ((($_FILES["file"]["type"] == "video/mp4")
		|| ($_FILES["file"]["type"] == "audio/mp3")
		|| ($_FILES["file"]["type"] == "audio/wma")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg"))
		 
		&& ($_FILES["file"]["size"] < 200000)
		&& in_array($extension, $allowedExts))
		 
		  {
		  if ($_FILES["file"]["error"] > 0)
			{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			}
		  else
			{
			echo "Upload: " . $_FILES["file"]["name"] . "<br />";
			echo "Type: " . $_FILES["file"]["type"] . "<br />";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
		 
			if (file_exists("upload/" . $_FILES["file"]["name"]))
			  {
			  echo $_FILES["file"]["name"] . " already exists. ";
			  }
			else
			  {
			  move_uploaded_file($_FILES["file"]["tmp_name"],
			  "upload/" . $_FILES["file"]["name"]);
			  echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
			  }
			}
		  }
		else
		  {
		  echo "Invalid file";
		  }

	}
	
	public function remove()
	{
	     $data_id=$this->input->post('remove_list_id');
		 
		 $this->load->model('list_model');
		 
		 $result=$this->list_model->remove($data_id);
		 
		  if($result)
				echo "Data remove was successful!";
			else
				echo "Data remove not successful!";
				
	}
	
	/*
	Get type data.
	*/		
	public function get_channels()
	{
		$this->load->model('list_model');
		$channels= $this->list_model->channels();
		
		echo json_encode($channels);
	}

	
	
	
	/*
	Get action handle recapture data.
	*/	
	public function recapture_incident()
	{	
	
		$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$user_name = $get_logged_in_user_info->user_full_name;
		$payno = $get_logged_in_user_info->user_paysal;

		// Upload images
		$config['path']   = './upload/gambar/';
		$config['format'] =	array("jpg", "png", "gif", "bmp");
		$config['size']   = '1024';
	   
		$this->load->library('ajaxupload');
		$this->ajaxupload->getUpload($config,"category_img");
		$query = $this->ajaxupload->query();
		//$get_categoryname->category_name;
			
		$insert_id = $this->input->post('category_id');
		
		$today = date("Y-m-d H:i:s");
		
		$data = array();
		
		$this->load->model('list_model');
		
		$get_categoryname = $this->list_model->get_category($this->input->post('category_name'));
		
		$class = new Service();
		$ref = $class->get_ref_no();
		
		$data['RecapRefNum']	=	$this->input->post('recaptureID');
		
		$data['RefNum']		=	$ref;
		$data['description']	=	$this->input->post('description_recapture');
		$data['area']		=	$this->input->post('string_menu_category_name_recapture');
		$data['type']		=	$this->input->post('string_category_type_name_recapture');
		$data['reportedon']	= 	$today; 
		$data['location']	=	$this->input->post('location_recapture');
		$data['region']		=	$this->input->post('menu_region_name_recapture');
		$data['address']	=	$this->input->post('address_recapture');
		$data['reportedby']	=	$this->input->post('reportedby_recapture');
		$data['mobile']		=	$this->input->post('mobile_recapture');
		//$data['videolocation'] 	=   	$this->input->post('videolocation_recapture'); 
		$data['channel'] 	=   	$this->input->post('menu_channel_recapture'); 
		$data['status']		=	"Recaptured";
		$data['capturedby']	=	"$user_name";
		$data['payno']		=	"$payno";
		
	
		if($query['file_name'] != ''){
				$data['imagelocation'] =       '<img src="../upload/gambar/'.$query['file_name'].'" width="100%"></img>';
			
			}
		//$config1['path']   = './video/';
		//$config1['format'] =	array("wmv", "flv", "mp4", "webm", "avi", "mkv");
		//$config1['size']   = '1024';
		
		//$this->load->library('ajaxupload');
		//$this->ajaxupload->getUploadAudioOrVideo($config1,"videolocation");
		//$query = $this->ajaxupload->query();
			//if($query['file_name'] != ''){
			//$data['videolocation'] =       '<video width="320" height="240" controls></br><source  src="../video/'.$query['file_name'].'" width="100%" 			type="video/'.$query['file_ext'].'"></source></video>';
			//}
       		//$config2['path']   = './audio/';
		//$config2['format'] =	array("mp3", "amr", "wma", "wav");
		//$config2['size']   = '1024';
		
		//$this->load->library('ajaxupload');
		//$this->ajaxupload->getUploadAudioOrVideo($config2,"audiolocation");
		//$query = $this->ajaxupload->query();		
			//if($query['file_name'] != ''){
		//$data['audiolocation'] = '<audio controls><source  src="../audio/'.$query['file_name'].'" width="100%" type="audio/'.$query['file_ext'].'"></source></audio>';
				
			//}
		
		$result = $this->list_model->insert($data,$insert_id);
		
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

/*Get activity log*/
public function get_activity_log($audit_status){

$this->load->model('list_model');
		$activity= $this->list_model->activity($audit_status);
		
		echo json_encode($activity);

	}

     public function get_logged()
	{
	
	$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$region = $get_logged_in_user_info->user_region;
		
		echo json_encode($region );
	
	}
public function get_group_session()
	{
	
	$this->load->model('login_model');
		$get_logged_in_user_info = $this->login_model->get_logged_in_user_info();
		$group_id = $get_logged_in_user_info->user_group;
		
		echo json_encode($group_id);
	
	}

	public function validate($data)
	{
	
		$query = $this->db->get_where('crimereport', array('description'=> $data[0],'area'=> $data[1],'type'=> $data[2],'location'=> $data[3],'region'=> $data[4],'mobile'=> $data[5],'channel'=> $data[6]),1);
	console.log($query->num_rows());
		return $query->num_rows();
		
	}
	
	
	
}

/* End of file category.php */
/* Location: ./application/controller/category.php */