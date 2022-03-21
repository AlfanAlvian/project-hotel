<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
    	show_404();
    }

    public function login()
    {
	    	 $this->load->model('auth_model');
	         $username = $this->input->post('username');
	         $password = $this->input->post('password');

	         if($this->auth_model->login($username, $password)){
	         	if($this->auth_model->current_user()->role == 'admin'){
	         		redirect('admin');
	         	}else{
	         		redirect('receptionist');
	         	
	         	}
	         }

	    	 $this->load->view('login');
   }
   public function logout()
   {
   	$this->load->model('auth_model');
   	$this->auth_model->logout();
   	redirect (site_url('auth/login'));
   }
}
 