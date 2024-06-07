

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('food_order');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
	{
		// die('here');
		$data = array();
		$this->template->load('front-layout/user_default', 'contents', 'frontend/user_view/user_signup',$data);
	}


public function send_otp() {
    $this->form_validation->set_rules('mobile_number', 'Mobile Number','required');

    if ($this->form_validation->run() == FALSE) {
        $response = array('success' => FALSE, 'message' => validation_errors());
    } else {
        $mobile_number = $this->input->post('mobile_number');
        $otp = rand(1000, 9999);
        $existing_otp_record = $this->food_order->get_latest_otp($mobile_number);
        
        if ($existing_otp_record) {
            $response = array('success' => FALSE, 'message' => 'This mobile number is already registered.');
        } else { 
            $this->food_order->save_otp($mobile_number, $otp);
            log_message('info', 'OTP for ' . $mobile_number . ' is ' . $otp);
            $this->session->set_userdata('mobile_number', $mobile_number);
            $response = array('success' => TRUE, 'message' => 'OTP has been sent to your mobile number.', 'otp' => $otp);
        }
    }
    echo json_encode($response);
}

public function verify_otp() {
    $this->form_validation->set_rules('otp', 'OTP', 'required|numeric');

    if ($this->form_validation->run() == FALSE) {
        $response = array('success' => FALSE, 'message' => validation_errors());
    } else {
        $otp = $this->input->post('otp');
        $mobile_number = $this->session->userdata('mobile_number');
        // echo "<pre>".$mobile_number;die;
        $latest_otp_record = $this->food_order->get_latest_otp($mobile_number);
        if ($latest_otp_record) {
            $stored_otp = $latest_otp_record['otp'];
            $otp_time = strtotime($latest_otp_record['createdat']);
            $current_time = time();

            if ($current_time - $otp_time <= 180 && $otp == $stored_otp) {
                $response = array('success' => TRUE);
            } else {
                $response = array('success' => FALSE, 'message' => 'Invalid or expired OTP');
            }
        } else {
            $response = array('success' => FALSE, 'message' => 'No OTP found for this mobile number');
        }
    }

    echo json_encode($response);
}


    public function new_user() {
        $mobile_number['mobile_number'] = $this->session->userdata('mobile_number');
		$this->template->load('front-layout/user_default', 'contents', 'frontend/user_view/new_signup',$mobile_number);

    }

	public function add_new_user()
	{
		$this->form_validation->set_rules('fullname', 'Name', 'required');
		$this->form_validation->set_rules('mobile_number', 'Mobile', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        // die("here");
        $mobile_number= $this->input->post('mobile_number');
		if ($this->form_validation->run() === FALSE) {
            $this->template->load('front-layout/user_default', 'contents', 'frontend/user_view/new_signup');
		} else {
            $data = array(
				'name' => $this->input->post('fullname'),
				'mobile' =>  $mobile_number,
				'password' => $this->input->post('password')
			);

			$this->food_order->update_info($data, $mobile_number);
            redirect('login');
		}
	}
}
?>
