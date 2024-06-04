<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('food_order');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        if($this->session->userdata('user_name')==''){
            redirect(base_url('login'));
        }
    }
    public function index(){
        $data=array();
		$this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/home', $data);
    }

    public function book(){
        $data['meals']= $this->food_order->get_all_meal();
		$this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/order',$data);

    }

    public function filter_caf(){
        if($this->input->post('meal_id')){
            echo $this->food_order->filter_cafe( $this->input->post('meal_id') );
        }
    }


    

    public function get_list_menu(){
        if($this->input->post('meal_id')){
            echo $this->food_order->get_food_list( $this->input->post('meal_id') );
        }
    }
    
    public function logout() {
		$this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/logout');
        
    }
    public function logout_session(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    public function delivery_page(){
        $data['address']=$this->food_order->get_address();
        $this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/delivery',$data);
    }


    public function add_address(){
        $this->form_validation->set_rules('user_id', 'ID', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('house_no', 'House No', 'required');
        $this->form_validation->set_rules('street', 'Street', 'required');
        $this->form_validation->set_rules('landmark', 'LandMark', 'required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'required');
        // $this->form_validation->set_rules('house_no', 'House No', 'required');

        
        if ($this->form_validation->run() === FALSE) {
            $this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/delivery');
        } else {
            $data = array(
                'user_id_ref' => $this->input->post('user_id'),
                'user_name' => $this->input->post('name'),
                'user_mobile' => $this->input->post('mobile'),
                'house_no' => $this->input->post('house_no'),
                'street' => $this->input->post('street'),
                'landmark' => $this->input->post('landmark'),
                'pincode' => $this->input->post('pincode')
            );
            $this->food_order->create_address($data);
            redirect('Address');
        }
    }
    public function delete_address($id){
        $this->food_order->delete_address($id);
        redirect('Address');
    }
}
?>
