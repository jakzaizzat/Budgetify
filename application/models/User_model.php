<?php 

    Class User_model extends CI_Model {
        
        public function __construct(){
            $this->load->database();
        }

        public function register($enc_password){
              
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $enc_password,
                'balance' => $this->input->post('balance')
            );

            return $this->db->insert('users', $data);
        }

        public function login($username, $password){
            $this->db->where('username', $username);
            $this->db->where('password', $password);

            $result = $this->db->get('users');

            if($result->num_rows() == 1){
                return $result->row(0)->id;
            }else{
                return false;
            }
        }

        public function check_username_exists($username){
            $query = $this->db->get_where('users', array('username' => $username));
            if(empty($query->row_array())){
                return true;
            }else {
                return false;
            }
        }
    }
?>