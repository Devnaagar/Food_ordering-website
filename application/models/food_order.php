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


    //orderssssssssss
    // public function create_order($data) {
    //     return $this->db->insert('orders', $data);
    // }

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
    public function check_admin_login($username, $email, $password) {
        $this->db->where('name', $username);
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

}