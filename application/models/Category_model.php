<?php 

    Class Category_model extends CI_Model {

        public function __costruct(){
            $this->load->database();
        }

        public function get_category(){
            $query = $this->db->get('categories');
            return $query->result_array();

            //return $query->row_array()
        }

    }


?>