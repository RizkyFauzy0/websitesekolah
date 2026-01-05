<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_stats extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('siswa_stats_model');
    }

    public function index() {
        $data['title'] = 'Statistik Siswa';
        $data['siswa_stats'] = $this->siswa_stats_model->get_all();
        $data['total_siswa'] = $this->siswa_stats_model->get_total_siswa();
        $this->render_admin('admin/siswa_stats/index', $data);
    }

    public function tambah() {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
            $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
            $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|trim');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'kelas' => $this->input->post('kelas'),
                    'jumlah' => $this->input->post('jumlah'),
                    'tahun_ajaran' => $this->input->post('tahun_ajaran')
                ];

                if ($this->siswa_stats_model->insert($data)) {
                    $this->session->set_flashdata('success', 'Data statistik siswa berhasil ditambahkan');
                    redirect('admin/siswa_stats');
                }
            }
        }

        $data['title'] = 'Tambah Statistik Siswa';
        $this->render_admin('admin/siswa_stats/form', $data);
    }

    public function edit($id) {
        $siswa = $this->siswa_stats_model->get_by_id($id);
        if (!$siswa) {
            show_404();
        }

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
            $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
            $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|trim');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'kelas' => $this->input->post('kelas'),
                    'jumlah' => $this->input->post('jumlah'),
                    'tahun_ajaran' => $this->input->post('tahun_ajaran')
                ];

                if ($this->siswa_stats_model->update($id, $data)) {
                    $this->session->set_flashdata('success', 'Data statistik siswa berhasil diupdate');
                    redirect('admin/siswa_stats');
                }
            }
        }

        $data['title'] = 'Edit Statistik Siswa';
        $data['siswa'] = $siswa;
        $this->render_admin('admin/siswa_stats/form', $data);
    }

    public function hapus($id) {
        if ($this->siswa_stats_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data statistik siswa berhasil dihapus');
        }
        redirect('admin/siswa_stats');
    }
}
