<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template
{
	protected $_ci;
	
  	 function __construct()
	{
		$this->_ci =& get_instance();
	}
	
	function display($template, $data=null)
	{
		$this->_ci->load->view('/template.php',$data);
	}
}

/* End of file template.php*/
/* Location: ./application/libraries/template.php */
