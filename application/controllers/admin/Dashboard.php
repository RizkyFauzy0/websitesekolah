<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('slider_model');
        $this->load->model('berita_model');
        $this->load->model('guru_model');
        $this->load->model('siswa_stats_model');
        $this->load->model('galeri_foto_model');
        $this->load->model('galeri_video_model');
        $this->load->model('prestasi_model');
        $this->load->model('download_model');
    }

    public function index() {
        $data['title'] = 'Dashboard Admin';
        $data['total_slider'] = $this->slider_model->count_all();
        $data['total_berita'] = $this->berita_model->count_all();
        $data['total_guru'] = $this->guru_model->count_all();
        $data['total_siswa'] = $this->siswa_stats_model->get_total_siswa();
        $data['total_galeri_foto'] = $this->galeri_foto_model->count_all();
        $data['total_galeri_video'] = $this->galeri_video_model->count_all();
        $data['total_prestasi'] = $this->prestasi_model->count_all();
        $data['total_downloads'] = $this->download_model->count_all();
        
        $this->render_admin('admin/dashboard', $data);
    }
}
