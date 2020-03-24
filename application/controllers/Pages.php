<?php
class Pages extends CI_Controller {
    
        public function __construct() {
        parent::__construct();
        $this->load->model('Pages_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('session');
    }
   
        public function index() { //If the user has not logged in  
        $data['home'] = NULL;
        $data['title'] = 'דף הבית';    
        $data['user'] = null;       
        $this->load->view('templates/header', $data);
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }
    
        public function index_2() { //If the user has  logged in 
        $data['home'] = NULL;
        $data['title'] = 'דף הבית';
        $data['user'] = $this->session->all_userdata();       
        $this->load->view('templates/header', $data);
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }
}


?>