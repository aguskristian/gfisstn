<?php
class Flight_schedule extends Application {

	 // star function construction
	function __construct()
	{
        parent::__construct();
		$this->load->helper('html');
        
		
    }
	// end function construction
//====================================================
	 
//====================================================
// index always display today departure sched
//====================================================
	// start index 
	public function index()
	{
			$this->load->view('public/public');
	}
?>