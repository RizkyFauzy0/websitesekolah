<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function login() {
        // If already logged in, redirect to dashboard
        if ($this->session->userdata('logged_in')) {
            redirect('admin/dashboard');
        }

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == TRUE) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $user = $this->user_model->get_by_username($username);

                if ($user && password_verify($password, $user->password)) {
                    // Set session
                    $session_data = [
                        'logged_in' => TRUE,
                        'user_data' => [
                            'id' => $user->id,
                            'username' => $user->username,
                            'nama_lengkap' => $user->nama_lengkap,
                            'email' => $user->email
                        ]
                    ];
                    $this->session->set_userdata($session_data);

                    $this->session->set_flashdata('success', 'Login berhasil! Selamat datang ' . $user->nama_lengkap);
                    redirect('admin/dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Username atau password salah!');
                }
            }
        }

        $this->load->view('admin/auth/login');
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_data');
        $this->session->set_flashdata('success', 'Anda telah logout');
        redirect('admin/login');
    }
}
