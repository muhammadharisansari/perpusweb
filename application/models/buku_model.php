<?php
defined('BASEPATH') or exit('No direct script access allowed');

class buku_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('buku');
    }

    public function insert($data)
    {
        $this->db->insert('buku', $data);
    }

    public function detail($isbn)
    {
        $this->db->where('isbn', $isbn);
        return $this->db->get('buku');
    }
    public function delete($isbn)
    {
        $this->db->where('isbn', $isbn);
        $this->db->delete('buku');
    }

    public function update($isbn, $data)
    {
        $this->db->where('isbn', $isbn);
        $this->db->update('buku', $data);
    }

    // Model kategori
    public function get_kat()
    {
        return $this->db->get('kategori');
    }

    public function insert_kat($data)
    {
        $this->db->insert('kategori', $data);
    }

    public function update_kat($id_kategori, $data)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }

    public function hapus($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }

    // Model rak
    public function get_rak()
    {
        return $this->db->get('rak');
    }

    public function insert_rak($data)
    {
        $this->db->insert('rak', $data);
    }

    public function update_rak($id_rak, $data)
    {
        $this->db->where('id_rak', $id_rak);
        $this->db->update('rak', $data);
    }

    public function hapus_rak($id_rak)
    {
        $this->db->where('id_rak', $id_rak);
        $this->db->delete('rak');
    }
}
