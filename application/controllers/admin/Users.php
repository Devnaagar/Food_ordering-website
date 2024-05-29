<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('food_order');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function lists()
	{
		$data = array();
		$data['users'] = $this->food_order->get_all_users();
		$this->template->load('admin-layout/default_layout', 'contents', 'backend/user/list',$data);
        // $this->load->view('backend/user/list', $data);
	}


	public function add_user()
	{
		// die('here');
		$data = array();
		$this->template->load('admin-layout/default_layout', 'contents', 'backend/user/add',$data);
	}

	public function add_user_post()
	{
		$data = array();
		$this->form_validation->set_rules('fullname', 'Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		if ($this->form_validation->run() === FALSE) {
			$this->template->load('admin-layout/default_layout', 'contents', 'backend/user/add',$data);
		} else {
			$data = array(
				'name' => $this->input->post('fullname'),
				'mobile' => $this->input->post('mobile'),
				'password' => $this->input->post('password') // In a real application, hash the password
				
			);
			$this->food_order->create_user($data);
			$this->template->load('admin-layout/default_layout', 'contents', 'backend/user/add',$data);
			
		}
		
	}

	public function delete($user_id) {
        $this->food_order->delete_user($user_id);
	    redirect('/admin/users/lists');
    }

	// Display form to edit a user
    public function edit($user_id) {
		// die('here');
        $data['user'] = $this->food_order->get_user_by_id($user_id);
        $this->template->load('admin-layout/default_layout', 'contents', 'backend/user/edit_user',$data);
    }

    // Handle form submission and update a user
    public function update($user_id) {
        $this->form_validation->set_rules('fullname', 'Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() === FALSE) {
            $data['user'] = $this->food_order->get_user_by_id($user_id);
            $this->load->view('backend/user/edit_user', $data);
        } else {
            $data = array(
                'name' => $this->input->post('fullname'),
				'mobile' => $this->input->post('mobile'),
				'password' => $this->input->post('password')
            );
            $this->food_order->update_user($user_id, $data);
            redirect('/admin/users/lists');
        }
    }
}
