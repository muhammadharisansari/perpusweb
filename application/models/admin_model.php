<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
    public function pw($lama)
    {
        $this->db->where('password', $lama);
        return $this->db->get('admin');
    }

    public function update($where, $data) //update password
    {
        $this->db->where('id', $where);
        $this->db->update('admin', $data);
    }

    public function get_pinjam()
    {
        return $this->db->get('peminjaman');
    }

    public function get_peminjam()
    {
        return $this->db->get('peminjam');
    }

    public function hitung_judul()
    {
        return $this->db->get('buku');
    }

    public function hitung_buku()
    {
        $this->db->select_sum('kuantitas', 'total');
        return $this->db->get('buku');
    }

    public function get_sedia()
    {
        $this->db->where('kuantitas != 0');
        return $this->db->get('buku');
    }
}
