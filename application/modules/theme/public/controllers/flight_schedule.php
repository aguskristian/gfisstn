<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Flight_schedule extends CI_Controller {

	/**
	 * 
	 * Apps : GFIS
	 * Version : 2.0.0
	 * Code Base : Codeigniter 2.1.3
	 * 	Developer : SIGAP Team
	 *	Project Leader : mantara@gapura.co.id
	 *	
	 */
	 
//=====================================================	
// konstruktor
//===================================================== 
	 // star function construction
	function __construct()
	{
        parent::__construct();
		$this->load->helper('html');
        $this->load->model('public/gapura_angkasa_model','', TRUE);
		
    }
	// end function construction
//====================================================
	 
//====================================================
// index always display today departure sched
//====================================================
	// start index 
	public function index()
	{
			redirect('public/flight_schedule/departure/');
	}
	// start index 
//====================================================	
	
//====================================================
// departure schedule
//====================================================	
	// start departure display
	public function departure($segment = NULL)
	{
		# CACHING FOR FASTER LOAD TIME
		#$this->output->cache(10);
		
		// prepare data
		$sched_stn = $this->config->item('stn_code');
		$sched_visible = 'y';
		$sched_type = 'departure';
		$sched_date = mdate("%Y-%m-%d", strtotime(now()));
			$sched_date_uri = mdate("%d-%m-%Y", strtotime(now()));
		
		$sched_options = $this->uri->segment(4);
		$display_options = 12;
		
		// asign parameter for views
		$data['sched_visible'] = $sched_visible;
		$data['sched_date'] = $sched_date;
		$data['sched_type'] = $sched_type;
		
		// execute model
			$data['query'] = $this->gapura_angkasa_model->get_by_date_active($sched_stn, $sched_visible, $sched_type, $sched_date, $sched_options, $display_options);
		
		// execute view
		$this->load->library('user_agent');

		if ($this->agent->is_mobile())
		{
			$this->load->view('public/flight_schedule_departure_mobile',$data);
		}
	    elseif($this->agent->is_browser())
		{
			
			$this->load->view('public/flight_schedule_departure',$data);
		}
		else

		{
					
		$this->load->view('public/flight_schedule_departure',$data);
		}
	
	}
	// end departure display
//====================================================	
	
//====================================================
// arrival schedule
//====================================================	
	// start display arrival
	public function arrival($segment = NULL)
	{
		# CACHING FOR FASTER LOAD TIME
		#$this->output->cache(10);
		
		// prepare data
		$sched_stn = $this->config->item('stn_code');
		
		$sched_visible = 'y';
		$sched_type = 'arrival';
		$sched_date = mdate("%Y-%m-%d", strtotime(now()));
			$sched_date_uri = mdate("%d-%m-%Y", strtotime(now()));
		
		$sched_options = $this->uri->segment(4);
		$display_options = 12;
		
		// asign parameter for views
		$data['sched_visible'] = $sched_visible;
		$data['sched_date'] = $sched_date;
		$data['sched_type'] = $sched_type;
		
		// execute model
			$data['query'] = $this->gapura_angkasa_model->get_by_date_active($sched_stn, $sched_visible, $sched_type, $sched_date, $sched_options, $display_options);
		
		// execute view
		$this->load->library('user_agent');

		if ($this->agent->is_mobile())
		{
			$this->load->view('public/flight_schedule_arrival_mobile',$data);
		}
	    elseif($this->agent->is_browser())
		{
			$this->load->view('public/flight_schedule_arrival',$data);
		}
		else
		{
			$this->load->view('public/flight_schedule_arrival',$data);
		}
		
		
	}
	// end display arrival	
//====================================================	
}
/* End of file daily.php */
/* Location: ./application/controllers/daily.php */