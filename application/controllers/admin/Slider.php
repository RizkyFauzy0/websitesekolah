<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('slider_model');
    }

    public function index() {
        $data['title'] = 'Manajemen Slider';
        $data['sliders'] = $this->slider_model->get_all();
        $this->render_admin('admin/slider/index', $data);
    }

    public function tambah() {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('judul', 'Judul', 'trim');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim');
            $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './assets/uploads/slider/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;
                $config['file_name'] = 'slider_' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $upload_data = $this->upload->data();
                    
                    $data = [
                        'judul' => $this->input->post('judul'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'gambar' => $upload_data['file_name'],
                        'urutan' => $this->input->post('urutan'),
                        'is_active' => $this->input->post('is_active') ? 1 : 0
                    ];

                    if ($this->slider_model->insert($data)) {
                        $this->session->set_flashdata('success', 'Slider berhasil ditambahkan');
                        redirect('admin/slider');
                    }
                } else {
                    $data['error'] = $this->upload->display_errors();
                }
            }
        }

        $data['title'] = 'Tambah Slider';
        $this->render_admin('admin/slider/form', $data);
    }

    public function edit($id) {
        $slider = $this->slider_model->get_by_id($id);
        if (!$slider) {
            show_404();
        }

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('judul', 'Judul', 'trim');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim');
            $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'judul' => $this->input->post('judul'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'urutan' => $this->input->post('urutan'),
                    'is_active' => $this->input->post('is_active') ? 1 : 0
                ];

                // Handle image upload if new image is provided
                if (!empty($_FILES['gambar']['name'])) {
                    $config['upload_path'] = './assets/uploads/slider/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2048;
                    $config['file_name'] = 'slider_' . time();

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {
                        // Delete old image
                        if (file_exists('./assets/uploads/slider/' . $slider->gambar)) {
                            unlink('./assets/uploads/slider/' . $slider->gambar);
                        }
                        
                        $upload_data = $this->upload->data();
                        $data['gambar'] = $upload_data['file_name'];
                    }
                }

                if ($this->slider_model->update($id, $data)) {
                    $this->session->set_flashdata('success', 'Slider berhasil diupdate');
                    redirect('admin/slider');
                }
            }
        }

        $data['title'] = 'Edit Slider';
        $data['slider'] = $slider;
        $this->render_admin('admin/slider/form', $data);
    }

    public function hapus($id) {
        $slider = $this->slider_model->get_by_id($id);
        if ($slider) {
            // Delete image file
            if (file_exists('./assets/uploads/slider/' . $slider->gambar)) {
                unlink('./assets/uploads/slider/' . $slider->gambar);
            }
            
            if ($this->slider_model->delete($id)) {
                $this->session->set_flashdata('success', 'Slider berhasil dihapus');
            }
        }
        redirect('admin/slider');
    }
}
