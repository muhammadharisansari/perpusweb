<?php
defined('BASEPATH') or exit('No direct script access allowed');

class peminjam_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('peminjam');
    }

    public function tambah($data)
    {
        $this->db->insert('peminjam', $data);
    }

    public function edit($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('peminjam', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('peminjam');
    }

    public function insert_batch($data)
    {
        $this->db->insert_batch('peminjam', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function list_peminjam()
    {
        $this->db->select('*');
        $this->db->from('peminjam');
        $query = $this->db->get();
        return $query->result();
    }
}
