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
            $data['error'] = array("message" => " שם משתמש או סיסמא לא נכונים");
            $data['title'] = 'התחברות';
            $data['user'] = NULL;
            $this->load->view('templates/header', $data);
            $this->load->view('login/login', $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_userdata($data);
            redirect("pages/index_2");
        }
    }

    public function register() {
        $data['title'] = 'הרשמה';
        $data['user'] = NULL;
        $this->load->view('templates/header', $data);
        $this->load->view('login/register', $data);
        $this->load->view('templates/footer');
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

        if ($data['password'] == NULL) {
            $error .= "הכנס בבקשה סיסמה" . "<br>";
        }

        if ($data['company'] == NULL) {
            $error .= "הכנס בבקשה את שמך המלא" . "<br>";
        } 
        else if (!preg_match("/^[a-zA-Z]*$/", $data['company'])) {
            $error .= "שם לא יכול להכיל תווים שהם לא אותיות באנגלית של שמך" . "<br>";
        }


        if ($error == '') {
            $errorDB = $this->Login_model->save($data);
            if ($errorDB != NULL) {
                $data['error'] = array("message" => "Failed to register new user.  Error:  " . $errorDB["message"]);
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
        redirect("pages/index");
    }}


?>