<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloads extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('download_model');
    }

    public function index() {
        $data['title'] = 'Manajemen Download';
        $data['downloads'] = $this->download_model->get_all();
        $this->render_admin('admin/downloads/index', $data);
    }

    public function tambah() {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('judul', 'Judul', 'required|trim');

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './assets/uploads/downloads/';
                $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|zip|rar';
                $config['max_size'] = 10240; // 10MB
                $config['file_name'] = 'file_' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $upload_data = $this->upload->data();
                    $file_size = $this->format_size_units($upload_data['file_size'] * 1024);
                    
                    $data = [
                        'judul' => $this->input->post('judul'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'file' => $upload_data['file_name'],
                        'kategori' => $this->input->post('kategori'),
                        'ukuran' => $file_size
                    ];

                    if ($this->download_model->insert($data)) {
                        $this->session->set_flashdata('success', 'File berhasil ditambahkan');
                        redirect('admin/downloads');
                    }
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                }
            }
        }

        $data['title'] = 'Tambah File Download';
        $this->render_admin('admin/downloads/form', $data);
    }

    public function edit($id) {
        $download = $this->download_model->get_by_id($id);
        if (!$download) {
            show_404();
        }

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('judul', 'Judul', 'required|trim');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'judul' => $this->input->post('judul'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'kategori' => $this->input->post('kategori')
                ];

                if (!empty($_FILES['file']['name'])) {
                    $config['upload_path'] = './assets/uploads/downloads/';
                    $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|zip|rar';
                    $config['max_size'] = 10240; // 10MB
                    $config['file_name'] = 'file_' . time();

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('file')) {
                        if (file_exists('./assets/uploads/downloads/' . $download->file)) {
                            unlink('./assets/uploads/downloads/' . $download->file);
                        }
                        
                        $upload_data = $this->upload->data();
                        $file_size = $this->format_size_units($upload_data['file_size'] * 1024);
                        $data['file'] = $upload_data['file_name'];
                        $data['ukuran'] = $file_size;
                    }
                }

                if ($this->download_model->update($id, $data)) {
                    $this->session->set_flashdata('success', 'File berhasil diupdate');
                    redirect('admin/downloads');
                }
            }
        }

        $data['title'] = 'Edit File Download';
        $data['download'] = $download;
        $this->render_admin('admin/downloads/form', $data);
    }

    public function hapus($id) {
        $download = $this->download_model->get_by_id($id);
        if ($download) {
            if (file_exists('./assets/uploads/downloads/' . $download->file)) {
                unlink('./assets/uploads/downloads/' . $download->file);
            }
            
            if ($this->download_model->delete($id)) {
                $this->session->set_flashdata('success', 'File berhasil dihapus');
            }
        }
        redirect('admin/downloads');
    }

    private function format_size_units($bytes) {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}
