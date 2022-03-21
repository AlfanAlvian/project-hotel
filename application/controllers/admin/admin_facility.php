<?php
defined ('BASEPATH') or exit ('No direct')

class Admin_facility extends CI_controller
{
    public function __construct()
}

public function index()
{
    $data['facility'] $this->facility_model->get_all();
    $data['role'] $this->auth_model->current_user()->role;

    $this->load->view
}

public function new()
{
    $data['role'] = $this->auth_model->current_user()->role;
    if ($this->input->method() === 'post') {
        $file_name = uniqid('', true);
        $config
        
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $data['error'] = $this->upload->display_errors();
        } else {
            $uploaded_data = $this->upload->data();

            $facility = [
                'nama_fasilitas' => $this->input->post('nama_fasilitas'),
                'keterangan' => $this->input->post('keterangan'),
                'image' => $uploaded_data ['file_name'] 

            ];

            $saved = $this->facility_model->insert($facility);
            if ($saved) {
                $this->session->set_flashdata('message', 'Data Sudah Disimpan');
                return redirect(site_url('admin/admin_facility'));
            }

            $update = $this->facility_model->update($facility);
            if ($update) {
                $this->session->set_flashdata('message', 'Data Telah Diubah');
                return redirect
            }
        }
    }
}