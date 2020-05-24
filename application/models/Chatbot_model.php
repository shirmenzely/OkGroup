<?php

class Chatbot_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function update_num_participants($order_id,$changeString) {
        $number=$this->input->post('num_participants');
        if($this->db->query("UPDATE orders SET num_participants='" . $number . "'
        , status = 'ממתין להצעת מחיר חדשה'
        , change_details='". $changeString  ."'
           where id='" . $order_id . "'")){
            $this->session->set_flashdata('message', 'סטטוס עודכן');
        }
        else
        $this->session->set_flashdata('message', 'סטטוס לא עודכן');
    }

    public function update_city($order_id,$changeString) {
        $city=$this->input->post('city');
        if($this->db->query("UPDATE orders SET city='" . $city . "' 
         , change_details= '" . $changeString . "' 
         , status = 'ממתין להצעת מחיר חדשה'
        
          where id ='" . $order_id . "'")){
            $this->session->set_flashdata('message', 'סטטוס עודכן');
        }
        else
        $this->session->set_flashdata('message', 'סטטוס לא עודכן');
    }

    public function update_dish($order_id,$changeString) {
        $dish=$this->input->post('type_dish');
        if($dish=="Buffa")
        $dish="בופה";
        if($dish=="serve")
        $dish="הגשה";
        if($dish=="without food")
        $dish="ללא הסעדה";

        if($this->db->query("UPDATE orders SET type_dish='" . $dish . "' 
                , status = 'ממתין להצעת מחיר חדשה'
        , change_details='". $changeString  ."'  where id='" . $order_id . "'")){
            $this->session->set_flashdata('message', 'סטטוס עודכן');
        }
        else
        $this->session->set_flashdata('message', 'סטטוס לא עודכן');
    }

}