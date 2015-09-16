<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller
{

	public function index()
	{	

		$this->load->view('group');
	}

	/*
	Get requst data from datatables.
	*/
	public function get()
	{
		$result = $this->datatables->getData('groups', array('group_name','group_description','group_id'), 'group_id');
		echo $result;
	}

    function get_access()
	{
		$value = $this->input->get('cari');
		if($value != ''){
			$result = $this->datatables->getData('module', array('module_name','IF(access_view = 1, "YES", "NO")','IF(access_insert = 1, "YES", "NO")','IF(access_update = 1, "YES", "NO")','IF(access_delete = 1, "YES", "NO")','IF(access_send = 1, "YES", "NO")','IF(access_region_capture = 1, "YES", "NO")','access_id','access_group_id','module_id'), 'module_id', array('access','module.module_id = access.access_module_id AND access_group_id = '.$value,'left'),'');
			echo $result;
		}
	}
	
	/*
	Get action handle insert and update data.
	*/	
	public function insert()
	{	
	
		$insert_id = $this->input->post('group_id');
		
		//$data = array(
		//'group_name'=>$this->input->post('group_name'),
		//'group_description'=>$this->input->post('group_description')
		//);
         $data = array();
         $data['group_name']           =   $this->input->post('group_name');
         $data['group_description']    =   $this->input->post('group_description');	 
		
		$this->load->model('group_model');
		
		$result = $this->group_model->insert($data,$insert_id);
		
		// Cek data insert or data update
		if(!$groupId)
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

	 function insert_access()
	{
	
	$column = array('module_name','access_view','access_insert','access_update','access_delete','access_send','access_region_capture');
	
	$Ids	 = $this->input->post('Ids');
	$no 	 = $this->input->post('columnPosition');
	$rowId 	 = $this->input->post('rowId');
	$group 	 = $this->input->post('group');
	$columns = $column[$no];
	$value 	 = $this->input->post('value');
	
	$this->load->model('group_model');
	
	if(!$Ids){
	$this->group_model->insert_access($rowId, $group, $columns, $value);
	}else{
	$this->group_model->update_access($Ids, $columns, $value);		
	}
	
	}
	
	/*
	Get action handle remove data.
	*/	
	public function remove()
	{
		$data_id = $this->input->post('remove_group_id');
		
		$this->load->model('group_model');
		$result = $this->group_model->remove($data_id);
		
		if($result)
		echo "Data remove was successful!";
		else
		echo "Data remove not successful!";
		
	}
}

/* End of file category.php */
/* Location: ./application/controller/category.php */