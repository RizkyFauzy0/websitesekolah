<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('profil_model');
    }

    public function visi_misi() {
        $this->edit_profil('visi_misi', 'Visi & Misi');
    }

    public function sejarah() {
        $this->edit_profil('sejarah', 'Sejarah Singkat');
    }

    public function struktur_organisasi() {
        $this->edit_profil('struktur_organisasi', 'Struktur Organisasi');
    }

    public function keunggulan() {
        $this->edit_profil('keunggulan', 'Keunggulan Sekolah');
    }

    private function edit_profil($jenis, $title) {
        $profil = $this->profil_model->get_by_jenis($jenis);

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
            $this->form_validation->set_rules('konten', 'Konten', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'judul' => $this->input->post('judul'),
                    'konten' => $this->input->post('konten')
                ];

                if (!empty($_FILES['gambar']['name'])) {
                    $config['upload_path'] = './assets/uploads/profil/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2048;
                    $config['file_name'] = 'profil_' . $jenis . '_' . time();

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {
                        if ($profil && $profil->gambar && file_exists('./assets/uploads/profil/' . $profil->gambar)) {
                            unlink('./assets/uploads/profil/' . $profil->gambar);
                        }
                        
                        $upload_data = $this->upload->data();
                        $data['gambar'] = $upload_data['file_name'];
                    }
                }

                if ($this->profil_model->update($jenis, $data)) {
                    $this->session->set_flashdata('success', 'Data profil berhasil diupdate');
                    redirect('admin/profil/' . $jenis);
                }
            }
        }

        $data['title'] = 'Edit ' . $title;
        $data['profil'] = $profil;
        $data['jenis'] = $jenis;
        $this->render_admin('admin/profil/form', $data);
    }
}
