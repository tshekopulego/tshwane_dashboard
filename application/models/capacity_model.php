<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Capacity_model extends CI_Model
{

    public $months_test;
    
	public function __construct(){	
            $this->load->database();
            $this->months_test = 3;
	}
	
        //Sample basic fetch from db
	public function get_data(){
            $this->db->select('*');
            $this->db->from('deployment_plan');
            $query = $this->db->get();
            
            
            //$query = 'SELECT *  FROM `deployment_plan` ';
            $result = $query->result_array();
            return $result;
	}

        //Basic Chart Dates Drop down
        public function get_dates(){

            $this->db->select('date');
            $this->db->distinct();
            $this->db->from('deployment_plan');
            //$this->db->from('deployment_calculations');
            $this->db->order_by('date', 'DESC');
            //$this->db->limit('30');
            $query = $this->db->get();

            $result = $query->result_array();
            
            return $result;
	}
        
        //Basic Chart Regions Drop down
        public function get_regions(){

            $this->db->select('region_id, region_name');
            //$this->db->distinct();
            $this->db->from('deployment_regions');
            $this->db->order_by('region_name', 'DESC');
            $query = $this->db->get();

            $result = $query->result_array();
            return $result;
	}
        
        //Basic Chart Display
        public function chart(){
            //Fetch from deployment plan, changed to other table after meet
            $sql = "SELECT "
                    . " `shift`, "
                    . " sum(`members`) AS `total_members`, "
                    . " sum(`vehicles`) AS `total_vehicles`, "
                    . " sum(`bikes`) AS `total_bikes` "
                    . " FROM `deployment_plan` "
                    . " WHERE `shift` != '' AND `date` >= DATE_SUB(CURDATE(), INTERVAL ".$this->months_test." MONTH) "
                    . " group by `shift` "
                    . " DESC";
            
            //Fetch from deployment calculations
            //$sql = "SELECT `shift`, `total_members`, `total_vehicles`, `total_bikes` FROM `deployment_calculations` WHERE `date` >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) group by `shift` DESC";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
	}
        
        //Chart display based on date
        public function chart_search($timeframe, $region = ''){
            
            //Fetch from deployment calculations
            if(!$region){
                
                if($timeframe == 'yesterday'){
                    $diff = 'DATE_SUB(CURDATE(), INTERVAL 1 DAY)';
                }else if($timeframe == 'lastweek'){
                    $diff = 'DATE_SUB(CURDATE(), INTERVAL 1 WEEK)';
                }else if($timeframe == 'lastmonth'){
                    $diff = 'DATE_SUB(CURDATE(), INTERVAL 1 MONTH)';
                }else{
                    $diff = 'DATE_SUB(CURDATE(), INTERVAL 3 MONTH)';
                }
            
                $sql = "SELECT "
                        . " `shift`, "
                        . " `region`, "
                        . " sum(`members`) AS `total_members`, "
                        . " sum(`vehicles`) AS `total_vehicles`, "
                        . " sum(`bikes`) AS `total_bikes` "
                        . " FROM `deployment_plan` "
                        . " WHERE `date` >= ".$diff 
                        . " group by `shift` "
                        . " DESC";
                
                
                //$sql = "SELECT `shift`, `total_members`, `total_vehicles`, `total_bikes` FROM `deployment_calculations` WHERE `date` = '".$date."' group by `shift` DESC";            
            }else{
                
                
                $sql = "SELECT "
                        . " `shift`, "
                        . " `region`, "
                        . " sum(`members`) AS `total_members`, "
                        . " sum(`vehicles`) AS `total_vehicles`, "
                        . " sum(`bikes`) AS `total_bikes` "
                        . " FROM `deployment_plan` "
                        . " WHERE `date` = '".$timeframe."'"
                        . " AND `region` = '".$region."' "
                        . " group by `shift` "
                        . " DESC";
               // $sql = "SELECT `shift`, `total_members`, `total_vehicles`, `total_bikes` FROM `deployment_calculations` WHERE `date` = '".$date."' AND `region` LIKE '%".$region."%' group by `shift` DESC";
            }
            
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
	}

        
        //Basic CSV export
        public function export(){
            
            $this->db->select('date, time, shift, reported_by, supervisor, region, members, vehicles, bikes');
            $this->db->from('deployment_plan');
            $this->db->order_by('date', 'DESC');
            //$this->db->group_by('date');
            $query = $this->db->get();
            $result = $query->result_array();
            
            //Declare headers to create downloadable csv
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=data.csv');            
            
            //Save as output so no physical file has to be stored
            $out = fopen('php://output', 'w');
            //Declare headers
            fputcsv($out, array('Date', 'Time', 'Shift', 'Reported by', 'Supervisor', 'Region', 'Members', 'Vehicles', 'Bikers'));
            //Import rows.
            foreach ($result as $entry){
                fputcsv($out, $entry);
            }
            //fputcsv($out, array('this','is some', 'csv "stuff", you know.'));
            //Close file...
            fclose($out);
            
	}
        
        //Basic CSV export
        public function export_pdf($date = ''){
            
            if($date == 'yesterday'){
                $diff = 'DATE_SUB(CURDATE(), INTERVAL 1 DAY)';
            }else if($date == 'lastweek'){
                $diff = 'DATE_SUB(CURDATE(), INTERVAL 1 WEEK)';
            }else if($date == 'lastmonth'){
                $diff = 'DATE_SUB(CURDATE(), INTERVAL 1 MONTH)';
            }else{
                $diff = 'DATE_SUB(CURDATE(), INTERVAL 9 MONTH)';
            }

  
            $sql = "SELECT "
                    . " b.shift_name, "
                    . " sum(a.members) AS `total_members`, "
                    . " sum(a.vehicles) AS `total_vehicles`, "
                    . " sum(a.bikes) AS `total_bikes` "
                    . " FROM `deployment_plan` AS a "
                    . " LEFT JOIN `shifts` AS b "
                    . " ON b.shift_id = a.shift "
                    . " WHERE a.date >= ".$diff
                    . " group by a.shift "
                    . " DESC";


            //Fetch from deployment calculations
            $query = $this->db->query($sql);
            $result = $query->result_array();
            
            return $result;
           
	}
}
/*
 * 
 * 
 SELECT a.shift AS sid, 
 * a.region AS rid, 
 * b.region_id AS region_id, b.region_name AS region_name, SUM(  `members` ) AS  `total_members` , SUM(  `vehicles` ) AS  `total_vehicles` , SUM(  `bikes` ) AS  `total_bikes` 
FROM  `deployment_plan` AS a
LEFT JOIN  `regions` AS b ON b.region_id = a.region
WHERE  `date` >= DATE_SUB( CURDATE( ) , INTERVAL 9 
MONTH ) 
GROUP BY  `shift` DESC

 */