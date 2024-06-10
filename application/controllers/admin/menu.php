<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

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

    public function index(){
		if (!$this->session->userdata('admin_id')) {
            redirect('admin');
        }
		$data['meals'] = $this->food_order->get_all_meal();
        $data['location']=$this->food_order->fetch_location();
        $this->template->load('admin-layout/default_layout', 'contents', 'backend/menu_item/items',$data);
    }

	public function fetch_cafeteria(){
		if($this->input->post('location_id')){
			echo $this->food_order->fetch_cafe($this->input->post('location_id'));
			// echo "heeeee";
		} else{
			echo "kuch ni";
		}
	}


	public function store_dish_info(){
		$data = array();
		$this->form_validation->set_rules('dish_name', 'Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('meal_id', 'Meal_id','required');
		$this->form_validation->set_rules('location_id','Locat_ref','required');
        $this->form_validation->set_rules('cafeteria_id','Cafeteria_ref','required');

		if ($this->form_validation->run() === FALSE) {
			$this->template->load('admin-layout/default_layout', 'contents', 'backend/menu_item/items',$data);
		} else {
			$data = array(
				'dish_name' => $this->input->post('dish_name'),
				'price' => $this->input->post('price'),
				'meal_ref' => $this->input->post('meal_id'),
				'caf_ref' => $this->input->post('cafeteria_id'),
				'locat_ref' => $this->input->post('location_id')
			);
			$this->food_order->create_menu($data);
			$this->session->set_flashdata('message', 'Meal added successfully');
            $this->session->set_flashdata('message_type', 'success');
			redirect('admin/menu');
			
		}
	}


	public function menu_list(){
		if (!$this->session->userdata('admin_id')) {
            redirect('admin');
        }
		$data = array();
		$data['items']= $this->food_order->get_all_locat_info();
		$this->template->load('admin-layout/default_layout', 'contents', 'backend/menu_item/menu_list', $data);
	}


	public function delete_menu($dish_id) {
        $this->food_order->delete_dish($dish_id);
		$this->session->set_flashdata('message', 'User deleted successfully');
        $this->session->set_flashdata('message_type', 'danger');
	    redirect('/admin/menu/menu_list');
    }

	// Display form to edit a user
    public function edit_menu($dish_id) {
		// die('here');
		$data['meals'] = $this->food_order->get_all_meal();
        $data['item'] = $this->food_order->get_dish_by_id($dish_id);
		$data['items']= $this->food_order->get_all_locat_info();
        $data['location']=$this->food_order->fetch_location();

		// die("here");
        $this->template->load('admin-layout/default_layout', 'contents', 'backend/menu_item/edit_menu',$data);
    }

    // Handle form submission and update a user
    public function update_menu($dish_id) {
		$data = array();
		$this->form_validation->set_rules('dish_name', 'Name', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('meal_id', 'Meal_id','required');
		$this->form_validation->set_rules('location_id','Locat_ref','required');
        $this->form_validation->set_rules('cafeteria_id','Cafeteria_ref','required');

		if ($this->form_validation->run() === FALSE) {
			$data['meals'] = $this->food_order->get_all_meal();
			$data['item'] = $this->food_order->get_dish_by_id($dish_id);
			$data['items']= $this->food_order->get_all_locat_info();
			$data['location']=$this->food_order->fetch_location();
			$this->template->load('admin-layout/default_layout', 'contents', 'backend/menu_item/items',$data);
		} else {
			$data = array(
				'dish_name' => $this->input->post('dish_name'),
				'price' => $this->input->post('price'),
				'meal_ref' => $this->input->post('meal_id'),
				'caf_ref' => $this->input->post('cafeteria_id'),
				'locat_ref' => $this->input->post('location_id')
			);
            $this->food_order->update_menu($dish_id, $data);
			$this->session->set_flashdata('message', 'Edited successfully');
            $this->session->set_flashdata('message_type', 'warning');
			redirect('admin/menu/menu_list');
    	}
	}
}