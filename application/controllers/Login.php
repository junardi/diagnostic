<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {   


	function __construct() 
	{
		parent::__construct();    
		if($this->session->userdata("user_id") != null) { 
			redirect("home");
		} 
	}   

	public function index()
	{
		$this->load->view('login_view');
	}    


	function test() 
	{
		echo md5("donnie");
	}
}
