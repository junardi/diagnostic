<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Controller {

	
	public function process_login() 
	{
		$username = $this->input->post("username");  
		$password = md5($this->input->post("password"));    

		$check_login = $this->process_model->check_login($username, $password);  

		if($check_login != null) { 
			$this->session->set_userdata($check_login[0]);	   	
			redirect('home');	
		} else { 
			$error = ' 
				<div class="bg-danger">  
					<p>Username or password is incorrect</p>
				</div>  
			';   

			$this->session->set_flashdata("error", $error);  

			redirect("login");

		}      
	}  

	public function add_laboratory_test() 
	{
		// echo "<pre>";   
		// 	print_r($this->input->post());
		// echo "</pre>";   

		$data = array(
			'test' => trim($this->input->post('laboratory_test')), 
			'price' => trim($this->input->post('price')), 
			'category' => trim($this->input->post('category'))
		);  

		$insert_data = $this->process_model->insert_data('tests', $data);  

		if($insert_data) 
		{
			$message = '
				<div class="custom-alert alert alert-success">
				  <i class="icon-gift"></i><strong>Well done!</strong> Successed adding data.
				</div>  
			';
		} 
		else 
		{
			$message = '
				<div class="custom-alert alert alert-danger">
				  <i class="icon-remove-sign"></i><strong>Oh snap!</strong> Failed adding data.
				</div>
			';
		}     

		$this->session->set_flashdata('message', $message);  
		redirect('home');
	}     

	public function update_laboratory_test() 
	{
		// echo "<pre>";   
		// 	print_r($this->input->post());
		// echo "</pre>";   

		$data = array(
			'test' => trim($this->input->post('laboratory_test')), 
			'price' => trim($this->input->post('price')), 
			'category' => trim($this->input->post('category'))
		);     

		$test_id = $this->input->post('test_id');    
		$update_data_by_id = $this->process_model->update_data_by_id('tests', $data, $test_id, 'test_id');  

		if($update_data_by_id) 
		{
			$message = '
				<div class="custom-alert alert alert-success">
				  <i class="icon-gift"></i><strong>Well done!</strong> Successed updating data.
				</div>  
			';
		} 
		else 
		{
			$message = '
				<div class="custom-alert alert alert-danger">
				  <i class="icon-remove-sign"></i><strong>Oh snap!</strong> Failed adding data.
				</div>
			';
		}     

		$this->session->set_flashdata('message', $message);  
		redirect('home');
	}   

	public function add_patient() 
	{
		// echo "<pre>";   
		// 	print_r($this->input->post());
		// echo "</pre>";         

		$data = array(
			'first_name' => trim($this->input->post('first_name')), 
			'last_name' => trim($this->input->post('last_name')), 
			'gender' => trim($this->input->post('gender')),  
			'civil_status' => trim($this->input->post('civil_status')),   
			'birth_date' => trim($this->input->post('birth_date')),
			'occupation' => trim($this->input->post('occupation')),    
			'address' => trim($this->input->post('address')),  
			'contact_number' => trim($this->input->post('contact_number')),   
			'date_created' => time(), 
			'date_updated' => ""
		);  

		$insert_data = $this->process_model->insert_data('patients', $data);  

		if($insert_data) 
		{
			$message = '
				<div class="custom-alert alert alert-success">
				  <i class="icon-gift"></i><strong>Well done!</strong> Successed adding patient.
				</div>  
			';
		} 
		else 
		{
			$message = '
				<div class="custom-alert alert alert-danger">
				  <i class="icon-remove-sign"></i><strong>Oh snap!</strong> Failed adding patient.
				</div>
			';
		}     

		$this->session->set_flashdata('message', $message);  
		redirect('patients');
	}   

	public function update_patient() 
	{
		// echo "<pre>";   
		// 	print_r($this->input->post());
		// echo "</pre>";    

		$data = array(
			'first_name' => trim($this->input->post('first_name')), 
			'last_name' => trim($this->input->post('last_name')), 
			'gender' => trim($this->input->post('gender')),  
			'civil_status' => trim($this->input->post('civil_status')),    
			'birth_date' => trim($this->input->post('birth_date')),
			'occupation' => trim($this->input->post('occupation')),    
			'address' => trim($this->input->post('address')),  
			'contact_number' => trim($this->input->post('contact_number')),   
			'date_updated' => time()
		);     

		$patient_id = $this->input->post('patient_id');

		$update_data_by_id = $this->process_model->update_data_by_id('patients', $data, $patient_id, 'patient_id');  

		if($update_data_by_id) 
		{
			$message = '
				<div class="custom-alert alert alert-success">
				  <i class="icon-gift"></i><strong>Well done!</strong> Successed updating patient.
				</div>  
			';
		} 
		else 
		{
			$message = '
				<div class="custom-alert alert alert-danger">
				  <i class="icon-remove-sign"></i><strong>Oh snap!</strong> Failed updating patient.
				</div>
			';
		}     

		$this->session->set_flashdata('message', $message);  
		redirect('patients');
	}

	public function add_patient_test() 
	{
		
		$patient_id = $this->input->post('patient_id'); 

		$group_test_data = array(
			'patient_id' => $this->input->post('patient_id'), 
			'group_created' => time(), 
			'group_updated' => ""
		);      

		$test_ids = $this->input->post('test_id');

		$set_laboratory_test = $this->process_model->set_laboratory_test($group_test_data, $test_ids, $patient_id);   

		if($set_laboratory_test) 
		{
			$message = '
				<div class="custom-alert alert alert-success">
				  <i class="icon-gift"></i><strong>Well done!</strong> Successed adding test.
				</div>  
			';    
		}   
		else 
		{
			$message = '
				<div class="custom-alert alert alert-danger">
					  <i class="icon-remove-sign"></i><strong>Oh snap!</strong> Failed adding test.
				</div>
			';
		}   

		$this->session->set_flashdata('message', $message);    
		$redirect_value = "patients/manage?patient_id=" . $patient_id;
		redirect($redirect_value);   
	}  


	public function add_patient_test_to_selected_group() 
	{
		// echo "<pre>";
		// 	print_r($this->input->post());  
		// echo "</pre>";    

		$group_test_id = $this->input->post('group_test_id');
		$patient_id = $this->input->post('patient_id'); 

		$test_ids = $this->input->post('test_id');

		$insert_laboratory_test = $this->process_model->insert_laboratory_test($group_test_id, $test_ids, $patient_id);   

		if($insert_laboratory_test) 
		{
			$message = '
				<div class="custom-alert alert alert-success">
				  <i class="icon-gift"></i><strong>Well done!</strong> Successed adding test to the current set of test.
				</div>  
			';    
		}   
		else 
		{
			$message = '
				<div class="custom-alert alert alert-danger">
					  <i class="icon-remove-sign"></i><strong>Oh snap!</strong> Failed adding test to the current set of test.
				</div>
			';
		}   

		$this->session->set_flashdata('message', $message);    
		$redirect_value = "patients/manage?group_test_id=" . $group_test_id;
		redirect($redirect_value);   
	}


	// common deleting of data 
	public function delete_data()
	{
		// for deleting laboratory test
		if($this->input->get('test_id')) 
		{
			$test_id = $this->input->get('test_id');    

			$delete_data_by_id = $this->process_model->delete_data_by_id('tests', $test_id, 'test_id');         
			$delete_test_in_patients_tests = $this->process_model->delete_data_by_id('patients_tests', $test_id, 'test_id');                                                                   
			if($delete_data_by_id) 
			{
				$message = '
					<div class="custom-alert alert alert-success">
						  <i class="icon-gift"></i><strong>Well done!</strong> Successed deleting data.
					</div>  
				';
			}
			else
			{
				$message = '
					<div class="custom-alert alert alert-danger">
						  <i class="icon-remove-sign"></i><strong>Oh snap!</strong> Failed deleting data.
					</div>
				';
			}  


			$this->session->set_flashdata('message', $message);  
			redirect('home');
		} // end if for laboratory tests      


		// for deleting patient
		if($this->input->get('patient_id')) 
		{
			$patient_id = $this->input->get('patient_id');    

			$delete_data_by_id = $this->process_model->delete_data_by_id('patients', $patient_id, 'patient_id');      
			$delete_patient_group_test = $this->process_model->delete_data_by_id('group_tests', $patient_id, 'patient_id');   
			$delete_patient_group_test_tests = $this->process_model->delete_data_by_id('patients_tests', $patient_id, 'patient_id');                                                                                          

			if($delete_data_by_id && $delete_patient_group_test && $delete_patient_group_test_tests) 
			{
				$message = '
					<div class="custom-alert alert alert-success">
						  <i class="icon-gift"></i><strong>Well done!</strong> Successed deleting patient.
					</div>  
				';
			}
			else
			{
				$message = '
					<div class="custom-alert alert alert-danger">
						  <i class="icon-remove-sign"></i><strong>Oh snap!</strong> Failed deleting patient.
					</div>
				';
			}  

			$this->session->set_flashdata('message', $message);  
			redirect('patients');
		} // end if for patient   


		// for deleting patient test 
		if($this->input->get('patient_test_id')) 
		{
			$patient_test_id = $this->input->get('patient_test_id'); 
			$group_test_id = $this->input->get('group_test_id');      


			$delete_data_by_id = $this->process_model->delete_data_by_id('patients_tests', $patient_test_id, 'patient_test_id');      
			if($delete_data_by_id) 
			{
				$message = '
					<div class="custom-alert alert alert-success">
						  <i class="icon-gift"></i><strong>Well done!</strong> Successed deleting patient test.
					</div>  
				';
			}
			else
			{
				$message = '
					<div class="custom-alert alert alert-danger">
						  <i class="icon-remove-sign"></i><strong>Oh snap!</strong> Failed deleting patient test.
					</div>
				';
			}  

			$this->session->set_flashdata('message', $message);  
			$redirect_value = 'patients/manage?group_test_id=' . $group_test_id;
			redirect($redirect_value); 
		}  


		// delete patients tests by group   
		if($this->input->get('group_test_id')) 
		{
			$group_test_id = $this->input->get('group_test_id');  
			$patient_id = $this->input->get('current_patient_id');         

			$delete_group_data = $this->process_model->delete_data_by_id('group_tests', $group_test_id, 'group_test_id');  
			$delete_group_test_data = $this->process_model->delete_data_by_id('patients_tests', $group_test_id, 'group_test_id');      
			
			if($delete_group_data && $delete_group_test_data) 
			{
				$message = '
					<div class="custom-alert alert alert-success">
						  <i class="icon-gift"></i><strong>Well done!</strong> Successed deleting set of laboratory tests.
					</div>  
				';
			}
			else
			{
				$message = '
					<div class="custom-alert alert alert-danger">
						  <i class="icon-remove-sign"></i><strong>Oh snap!</strong> Failed deleting patient test.
					</div>
				';
			}  

			$this->session->set_flashdata('message', $message);  
			$redirect_value = 'patients/manage?patient_id=' . $patient_id;
			redirect($redirect_value); 
		}
	} // end common deleting of data  



}  































