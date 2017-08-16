<?php 
    class Users extends CI_Controller{

        public function register(){
            $data['title'] = "Sign Up";

            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
        
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            }else{
                // Encrypt passworkd
                $enc_password = md5($this->input->post('password'));

                $this->user_model->register($enc_password);

                $this->session->set_flashdata('user_registered', 'You are now register and can log in');

                redirect('transactions');
            }

        }

        function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different username');

            if($this->user_model->check_username_exists($username)){
                return true;
            }else{
                return false;
            }
        }
    }
?>