<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_login($email, $password)
	{

		$query = $this->db->get_where('register', array('register_email' => $email,'register_password'=>$password),1);
		if ($query->num_rows() ==1)
		{
			$this->db->select('*');
			$this->db->from('register');
			$this->db->where('register_email',$email);
			
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
			
		}
		
		return 0;
	}
	
	function get_menu($data,$category)
	{
		
		$this->db->join('category', 'menu.menu_category_id = category.category_id','inner');
		$this->db->select('*');
        $this->db->from('menu');
		//$this->db->limit(5);
		if($data != ''){
			$this->db->like('menu_name',$data);
		}

		if($category != ''){
			$this->db->like('category_id',$category);
		}
		
		$query = $this->db->get();
		$result = $query->result_array();
		
		
		return $result;
	}

	function get_menu_detail($id)
	{
		
		$this->db->join('category', 'menu.menu_category_id = category.category_id','inner');
		$this->db->select('*');
        $this->db->from('menu');
		$this->db->where('menu_id',$id);

		$query = $this->db->get();
		$result = $query->result_array();
		
		
		return $result;
	}

	function get_promo_detail($id)
	{
		
		$this->db->select('*');
        $this->db->from('promo');
		$this->db->where('promo_id',$id);

		$query = $this->db->get();
		$result = $query->result_array();
		
		
		return $result;
	}
	
	function get_setting()
	{
		$this->db->select('*');
        $this->db->from('setting');
		
		$query = $this->db->get();
		$result = $query->result_array();

		return $result;
	}

	function get_opening()
	{
		$this->db->select('*');
        $this->db->from('opening_hours');
		
		$query = $this->db->get();
		$result = $query->result_array();

		return $result;
	}
	
	function get_category()
	{
		$this->db->select('notifications.id, notifications.title,notifications.notificationdate, notifications.category_img, COUNT(menu.menu_id) AS count,  notifications.message');
        $this->db->from('notifications');

        $this->db->order_by('notificationdate', 'DESC');
		$this->db->join('menu', 'notifications.id = menu.menu_category_id','left');
        $this->db->group_by('notifications.id');
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}

    function get_crimecategory()
	{
		$this->db->select('*');
        $this->db->from('category');

        $this->db->order_by('category_id');
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
	
	
        /*Added get crime type by category*/
	 function get_crimetype_by_category($id)
	{
		$this->db->select('type.type_id, type.type_name, type.categoryname');
                $this->db->from('type');
                $this->db->where('categoryname',$id);
                $this->db->order_by('type_name', 'DESC');
		
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
	
	
	//end get crime category type

         function get_emergencycontacts()
	{
		$this->db->select('emergencycontacts.id, emergencycontacts.name, emergencycontacts.phone, emergencycontacts.img');
        $this->db->from('emergencycontacts');
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
	
	//get crime category type
	 function get_crimetype()
	{
		$this->db->select('type.type_id, type.type_name','categoryid');
        $this->db->from('type');
		$this->db->order_by('type_id', 'DESC');
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
	//get crime category type
	 function get_categoryname($id)
	{
		$this->db->select('category.category_id, category.category_name');
        $this->db->from('category');
		$this->db->where('category.category_id', $id);
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
    
	function get_reg()
	{
		$this->db->select('register.register_id', 'register.register_email');
        $this->db->from('register');
		
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
	
     function get_reportedincidents()
	{
		$this->db->select('crimereport.id, crimereport.description, crimereport.area, crimereport.lat, crimereport.lot');
        $this->db->from('crimereport');

        $this->db->order_by('id', 'DESC');
		
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
    
       function get_notifications()
	{
		$this->db->select('notifications.id, notifications.title, notifications.message, notifications.pictureurl, notifications.publishedby, notifications.notificationdate, notifications.category_img');
        $this->db->from('notifications');

        $this->db->order_by('notificationdate', 'DESC');
		
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
/*Added get notification details function here (mobi function)*/
	function get_notification_detail($id)
	{
		$this->db->select('*');
		$this->db->from('notifications');
		$this->db->where('id',$id);
		
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
/*Karabo ended function here*/

	function get_best_seller()
	{
		$this->db->select('order_line_menu_id, order_line_category_name, order_line_name, SUM(order_line_qty) AS qty, order_line_disc, order_line_image, order_line_price');
        $this->db->from('order_line');
		$this->db->group_by('order_line_menu_id');
        $this->db->order_by('SUM(order_line_qty)', 'DESC');
		$this->db->limit(12);
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
	
	function get_promo()
	{
		$this->db->select('*');
        $this->db->from('promo');

        $this->db->order_by('promo_status', 'Aktif');
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}

	function get_historical_orders($email)
	{
		$this->db->select('*');
        $this->db->from('crimereport');
		$this->db->where('email', $email);
        $this->db->order_by('reportedon', 'DESC');
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
	
	
	
	function send_message($data)
	{
		
			$result = $this->db->insert('message',$data);
			
			return $result;
	}

	function send_register($data)
	{
		
			$result = $this->db->insert('register',$data);
			
			return $result;
	}
	//Added crime report(mobi function)
	function send_crimereport($data)
	{
		
			$result = $this->db->insert('crimereport',$data);
			
			return $result;
	}
	//end crime report
	function checkout_header($data)
	{
			$result = $this->db->insert('crimereport',$data);
			
			return $result;
	}
	
	function checkout_line($data_line)
	{
			$this->db->insert('history',$data_line);
			
			return $result;
	}
	function get_ref_no()
	{
		$this->db->select('RefNum');
        $this->db->from('crimereport');

        $this->db->order_by('id', 'DESC');
         $this->db->limit(1);
		 
		$query = $this->db->get();
		
		$result = $query->result_array();
		
		return $result;
	}
	
	
}