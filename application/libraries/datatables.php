<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datatables
{
	/*
	 * $sTable: Source table in database.
	 * $aColumns: Columns in source table.
	 * $idColumn: The ID column within columns.
	 */
	public function getData($sTable, $aColumns, $idColumn, $getjoin = '', $getjoin2 = '', $where = '')
	{
		// Loads CodeIgniter's Database Configuration
		$CI =& get_instance();
		$CI->load->database();
		
		// Paging
		if(isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1')
		{
			$CI->db->limit($CI->db->escape_str($_GET['iDisplayLength']), $CI->db->escape_str($_GET['iDisplayStart']));
		}
		
		// Ordering
		if(isset($_GET['iSortCol_0']))
		{
			for($i=0; $i<intval($_GET['iSortingCols']); $i++)
			{
				if($_GET['bSortable_'.intval($_GET['iSortCol_'.$i])] == 'true')
				{
					$CI->db->order_by($aColumns[intval($CI->db->escape_str($_GET['iSortCol_'.$i]))], $CI->db->escape_str($_GET['sSortDir_'.$i]));
				}
			}
		}
		
		
		
		// Individual column filtering
		if(isset($_GET['sSearch']) && !empty($_GET['sSearch']))
		{
			for($i=0; $i<count($aColumns); $i++)
			{
				if(isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == 'true')
				{
					$CI->db->or_like($aColumns[$i], $CI->db->escape_like_str($_GET['sSearch']));
				}
				
			}
		}

                
		// Any filtering
		if(isset($_GET['total']) && !empty($_GET['total']))
		{
			for($i=0; $i<$_GET['total']; $i++)
			{
			
			$pecah = explode('|',$_GET['value']);
			$var = explode('*',$pecah[$i]);
			
			if($var[1] <> '' && $var[2] <> '' && $var[3] <> '' && $var[4]<> ''){
			
			if($var[1] == 'Or'){
			switch ($var[3])
					{
						case "=":
							$CI->db->or_where($var[2],$var[4]); 
							break;
						case "!=":
							$CI->db->or_where($var[2]." !=",$var[4]); 
							break;
						case "like":
							$CI->db->or_like($var[2],$var[4]); 
							break;
						case ">":
							$CI->db->or_where($var[2]." >",$var[4]); 
							break;
						case "<":
							$CI->db->or_where($var[2]." <",$var[4]); 
							break;
					}
			
				 }else{
			 			switch ($var[3])
			 					{
						case "=":
							$CI->db->where($var[2],$var[4]); 
							break;
						case "!=":
							$CI->db->where($var[2]." !=",$var[4]); 
							break;
						case "like":
							$CI->db->like($var[2],$var[4]); 
							break;
						case ">":
							$CI->db->where($var[2]." >",$var[4]); 
							break;
						case "<":
							$CI->db->where($var[2]." <",$var[4]); 
							break;
					}
			 
			 		}
				}
			}
		}
/* Multi column filtering */

	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
	
	if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
		if(substr_count($_GET['sSearch_'.$i],"~") == '0'){

				
			$CI->db->like($aColumns[$i], $CI->db->escape_like_str($_GET['sSearch_'.$i]));
			
	
		
		}else{
		
		$pecah = explode("~",$_GET['sSearch_'.$i]);
		
		if($pecah[0] <> '' && $pecah[1] == ''){
				
			$CI->db->like($aColumns[$i], $CI->db->escape_like_str($pecah[0]));
		
		}elseif($pecah[0] <> '' && $pecah[1] <> ''){
		
		$CI->db->where($aColumns[$i].' BETWEEN "'.mysql_real_escape_string($pecah[0]).'" AND "'.mysql_real_escape_string($pecah[1]).'"');
		
		} 
		
			}
				}  
					}
	
		// Select data
		$CI->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
		if($getjoin != ''){ $CI->db->join($getjoin[0], $getjoin[1], $getjoin[2]); }
		if($getjoin2 != ''){ $CI->db->join($getjoin2[0], $getjoin2[1], $getjoin2[2]); }
		if($where != ''){ $CI->db->where($where[0], $where[1]); }
		$rResult = $CI->db->get($sTable);
		
   
		
		// Data set length after filtering
		$CI->db->select('FOUND_ROWS() AS found_rows');
		$iFilteredTotal = $CI->db->get()->row()->found_rows;
		
		// Total data set length
		$iTotal = $CI->db->count_all($sTable);
		
		// Output
		
		
		$output = array(
			'sEcho' => intval($_GET['sEcho']),
			'iTotalRecords' => $iTotal,
			'iTotalDisplayRecords' => $iFilteredTotal,
			'url' => urldecode($_SERVER['REQUEST_URI']),
			'aaData' => array()
		);
		
		foreach($rResult->result_array() as $aRow)
		{
			$row = array();
			
			foreach($aColumns as $col)
			{
				$row[] = $aRow[$col];
				if ($col == $idColumn) { $row['DT_RowId'] = $aRow[$col]; } // Sets DT_RowId
			}
			
			$output['aaData'][] = $row;
		}
		
		//url export
		$url= urldecode($_SERVER['REQUEST_URI']);
		$output['links'] = "$url";
		return $_REQUEST['callback'].'('.json_encode( $output ).');';
	}

/*
	 * $sTable: Source table in database.
	 * $aColumns: Columns in source table.
	 * $idColumn: The ID column within columns.
	 */
	public function getData2($sTable, $aColumns, $idColumn, $getjoin = '', $getjoin2 = '', $where = '')
	{
		// Loads CodeIgniter's Database Configuration
		$CI =& get_instance();
		$CI->load->database();

               		
		// Paging
		if(isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1')
		{
			$CI->db->limit($CI->db->escape_str($_GET['iDisplayLength']), $CI->db->escape_str($_GET['iDisplayStart']));
		}
		
		// Ordering
		if(isset($_GET['iSortCol_0']))
		{
			for($i=0; $i<intval($_GET['iSortingCols']); $i++)
			{
				if($_GET['bSortable_'.intval($_GET['iSortCol_'.$i])] == 'true')
				{
					$CI->db->order_by($aColumns[intval($CI->db->escape_str($_GET['iSortCol_'.$i]))], $CI->db->escape_str($_GET['sSortDir_'.$i]));
				}
			}
		}
		
		
		
		// Individual column filtering
		if(isset($_GET['sSearch']) && !empty($_GET['sSearch']))
		{
			for($i=0; $i<count($aColumns); $i++)
			{
				if(isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == 'true')
				{
					$CI->db->or_like($aColumns[$i], $CI->db->escape_like_str($_GET['sSearch']));
				}
				
			}
		}

                
		// Any filtering
		if(isset($_GET['total']) && !empty($_GET['total']))
		{
			for($i=0; $i<$_GET['total']; $i++)
			{
			
			$pecah = explode('|',$_GET['value']);
			$var = explode('*',$pecah[$i]);
			
			if($var[1] <> '' && $var[2] <> '' && $var[3] <> '' && $var[4]<> ''){
			
			if($var[1] == 'Or'){
			switch ($var[3])
					{
						case "=":
							$CI->db->or_where($var[2],$var[4]); 
							break;
						case "!=":
							$CI->db->or_where($var[2]." !=",$var[4]); 
							break;
						case "like":
							$CI->db->or_like($var[2],$var[4]); 
							break;
						case ">":
							$CI->db->or_where($var[2]." >",$var[4]); 
							break;
						case "<":
							$CI->db->or_where($var[2]." <",$var[4]); 
							break;
					}
			
				 }else{
			 			switch ($var[3])
			 					{
						case "=":
							$CI->db->where($var[2],$var[4]); 
							break;
						case "!=":
							$CI->db->where($var[2]." !=",$var[4]); 
							break;
						case "like":
							$CI->db->like($var[2],$var[4]); 
							break;
						case ">":
							$CI->db->where($var[2]." >",$var[4]); 
							break;
						case "<":
							$CI->db->where($var[2]." <",$var[4]); 
							break;
					}
			 
			 		}
				}
			}
		}
/* Multi column filtering */

	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
	
	if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
		if(substr_count($_GET['sSearch_'.$i],"~") == '0'){

				
			$CI->db->like($aColumns[$i], $CI->db->escape_like_str($_GET['sSearch_'.$i]));
			
	
		
		}else{
		
		$pecah = explode("~",$_GET['sSearch_'.$i]);
		
		if($pecah[0] <> '' && $pecah[1] == ''){
				
			$CI->db->like($aColumns[$i], $CI->db->escape_like_str($pecah[0]));
		
		}elseif($pecah[0] <> '' && $pecah[1] <> ''){
		
		$CI->db->where($aColumns[$i].' BETWEEN "'.mysql_real_escape_string($pecah[0]).'" AND "'.mysql_real_escape_string($pecah[1]).'"');
		
		} 
		
			}
				}  
					}
	
		// Select data
		$CI->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
		if($getjoin != ''){ $CI->db->join($getjoin[0], $getjoin[1], $getjoin[2]); }
		if($getjoin2 != ''){ $CI->db->join($getjoin2[0], $getjoin2[1], $getjoin2[2]); }
		if($where != ''){ $CI->db->where('type', 'Corruption'); }
		$rResult = $CI->db->get($sTable);
		
   
		
		// Data set length after filtering
		$CI->db->select('FOUND_ROWS() AS found_rows');
		$iFilteredTotal = $CI->db->get()->row()->found_rows;
		
		// Total data set length
		$iTotal = $CI->db->count_all($sTable);
		
		// Output
		
		
		$output = array(
			'sEcho' => intval($_GET['sEcho']),
			'iTotalRecords' => $iTotal,
			'iTotalDisplayRecords' => $iFilteredTotal,
			'url' => urldecode($_SERVER['REQUEST_URI']),
			'aaData' => array()
		);
		
		foreach($rResult->result_array() as $aRow)
		{
			$row = array();
			
			foreach($aColumns as $col)
			{
				$row[] = $aRow[$col];
				if ($col == $idColumn) { $row['DT_RowId'] = $aRow[$col]; } // Sets DT_RowId
			}
			
			$output['aaData'][] = $row;
		}
		
		//url export
		$url= urldecode($_SERVER['REQUEST_URI']);
		$output['links'] = "$url";
		return $_REQUEST['callback'].'('.json_encode( $output ).');';
	}

}
?>