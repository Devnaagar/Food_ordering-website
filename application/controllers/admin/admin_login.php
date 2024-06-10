<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('food_order');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('cookie');
    }
    
    public function index() {
        $data=array();
        $data['email_cookie'] = $this->input->cookie('admin_email');
        $data['password_cookie'] = $this->input->cookie('admin_password');
		$this->template->load('admin-layout/admin_front-layout/default_layout', 'contents', 'frontend/admin_login',$data);
        // $this->load->view('admin_login');
    }
    
    public function do_login() {
        // $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // die("here");
		    $this->template->load('admin-layout/admin_front-layout/default_layout', 'contents', 'frontend/admin_login');
        } else {


            // echo "<pre>";print_r($_POST);die;
            // $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $remember_me = $this->input->post('remember_me');
            
            $admin = $this->food_order->check_admin_login($email, $password);
            
            if ($admin) {
            // print_r($admin['admin_id']);die;
                if ($remember_me) {
                    // Calculate expiration date for 30 days from now
                    $expiration = time() + (30 * 24 * 60 * 60); // 30 days * 24 hours * 60 minutes * 60 seconds

                    // Set the cookies
                    $this->input->set_cookie('admin_email', $email, $expiration);
                    $this->input->set_cookie('admin_password', $password, $expiration);
                } else {
                    // If "Remember Me" is not checked, delete the cookies
                    delete_cookie('admin_email');
                    delete_cookie('admin_password');
                }

                $this->session->set_userdata('admin_id', $admin['admin_id']);
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid login credentials');
                redirect('admin');
            }
        }
    }
    
    public function dashboard() {
        // print_r($this->session->userdata('admin_id'));die;
        
        if (!$this->session->userdata('admin_id')) {
            redirect('admin');
        }
        $data['total_orders_today'] = $this->food_order->count_orders_today();
        $data['total_orders'] = $this->food_order->count_orders_current_month();
        $data['total_users_today'] = $this->food_order->count_users_today();
        $data['total_users'] = $this->food_order->count_users_current_month();
        $data['total_amount_today'] = $this->food_order->total_amount_today();
        $data['total_amount_current_month'] = $this->food_order->total_amount_current_month();
        $data['orders'] = $this->food_order->get_all_order();
        $data['order_number'] = $this->food_order->generate_order_number();
		$this->template->load('admin-layout/default_layout', 'contents', 'frontend/dashboard', $data);
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('admin'));
    }
}
?>
