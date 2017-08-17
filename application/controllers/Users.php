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

        public function login(){
            $data['title'] = "Login";

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
        
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            }else{

                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));

                $user_id = $this->user_model->login($username, $password);

                if($user_id){
                    //create session
                    $user_data = array(
                        'user_id' => $user_id,
                        'username' => $username,
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);

                    $this->session->set_flashdata('user_loggedin', 'You are now log in');
                    redirect('transactions');
                }else{
                    $this->session->set_flashdata('login_failed', 'Login is invalid');
                    redirect('users/login');
                }

                
            }

        }

        public function logout(){
            //Unset user data
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('logged_in');

            $this->session->set_flashdata('user_logout', 'You are now log out');
            redirect('users/login');
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