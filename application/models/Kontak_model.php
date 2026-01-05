<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {

    private $table = 'kontak';

    public function __construct() {
        parent::__construct();
    }

    public function get() {
        return $this->db->get($this->table)->row();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
}
