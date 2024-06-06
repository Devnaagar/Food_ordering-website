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
        $post = $this->input->post();

        $meal_id = $this->input->post('meal_id');
        $cafeteria_id = $this->input->post('cafeteria_id');
        $this->session->set_userdata('meal_ref',$post['meal_id']);

        $this->session->set_userdata('caf_ref',$post['cafeteria_id']);





        if($meal_id && $cafeteria_id){
            $food_list =  $this->food_order->get_food_list($meal_id, $cafeteria_id);
            // die("here");
            echo $food_list;
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
        $location_id =$this->session->userdata('location_ref');
        $meal_id =$this->session->userdata('meal_ref');
        $caf_id =$this->session->userdata('caf_ref');

        // $meal_id= $this->input->post('meals') ;
        // $caf_id= $this->input->post('cafeteria') ;

        
        // print_r($caf_id);die;



        if ($this->form_validation->run() === FALSE) {
            $this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/order_can');
            // $this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/order_can');
        } else {
            $data = array(
                'order_amt' => $this->input->post('g_total'),
                'user_refer' => $this->input->post('user_id_ref'),
                'order_no' => $this->input->post('order_num'), 
                'loc_id_ref'=>$location_id,
                'meal_id_ref'=> $meal_id,
                'caf_id_ref'=> $caf_id
            );

            $order_id = $this->food_order->create_order($data);
            $selectedItems = $this->input->post('checkbox');
            $dish_ids = $this->input->post('dish_id');
            $dish_names = $this->input->post('dish_name');
            $dish_rates = $this->input->post('dish_rate');
            $dish_quantities = $this->input->post('dish_qty');
            $dish_prices = $this->input->post('price_dish');
            
            if (empty($selectedItems)) {
                // print_r($selectedItems);die;

                $this->session->set_flashdata('error', 'No items selected.');
                // redirect('frontend/website/order_can');
                $this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/order_can');

            } else {
                
                foreach ($dish_quantities as $index => $value) {
                    if ($value>0 && $value !='') { 
                        $orderitem = array(
                            'order_ref'=> $order_id,
                            'dish_id_ref' => $dish_ids[$index],
                            'dish_name' => $dish_names[$index],
                            'rate' => $dish_rates[$index],
                            'quantity' => $dish_quantities[$index],
                            'price' => $dish_prices[$index]
                        );
                        // print_r($orderitem);die;
                        $this->food_order->add_dish($orderitem);
                    }
                }
            }
            $this->template->load('front-layout/defualt_layout_2', 'contents','frontend/website/order_conf');
        }
    }

    public function invoice_page($order_id){
        // $data['address']=$this->food_order->get_address();
        $data['information']=$this->food_order->get_invoice_address($order_id);
        $data['foods']= $this->food_order->get_invoice_food_list($order_id);
        $this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/invoice',$data);
    }
}

?>
