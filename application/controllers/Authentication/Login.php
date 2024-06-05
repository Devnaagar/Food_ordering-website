<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('food_order');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }
    
    public function index() {
        $this->session->sess_destroy();
        $data=array();
		$this->template->load('front-layout/user_default', 'contents', 'frontend/user_view/user_login',$data);
        // $this->load->view('admin_login');
    }

	public function add_user_post()
	{
		$data = array();
		$this->form_validation->set_rules('fullname', 'Name', 'required');
		// $this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        // $this->form_validation->set_rules('otp','Otp','required');

		if ($this->form_validation->run() === FALSE) {
			$this->template->load('front-layout/user_default', 'contents', 'frontend/user_view/user_signup',$data);
		} else {
			$data = array(
				'name' => $this->input->post('fullname'),
				// 'mobile' => $this->input->post('mobile'),
				'password' => $this->input->post('password'), // In a real application, hash the password
                // 'otp'=> $this->input->post('otp'),
			);
			$this->food_order->create_user($data);
			$this->template->load('front-layout/user_default', 'contents', 'frontend/user_view/user_login',$data);
			
		}
		
	}

    


    public function do_login() {
        // $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
		    $this->template->load('front-layout/user_default', 'contents', 'frontend/user_view/user_login');
        } else {
            
            // die("here");
            // echo "<pre>";print_r($_POST);die;
            // $username = $this->input->post('username');
            $mobile = $this->input->post('mobile');
            $password = $this->input->post('password');
            
            $user = $this->food_order->check_user_login($mobile, $password);
            // die('in database');
            if ($user) {
                // die("here");
                // print_r($user);exit;
                $this->session->set_userdata('user_id', $user['user_id']);
                $this->session->set_userdata('user_name', $user['name']);
                $this->session->set_userdata('mobile', $user['mobile']);
                redirect('location');
            } else {
                $this->session->set_flashdata('error', 'Invalid login credentials');
                redirect('login');
            }
        }
    }

    public function locations() {
        $data['locations'] = $this->food_order->get_all_location();
        // $this->session->set_userdata('', $user['user_id']);

		$this->template->load('front-layout/user_default', 'contents', 'frontend/user_view/location',$data);

    }
    
    public function dashboard() { 
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        redirect('Home');
		// $this->template->load('admin-layout/default_layout', 'contents', 'backend/user/add');
    }
    
}
?>
