<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

    private $table = 'profil';

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function get_by_jenis($jenis) {
        return $this->db->get_where($this->table, ['jenis' => $jenis])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($jenis, $data) {
        $this->db->where('jenis', $jenis);
        return $this->db->update($this->table, $data);
    }
}
