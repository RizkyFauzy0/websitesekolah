<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('prestasi_model');
    }

    public function siswa() {
        $data['title'] = 'Prestasi Siswa';
        $data['jenis'] = 'siswa';
        
        // Pagination
        $config['base_url'] = base_url('prestasi/siswa');
        $config['total_rows'] = $this->prestasi_model->count_all('siswa');
        $config['per_page'] = 9;
        $config['uri_segment'] = 3;
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['prestasi'] = $this->prestasi_model->get_all('siswa', $config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        
        $this->render_public('public/prestasi/index', $data);
    }

    public function guru() {
        $data['title'] = 'Prestasi Guru';
        $data['jenis'] = 'guru';
        
        // Pagination
        $config['base_url'] = base_url('prestasi/guru');
        $config['total_rows'] = $this->prestasi_model->count_all('guru');
        $config['per_page'] = 9;
        $config['uri_segment'] = 3;
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['prestasi'] = $this->prestasi_model->get_all('guru', $config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        
        $this->render_public('public/prestasi/index', $data);
    }

    public function sekolah() {
        $data['title'] = 'Prestasi Sekolah';
        $data['jenis'] = 'sekolah';
        
        // Pagination
        $config['base_url'] = base_url('prestasi/sekolah');
        $config['total_rows'] = $this->prestasi_model->count_all('sekolah');
        $config['per_page'] = 9;
        $config['uri_segment'] = 3;
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['prestasi'] = $this->prestasi_model->get_all('sekolah', $config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        
        $this->render_public('public/prestasi/index', $data);
    }
}
