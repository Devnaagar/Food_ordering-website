<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('food_order');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }
    
    public function login() {
        $data=array();
		$this->template->load('front-layout/default_layout', 'contents', 'frontend/admin_login',$data);
        // $this->load->view('admin_login');
    }
    
    public function do_login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
		    $this->template->load('front-layout/default_layout', 'contents', 'frontend/admin_login');
        } else {


            // echo "<pre>";print_r($_POST);die;
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $admin = $this->food_order->check_admin_login($username, $email, $password);
            
            if ($admin) {
                $this->session->set_userdata('admin_id', $admin->id);
                redirect('admin/users/add_user');
            } else {
                $this->session->set_flashdata('error', 'Invalid login credentials');
            
                redirect('admin/admin_login/login');
            }
        }
    }
    
    public function dashboard() {
        
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/admin_login/login');
        }
		$this->template->load('admin-layout/default_layout', 'contents', 'backend/user/add');
    }
    
    public function logout() {
        $this->session->unset_userdata('admin_id');
        redirect('admin/admin_login/login');
    }
}
?>
