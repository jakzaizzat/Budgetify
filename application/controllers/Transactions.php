<?php 
    class Transactions extends CI_Controller{
        public function index(){
            $data['title'] = 'Latest transactions';

            $data['transactions'] = $this->transaction_model->get_transactions();

            $this->load->view('templates/header');
            $this->load->view('transactions/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($id = NULL){
            $data['transaction'] = $this->transaction_model->get_transactions($id);

            if(empty($data['transaction'])){
                show_404();
            }

            //$data['title'] = $data['transaction']['transaction_name'];

            
            $this->load->view('templates/header');
            $this->load->view('transactions/view', $data);
            $this->load->view('templates/footer');
        }
    }
?>