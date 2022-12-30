<?php
class Entidades extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('url_helper'); 
            if ( ! $this->session->userdata('logged_in'))
            { 
                redirect('login', 'refresh');
            }
        }
}