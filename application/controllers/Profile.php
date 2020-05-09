<?php
class Profile extends CI_Controller {
    
        public function __construct() {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function profile() { 
        $data['coming_orders'] = NULL;
        $data['prev_orders'] = NULL;
        $data['supplier'] = NULL;

        $data['title'] = ' פרופיל אישי' ;
        $sess_id = $this->session->userdata('user');
        if(empty($sess_id)) //If the user has not logged in  
        redirect("Login/login");
        else
        $data['user'] = $this->session->all_userdata();

        $data['coming_orders'] = $this->Profile_model->get_orders_by_user_coming($_SESSION['user']);
        $data['prev_orders'] = $this->Profile_model->get_orders_by_user_prev($_SESSION['user']);
        $data['supplier'] = $this->Profile_model->supplier_in_order();

        $this->load->view('templates/header', $data);
        $this->load->view('Profile/profile', $data);
        $this->load->view('templates/footer');
    }




}