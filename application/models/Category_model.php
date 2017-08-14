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

        public function get_name($id){
            $this->db->select('category_name')->where('category_id', $id);

            $query = $this->db->get('categories')->row_array();
            return $query;
        }

    }


?>