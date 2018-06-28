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
			redirect('prices');	
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
}
