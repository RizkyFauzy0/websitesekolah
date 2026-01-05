<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_foto extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('galeri_foto_model');
    }

    public function index() {
        $data['title'] = 'Manajemen Galeri Foto';
        $data['galeri'] = $this->galeri_foto_model->get_all();
        $this->render_admin('admin/galeri_foto/index', $data);
    }

    public function tambah() {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './assets/uploads/galeri_foto/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;
                $config['file_name'] = 'galeri_' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $upload_data = $this->upload->data();
                    
                    $data = [
                        'judul' => $this->input->post('judul'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'foto' => $upload_data['file_name'],
                        'kategori' => $this->input->post('kategori'),
                        'tanggal' => $this->input->post('tanggal')
                    ];

                    if ($this->galeri_foto_model->insert($data)) {
                        $this->session->set_flashdata('success', 'Foto berhasil ditambahkan');
                        redirect('admin/galeri_foto');
                    }
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                }
            }
        }

        $data['title'] = 'Tambah Foto';
        $this->render_admin('admin/galeri_foto/form', $data);
    }

    public function edit($id) {
        $galeri = $this->galeri_foto_model->get_by_id($id);
        if (!$galeri) {
            show_404();
        }

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'judul' => $this->input->post('judul'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'kategori' => $this->input->post('kategori'),
                    'tanggal' => $this->input->post('tanggal')
                ];

                if (!empty($_FILES['foto']['name'])) {
                    $config['upload_path'] = './assets/uploads/galeri_foto/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2048;
                    $config['file_name'] = 'galeri_' . time();

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')) {
                        if (file_exists('./assets/uploads/galeri_foto/' . $galeri->foto)) {
                            unlink('./assets/uploads/galeri_foto/' . $galeri->foto);
                        }
                        
                        $upload_data = $this->upload->data();
                        $data['foto'] = $upload_data['file_name'];
                    }
                }

                if ($this->galeri_foto_model->update($id, $data)) {
                    $this->session->set_flashdata('success', 'Foto berhasil diupdate');
                    redirect('admin/galeri_foto');
                }
            }
        }

        $data['title'] = 'Edit Foto';
        $data['galeri'] = $galeri;
        $this->render_admin('admin/galeri_foto/form', $data);
    }

    public function hapus($id) {
        $galeri = $this->galeri_foto_model->get_by_id($id);
        if ($galeri) {
            if (file_exists('./assets/uploads/galeri_foto/' . $galeri->foto)) {
                unlink('./assets/uploads/galeri_foto/' . $galeri->foto);
            }
            
            if ($this->galeri_foto_model->delete($id)) {
                $this->session->set_flashdata('success', 'Foto berhasil dihapus');
            }
        }
        redirect('admin/galeri_foto');
    }
}
