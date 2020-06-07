<?php
class Employee_portal_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function update_status( $order_id) {
        $status=$this->input->post('status_order');
        if($status=="נשלחה הצעת מחיר"){
            if($this->db->query("UPDATE orders SET status='" . $status . "' , change_details=null  where id='" . $order_id . "'")){
                $this->session->set_flashdata('message', 'סטטוס עודכן');
                return true;
            }
            else{
                $this->session->set_flashdata('message', ' משהו השתבש! סטטוס לא עודכן');
                return false; }

        }else{
            if($this->db->query("UPDATE orders SET status='" . $status . "'   where id='" . $order_id . "'")){
                $this->session->set_flashdata('message', 'סטטוס עודכן');
                return true;
            }
            else{
                $this->session->set_flashdata('message', ' משהו השתבש! סטטוס לא עודכן');
                return false;
            }
        }  
    }

    public function get_pending_orders_by_status() { //Retrieving all orders 
        
        
        if ($this->input->post('submit') == false){
            $query = $this->db->query("SELECT * FROM user inner join orders 
            on
            (user.user= orders.email)
     
             where STR_TO_DATE(orders.order_date, '%d/%m/%Y') >= CURRENT_DATE()
             order by(STR_TO_DATE(orders.order_date, '%d/%m/%Y'))");

        }

        else if($this->input->post('status')=="כל ההזמנות"){
                $query = $this->db->query("SELECT * FROM user inner join orders 
                on
                (user.user= orders.email)       
                 where STR_TO_DATE(orders.order_date, '%d/%m/%Y') >= CURRENT_DATE()
                 order by(STR_TO_DATE(orders.order_date, '%d/%m/%Y'))");
        }
        else{
            $status=$this->input->post('status');
            $query = $this->db->query("SELECT * FROM user inner join orders 
            on
            (user.user= orders.email)
     
             where STR_TO_DATE(orders.order_date, '%d/%m/%Y') >= CURRENT_DATE()
             AND
             orders.status='" . $status . "'
             order by(STR_TO_DATE(orders.order_date, '%d/%m/%Y'))");
        }
        if ($query) {
            return $query->result_array();
        }
    }
    public function get_supplier_in_order($order_id) { //View the suppliers on order

        $query = $this->db->query("SELECT * FROM supplier_in_order inner join supplier 
        on
        ( supplier_in_order.code_supplier= supplier.code_supplier)
         where supplier_in_order.id_order='" . $order_id . "'");

        if ($query) {
            return $query->result_array();
        }
    }

    public function get_details_order($order_id) { 
        $query = $this->db->query("SELECT * FROM user inner join orders 
        on
        (user.user= orders.email)
         where id='" . $order_id . "'");

        if ($query) {
            return $query->result_array();
        }
    }

    public function get_price() { // Displaying cost per person
        $query = $this->db->query("SELECT * FROM price ");

        if ($query) {
            return $query->result_array();
        }
    }

    function fetch_single_details($order_id) //edit pdf content
    {
     $data=$this->db->query("SELECT * FROM user inner join orders 
        on
        (user.user= orders.email)
         where id='" . $order_id . "'");
     $data_sup =  $this->db->query("SELECT * FROM supplier_in_order inner join supplier 
     on
     (supplier_in_order.code_supplier= supplier.code_supplier)
      where supplier_in_order.id_order='" . $order_id . "'");
     foreach($data->result() as $row)
     {
        $output = '<p align="rigth">  לכבוד חברת : ';
        $output .= $row->company;
        $output .='</p><p align="rigth">     הנדון: הצעת מחיר להזמנה מספר  ';
        $output .= $order_id;
        $output .='</p> <h3 align="center">פרטי הזמנה </h3>';
        
      $output .= '<table width="100%" align="rigth" cellspacing="5" cellpadding="5">
      <tr>
       <td>
        <p> שם איש קשר : '.$row->name_contect.'</p>
        <p>מספר משתתפים : '.$row->num_participants.'</p>
        <p>מיקום האירוע  :'.$row->city.'</p>
        <p>סוג הגשה  :'.$row->type_dish.'</p>
        <p> תאריך אירוע : '.$row->order_date.'</p>
        ';
        if($data_sup->result()!=null){
            $output .= ' <h4>  תוספות לאירוע</h4>'; 
        }
      
        foreach($data_sup->result() as $row2){
            $output .= ' 
            <p>  סוג ספק: '.$row2->profession.'</p>  ';}
        $output .= '<h4 align="center">
        סכום סופי : '.$this->input->post('final_price').' </h4>
       </td>
      </tr>
      ';
     }
     
     return $output;
    }

    public function set_status_and_price($order_id,$final_price) { 
        $query = $this->db->query("UPDATE orders SET final_price='" . $final_price . "', status='נשלחה הצעת מחיר' , change_details= null  where id='" . $order_id . "'");


    }

    public function set_price($order_id,$final_price) { 
        $query = $this->db->query("UPDATE orders SET final_price='" . $final_price . "'  where id='" . $order_id . "'");


    }

  


}
