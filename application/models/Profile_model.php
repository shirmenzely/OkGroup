<?php

class Profile_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_orders_by_user_coming($user){
        $query = $this->db->query("select * from orders where email='" . $user . "'
        and 
         STR_TO_DATE(orders.order_date, '%d/%m/%Y') > CURRENT_DATE()
             order by(STR_TO_DATE(orders.order_date, '%d/%m/%Y'))");

        if ($query) {
            return $query->result_array();
        }

    }

    public function get_orders_by_user_prev($user){
        $query = $this->db->query("select * from orders where email='" . $user . "'
        and 
         STR_TO_DATE(orders.order_date, '%d/%m/%Y') < CURRENT_DATE()
             order by(STR_TO_DATE(orders.order_date, '%d/%m/%Y'))");

        if ($query) {
            return $query->result_array();
        }

    }

    public function supplier_in_order(){
        $query = $this->db->query("SELECT * FROM supplier_in_order inner join supplier 
        on
        (supplier_in_order.code_supplier= supplier.code_supplier)");

        if ($query) {
            return $query->result_array();
        }

    }

   

}