<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('food_order');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    // Display a form to create a new user
    public function order_add() {
        // die('here');
        $data['orders'] = $this->food_order->get_all_order();
        // $data['users'] = $this->food_order->get_all_users();
		$this->template->load('admin-layout/default_layout', 'contents', 'backend/orders/order_user',$data);
    }
    
    
    // Handle form submission and create a new user
    public function store_order() {
        $this->form_validation->set_rules('order_no', 'order_no', 'required');
        $this->form_validation->set_rules('order_amount', 'order_amt', 'required');
        $this->form_validation->set_rules('user_id', 'user_refer', 'required');
        
        if ($this->form_validation->run() === FALSE) {
		$this->template->load('admin-layout/default_layout', 'contents', 'backend/orders/order_user',$data);
        } else {
            $data = array(
                'order_no' => $this->input->post('order_no'),
                'order_amt' => $this->input->post('order_amount'),
                'user_refer' => $this->input->post('user_id')
            );
            $this->food_order->create_order($data);
            redirect('/admin/orders/order_add');
        }
    }


    
    public function delete_order($order_id) {
        $this->food_order->delete_order($order_id);
	    redirect('/admin/orders/order_add');
    }

    public function invoice_page($order_id){
        // $data['address']=$this->food_order->get_address();
        $data['information']=$this->food_order->get_invoice_address($order_id);
        $data['foods']= $this->food_order->get_invoice_food_list($order_id);
        // $this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/',$data);
		$this->template->load('admin-layout/default_layout', 'contents', 'backend/orders/invoice',$data);

    }

}
