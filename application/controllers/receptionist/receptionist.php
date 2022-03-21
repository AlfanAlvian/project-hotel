<?php

class reservation extends CI_controller
{
	public function index()
	{
		$this->load->view('admin/list_room');
	}
}