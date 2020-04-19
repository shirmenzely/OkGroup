<?php

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Order_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('javascript');
    }

    public function index() {
        $sess_id = $this->session->userdata('user');
        if (empty($sess_id)) {
            $data['user'] = null;
        } else {
            $data['user'] = $this->session->all_userdata();
        }
        $data['title'] = 'הזמנת שירות';
        $data['supplier'] = $this->Order_model->get_supplier();
        $this->load->view('templates/header', $data);
        $this->load->view('order/order', $data);
        $this->load->view('templates/footer');
    }



    public function insert() {
        $data = array(
            'order_type' => $this->input->post('order_type'),
            'num_participants' => $this->input->post('num_participants'),
            'city' => $this->input->post('city'),
            'order_date' => $this->input->post('order_date'),
            'name_contect' => $this->input->post('name_contect'),
            'phone_contect' => $this->input->post('phone_contect'),
            'note' => $this->input->post('note'),
            'type_dish' => $this->input->post('type_dish'),
            'email' => $_SESSION['user'],
            'status' => 'ללא הצעת מחיר',
            'final_price' =>0,
        );

        $error = $this->Order_model->set_order($data);
        if ($error != NULL) {

            $data['error'] = array("message" => "Failed to save order.  Error:  " . $error["message"]);
        } else {

            $data['error'] = array("message" => "ההזמנה העוברה בהצלחה");
        }
        redirect("Order/confirm_page");
    }

    public function confirm_page() {
        $data['id'] = $this->Order_model->last_order();
        $data['title'] = ' אישור הזמנה';
        $data['user'] = $this->session->all_userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('order/confirmation', $data);
        $this->load->view('templates/footer');
    }

}
