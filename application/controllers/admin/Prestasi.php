<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('prestasi_model');
    }

    public function index() {
        $data['title'] = 'Manajemen Prestasi';
        $data['prestasi'] = $this->prestasi_model->get_all();
        $this->render_admin('admin/prestasi/index', $data);
    }

    public function tambah() {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('jenis', 'Jenis', 'required');
            $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

            if ($this->form_validation->run() == TRUE) {
                $gambar = '';
                if (!empty($_FILES['gambar']['name'])) {
                    $config['upload_path'] = './assets/uploads/prestasi/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2048;
                    $config['file_name'] = 'prestasi_' . time();

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {
                        $upload_data = $this->upload->data();
                        $gambar = $upload_data['file_name'];
                    } else {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/prestasi/tambah');
                    }
                }

                $data = [
                    'jenis' => $this->input->post('jenis'),
                    'judul' => $this->input->post('judul'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $gambar,
                    'tanggal' => $this->input->post('tanggal'),
                    'tingkat' => $this->input->post('tingkat'),
                    'peringkat' => $this->input->post('peringkat')
                ];

                if ($this->prestasi_model->insert($data)) {
                    $this->session->set_flashdata('success', 'Prestasi berhasil ditambahkan');
                    redirect('admin/prestasi');
                }
            }
        }

        $data['title'] = 'Tambah Prestasi';
        $this->render_admin('admin/prestasi/form', $data);
    }

    public function edit($id) {
        $prestasi = $this->prestasi_model->get_by_id($id);
        if (!$prestasi) {
            show_404();
        }

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('jenis', 'Jenis', 'required');
            $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'jenis' => $this->input->post('jenis'),
                    'judul' => $this->input->post('judul'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'tanggal' => $this->input->post('tanggal'),
                    'tingkat' => $this->input->post('tingkat'),
                    'peringkat' => $this->input->post('peringkat')
                ];

                if (!empty($_FILES['gambar']['name'])) {
                    $config['upload_path'] = './assets/uploads/prestasi/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2048;
                    $config['file_name'] = 'prestasi_' . time();

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {
                        if ($prestasi->gambar && file_exists('./assets/uploads/prestasi/' . $prestasi->gambar)) {
                            unlink('./assets/uploads/prestasi/' . $prestasi->gambar);
                        }
                        
                        $upload_data = $this->upload->data();
                        $data['gambar'] = $upload_data['file_name'];
                    }
                }

                if ($this->prestasi_model->update($id, $data)) {
                    $this->session->set_flashdata('success', 'Prestasi berhasil diupdate');
                    redirect('admin/prestasi');
                }
            }
        }

        $data['title'] = 'Edit Prestasi';
        $data['prestasi'] = $prestasi;
        $this->render_admin('admin/prestasi/form', $data);
    }

    public function hapus($id) {
        $prestasi = $this->prestasi_model->get_by_id($id);
        if ($prestasi) {
            if ($prestasi->gambar && file_exists('./assets/uploads/prestasi/' . $prestasi->gambar)) {
                unlink('./assets/uploads/prestasi/' . $prestasi->gambar);
            }
            
            if ($this->prestasi_model->delete($id)) {
                $this->session->set_flashdata('success', 'Prestasi berhasil dihapus');
            }
        }
        redirect('admin/prestasi');
    }
}
