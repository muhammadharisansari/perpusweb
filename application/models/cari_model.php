<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cari_model extends CI_Model
{
    public function cari($hasil)
    {
        $this->db->like('judul', $hasil);
        $this->db->or_like('isbn', $hasil);
        $this->db->or_like('kategori', $hasil);
        return $this->db->get('buku');
    }

    public function detail($isbn)
    {
        $this->db->where('isbn', $isbn);
        return $this->db->get('buku');
    }
}
