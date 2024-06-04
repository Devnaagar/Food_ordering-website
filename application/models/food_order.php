<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food_order extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Create a new user
    public function create_user($data) {
        return $this->db->insert('users', $data);
    }

    // Get all users
    public function get_all_users() {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    // Validate user credentials (for example, for login)
    public function validate_user($mobile, $password) {
        $this->db->where('mobile', $mobile);
        $this->db->where('password', $password); 
        $query = $this->db->get('users');
        return $query->row_array();
    }

    public function delete_user($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->delete('users');
    }

    public function get_user_by_id($user_id) {
        $query = $this->db->get_where('users', array('user_id' => $user_id));
        return $query->row_array();
    }

    public function update_user($user_id, $data) {
        $this->db->where('user_id', $user_id);
        return $this->db->update('users', $data);
    }

    //Locationsssssssssss
    public function create_location($data) {
        return $this->db->insert('locations', $data);
    }

    public function get_all_location() {
        $query = $this->db->get('locations');
        return $query->result_array();
    }


    public function delete_locations($id) {
        $this->db->where('id', $id);
        return $this->db->delete('locations');
    }

    //cafeteriaaaaaa
    public function create_cafe($data) {
        return $this->db->insert('cafeteria', $data);
    }

    public function get_all_cafe() {
        $this->db->select('cafeteria.caf_id,cafeteria.caf_name,cafeteria.createdat,cafeteria.updatedat,locations.loca_name');
        $this->db->from('cafeteria');
        $this->db->join('locations', 'cafeteria.location_ref=locations.id ');
        $query = $this->db->get();
        return $query->result_array();
        
    }

    public function delete_cafe($caf_id) {
        $this->db->where('caf_id', $caf_id);
        return $this->db->delete('cafeteria');
    }


    //Mealsssssss
    public function create_meal($data) {
        return $this->db->insert('meals', $data);
    }

    public function get_all_meal() {
        $query = $this->db->get('meals');
        return $query->result_array();
        
    }

    public function delete_meal($meal_id) {
        $this->db->where('meal_id', $meal_id);
        return $this->db->delete('meals');
    }



    //Meanu itemssssss

    public function create_menu($data) {
        return $this->db->insert('menu_items', $data);
    }

    public function fetch_location(){
        $this->db->order_by('loca_name','ASC');
        $query = $this->db->get('locations');
        return $query->result();
    }

    public function fetch_cafe($location_id) {
        $this->db->where('location_ref', $location_id);
        $this->db->order_by('caf_name','ASC');
        $query = $this->db->get('cafeteria');
        $output = '<option value="">Select Cafeteria</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="'.$row->caf_id.'">'.$row->caf_name.'</option>';
        }
        return $output;
    }


    public function get_all_locat_info() {
        $this->db->select('menu_items.dish_id,menu_items.dish_name,menu_items.price,meals.meal_name,locations.loca_name,cafeteria.caf_name,menu_items.createdat,menu_items.updatedat');
        $this->db->from('menu_items');
        $this->db->join('locations', 'menu_items.locat_ref=locations.id');
        $this->db->join('cafeteria','menu_items.caf_ref=cafeteria.caf_id');
        $this->db->join('meals','menu_items.meal_ref=meals.meal_id');
        $query = $this->db->get();
        // die("here");
        return $query->result_array(); 
    }

    public function get_dish_by_id($dish_id) {
        $query = $this->db->get_where('menu_items', array('dish_id' => $dish_id));
        return $query->row_array();
    }
    public function update_menu($dish_id, $data) {
        $this->db->where('dish_id', $dish_id);
        return $this->db->update('menu_items', $data);
    }

    public function delete_dish($dish_id) {
        $this->db->where('dish_id', $dish_id);
        return $this->db->delete('menu_items');
    }


    //ordersssssssss

    public function get_all_order() {
        $this->db->select('orders.order_id,orders.order_no,orders.order_amt,orders.order_at,users.user_id,users.name');
        $this->db->from('orders');
        $this->db->join('users', 'orders.user_refer=users.user_id ');
        $query = $this->db->get();
        return $query->result_array();
        
    }

    public function delete_order($order_id) {
        $this->db->where('order_id', $order_id);
        return $this->db->delete('orders');
    }


    //adminssssssssssss
    public function check_admin_login( $email, $password) {
        // $this->db->where('name', $username);
        $this->db->where('email', $email);
        $query = $this->db->get('admin');

        if ($query->num_rows() == 1) {
            $admin = $query->row_array();
            if ($password== $admin['password']) {
                return $admin;
            }
        }
        return false;
    }

     //usersssssss
     public function check_user_login( $mobile, $password) {
        // $this->db->where('name', $username);
        $this->db->where('mobile', $mobile);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $user = $query->row_array();
            if ($password== $user['password']) {
                return $user;
            }
        }
        return false;
    }


    public function save_otp($mobile_number, $otp) {
        $data = array(
            'mobile' => $mobile_number,
            'otp' => $otp
        );
        return $this->db->insert('users', $data);
    }

    public function get_latest_otp($mobile_number) {
        $this->db->where('mobile', $mobile_number);
        $this->db->order_by('createdat', 'DESC');
        $query = $this->db->get('users');
        return $query->row_array();
    }

    public function update_info($data,$mobile_number) {
        $this->db->where('mobile', $mobile_number);
        $this->db->update('users', $data);
    }


    public function filter_cafe($meal_id) {

        $this->db->where('menu_items.meal_ref', $meal_id);
        $this->db->select('cafeteria.caf_id, cafeteria.caf_name');
        $this->db->join('cafeteria', 'menu_items.caf_ref = cafeteria.caf_id');
        $query = $this->db->get('menu_items');
        $output="<option value=''> ---</option>";
        foreach ($query->result() as $row) {
            $output .="<option value='".$row->caf_id."'>" .$row->caf_name."</option>";
        }
        return $output;
    }

    public function get_food_list($meal_id) {
        $this->db->where('meal_ref', $meal_id);
        $this->db->order_by('dish_name','ASC');
        $query = $this->db->get('menu_items');
        $output = '';
        $sno=0;
        foreach ($query->result() as $row) {
            $sno+=1;
            $output .= "<tr class='hov'><td><p>$sno</p></td><td><h5 value='.$row->dish_name.' class='text-danger'>$row->dish_name</h5><input type='hidden' value='.$row->dish_name' id='name_$row->dish_id'/></td><td><p value='$row->price' id='food_price_$row->dish_id'> Rs:$row->price.00</p><input type='hidden' value='$row->price' id='price_$row->dish_id'/></td><td ><input type='number' placeholder='QTY..' class='form-control border_wale' min='0' id='qty_$row->dish_id' onchange='sub_total($row->dish_id)'/></td><td><input id='total_$row->dish_id' class='sub_total form-control border_wale'/></td></tr>";
        }
        return $output;
    }


    public function create_address($data) {
        return $this->db->insert('delivery_address', $data);
    }

    public function get_address() {
        $this->db->where('user_id_ref',$this->session->userdata('user_id'));
        $query = $this->db->get('delivery_address');
        return $query->result_array();
        
    }


    public function delete_address($id) {
        $this->db->where('deli_id', $id);
        return $this->db->delete('delivery_address');
    }
}