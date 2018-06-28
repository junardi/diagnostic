<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prices extends CI_Controller
{
    function __construct()
    {
        parent::__construct();   
        if($this->session->userdata("user_id") == null) 
        { 
            redirect("login");
        }   
        $this->load->model('Prices_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'prices/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'prices/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'prices/index.html';
            $config['first_url'] = base_url() . 'prices/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Prices_model->total_rows($q);
        $prices = $this->Prices_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'prices_data' => $prices,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('prices/prices_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Prices_model->get_by_id($id);
        if ($row) {
            $data = array(
		'price_id' => $row->price_id,
		'examination_category' => $row->examination_category,
		'examination' => $row->examination,
		'price' => $row->price,
	    );
            $this->load->view('prices/prices_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prices'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('prices/create_action'),
	    'price_id' => set_value('price_id'),
	    'examination_category' => set_value('examination_category'),
	    'examination' => set_value('examination'),
	    'price' => set_value('price'),
	);
        $this->load->view('prices/prices_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'examination_category' => $this->input->post('examination_category',TRUE),
		'examination' => $this->input->post('examination',TRUE),
		'price' => $this->input->post('price',TRUE),
	    );

            $this->Prices_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('prices'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Prices_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('prices/update_action'),
		'price_id' => set_value('price_id', $row->price_id),
		'examination_category' => set_value('examination_category', $row->examination_category),
		'examination' => set_value('examination', $row->examination),
		'price' => set_value('price', $row->price),
	    );
            $this->load->view('prices/prices_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prices'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('price_id', TRUE));
        } else {
            $data = array(
		'examination_category' => $this->input->post('examination_category',TRUE),
		'examination' => $this->input->post('examination',TRUE),
		'price' => $this->input->post('price',TRUE),
	    );

            $this->Prices_model->update($this->input->post('price_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('prices'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Prices_model->get_by_id($id);

        if ($row) {
            $this->Prices_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('prices'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prices'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('examination_category', 'examination category', 'trim|required');
	$this->form_validation->set_rules('examination', 'examination', 'trim|required');
	$this->form_validation->set_rules('price', 'price', 'trim|required');

	$this->form_validation->set_rules('price_id', 'price_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Prices.php */
/* Location: ./application/controllers/Prices.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-06-27 09:01:13 */
/* http://harviacode.com */