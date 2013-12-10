<?php
class tes extends CI_Controller {

	 // star function construction
	function __construct()
	{
        parent::__construct();
		$this->load->helper('html','url');
        
		
    }
	// end function construction
//====================================================
	 
//====================================================
// index always display today departure sched
//====================================================
	// start index 
	public function index()
	{
			$this->load->view('tes_template');
	}
	public function coba()
	{
			$this->load->view('index');
	}
	}
?>