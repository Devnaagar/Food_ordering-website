<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meals extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('food_order');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    // Display a form to create a new user
    public function meal_add() {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin');
        }
        $data['meals'] = $this->food_order->get_all_meal();
		$this->template->load('admin-layout/default_layout', 'contents', 'backend/meals/meals',$data);
    }

    // Handle form submission and create a new user
    public function store_meal() {
        $this->form_validation->set_rules('meal_name', 'meal_name', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->template->load('admin-layout/default_layout', 'contents', 'backend/meals/meals',$data);
        } else {
            $data = array(
                'meal_name' => $this->input->post('meal_name')
            );
            $this->food_order->create_meal($data);
            $this->session->set_flashdata('message', 'Meal added successfully');
            $this->session->set_flashdata('message_type', 'success');
            redirect('/admin/meals/meal_add');
        }
    }
    
    public function delete_meal($meal_id) {
        $this->food_order->delete_meal($meal_id);
        $this->session->set_flashdata('message', 'Meal deleted successfully');
        $this->session->set_flashdata('message_type', 'danger');
	    redirect('/admin/meals/meal_add');
    }

}
