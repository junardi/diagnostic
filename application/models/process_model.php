<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process_model extends CI_Model { 

    function __construct() 
    {
		parent::__construct();
    }  
    
    
    public function check_login($username, $password)  
    {  
		$this->db->where('username', $username);	  
		$this->db->where('password', $password);  

		$query = $this->db->get("users");  
		return $query->result_array();
    }   
    

}   







