<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_video extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('galeri_video_model');
    }

    public function index() {
        $data['title'] = 'Manajemen Galeri Video';
        $data['galeri'] = $this->galeri_video_model->get_all();
        $this->render_admin('admin/galeri_video/index', $data);
    }

    public function tambah() {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
            $this->form_validation->set_rules('youtube_url', 'URL YouTube', 'required|trim');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

            if ($this->form_validation->run() == TRUE) {
                $youtube_url = $this->input->post('youtube_url');
                $youtube_id = $this->extract_youtube_id($youtube_url);

                if (!$youtube_id) {
                    $this->session->set_flashdata('error', 'URL YouTube tidak valid');
                    redirect('admin/galeri_video/tambah');
                }

                $data = [
                    'judul' => $this->input->post('judul'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'youtube_url' => $youtube_url,
                    'youtube_id' => $youtube_id,
                    'kategori' => $this->input->post('kategori'),
                    'tanggal' => $this->input->post('tanggal')
                ];

                if ($this->galeri_video_model->insert($data)) {
                    $this->session->set_flashdata('success', 'Video berhasil ditambahkan');
                    redirect('admin/galeri_video');
                }
            }
        }

        $data['title'] = 'Tambah Video';
        $this->render_admin('admin/galeri_video/form', $data);
    }

    public function edit($id) {
        $galeri = $this->galeri_video_model->get_by_id($id);
        if (!$galeri) {
            show_404();
        }

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
            $this->form_validation->set_rules('youtube_url', 'URL YouTube', 'required|trim');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

            if ($this->form_validation->run() == TRUE) {
                $youtube_url = $this->input->post('youtube_url');
                $youtube_id = $this->extract_youtube_id($youtube_url);

                if (!$youtube_id) {
                    $this->session->set_flashdata('error', 'URL YouTube tidak valid');
                    redirect('admin/galeri_video/edit/' . $id);
                }

                $data = [
                    'judul' => $this->input->post('judul'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'youtube_url' => $youtube_url,
                    'youtube_id' => $youtube_id,
                    'kategori' => $this->input->post('kategori'),
                    'tanggal' => $this->input->post('tanggal')
                ];

                if ($this->galeri_video_model->update($id, $data)) {
                    $this->session->set_flashdata('success', 'Video berhasil diupdate');
                    redirect('admin/galeri_video');
                }
            }
        }

        $data['title'] = 'Edit Video';
        $data['galeri'] = $galeri;
        $this->render_admin('admin/galeri_video/form', $data);
    }

    public function hapus($id) {
        if ($this->galeri_video_model->delete($id)) {
            $this->session->set_flashdata('success', 'Video berhasil dihapus');
        }
        redirect('admin/galeri_video');
    }

    private function extract_youtube_id($url) {
        // Extract YouTube ID from various URL formats
        $patterns = [
            '/youtube\.com\/watch\?v=([^\&\?\/]+)/',
            '/youtube\.com\/embed\/([^\&\?\/]+)/',
            '/youtu\.be\/([^\&\?\/]+)/',
            '/youtube\.com\/v\/([^\&\?\/]+)/'
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }

        return false;
    }
}
