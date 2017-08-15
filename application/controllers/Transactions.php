<?php 
    class Transactions extends CI_Controller{
        public function index(){
            $data['title'] = 'Latest transactions';

            $data['transactions'] = $this->transaction_model->get_transactions();

            
            $this->load->model('Category_model', 'category');

            foreach($data['transactions'] as $tran){
                $data['category_names'][$tran['transaction_id']] = $this->category->get_name($tran['category_id']);
            }


            $data['balance'] = $this->transaction_model->get_balance();

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

        public function create(){
            $data['title'] = 'Create new transactions';
            
            $this->load->model('Category_model', 'category');
            $data['categories'] = $this->category->get_category();


            $this->form_validation->set_rules('transaction_detail', 'Transaction Details', 'required');
            $this->form_validation->set_rules('flow', 'Flow', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required');
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('transactions/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->transaction_model->create_transaction();
                redirect('transactions');
            }
        }

        public function delete($id){
            $this->transaction_model->delete_transaction($id);

            redirect('transactions');
        }

        public function edit($id){
            $data['transaction'] = $this->transaction_model->get_transactions($id);

            if(empty($data['transaction'])){
                show_404();
            }

            $data['title'] = "Edit Post";

            $this->load->model('Category_model', 'category');
            $data['category_names']= $this->category->get_category();

            $this->load->view('templates/header');
            $this->load->view('transactions/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update(){
            $this->transaction_model->update_post();
            redirect('transactions');
        }
    }
?>