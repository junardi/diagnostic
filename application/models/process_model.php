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

    public function insert_data($table, $data) 
    {   
        $query = $this->db->insert($table, $data);   
        if($query) 
        {
            return true;
        }
        else 
        {
            return false;
        }
    }     


    public function get_data($table) 
    {
        $query = $this->db->get($table);    
        return $query->result();  
    }      


    public function get_data_by_id($table, $id, $id_name) 
    {
        $this->db->where($id_name, $id);   
        $query = $this->db->get($table);  

        return $query->result();
    }  

    public function delete_data_by_id($table, $id, $id_name) 
    {
        $this->db->where($id_name, $id);    
        $query = $this->db->delete($table);   
        if($query) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }  


    public function update_data_by_id($table, $update_data, $id, $id_name) 
    {
        $this->db->where($id_name, $id);    
        $query = $this->db->update($table, $update_data);   
        if($query) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }  


    // below for specific functions 
    public function get_tests_data() 
    {
        $this->db->order_by('category');   
        $query = $this->db->get("tests");  

        return $query->result();  
    }  


    public function get_patient_test($patient_id) 
    {
        $this->db->select('*');  
        $this->db->from('patients_tests');  
        $this->db->join('tests', 'tests.test_id = patients_tests.test_id', 'left');      
        $this->db->where('patient_id', $patient_id);  
        $query = $this->db->get();  
        return $query->result();
    }     


    public function get_tests_category() 
    {
        $this->db->select('category');  
        $this->db->group_by('category');
        $this->db->from('tests');   
        $query = $this->db->get();
        return $query->result_array();
    }  

    public function get_tests_by_category($category) 
    {
        $this->db->where('category', $category);  
        $query = $this->db->get('tests');   
        return $query->result_array();
    }         

    public function set_laboratory_test($group_data, $test_ids, $patient_id) 
    {
        $this->db->trans_start();
            $this->db->insert('group_tests', $group_data);  
            $insert_id = $this->db->insert_id();  
            foreach($test_ids as $test_id) 
            {
                $data = array(
                    'test_id' => $test_id, 
                    'group_test_id' => $insert_id, 
                    'patient_id' => $patient_id, 
                    'test_created' => time(), 
                    'test_updated' => ""
                );  

                $this->db->insert('patients_tests', $data);  

            }
        
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return false;
        }        
        else 
        {
            return true;
        }
    }    


    public function insert_laboratory_test($group_id, $test_ids, $patient_id) 
    {
        $this->db->trans_start();
            foreach($test_ids as $test_id) 
            {
                $data = array(
                    'test_id' => $test_id, 
                    'group_test_id' => $group_id, 
                    'patient_id' => $patient_id, 
                    'test_created' => time(), 
                    'test_updated' => ""
                );  

                $this->db->insert('patients_tests', $data);  
            }
        
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            return false;
        }        
        else 
        {
            return true;
        }
    }


    public function get_patient_laboratory_tests($patient_id) 
    {
        $this->db->select('group_tests.group_test_id, group_tests.patient_id, group_tests.group_created, group_tests.group_updated, patients_tests.patient_test_id, patients_tests.test_id, patients_tests.test_created, patients_tests.test_updated, GROUP_CONCAT(tests.test SEPARATOR ",") AS laboratory_test, SUM(tests.price) as total_price, GROUP_CONCAT(tests.category SEPARATOR ",") as categories');                                                                                                                                                                                          
        $this->db->where('group_tests.patient_id', $patient_id);    
        $this->db->from('group_tests');    
        $this->db->join('patients_tests', 'patients_tests.group_test_id = group_tests.group_test_id', 'LEFT');
        $this->db->join('tests', 'tests.test_id = patients_tests.test_id', 'LEFT');  
        $this->db->group_by('group_tests.group_test_id');     
            
        $query = $this->db->get();  
        return $query->result();
    }    


    public function get_patient_laboratory_tests_by_group_test_id($group_test_id) 
    {
        $this->db->select('patients_tests.patient_test_id, patients_tests.test_id, patients_tests.group_test_id, patients_tests.patient_id, patients_tests.test_created, patients_tests.test_updated, tests.test, tests.price, tests.category');                                           
        $this->db->where('group_test_id', $group_test_id);    
        $this->db->from('patients_tests'); 
        $this->db->join('tests', 'tests.test_id = patients_tests.test_id');   
        $query = $this->db->get();    
        $current_result = $query->result();  

        foreach($current_result as $row) 
        {  

            if($row->category == 'urinalysis') 
            {
                $get_query = $this->db->where('patient_test_id', $row->patient_test_id)->get('urinalysis_result');
                if($get_query->row() != null) 
                {
                    $row->current_result_id = $get_query->row()->urinalysis_result_id;
                } 
            } 
            elseif($row->category == 'hematology') 
            {  
                $get_query = $this->db->where('patient_test_id', $row->patient_test_id)->get('hematology_result');
                if($get_query->row() != null) 
                {
                    $row->current_result_id = $get_query->row()->hematology_result_id;
                } 
            }    
            elseif($row->category == 'fecalysis') 
            {
                $get_query = $this->db->where('patient_test_id', $row->patient_test_id)->get('fecalysis_result');
                if($get_query->row() != null) 
                {
                    $row->current_result_id = $get_query->row()->fecalysis_result_id;
                } 
            }  
            elseif($row->category == 'chemistry') 
            {
                $get_query = $this->db->where('patient_test_id', $row->patient_test_id)->get('chemistry_result');
                if($get_query->row() != null) 
                {
                    $row->current_result_id = $get_query->row()->chemistry_result_id;
                } 
            }

        }   

        return $current_result;
    }      


    
    public function get_patient_id_by_group_test_id($group_test_id) 
    {
        $this->db->select('patient_id');  
        $this->db->where('group_test_id', $group_test_id);  
        $this->db->group_by('group_test_id');    
        $this->db->from('patients_tests');
        $query = $this->db->get();  
        return $query->row()->patient_id;
    }     

    public function get_group_test_date_created_by_group_test_id($group_test_id) 
    {
        $this->db->select('group_created');      
        $this->db->where('group_test_id', $group_test_id);     
        $this->db->from('group_tests');   
        $query = $this->db->get();  
        return $query->row()->group_created;
    }  


    public function get_group_test_ids_by_group_test_id($group_test_id) 
    {
        $this->db->select('test_id'); 
        $this->db->where('group_test_id', $group_test_id);  
        $query = $this->db->get('patients_tests');  
        return $query->result_array();
    }  


    public function get_category_tests_not_in_a_test_id($category, $test_ids) 
    {
        $this->db->where('category', $category);
        $this->db->where_not_in('test_id', $test_ids);
        $query = $this->db->get('tests');
        return $query->result_array();
    }      


    public function get_test_details_by_patient_test_id($patient_test_id, $category) 
    {
        $this->db->select('*');    
        $this->db->from('patients_tests');  
        $this->db->join('group_tests', 'group_tests.group_test_id = patients_tests.group_test_id', 'left');     
        $this->db->join('patients', 'patients.patient_id = patients_tests.patient_id', 'left');    
        $this->db->join('tests', 'tests.test_id = patients_tests.test_id', 'left');        
       
        
        if($category != null) 
        {
            switch ($category) 
            {
                case 'urinalysis':
                    $this->db->join('urinalysis_result', 'urinalysis_result.patient_test_id = patients_tests.patient_test_id', 'left');                   
                    break;  
                case 'hematology':
                    $this->db->join('hematology_result', 'hematology_result.patient_test_id = patients_tests.patient_test_id', 'left');                   
                    break;    
                case 'fecalysis':
                    $this->db->join('fecalysis_result', 'fecalysis_result.patient_test_id = patients_tests.patient_test_id', 'left');                   
                    break;    
                case 'chemistry':
                    $this->db->join('chemistry_result', 'chemistry_result.patient_test_id = patients_tests.patient_test_id', 'left');                   
                    break;
            }
        }
       

        $this->db->where('patients_tests.patient_test_id', $patient_test_id);    
        $query = $this->db->get();  

        return $query->row();
    }  

    public function check_test_result($patient_test_id, $category) 
    {
     
        //$db2 = $this->load->database('group_two', TRUE);

        switch ($category) 
        {
            case 'urinalysis':                  
                $this->db->select('*');  
                $this->db->where('patient_test_id', $patient_test_id);  
                $check = $this->db->get('urinalysis_result');    
                break;  
            case 'hematology':                  
                $this->db->select('*');  
                $this->db->where('patient_test_id', $patient_test_id);  
                $check = $this->db->get('hematology_result');    
                break;      
            case 'fecalysis':                  
                $this->db->select('*');  
                $this->db->where('patient_test_id', $patient_test_id);  
                $check = $this->db->get('fecalysis_result');    
                break;  
            case 'chemistry':                  
                $this->db->select('*');  
                $this->db->where('patient_test_id', $patient_test_id);  
                $check = $this->db->get('chemistry_result');    
                break;
        }  

        if($check->row() != null) 
        {
            return true;               
        }
        else 
        {
            return false;
        }
    }  


    



}  






























