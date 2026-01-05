<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('berita_model');
    }

    public function index() {
        $data['title'] = 'Berita Sekolah';
        
        // Pagination
        $config['base_url'] = base_url('berita/index');
        $config['total_rows'] = $this->berita_model->count_all(1);
        $config['per_page'] = 9;
        $config['uri_segment'] = 3;
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['berita'] = $this->berita_model->get_all(1, $config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        
        $this->render_public('public/berita/index', $data);
    }

    public function detail($slug) {
        $berita = $this->berita_model->get_by_slug($slug);
        
        if (!$berita) {
            show_404();
        }
        
        // Increment views
        $this->berita_model->increment_views($berita->id);
        
        $data['title'] = $berita->judul;
        $data['berita'] = $berita;
        $data['recent_news'] = $this->berita_model->get_all(1, 5);
        
        $this->render_public('public/berita/detail', $data);
    }
}
