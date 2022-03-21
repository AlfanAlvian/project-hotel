<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct()
    {
    	 parent::__construct();
    	 $this->load->model('room_model');
    	 $this->load->model('reservation_model');
    }	

	public function index()
	{

		$data['rooms'] = $this->room_model->get_all();
		if ($this->input->method () === 'post') {

			$reservation = [
				'nama_pemesan' => $this->input->post('nama_pemesan'),
				'email' => $this->input->post('email'),
				'no_hp' => $this->input->post('no_hp'),
				'nama_tamu' => $this->input->post('nama_tamu'),
				'jumlah_kamar' => $this->input->post('jumlah_kamar'),
				'id_kamar' => $this->input->post('id_kamar'),
				'tgl_check_in' => $this->input->post('tgl_check_in'),
				'tgl_check_out' => $this->input->post('tgl_check_out')
			];
			$reservation_saved =
			$this->reservation_model->insert($reservation);

			if ($reservation_saved) {
				return redirect ('', $data);
			}

		}
		$this->load->view('home', $data);
	}
}
