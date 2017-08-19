<?php 

    class Pages extends CI_Controller{

        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data['title'] = ucfirst($page);
            
            //Check Auth
            if(!$this->session->userdata('logged_in')){
                $this->load->view('pages/'. $page, $data);
            }else{
                redirect('dashboard');
            }

            
        }
    }

?>