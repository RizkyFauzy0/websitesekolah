<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
}

class Admin_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
    }

    protected function render_admin($view, $data = []) {
        $data['user'] = $this->session->userdata('user_data');
        $this->load->view('admin/layouts/header', $data);
        $this->load->view('admin/layouts/sidebar', $data);
        $this->load->view($view, $data);
        $this->load->view('admin/layouts/footer', $data);
    }
}

class Public_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('settings_model');
        $this->load->model('kontak_model');
    }

    protected function render_public($view, $data = []) {
        $data['settings'] = $this->settings_model->get();
        $data['kontak'] = $this->kontak_model->get();
        $this->load->view('public/layouts/header', $data);
        $this->load->view($view, $data);
        $this->load->view('public/layouts/footer', $data);
    }
}
