<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_stats_model extends CI_Model {

    private $table = 'siswa_stats';

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function get_total_siswa() {
        $this->db->select_sum('jumlah');
        $result = $this->db->get($this->table)->row();
        return $result ? $result->jumlah : 0;
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}
