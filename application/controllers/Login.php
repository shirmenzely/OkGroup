<?php
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('javascript');
    }
        public function login() {
        $data['title'] = ' התחברות לאתר ';
        $data['title2']='רישום לאתר';
        $data['user'] = NULL;
        $this->load->view('templates/header', $data);
        $this->load->view('login/login', $data);
        $this->load->view('templates/footer');
    }


    public function auth() {

        $mdpass = $this->input->post('password');
        $mdpass = md5($mdpass);
        $data = array(
            'user' => $this->input->post('user'),
            'password' => $mdpass
        );

        $check = $this->Login_model->auth($data);
        if ($check == false) {
            $data['error'] = array("message" => " שם משתמש או סיסמא אינם נכונים");
            $data['title'] = ' התחברות לאתר';
            $data['user'] = NULL;
            $this->load->view('templates/header', $data);
            $this->load->view('login/login', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'user' => $this->input->post('user'),
                'password' => $mdpass,
                'manager'=>$check[0]['manager'],
                'company'=>$check[0]['company'],
                'manager_name'=>$check[0]['manager_name']
            );
            $this->session->set_userdata($data);
            if($check[0]['manager']==1){
                redirect("Employee_portal/portal");
            }
            else
            redirect("pages/index");
        }
    }

    public function save() {
        $data = array(
            'user' => $this->input->post('user'),
            'password' => md5($this->input->post('password')),
            'company' => $this->input->post('company'),
            'manager'=> False
        );
        /* בדיקות תקינות קלט */
        $error = '';

        if (!filter_var($data['user'], FILTER_VALIDATE_EMAIL)) {
            $error .= "פורמט מייל לא תקין" . "<br>";
        }


        if ($this->input->post('password') == NULL||$this->input->post('password')=="") {
            $error .= "הכנס בבקשה סיסמה" . "<br>";
        }

        if ($data['company'] == NULL||$data['company'] == "") {
            $error .= "הכנס בבקשה את שם החברה " . "<br>";
        } 


        if ($error == '') {
            $errorDB = $this->Login_model->save($data);
            if ($errorDB != NULL) {
                $data['error'] = array("message" => "הרישום למערכת לא הצליח! אימייל קיים במערכת");
                $data['user'] = NULL;
            } else {
                $data['error'] = array("message" => "1");
            }
            echo $data['error']['message'];
        } else {
            echo $error;
        }
    }

    public function logout() {
        $data = array(
            'user',
            'password'
        );
        $this->session->unset_userdata($data);
        redirect("Pages/index");
    }}


?>