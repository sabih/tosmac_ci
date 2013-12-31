<?php

class Home extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        
        // This removes cache        
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');       
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        
    }
    
    public function index() {
        
        if($this->session->userdata('username')) {
            
            // Get username from Session
            $data['username'] = $this->session->userdata('username');
            $data['base_url'] = $this->config->base_url();
            $data['title'] = ucfirst('home'); // Capitalize the first letter
            
            $this->load->view('templates/tosmac_header', $data);
            $this->load->view('tosmac/home_view', $data);
            $this->load->view('templates/tosmac_footer', $data);
            
        } else {
            
            // This destroys the session created when user clicks back button after logout
            $this->session->sess_destroy();
            // If no session, redirect to login page
            redirect('login');
            
        }
        
    }
    
}