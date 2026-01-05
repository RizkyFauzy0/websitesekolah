<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('galeri_foto_model');
        $this->load->model('galeri_video_model');
    }

    public function foto() {
        $data['title'] = 'Galeri Foto';
        
        // Pagination
        $config['base_url'] = base_url('galeri/foto');
        $config['total_rows'] = $this->galeri_foto_model->count_all();
        $config['per_page'] = 12;
        $config['uri_segment'] = 3;
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['galeri'] = $this->galeri_foto_model->get_all($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        
        $this->render_public('public/galeri/foto', $data);
    }

    public function video() {
        $data['title'] = 'Galeri Video';
        
        // Pagination
        $config['base_url'] = base_url('galeri/video');
        $config['total_rows'] = $this->galeri_video_model->count_all();
        $config['per_page'] = 12;
        $config['uri_segment'] = 3;
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['galeri'] = $this->galeri_video_model->get_all($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        
        $this->render_public('public/galeri/video', $data);
    }
}
