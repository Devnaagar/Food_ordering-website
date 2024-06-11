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
        if (!$this->session->userdata('admin_id')) {
            redirect('admin');
        }
        // die('here');
        $data['orders'] = $this->food_order->get_all_order();
        $data['order_number'] = $this->food_order->generate_order_number();
        // $data['users'] = $this->food_order->get_all_users();
		$this->template->load('admin-layout/default_layout', 'contents', 'backend/orders/order_user',$data);
    }
    
    
    // Handle form submission and create a new user
    public function store_order() {
        $this->form_validation->set_rules('order_no', 'order_no', 'required');
        $this->form_validation->set_rules('order_amount', 'order_amt', 'required');
        $this->form_validation->set_rules('user_id', 'user_refer', 'required');

        // print_r($order_number);die;


        
        if ($this->form_validation->run() === FALSE) {
		$this->template->load('admin-layout/default_layout', 'contents', 'backend/orders/order_user',$data);
        } else {
            $data = array(
                'order_no' => $order_number,
                'order_amt' => $this->input->post('order_amount'),
                'user_refer' => $this->input->post('user_id')
            );
            $this->food_order->create_order($data);
            redirect('/admin/orders/order_add');
        }

    }


    
    public function delete_order($order_id) {
        $this->food_order->delete_order($order_id);
        $this->session->set_flashdata('message', 'Order deleted successfully');
        $this->session->set_flashdata('message_type', 'danger');
	    redirect('/admin/orders/order_add');
    }

    public function invoice_page($order_id){
        if (!$this->session->userdata('admin_id')) {
            redirect('admin');
        }
        // $data['address']=$this->food_order->get_address();
        $data['information']=$this->food_order->get_invoice_address($order_id);
        // print_r($data);die;

        $data['foods']= $this->food_order->get_invoice_food_list($order_id);
        // $this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/',$data);
		$this->template->load('admin-layout/default_layout', 'contents', 'backend/orders/invoice',$data);

    }

    public function add_status() {
        $this->form_validation->set_rules('status','Status','required');
        $this->form_validation->set_rules('description','Descrip','required');
        $this->form_validation->set_rules('order_ref','Order_ref','required');
        $order_ref = $this->input->post('order_ref');
        $status = $this->input->post('status');
        $description = $this->input->post('description');
        

        if ($this->form_validation->run() === FALSE) {
            // die("here");
            $this->template->load('admin-layout/default_layout', 'contents', 'backend/orders/invoice');
        } else {
            $data = array(
                'order_ref' => $order_ref,
                'status' => $status,
                'description' => $description,
                // 'updated_at' => $updated_at
            );
            $status_add = $this->food_order->insert_order($data);
            
            if ($status_add) {
                
                $this->food_order->update_order_status($order_ref, $status);
                
                }
                
                echo $order_ref;
            
                
                // $this->template->load('admin-layout/default_layout', 'contents', 'backend/orders/invoice');
        }
        $this->session->set_flashdata('message', 'Status saved successfully');
        $this->session->set_flashdata('message_type', 'success');
        redirect('admin/Orders/invoice_page/' . $order_ref);
        

    }


    public function get_status(){
        $order_ref = $this->input->get('order_ref');
        $data = $this->food_order->get_order($order_ref);

        echo json_encode($data);
    }
}
