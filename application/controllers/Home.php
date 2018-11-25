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
		$data = array();
		
		if($this->input->get('test_id_on_edit')) 
		{
			$data['test_id_on_edit'] = $this->input->get('test_id_on_edit');     
			$data['test_edit_data'] = $this->process_model->get_data_by_id('tests', $data['test_id_on_edit'], 'test_id');
		}

		$data['tests_data'] = $this->process_model->get_data('tests');  
		$data['main_content'] = "home_view";
		$this->load->view('template/content', $data);
	}  
	
}
