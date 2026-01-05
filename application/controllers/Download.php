<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('download_model');
    }

    public function index() {
        $data['title'] = 'Download';
        
        // Pagination
        $config['base_url'] = base_url('download/index');
        $config['total_rows'] = $this->download_model->count_all();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['downloads'] = $this->download_model->get_all($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        
        $this->render_public('public/download/index', $data);
    }

    public function file($id) {
        $download = $this->download_model->get_by_id($id);
        
        if (!$download) {
            show_404();
        }
        
        // Increment download count
        $this->download_model->increment_downloads($id);
        
        // Force download
        $file_path = FCPATH . 'assets/uploads/downloads/' . $download->file;
        
        if (file_exists($file_path)) {
            $this->load->helper('download');
            force_download($file_path, NULL);
        } else {
            show_404();
        }
    }
}
