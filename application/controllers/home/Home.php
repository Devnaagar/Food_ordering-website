<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('food_order');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }
    public function index(){
        $data = array();
		$this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/home',$data);
    }

    public function book(){
        $data = array();
		$this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/order',$data);

    }
    
    public function logout() {
		$this->template->load('front-layout/defualt_layout_2', 'contents', 'frontend/website/logout');
        
    }


}
?>
