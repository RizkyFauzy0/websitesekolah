<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download_model extends CI_Model {

    private $table = 'downloads';

    public function __construct() {
        parent::__construct();
    }

    public function get_all($limit = null, $offset = null) {
        $this->db->order_by('created_at', 'DESC');
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

    public function increment_downloads($id) {
        $this->db->set('downloads_count', 'downloads_count+1', FALSE);
        $this->db->where('id', $id);
        return $this->db->update($this->table);
    }

    public function count_all() {
        return $this->db->count_all($this->table);
    }
}
