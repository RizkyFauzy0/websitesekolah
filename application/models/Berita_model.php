<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

    private $table = 'berita';

    public function __construct() {
        parent::__construct();
    }

    public function get_all($is_published = null, $limit = null, $offset = null) {
        if ($is_published !== null) {
            $this->db->where('is_published', $is_published);
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

    public function get_by_slug($slug) {
        return $this->db->get_where($this->table, ['slug' => $slug])->row();
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

    public function count_all($is_published = null) {
        if ($is_published !== null) {
            $this->db->where('is_published', $is_published);
        }
        return $this->db->count_all_results($this->table);
    }

    public function increment_views($id) {
        $this->db->set('views', 'views+1', FALSE);
        $this->db->where('id', $id);
        return $this->db->update($this->table);
    }
}
