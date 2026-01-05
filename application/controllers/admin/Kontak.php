<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('kontak_model');
    }

    public function index() {
        $kontak = $this->kontak_model->get();

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'alamat' => $this->input->post('alamat'),
                    'telepon' => $this->input->post('telepon'),
                    'fax' => $this->input->post('fax'),
                    'email' => $this->input->post('email'),
                    'maps_embed' => $this->input->post('maps_embed'),
                    'facebook' => $this->input->post('facebook'),
                    'instagram' => $this->input->post('instagram'),
                    'twitter' => $this->input->post('twitter'),
                    'youtube' => $this->input->post('youtube')
                ];

                if ($this->kontak_model->update($kontak->id, $data)) {
                    $this->session->set_flashdata('success', 'Informasi kontak berhasil diupdate');
                    redirect('admin/kontak');
                }
            }
        }

        $data['title'] = 'Edit Informasi Kontak';
        $data['kontak'] = $kontak;
        $this->render_admin('admin/kontak/form', $data);
    }
}
