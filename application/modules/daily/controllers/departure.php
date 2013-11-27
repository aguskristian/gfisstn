<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departure extends CI_Controller {

	/**
	 * 
	 * Apps : GFIS
	 * Version : 2.0.0
	 * Code Base : Codeigniter 2.1.3
	 * Developer : SIGAP Team
	 * Project Leader : mantara@gapura.co.id
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
			echo "depature";
	}
# INDEX =============================================================================================



	
}
/* End of file departure.php */
/* Location: ./application/controllers/daily/departure.php */