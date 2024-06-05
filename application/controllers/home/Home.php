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
        $post = $this->input->post();
        $this->session->set_userdata('location_ref',$post['location_ref']);
        // print_r($this->session->userdata('location_ref'));die;
		$this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/home', $data);
    }
    
    public function book(){
        $data['meals']= $this->food_order->get_all_meal();
        $location_id =$this->session->userdata('location_ref');
        if($location_id){
            $cafeteria = $this->food_order->filter_cafe($location_id);
        }
        $data['cafeteria'] = $cafeteria;
		$this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/order',$data);

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


    public function add_order_item(){

        
        $this->form_validation->set_rules('g_total', 'G_total','required');
        $this->form_validation->set_rules('user_id_ref', 'User_ID','required');
        $this->form_validation->set_rules('order_num', 'Order_num','required');


        if ($this->form_validation->run() === FALSE) {
            $this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/order_can');
        } else {
            $data = array(
                'order_amt' => $this->input->post('g_total'),
                'user_refer' => $this->input->post('user_id_ref'),
                'order_no' => $this->input->post('order_num')  
            );
            $this->food_order->create_order($data);
            $post = $this->input->post();
            $dish_id = $post['dish_id[]'];
            $dish_name = $post['dish_name[]'];
            $dish_rate = $post['dish_rate[]'];
            $dish_qty = $post['dish_qty[]'];
            $price_dish = $post['price_dish[]'];
            
            foreach($dish_qty as $key=>$val){
                if($val>0 && $val !=''){
                    // $orderitem['user_id'] = $user_id;
                    // $orderitem['order_ref'] = $order_id;
                    $orderitem['dish_id_ref'] = $dish_id[$key];
                    $orderitem['dish_name'] = $dish_name[$key];;
                    $orderitem['rate'] = $dish_rate[$key];;
                    $orderitem['quantity'] = $dish_qty[$key];;
                    $orderitem['price'] = $price_dish[$key];;
                    
                    $this->food_order->add_dish($orderitem);
                }
                
            }
            $this->template->load('front-layout/defualt_layout_2', 'contents','frontend/website/order_conf');
        }
    }
}
?>
