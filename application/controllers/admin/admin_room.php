<?php

class Admin_room extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();

		$this->load->model('room_model');

		$this->load->model('auth_model');

		if (!$this->auth_model->current_user()) {
				redirect('auth/login');
			}

	}

	public function index()
	{
		$data['role'] = $this->auth_model->current_user()->role ;

		$data['rooms'] = $this->room_model->get_all();

	 	$this->load->view('admin/list_room', $data);		
	}

	public function new()
	{
		$data['role'] = $this->auth_model->current_user()->role ;

		if ($this->input->method() ==='post' ) {

			$file_name = uniqid('',true);
			$config['upload_path'] = FCPATH . '/upload/rooms/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name'] = str_replace ('.','', $file_name);
			$config['overwrite'] = true;
			$config['max_size'] = 1024; //1MB
			$config['max_width'] = 1080;
			$config['max_height'] = 1080;
		
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image')) {
				$data['error'] = $this->upload->display_errors();
			}else{
				$uploaded_data = $this->upload->data();

		$room = [
			'tipe_kamar'=>$this->input->post('tipe_kamar'),
			'jumlah_kamar'=>$this->input->post('jumlah_kamar'),
			'fasilitas_kamar'=>$this->input->post('fasilitas_kamar'),
			'harga_sewa'=>$this->input->post('harga_sewa'),
			'image'=>$uploaded_data['file_name']
		];

		$saved=$this->room_model->insert($room);

		if ($saved) {
			$this->session->set_flashdata('message', 'data berhasil dibuat');
			return redirect('admin');
				}
			}
		}

		$this->load->view('admin/create_room', $data);
	}

   public function view($id_kamar = null)
   {
		$data['room'] = $this->room_model->get_by_id($id_kamar)->row();
		$data['role'] = $this->auth_model->current_user()->role ;
	
		$this->load->view('admin/view_room', $data);

    }
	public function edit($id_kamar = null)
	{

        $data['role'] = $this->auth_model->current_user()->role ;
		$data['room'] = $this->room_model->get_by_id($id_kamar)->row();
		

		if ($this->input->method() ==='post' ) {

			$oriImg = $data['room']->image;
			$newImg = $_FILES['image']['name'];

			if (!empty($newImg)) {
				$img_name = $data['room']->image;
				$file_name = substr($img_name, 0, strpos($img_name, "."));

			$config['upload_path'] = FCPATH . '/upload/rooms/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name'] = str_replace ('.','', $file_name);
			$config['overwrite'] = true;
			$config['max_size'] = 1024; //1MB
			$config['max_width'] = 1080;
			$config['max_height'] = 1080;
		
			$this->load->library('upload', $config);
			$this->upload->do_upload('image');

			$uploaded_data = $this->upload->data();

			}

		$room = [
			'id_kamar' => $id_kamar,
			'tipe_kamar'=>$this->input->post('tipe_kamar'),
			'jumlah_kamar'=>$this->input->post('jumlah_kamar'),
			'fasilitas_kamar'=>$this->input->post('fasilitas_kamar'),
			'harga_sewa'=>$this->input->post('harga_sewa'),
			'image'=> !empty($newImg) ? $uploaded_data['file_name'] : $oriImg
		];

		$update=$this->room_model->update($room);

		if ($update) {
			$this->session->set_flashdata('message', 'data berhasil diubah');
			return redirect('admin');
				}
		}

		$this->load->view('admin/edit_room', $data);
	}

	public function delete($id = null)
	{
		if (!$id) {
			show_404();
		}
		
		$data['room'] = 
			$this->room_model->get_by_id($id)->row();
		$img_name	= $data['room']->image;
		$file_name	= substr($img_name, 0, 
			strpos($img_name, "."));
		$deleted = $this->room_model->delete($id);
		if ($deleted) {
			array_map('unlink', 
				glob(FCPATH . "/upload/rooms/$file_name.*"));

			$this->session->set_flashdata('message', 
				'Data berhasil dihapus!');
			redirect('admin');
		}
	}

}

?>