<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('slider_model');
        $this->load->model('berita_model');
        $this->load->model('guru_model');
        $this->load->model('siswa_stats_model');
    }

    public function index() {
        $data['title'] = 'Beranda';
        $data['sliders'] = $this->slider_model->get_all(1); // Get active sliders
        $data['latest_news'] = $this->berita_model->get_all(1, 6); // Get 6 latest published news
        $data['guru'] = $this->guru_model->get_all(1); // Get active teachers
        $data['total_siswa'] = $this->siswa_stats_model->get_total_siswa();
        
        $this->render_public('public/home', $data);
    }
}
