<?php
class Chatbot extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->model('Employee_portal_model');
        $this->load->model('Chatbot_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('javascript');
        $this->load->library('pdf');
    }


    
    public function chatbot()
    {    $sess_id = $this->session->userdata('user');

        if (empty($sess_id)) {
            redirect("Login/login");
        } else {
            $data['user'] = $this->session->all_userdata();
        }
        $data['title'] = "עדכון פרטי הזמנה";
        $data['orderid']=$this->input->post('orderid');
        $this->load->view('templates/header', $data);
        $this->load->view('chatbot/index', $data);
        $this->load->view('templates/footer');
   
    }

    public function selectOrderpage()
    {        $sess_id = $this->session->userdata('user');
        $data['message']=null;

        if (empty($sess_id)) {
            redirect("Login/login");
        } else {
            $data['user'] = $this->session->all_userdata();
        }
        $data['title'] = "עדכון פרטי הזמנה";
        $data['orders'] =$this->Profile_model->get_orders_by_user_coming($_SESSION['user']);
        $this->load->view('templates/header', $data);
        $this->load->view('chatbot/entry_chat', $data);
        $this->load->view('templates/footer');
   
    }
       
    public function updateOrder()
    {  
     
            $sess_id = $this->session->userdata('user');
            $data['message']=null;
            if (empty($sess_id)) {
                redirect("Login/login");
            } else {
                $data['user'] = $this->session->all_userdata();
            }
            $orderid=$this->input->post('orderid');
            $details=$this->Employee_portal_model->get_details_order($orderid);
            $changeString=null;
            $changeString=$details[0]['change_details'];
    
            if($this->input->post('num_participants')!="undefined") {
                $changeString.=" מספר משתתפים עודכן
                (
    מספר קודם -
    ". $details[0]['num_participants'] .") <br> ";
                  
                $this->Chatbot_model->update_num_participants($orderid,$changeString);
            }
            
            if($this->input->post('city')!= "undefined") {
                $changeString.=" מיקום אירוע עודכן
                (
    מיקום קודם -
    ". $details[0]['city'] .")  <br> "; 
               $this->Chatbot_model->update_city($orderid,$changeString);
            }
    
            if($this->input->post('type_dish')!= "undefined") {
                $changeString.=" סוג הגשה עודכן
                (
    סוג קודם -
    ".$details[0]['type_dish'].")   <br> ";  
              $this->Chatbot_model->update_dish($orderid,$changeString);
            }
            $data['message']="לקוח יקר, הפרטים עודכנו בהצלחה
            <br>
            על מנת לבצע שינויים בהזמנה אחרת אנא בחר את מספר ההזמנה" ;
            $data['title'] = "עדכון פרטי הזמנה";
            $data['orders'] =$this->Profile_model->get_orders_by_user_coming($_SESSION['user']);
            $this->load->view('templates/header', $data);
            $this->load->view('chatbot/entry_chat', $data);
            $this->load->view('templates/footer');
       
    }
}
