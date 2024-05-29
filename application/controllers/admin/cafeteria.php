<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cafeteria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('food_order');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    // Display a form to create a new user
    public function cafe_add() {
        $data['locations'] = $this->food_order->get_all_location();
        $data['cafeteria'] = $this->food_order->get_all_cafe();
		$this->template->load('admin-layout/default_layout', 'contents', 'backend/cafeteria/cafe_data',$data);
    }

    // Handle form submission and create a new user
    public function store_cafe() {
        $this->form_validation->set_rules('location_ref', 'location_ref', 'required');
        $this->form_validation->set_rules('caf_name', 'caf_name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->template->load('admin-layout/default_layout', 'contents', 'backend/cafeteria/cafe_data',$data);
        } else {
            $data = array(
                'caf_name' => $this->input->post('caf_name'),
                'location_ref' => $this->input->post('location_ref')
            );
            $this->food_order->create_cafe($data);
            redirect('/admin/cafeteria/cafe_add');
        }
    }
    
    public function delete_cafeteria($caf_id) {
        $this->food_order->delete_cafe($caf_id);
	    redirect('/admin/cafeteria/cafe_add');
    }

}
