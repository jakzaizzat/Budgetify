<?php 

    Class Transaction_model extends CI_Model {
        public function __construct(){
            $this->load->database();
        }

        public function get_transactions($id = FALSE){

            if($id === FALSE){
                $query = $this->db->get('transactions');
                return $query->result_array();
            }

            $query = $this->db->get_where('transactions', array('transaction_id' => $id));
            return $query->row_array();
        }
    }

?>