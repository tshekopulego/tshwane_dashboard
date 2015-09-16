<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_list extends CI_Controller
{

	public function index()
	{	

		
		$this->load->view('comment_list');
	}
	
	public function get()
	{

		$result = $this->datatables->getData('comment', array('markers_name','comment_name','comment_value','comment_date','IF(comment_active = 1, "Active", "Inactive")','comment_id','comment_active'), 'comment_id',array('markers','comment.comment_markers_id = markers.markers_id','inner'));
		echo $result;
		
	}

	public function active_status()
	{
		$data = array(
			'comment_active'=>$this->input->get('active_status')
		);		

		$this->load->model('comment_list_model');
		$result = $this->comment_list_model->active($data,$this->input->get('active_id'));

		if($result)
			echo "Data update was successful!";
		else
			echo "Data update not successful!";
				
	}		
	
}

/* End of file list_location.php */
/* Location: ./application/controller/comment_list.php */