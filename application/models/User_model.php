<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Create a new user
    public function create_user($data) {
        return $this->db->insert('users', $data);
    }

    // Get a user by ID
    public function get_user_by_id($user_id) {
        $query = $this->db->get_where('users', array('id' => $user_id));
        return $query->row_array();
    }

    // Get all users
    public function get_all_users() {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    // Validate user credentials (for example, for login)
    public function validate_user($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password); // In a real application, use hashed passwords
        $query = $this->db->get('users');
        return $query->row_array();
    }
}


