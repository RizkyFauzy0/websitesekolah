<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('kontak_model');
    }

    public function index() {
        $data['title'] = 'Hubungi Kami';
        $data['kontak_info'] = $this->kontak_model->get();
        
        $this->render_public('public/kontak/index', $data);
    }
}
