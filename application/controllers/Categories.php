<?php 
    class Categories extends CI_Controller{

        public function index(){
            $data['categories'] = $this->category_model->get_category();

            
        }
    }

?>