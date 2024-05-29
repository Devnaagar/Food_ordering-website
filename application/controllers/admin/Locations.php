<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Locations extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('food_order');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    // Display a form to create a new user
    public function location_add() {
        $data = array();
        $data['locations'] = $this->food_order->get_all_location();
		$this->template->load('admin-layout/default_layout', 'contents', 'backend/location/add1',$data);
    }

    // Handle form submission and create a new user
    public function store_locat() {
        $this->form_validation->set_rules('location', 'Loca_name', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('backend/location/add1');
        } else {
            $data = array(
                'loca_name' => $this->input->post('location') // In a real application, hash the password
            );
            $this->food_order->create_location($data);
            redirect('/admin/Locations/location_add');
        }
    }
    
    public function delete_locat($id) {
        $this->food_order->delete_locations($id);
	    redirect('/admin/Locations/location_add');
    }

}
