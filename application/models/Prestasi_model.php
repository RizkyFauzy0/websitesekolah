<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi_model extends CI_Model {

    private $table = 'prestasi';

    public function __construct() {
        parent::__construct();
    }

    public function get_all($jenis = null, $limit = null, $offset = null) {
        if ($jenis !== null) {
            $this->db->where('jenis', $jenis);
        }
        $this->db->order_by('tanggal', 'DESC');
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
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

    public function count_all($jenis = null) {
        if ($jenis !== null) {
            $this->db->where('jenis', $jenis);
        }
        return $this->db->count_all_results($this->table);
    }
}
