<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct() 
	{
		parent::__construct();    
		if($this->session->userdata("user_id") == null) 
		{ 
			redirect("login");
        }   
       
	}
	
	public function index()
	{
		$this->load->view('home_view');
	}
}
