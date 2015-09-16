<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{	

		$this->load->view('dashboard');
	}

	/*
	Get requst data from datatables.
	*/
	public function get()
	{
		// Get data menu 
		$result = $this->datatables->getData('setting', array('setting_name','setting_address','setting_telephone','setting_email','setting_website','setting_tax','setting_delivery_fee','setting_images','setting_latitude','setting_longitude','setting_id'), 'setting_id');
		echo $result;
	}

	/*
	Get action handle insert and update data.
	*/	
	public function insert()
	{
		
		$insert_id = $this->input->post('setting_id');
		$data = array();
		$data['setting_name']			=	$this->input->post('setting_name');
		$data['setting_address']		=	$this->input->post('setting_address');
		$data['setting_telephone']		=	$this->input->post('setting_telephone');
		$data['setting_email']			=	$this->input->post('setting_email');
		$data['setting_website']		=	$this->input->post('setting_website');
		$data['setting_tax']			=	$this->input->post('setting_tax');
		$data['setting_delivery_fee']	=	$this->input->post('setting_delivery_fee');
		$data['setting_latitude']		=	$this->input->post('setting_latitude');
		$data['setting_longitude']		=	$this->input->post('setting_longitude');
		
		// Upload Foto
		$config['path']   = './upload/gambar/';
		$config['format'] =	array("jpg", "png", "gif", "bmp");
		$config['size']   = '1024';
	   
		$this->load->library('ajaxupload');
		$this->ajaxupload->getUpload($config,"setting_images");
		$query = $this->ajaxupload->query();
		
		if($query['file_name'] != ''){
			$data['setting_images'] = '<img src="upload/gambar/'.$query['file_name'].'" width="100%"></img>';
			$data['setting_img'] = $query['file_name'];		
		}
		
		$this->load->model('setting_model');
		$result = $this->setting_model->insert($data,$insert_id);
		
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
	Get chart Summary BY TYPE
	*/	
	public function chart()
	{
	
		$this->db->select('type, COUNT(id) AS total');
        $this->db->from('crimereport');
        $this->db->order_by('COUNT(id)', 'DESC');
        $this->db->group_by('type');
		$this->db->limit('10');
		$query = $this->db->get();
		
		$result = $query->result_array();

		header("Access-Control-Allow-Origin: *"); 
		header('Access-Control-Allow-Methods: GET, POST');		
		echo json_encode($result);	
	}
	/*SUMMARY OF INCIDENTS*/
	public function chart1()
	{
	
		$this->db->select('DATE_FORMAT(reportedon,"%m/%d/%Y") AS date, COUNT(id) AS total');
        $this->db->from('crimereport');
        $this->db->order_by('reportedon', 'DESC');
        $this->db->group_by('DATE_FORMAT(reportedon,"%m/%d/%Y")');
		$this->db->limit(14);
		$query = $this->db->get();
		
		$result = $query->result_array();

		function subval_sort($a,$subkey) {
			foreach($a as $k=>$v) {
				$b[$k] = strtolower($v[$subkey]);
			}
			asort($b);
			foreach($b as $key=>$val) {
				$c[] = $a[$key];
			}
			return $c;
		}
		
		$result1 = subval_sort($result,'date'); 
		
		header("Access-Control-Allow-Origin: *"); 
		header('Access-Control-Allow-Methods: GET, POST');		
		echo json_encode($result1);	
	}
	/*STATUS PIE CHART*/
	public function chart2()
	{
	
		$this->db->select('status, COUNT(id) AS total');
      		$this->db->from('crimereport');
       		$this->db->group_by('status');
		$query = $this->db->get();
		
		$result = $query->result_array();

		header("Access-Control-Allow-Origin: *"); 
		header('Access-Control-Allow-Methods: GET, POST');		
		echo json_encode($result);	
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