<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('guru_model');
    }

    public function index() {
        $data['title'] = 'Manajemen Guru';
        $data['guru'] = $this->guru_model->get_all();
        $this->render_admin('admin/guru/index', $data);
    }

    public function tambah() {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('mata_pelajaran', 'Mata Pelajaran', 'trim');
            $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './assets/uploads/guru/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;
                $config['file_name'] = 'guru_' . time();

                $this->load->library('upload', $config);

                $foto = '';
                if (!empty($_FILES['foto']['name'])) {
                    if ($this->upload->do_upload('foto')) {
                        $upload_data = $this->upload->data();
                        $foto = $upload_data['file_name'];
                    } else {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/guru/tambah');
                    }
                }

                $data = [
                    'nama' => $this->input->post('nama'),
                    'nip' => $this->input->post('nip'),
                    'foto' => $foto,
                    'mata_pelajaran' => $this->input->post('mata_pelajaran'),
                    'pendidikan' => $this->input->post('pendidikan'),
                    'email' => $this->input->post('email'),
                    'telepon' => $this->input->post('telepon'),
                    'urutan' => $this->input->post('urutan'),
                    'is_active' => $this->input->post('is_active') ? 1 : 0
                ];

                if ($this->guru_model->insert($data)) {
                    $this->session->set_flashdata('success', 'Data guru berhasil ditambahkan');
                    redirect('admin/guru');
                }
            }
        }

        $data['title'] = 'Tambah Guru';
        $this->render_admin('admin/guru/form', $data);
    }

    public function edit($id) {
        $guru = $this->guru_model->get_by_id($id);
        if (!$guru) {
            show_404();
        }

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('mata_pelajaran', 'Mata Pelajaran', 'trim');
            $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'nip' => $this->input->post('nip'),
                    'mata_pelajaran' => $this->input->post('mata_pelajaran'),
                    'pendidikan' => $this->input->post('pendidikan'),
                    'email' => $this->input->post('email'),
                    'telepon' => $this->input->post('telepon'),
                    'urutan' => $this->input->post('urutan'),
                    'is_active' => $this->input->post('is_active') ? 1 : 0
                ];

                if (!empty($_FILES['foto']['name'])) {
                    $config['upload_path'] = './assets/uploads/guru/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2048;
                    $config['file_name'] = 'guru_' . time();

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')) {
                        if ($guru->foto && file_exists('./assets/uploads/guru/' . $guru->foto)) {
                            unlink('./assets/uploads/guru/' . $guru->foto);
                        }
                        
                        $upload_data = $this->upload->data();
                        $data['foto'] = $upload_data['file_name'];
                    }
                }

                if ($this->guru_model->update($id, $data)) {
                    $this->session->set_flashdata('success', 'Data guru berhasil diupdate');
                    redirect('admin/guru');
                }
            }
        }

        $data['title'] = 'Edit Guru';
        $data['guru'] = $guru;
        $this->render_admin('admin/guru/form', $data);
    }

    public function hapus($id) {
        $guru = $this->guru_model->get_by_id($id);
        if ($guru) {
            if ($guru->foto && file_exists('./assets/uploads/guru/' . $guru->foto)) {
                unlink('./assets/uploads/guru/' . $guru->foto);
            }
            
            if ($this->guru_model->delete($id)) {
                $this->session->set_flashdata('success', 'Data guru berhasil dihapus');
            }
        }
        redirect('admin/guru');
    }
}
