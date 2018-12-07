<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends CI_Controller {

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
		
		if($this->input->get('patient_id_on_edit')) 
		{
			$data['patient_id_on_edit'] = $this->input->get('patient_id_on_edit');     
			$data['patient_edit_data'] = $this->process_model->get_data_by_id('patients', $data['patient_id_on_edit'], 'patient_id');                                                                
		}

		$data['patients_data'] = $this->process_model->get_data('patients');  
		$data['main_content'] = "patients_view";
		$this->load->view('template/content', $data);  
	}      

	public function manage() 
	{   

		$data = array();   

		if($this->input->get('patient_id')) 
		{
			
			$patient_id = $this->input->get('patient_id');     
			$data['current_patient_id'] = $patient_id;   
			
			// below for gets tests for the main view
			$data['get_patient_laboratory_tests'] = $this->process_model->get_patient_laboratory_tests($patient_id);  
			
			// below for the current patient data 	
			$data['patient_data'] = $this->process_model->get_data_by_id('patients', $patient_id, 'patient_id');  

			// below is for the footer add popup
			$get_tests_category = $this->process_model->get_tests_category();   
			for($i = 0; $i < count($get_tests_category); $i++) 
			{
				$get_tests_category[$i]['tests'] = $this->process_model->get_tests_by_category($get_tests_category[$i]['category']); 
			}    
			$data['select_tests_data'] = $get_tests_category;      

			// below load view 
			$data['main_content'] = "patients_manage_view";
			$this->load->view('template/content', $data);  	   
		} 
		elseif($this->input->get('group_test_id')) 
		{
			$group_test_id = $this->input->get('group_test_id');
			$patient_id = $this->process_model->get_patient_id_by_group_test_id($group_test_id);     
			$data['current_patient_id'] = $patient_id;    
			$data['current_group_test_id'] = $group_test_id;    

			// below for the current patient data     
			$data['patient_data'] = $this->process_model->get_data_by_id('patients', $patient_id, 'patient_id');  

			// group date requested  
			$data['group_test_requested'] = $this->process_model->get_group_test_date_created_by_group_test_id($group_test_id);                                                                        
			
			// below for the data in main view 
			$data['individual_tests_data'] = $this->process_model->get_patient_laboratory_tests_by_group_test_id($group_test_id);

			// echo "<pre>";
			// 	print_r($data['individual_tests_data']);  
			// echo "</pre>";  

			
			// below for addition of only tests that are not added in a set of tests in a group     
			$get_group_test_ids_by_group_test_id = $this->process_model->get_group_test_ids_by_group_test_id($group_test_id);  
			$test_ids = array();
			foreach($get_group_test_ids_by_group_test_id as $val) 
			{
				array_push($test_ids, $val['test_id']);
			}         
			
			$get_tests_category = $this->process_model->get_tests_category();     

			foreach($get_tests_category as $element_key => $element) 
			{
				foreach($element as $value_key => $value) 
				{
					if($this->process_model->get_category_tests_not_in_a_test_id($value, $test_ids) != null) 
					{
						$get_tests_category[$element_key]['tests'] = $this->process_model->get_category_tests_not_in_a_test_id($value, $test_ids); 
					}
					else
					{
						unset($get_tests_category[$element_key]);
					}
				}
			}   
			$data['not_added_tests_data'] = $get_tests_category;  

			// below for getting current patient test id and category   
			if($this->input->get('patient_test_id') && $this->input->get('category')) 
			{
				$data['current_patient_test_id'] = $this->input->get('patient_test_id');  
				$data['current_category'] = $this->input->get('category');       

				$check_test_result = $this->process_model->check_test_result($this->input->get('patient_test_id'), $this->input->get('category'));
				if($check_test_result) 
				{
					$data['test_details'] = $this->process_model->get_test_details_by_patient_test_id($this->input->get('patient_test_id'), $this->input->get('category'));                                                             
				}
				else 
				{
					$data['test_details'] = $this->process_model->get_test_details_by_patient_test_id($this->input->get('patient_test_id'), null);
				}
				
				
			}

			
			// below load view 
			$data['main_content'] = "patients_manage_tests_by_group_view";
			$this->load->view('template/content', $data);  		
		}
		else
		{
			show_404($page = '', $log_error = TRUE);
		} 
	}
	
}   


















