<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link_aplikasi extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('link_aplikasi_model');
    }

    public function index() {
        $data['title'] = 'Manajemen Link Aplikasi';
        $data['links'] = $this->link_aplikasi_model->get_all();
        $this->render_admin('admin/link_aplikasi/index', $data);
    }

    public function tambah() {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('url', 'URL', 'required|trim|valid_url');
            $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $icon = '';
                if (!empty($_FILES['icon']['name'])) {
                    $config['upload_path'] = './assets/uploads/link_aplikasi/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 1024;
                    $config['file_name'] = 'icon_' . time();

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('icon')) {
                        $upload_data = $this->upload->data();
                        $icon = $upload_data['file_name'];
                    }
                }

                $data = [
                    'nama' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'url' => $this->input->post('url'),
                    'icon' => $icon,
                    'urutan' => $this->input->post('urutan'),
                    'is_active' => $this->input->post('is_active') ? 1 : 0
                ];

                if ($this->link_aplikasi_model->insert($data)) {
                    $this->session->set_flashdata('success', 'Link aplikasi berhasil ditambahkan');
                    redirect('admin/link_aplikasi');
                }
            }
        }

        $data['title'] = 'Tambah Link Aplikasi';
        $this->render_admin('admin/link_aplikasi/form', $data);
    }

    public function edit($id) {
        $link = $this->link_aplikasi_model->get_by_id($id);
        if (!$link) {
            show_404();
        }

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('url', 'URL', 'required|trim|valid_url');
            $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'url' => $this->input->post('url'),
                    'urutan' => $this->input->post('urutan'),
                    'is_active' => $this->input->post('is_active') ? 1 : 0
                ];

                if (!empty($_FILES['icon']['name'])) {
                    $config['upload_path'] = './assets/uploads/link_aplikasi/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 1024;
                    $config['file_name'] = 'icon_' . time();

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('icon')) {
                        if ($link->icon && file_exists('./assets/uploads/link_aplikasi/' . $link->icon)) {
                            unlink('./assets/uploads/link_aplikasi/' . $link->icon);
                        }
                        
                        $upload_data = $this->upload->data();
                        $data['icon'] = $upload_data['file_name'];
                    }
                }

                if ($this->link_aplikasi_model->update($id, $data)) {
                    $this->session->set_flashdata('success', 'Link aplikasi berhasil diupdate');
                    redirect('admin/link_aplikasi');
                }
            }
        }

        $data['title'] = 'Edit Link Aplikasi';
        $data['link'] = $link;
        $this->render_admin('admin/link_aplikasi/form', $data);
    }

    public function hapus($id) {
        $link = $this->link_aplikasi_model->get_by_id($id);
        if ($link) {
            if ($link->icon && file_exists('./assets/uploads/link_aplikasi/' . $link->icon)) {
                unlink('./assets/uploads/link_aplikasi/' . $link->icon);
            }
            
            if ($this->link_aplikasi_model->delete($id)) {
                $this->session->set_flashdata('success', 'Link aplikasi berhasil dihapus');
            }
        }
        redirect('admin/link_aplikasi');
    }
}
