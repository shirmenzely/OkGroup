<?php

class Order_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function last_order() {

        $current_user = $_SESSION['user'];
        $query = $this->db->query("select max(id) from orders where email='" . $current_user . "'");

        if ($query) {
            return $query->result_array();
        }
    }
    public function set_order($data) {

        $this->db->db_debug = FALSE; //disable debugging for queries

        $error = NULL;
        if (!$this->db->insert('orders', $data)) {
            $error = $this->db->error();
        }
        
        if($error == NULL){
            $idOrder=  $this->Order_model-> last_order();
            
          foreach($this->input->post('supplierarr') as $var){
                   $data2=array(
            'code_supplier' => $var,
            'id_order' => $idOrder[0]['max(id)'],
        
        );
               
                if (!$this->db->insert('supplier_in_order', $data2)) {
                $error = $this->db->error();
                break;   
                }            
            }
                     
            
        }
        return $error;
    }

   

    public function get_supplier() {
        $query = $this->db->query("select * from supplier");

        if ($query) {
            return $query->result_array();
        }
    }

}
