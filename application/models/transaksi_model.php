<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi_model extends CI_Model
{
    public function get_buku()
    {
        return $this->db->get('buku');
    }

    public function ambil_buku($isbn)
    {
        $this->db->where('isbn', $isbn);
        return $this->db->get('buku');
    }

    public function update_buku($isbn, $jumlah)
    {
        $this->db->where('isbn', $isbn);
        $this->db->update('buku', $jumlah);
    }

    public function get_peminjam($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('peminjam');
    }

    public function get_peminjaman($id)
    {
        $this->db->where('id_peminjam', $id);
        return $this->db->get('peminjaman');
    }

    public function transaksi($data)
    {
        $this->db->insert('peminjaman', $data);
    }

    public function ambil_orang($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('peminjam');
    }

    public function update_pinjam($id, $jumlah)
    {
        $this->db->where('id', $id);
        return $this->db->update('peminjam', $jumlah);
    }

    public function kembalikan($id_pinjam)
    {
        $this->db->where('id_pinjam', $id_pinjam);
        return $this->db->delete('peminjaman');
    }
}
