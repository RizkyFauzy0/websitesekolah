<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link_aplikasi extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('link_aplikasi_model');
    }

    public function index() {
        $data['title'] = 'Link Aplikasi';
        $data['links'] = $this->link_aplikasi_model->get_all(1); // Get active links
        
        $this->render_public('public/link_aplikasi/index', $data);
    }
}
