<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departure extends CI_Controller {

	/**
	 * 
	 * Apps : GFIS
	 * Version : 3.0.0
	 * Code Base : Codeigniter 2.1.4
	 * Developer : SIGAP Team
	 * Project Leader : mantara@gapura.co.id
	 *
	 * Please do not copy, share, modify or distribute this application without developer permission
	 *	
	 */
	 

# CONSTRUTOR ========================================================================================= 
	function __construct()
	{
        parent::__construct();
		#$this->load->helper('html');
		#$this->load->helper('sigap_pdf');
        $this->load->model('departure_model','', TRUE);
		#$this->load->model('aircraft/aircraft_model', '', TRUE);
		#$this->load->model('airline/airline_model', '', TRUE);
    }
# CONSTRUTOR ========================================================================================= 

# INDEX ==============================================================================================
	public function index()
	{
		redirect('daily/departure/schedule/' . mdate("%d-%m-%Y", now()) . '/all/active/20/', 'refresh');
	}
# INDEX =============================================================================================


	public function schedule()
	{
		# STN CODE
		$stn = $this->config->item('stn_code');
		
		# DATE
		$date = $this->uri->segment(4, now());
		$date = mdate("%Y-%m-%d", strtotime($date));
		
		# AIRLINE
		$airline = $this->uri->segment(5, 'all');
		
		# STATUS
		$status = $this->uri->segment(6, 'active');
		
		# ROWS
		$rows = $this->uri->segment(7, '20');
		
		# CALL MODEL FOR DAILY SCH
		if($status == 'all' && $airline == 'all')
		{
			$data['query'] = $this->departure_model->get_by_date_all($stn, $date, $rows);
		}
		elseif($status == 'all' && $airline == 'nonga')
		{
			$data['query'] = $this->departure_model->get_by_date_all_non_ga($stn, $date, $rows);
		}
		elseif($status == 'all' && $airline <> 'all')
		{
			$data['query'] = $this->departure_model->get_by_date_all_by_airline($stn, $airline, $date, $rows);
		}
		elseif($status == 'active' && $airline == 'all')
		{
			$data['query'] = $this->departure_model->get_by_date_active($stn, $date, $rows);
		}
		elseif($status == 'active' && $airline == 'nonga')
		{
			$data['query'] = $this->departure_model->get_by_date_active_non_ga($stn, $date, $rows);
		}
		elseif($status == 'active' && $airline <> 'all')
		{
			$data['query'] = $this->departure_model->get_by_date_active_by_airline($stn, $date, $airline, $rows);
		}
		elseif($status == 'delayed' && $airline == 'all')
		{
			$data['query'] = $this->departure_model->get_by_date_delay($stn, $date, $rows);
		}
		elseif($status == 'delayed' && $airline == 'nonga')
		{
			$data['query'] = $this->departure_model->get_by_date_delay_non_ga($stn, $date, $rows);
		}
		elseif($status == 'delayed' && $airline <> 'all')
		{
			$data['query'] = $this->departure_model->get_by_date_delay_by_airline($stn, $date, $airline, $rows);
		}
		elseif($status == 'departed' && $airline == 'all')
		{
			$data['query'] = $this->departure_model->get_by_date_departed_arrived($stn, $date, $rows);
		}
		elseif($status == 'departed' && $airline == 'nonga')
		{
			$data['query'] = $this->departure_model->get_by_date_departed_arrived_non_ga($stn, $date, $rows);
		}
		elseif($status == 'departed' && $airline <> 'all')
		{
			$data['query'] = $this->departure_model->get_by_date_departed_arrived_by_airline($stn, $date, $airline, $status, $rows);
		}
		
		# CALL VIEWS
		$this->load->view('departure', $data);
	}


	
}
/* End of file departure.php */
/* Location: ./application/controllers/daily/departure.php */