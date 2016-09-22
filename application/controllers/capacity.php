<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//DO NOT REMOVE THIS CODE, OTHERWISE THE EXPORT TO PDF WONT WORK
date_default_timezone_set('Africa/Johannesburg');

class Capacity extends CI_Controller {

	public function __construct(){
            parent::__construct();
            $this->load->model('login_model');
            $this->load->model('capacity_model');
	}
        
        public function index(){
            if($this->login_model->is_logged_in()){
                $this->load->view('capacity_report');
            }else{
		redirect('login');
            }
        }
        
        public function get_data(){
            if($this->login_model->is_logged_in()){
                $data = $this->capacity_model->get_data();
                echo json_encode($data); 
            }else{
		redirect('login');
            }
        }
        
	public function chart() {
            if($this->login_model->is_logged_in()){
                $data = $this->capacity_model->chart();
                //header("Access-Control-Allow-Origin: *"); 
                //header('Access-Control-Allow-Methods: GET, POST');
                
                if($data){
                    $count = count($data);
                    if($count < 3){
                        $shifts = array();
                        foreach($data as $entry){
                            $shifts[] = $entry['shift'];
                        }
                        for($x = 1; $x < 4;  $x++){
                            if(!in_array($x, $shifts)){
                                $data[] = array(
                                    "shift"          => $x,
                                    "total_members"  => "0",
                                    "total_vehicles" => "0",
                                    "total_bikes"    => "0"
                                );
                            }
                        }
                    }
                }
                //print_r(strip_slashes($data));
                echo json_encode(strip_slashes($data));
            }else{
		redirect('login');
            }
	}

        //Get chart json based on date and region search
        public function chart_by_search() {
            if($this->login_model->is_logged_in()){
                $timeframe = '';
                $region = '';
                
                if($this->uri->segment(3)){
                    $timeframe = $this->uri->segment(3); 
                }else{
                    $timeframe = $this->input->post('daterange');         
                }
                
                if($this->uri->segment(4)){
                    $region = $this->uri->segment(4); 
                }else{
                    $region = $this->input->post('region');        
                }
                //$region = $this->input->post('region');
                
                $data = $this->capacity_model->chart_search($timeframe, $region);                    

                if($data){
                    $count = count($data);
                    if($count < 3){
                        $shifts = array();
                        foreach($data as $entry){
                            $shifts[] = $entry['shift'];
                        }
                        for($x = 1; $x < 4;  $x++){
                            if(!in_array($x, $shifts)){
                                $data[] = array(
                                    "shift"          => $x,
                                    "total_members"  => "0",
                                    "total_vehicles" => "0",
                                    "total_bikes"    => "0"
                                );
                            }
                        }
                    }
                }
                    //Return data
                    echo json_encode(strip_slashes($data));
                //}
                
            }else{
		redirect('login');
            }
	}
        
        //Populate list of dates
	public function get_dates() {
            if($this->login_model->is_logged_in()){
                $data = $this->capacity_model->get_dates();
                echo json_encode($data);
            }else{
		redirect('login');
            }            
	}

        //Populate select list for regions
        public function get_regions() {
            if($this->login_model->is_logged_in()){
                $data = $this->capacity_model->get_regions();
                echo json_encode($data);
                
            }else{
		redirect('login');
            }            
	}
        
        //Run basic csv export
        public function export(){
            if($this->login_model->is_logged_in()){
                $this->capacity_model->export();
            }else{
		redirect('login');
            }
        }
        
        //Create physicl image of graph
        public function make_graph(){
            
            $graph = $this->input->post('image');
            $graph = explode(',', $graph);
            $data = base64_decode($graph[1]);
            $filename = rand(12, 255).'_graph.png';
            $path = './images/graphs/';
            $file = $path.$filename;
            $success = file_put_contents($file, $data);
            
            $graph_name = explode('.', $filename);
            
            echo $graph_name[0];
            
        }

	public function export_pdf(){
 
            $image = $this->uri->segment(3);
            $date = $this->uri->segment(4);
            
            $results = $this->capacity_model->export_pdf($date);
            
            // page info here, db calls, etc.    
            $data = array(
                'title'     => '<h1 style="text-align:center">Strength Report Export</h1>',
                'rows'      => $results,
                'graph'     => $image
            );
            
            $date = $this->uri->segment(4);
            
            $this->load->library('pdf');
            $this->pdf->load_view('strength_report_pdf', $data);
            $this->pdf->render();
            $this->pdf->stream('export_'.$date);
          
        }
}

/* End of file capacity.php */
/* Location: ./application/controller/capacity.php */
