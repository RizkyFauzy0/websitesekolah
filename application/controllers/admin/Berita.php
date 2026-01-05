<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('berita_model');
    }

    public function index() {
        $data['title'] = 'Manajemen Berita';
        $data['berita'] = $this->berita_model->get_all();
        $this->render_admin('admin/berita/index', $data);
    }

    public function tambah() {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
            $this->form_validation->set_rules('konten', 'Konten', 'required');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Generate slug from title
                $slug = url_title($this->input->post('judul'), 'dash', TRUE);
                
                // Handle image upload
                $gambar = '';
                if (!empty($_FILES['gambar']['name'])) {
                    $config['upload_path'] = './assets/uploads/berita/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2048;
                    $config['file_name'] = 'berita_' . time();

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {
                        $upload_data = $this->upload->data();
                        $gambar = $upload_data['file_name'];
                    } else {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/berita/tambah');
                    }
                }

                $data = [
                    'judul' => $this->input->post('judul'),
                    'slug' => $slug,
                    'konten' => $this->input->post('konten'),
                    'gambar' => $gambar,
                    'penulis' => $this->input->post('penulis'),
                    'tanggal' => $this->input->post('tanggal'),
                    'is_published' => $this->input->post('is_published') ? 1 : 0
                ];

                if ($this->berita_model->insert($data)) {
                    $this->session->set_flashdata('success', 'Berita berhasil ditambahkan');
                    redirect('admin/berita');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan berita');
                }
            }
        }

        $data['title'] = 'Tambah Berita';
        $this->render_admin('admin/berita/form', $data);
    }

    public function edit($id) {
        $berita = $this->berita_model->get_by_id($id);
        if (!$berita) {
            show_404();
        }

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
            $this->form_validation->set_rules('konten', 'Konten', 'required');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Generate slug from title
                $slug = url_title($this->input->post('judul'), 'dash', TRUE);
                
                $data = [
                    'judul' => $this->input->post('judul'),
                    'slug' => $slug,
                    'konten' => $this->input->post('konten'),
                    'penulis' => $this->input->post('penulis'),
                    'tanggal' => $this->input->post('tanggal'),
                    'is_published' => $this->input->post('is_published') ? 1 : 0
                ];

                // Handle image upload if new image is provided
                if (!empty($_FILES['gambar']['name'])) {
                    $config['upload_path'] = './assets/uploads/berita/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2048;
                    $config['file_name'] = 'berita_' . time();

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {
                        // Delete old image
                        if ($berita->gambar && file_exists('./assets/uploads/berita/' . $berita->gambar)) {
                            unlink('./assets/uploads/berita/' . $berita->gambar);
                        }
                        
                        $upload_data = $this->upload->data();
                        $data['gambar'] = $upload_data['file_name'];
                    }
                }

                if ($this->berita_model->update($id, $data)) {
                    $this->session->set_flashdata('success', 'Berita berhasil diupdate');
                    redirect('admin/berita');
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengupdate berita');
                }
            }
        }

        $data['title'] = 'Edit Berita';
        $data['berita'] = $berita;
        $this->render_admin('admin/berita/form', $data);
    }

    public function hapus($id) {
        $berita = $this->berita_model->get_by_id($id);
        if ($berita) {
            // Delete image file
            if ($berita->gambar && file_exists('./assets/uploads/berita/' . $berita->gambar)) {
                unlink('./assets/uploads/berita/' . $berita->gambar);
            }
            
            if ($this->berita_model->delete($id)) {
                $this->session->set_flashdata('success', 'Berita berhasil dihapus');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus berita');
            }
        }
        redirect('admin/berita');
    }
}
