<?php

class Login extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        
        // This removes cache        
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');       
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        
    }

    public function index() {
        
        if ( $this->input->post( 'btn_register' )) {
            
            // check if this username exist
            $username = $this->login_model->get_users();
            
            // if new username then save this user
            if(empty($username)) {
                $this->login_model->set_users();
            }
            
        }
        
        // This destroys the session after logout
        $this->session->sess_destroy();
        
        $data['base_url'] = $this->config->base_url();
        $data['title'] = ucfirst('login'); // Capitalize the first letter
        
        $this->load->view('templates/header', $data);
        $this->load->view('tosmac/login_view', $data);
        
    }
    
    public function register() {
        
        $data['base_url'] = $this->config->base_url();
        $data['title'] = ucfirst('register'); // Capitalize the first letter
        
        $this->load->view('templates/header', $data);
        $this->load->view('tosmac/register_view');
        
    }
    
    public function verify_login(){
        
        // check if this username exist
        $username = $this->login_model->login();
        
        // If user details match in dB then redirect to home page else login page
        if(!empty($username)){
            
            $this->session->set_userdata('username', $username['first_name']);
            redirect("home");
            
        } else {
            
            redirect("login");
            
        }
        
    }
    
    public function logout() {
        
        $this->session->unset_userdata('username');
        // This destroys the session
        $this->session->sess_destroy();
        redirect('login');
        
    }
    
}