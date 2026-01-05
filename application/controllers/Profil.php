<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('profil_model');
    }

    public function visi_misi() {
        $data['title'] = 'Visi & Misi';
        $data['profil'] = $this->profil_model->get_by_jenis('visi_misi');
        $this->render_public('public/profil/view', $data);
    }

    public function sejarah() {
        $data['title'] = 'Sejarah Singkat';
        $data['profil'] = $this->profil_model->get_by_jenis('sejarah');
        $this->render_public('public/profil/view', $data);
    }

    public function struktur_organisasi() {
        $data['title'] = 'Struktur Organisasi';
        $data['profil'] = $this->profil_model->get_by_jenis('struktur_organisasi');
        $this->render_public('public/profil/view', $data);
    }

    public function keunggulan() {
        $data['title'] = 'Keunggulan';
        $data['profil'] = $this->profil_model->get_by_jenis('keunggulan');
        $this->render_public('public/profil/view', $data);
    }
}
