<?php 
    class Transactions extends CI_Controller{
        public function index(){
            $data['title'] = 'Latest transactions';


            $id = $this->session->userdata('user_id');
            
            $this->load->model('Category_model', 'category');

            
            $this->load->model('Category_model', 'category');
            $data['categories'] = $this->category->get_category();
            

            $data['balance'] = $this->transaction_model->get_balance($id);

            $this->load->view('templates/header');
            $this->load->view('transactions/index', $data);
            $this->load->view('templates/footer');
        }

        public function ajax_list(){
            
            echo $this->transaction_model->get_transactions();
            //echo "Hello";
        }

        public function ajax_add(){
            $result =  $this->transaction_model->add_ajax_transaction();
            $msg['success'] = false;

            if($result){
                $msg['success'] = true;
            }

            echo json_encode($msg);
        }

        public function chart_api_income(){
        
            $id = $this->session->userdata('user_id');
            $result = $this->transaction_model->get_income_per_day($id, 'Income');
            echo $result;
        }

        public function chart_api_expense(){
            
            $id = $this->session->userdata('user_id');
            $result = $this->transaction_model->get_income_per_day($id, 'Expense');
            echo $result;
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

            //Check Auth
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

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
                $this->session->set_flashdata('transaction_created', 'You have add new transactions');                
                redirect('transactions');
            }
        }

        public function delete($id){

            //Check Auth
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $this->transaction_model->delete_transaction($id);
            $this->session->set_flashdata('transaction_deleted', 'You have delete the transactions');
            redirect('transactions');
        }

        public function edit($id){

            //Check Auth
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['transaction'] = $this->transaction_model->get_transactions($id);

            
            $this->load->model('Category_model', 'category');
            $data['categories'] = $this->category->get_category();

            if(empty($data['transaction'])){
                show_404();
            }

            $data['title'] = "Edit Transaction";

            $this->load->model('Category_model', 'category');
            $data['category_names']= $this->category->get_category();

            $this->load->view('templates/header');
            $this->load->view('transactions/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update(){

            //Check Auth
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $this->transaction_model->update_post();
            $this->session->set_flashdata('post_updated', 'Transaction has been updated');
            redirect('transactions');
        }

        public function dashboard(){
            
            //Check Auth
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $id = $this->session->userdata('user_id');
            

            $data['name'] = $this->session->userdata('username');

            $data['no_transactions'] = $this->transaction_model->count($id);
            $data['no_expense'] = $this->transaction_model->sum('Expense', $id);       
            $data['no_income'] = $this->transaction_model->sum('Income', $id);
            $data['net_worth'] = $this->transaction_model->get_balance($id);

            $this->load->view('templates/header');
            $this->load->view('pages/dashboard',$data);
            $this->load->view('templates/footer');
        }

    }
?>