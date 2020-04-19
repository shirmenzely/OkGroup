<?php
class Pages extends CI_Controller {
    
        public function __construct() {
        parent::__construct();
        $this->load->model('Pages_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('session');
    }
   
    public function index() { 
        $data['home'] = NULL;
        $data['title'] = 'דף הבית' ;
        $sess_id = $this->session->userdata('user');
        if(empty($sess_id)) //If the user has not logged in  
        $data['user'] = null;
        else
        $data['user'] = $this->session->all_userdata();


        $this->load->view('templates/header', $data);
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }
}


?>