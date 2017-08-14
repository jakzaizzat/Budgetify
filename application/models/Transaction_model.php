<?php 

    Class Transaction_model extends CI_Model {
        public function __construct(){
            $this->load->database();
        }

        public function get_transactions($id = FALSE){

            if($id === FALSE){
                $this->db->order_by('created_at', 'desc');
                $query = $this->db->get('transactions');
                return $query->result_array();
            }

            $query = $this->db->get_where('transactions', array('transaction_id' => $id));
            return $query->row_array();
        }

        public function get_balance(){
            $transactions = $this->db->get('transactions')->result_array();
            
            $balance = 0;

            foreach($transactions as $tran){
                if($tran['transaction_flow'] == "Expenses"){
                    $balance -= $tran['transaction_price'];
                }else{
                    $balance += $tran['transaction_price'];
                }
            }
            return $balance;
            //return $query->result_array();
        }

        public function create_transaction(){
            
            $data = array(
                'transaction_name' => $this->input->post('transaction_detail'),
                'transaction_flow' => $this->input->post('flow'),
                'transaction_category' => $this->input->post('category'),
                'transaction_price' => $this->input->post('amount')
            );

            return $this->db->insert('transactions', $data);
        }

        public function delete_transaction($id){
            $this->db->where('transaction_id', $id);
            $this->db->delete('transactions');
            return true;
        }

        public function update_post(){

            $data = array(
                'transaction_name' => $this->input->post('transaction_detail'),
                'transaction_flow' => $this->input->post('flow'),
                'transaction_category' => $this->input->post('category'),
                'transaction_price' => $this->input->post('amount')
            );
            
            $this->db->where('transaction_id', $this->input->post('id'));
            return $this->db->update('transactions', $data);
        }
    }

?>