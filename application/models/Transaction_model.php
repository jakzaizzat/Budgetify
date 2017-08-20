<?php 

    Class Transaction_model extends CI_Model {
        public function __construct(){
            $this->load->database();
        }

        public function get_transactions($id = FALSE){
            
            $user_id = $this->session->userdata('user_id');
            
            if($id === FALSE){
                    $this->db->join('categories', 'categories.category_id = transactions.category_id')->where('user_id', $user_id);
                    $this->db->order_by('created_at', 'desc');
                    $query = $this->db->get('transactions');
                    //return $query->result_array();
                    return json_encode($query->result_array());
            }
            $query = $this->db->get_where('transactions', array('transaction_id' => $id));
            return $query->row_array();
                
        }

        public function edit_transaction($id){
            $query = $this->db->get_where('transactions', array('transaction_id' => $id));
            
            return $query->row_array();
        }

        public function get_balance($id){
            $this->db->where('user_id', $id);
            $transactions = $this->db->get('transactions')->result_array();
            

            $this->db->select('balance')->where('id', $id);
            $query = $this->db->get('users')->row_array();

            $balance = $query['balance'];

            foreach($transactions as $tran){
                if($tran['transaction_flow'] == "Expense"){
                    $balance -= $tran['transaction_price'];
                }else{
                    $balance += $tran['transaction_price'];
                }
            }

            return $balance;
        }

        public function create_transaction(){

            //Get category id by name
            $this->db->select('category_id')->where('category_name', $this->input->post('category'));
            $cat = $this->db->get('categories')->row_array();


            $data = array(
                'transaction_name' => $this->input->post('transaction_detail'),
                'transaction_flow' => $this->input->post('flow'),
                'transaction_price' => $this->input->post('amount'),
                'category_id' => $this->input->post('category_id'),
                'user_id' => $this->session->userdata('user_id')
            );

            $this->db->insert('transactions', $data);
            return true;
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
                'category_id' => $this->input->post('category'),
                'transaction_price' => $this->input->post('amount'),
                'created_at' => $this->input->post('date')
            );
            
            $this->db->where('transaction_id', $this->input->post('id'));
            return $this->db->update('transactions', $data);
        }

        public function add_ajax_transaction(){
            $data = array(
                'transaction_name' => $this->input->post('transaction_detail'),
                'transaction_flow' => $this->input->post('flow'),
                'transaction_price' => $this->input->post('amount'),
                'category_id' => $this->input->post('category_id'),
                'created_at' => $this->input->post('date'),
                'user_id' => $this->session->userdata('user_id')
            );

            $this->db->insert('transactions', $data);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }

        }

        public function count($id){
            $this->db->where('user_id', $id);
            return $this->db->count_all_results('transactions');
        }

        public function sum($flow,$id){
            $this->db->where('user_id', $id);
            $query =  $this->db->select_sum('transaction_price')->where('transaction_flow', $flow)->get('transactions');
            return $query->row_array();
        }


        public function get_income_per_day($id, $flow){
            $this->db->where('user_id', $id);
            $this->db->select_sum('transaction_price')->select('created_at')->where('transaction_flow', $flow);
            $query = $this->db->group_by('created_at')->get('transactions');

            return json_encode($query->result_array());
        }
    }

?>