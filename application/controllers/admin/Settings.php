<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('settings_model');
    }

    public function index() {
        $settings = $this->settings_model->get();

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required|trim');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'nama_sekolah' => $this->input->post('nama_sekolah'),
                    'singkatan' => $this->input->post('singkatan'),
                    'tagline' => $this->input->post('tagline'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'meta_keywords' => $this->input->post('meta_keywords'),
                    'meta_description' => $this->input->post('meta_description')
                ];

                // Handle logo upload
                if (!empty($_FILES['logo']['name'])) {
                    $config['upload_path'] = './assets/uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 1024;
                    $config['file_name'] = 'logo_' . time();

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('logo')) {
                        if ($settings->logo && file_exists('./assets/uploads/' . $settings->logo)) {
                            unlink('./assets/uploads/' . $settings->logo);
                        }
                        
                        $upload_data = $this->upload->data();
                        $data['logo'] = $upload_data['file_name'];
                    }
                }

                // Handle favicon upload
                if (!empty($_FILES['favicon']['name'])) {
                    $config['upload_path'] = './assets/uploads/';
                    $config['allowed_types'] = 'ico|png|gif';
                    $config['max_size'] = 100;
                    $config['file_name'] = 'favicon_' . time();

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('favicon')) {
                        if ($settings->favicon && file_exists('./assets/uploads/' . $settings->favicon)) {
                            unlink('./assets/uploads/' . $settings->favicon);
                        }
                        
                        $upload_data = $this->upload->data();
                        $data['favicon'] = $upload_data['file_name'];
                    }
                }

                if ($this->settings_model->update($settings->id, $data)) {
                    $this->session->set_flashdata('success', 'Pengaturan website berhasil diupdate');
                    redirect('admin/settings');
                }
            }
        }

        $data['title'] = 'Pengaturan Website';
        $data['settings'] = $settings;
        $this->render_admin('admin/settings/form', $data);
    }
}
