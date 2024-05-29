<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    // Display a form to create a new user
    public function create() {
        $this->load->view('new_form/user_create');
    }

    // Handle form submission and create a new user
    public function store() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('new_form/user_create');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password') // In a real application, hash the password
            );
            $this->User_model->create_user($data);
            $this->load->view('new_form/user_success');
        }
    }

    // Display a user by ID
    public function show($id) {
        $data['user'] = $this->User_model->get_user_by_id($id);
        $this->load->view('new_form/user_show', $data);
    }

    // Display all users
    public function index() {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('new_form/user_index', $data);
    }

    // Validate user login
    public function login() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('new_form/user_login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->User_model->validate_user($email, $password);

            if ($user) {
                // Set user session data here
                $this->load->view('new_form/user_success'); // Or redirect to a dashboard
            } else {
                $data['error'] = 'Invalid email or password';
                $this->load->view('new_form/user_login', $data);
            }
        }
    }
}
