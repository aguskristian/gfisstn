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
        #$this->load->model('daily/daily_model','', TRUE);
		#$this->load->model('aircraft/aircraft_model', '', TRUE);
		#$this->load->model('airline/airline_model', '', TRUE);
    }
# CONSTRUTOR ========================================================================================= 

# INDEX ==============================================================================================
	public function index()
	{
			#$date = $this->uri->segment(4, mdate("%Y-%m-%d", now()));
			#$date = mdate("%Y-%m-%d", strtotime($date));
			$date = $this->uri->segment(4);
			echo $date;
	}
# INDEX =============================================================================================



	
}
/* End of file departure.php */
/* Location: ./application/controllers/daily/departure.php */