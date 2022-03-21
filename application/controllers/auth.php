<?php

class auth extends CI_controller
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

		if ($this->auth_model->login($username, $password)) {
			if ($this->auth_model->current_user()->role == 'admin' ) {
				redirect('admin');
				
			}
		}

		$this->load->view('login');
	}
	public function logout()
	{
		$this->load->model('auth_model');
		$this->auth_model->logout();
		redirect (site_url('auth'));
	}
}  