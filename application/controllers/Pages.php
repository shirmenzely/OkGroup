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

    public function who_we_are() { 
        $data['home'] = NULL;
        $data['title'] = '? מי אנחנו';
        $sess_id = $this->session->userdata('user');
        if (empty($sess_id)) //If the user has not logged in  
            $data['user'] = null;
        else
            $data['user'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/who_we_are', $data);
        $this->load->view('templates/footer');
    }

    public function photo_galary() {
        $data['home'] = NULL;
        $data['title'] = 'גלריית תמונות';
        $sess_id = $this->session->userdata('user');
        if (empty($sess_id)) //If the user has not logged in  
            $data['user'] = null;
        else
            $data['user'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/photo_galary', $data);
        $this->load->view('templates/footer');
    }

    public function album_kulano() { 
        $data['home'] = NULL;
        $data['title'] = 'כנס מפלגת כולנו ';
        $sess_id = $this->session->userdata('user');
        if (empty($sess_id)) //If the user has not logged in  
            $data['user'] = null;
        else
            $data['user'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/album_kulano', $data);
        $this->load->view('templates/footer');
    }

    
     public function album_madanes() { 
        $data['home'] = NULL;
        $data['title'] = 'יום כיף לחברת הביטוח מדנס';
        $sess_id = $this->session->userdata('user');
        if (empty($sess_id)) //If the user has not logged in  
            $data['user'] = null;
        else
            $data['user'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/album_madanes', $data);
        $this->load->view('templates/footer');
    }
    
     public function album_spaciel_event() { 
        $data['home'] = NULL;
        $data['title'] = ' אירוע מיוחד ועוצר נשימה ';
        $sess_id = $this->session->userdata('user');
        if (empty($sess_id)) //If the user has not logged in  
            $data['user'] = null;
        else
            $data['user'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/album_spaciel_event', $data);
        $this->load->view('templates/footer');
    }
    
     public function album_yavne() { 
        $data['home'] = NULL;
        $data['title'] = 'כנס פוליטי של עיריית יבנה ';
        $sess_id = $this->session->userdata('user');
        if (empty($sess_id)) //If the user has not logged in  
            $data['user'] = null;
        else
            $data['user'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/album_yavne', $data);
        $this->load->view('templates/footer');
    }
}


?>