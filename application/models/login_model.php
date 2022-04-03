<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login_model extends CI_Model
{
    public function cek($user, $pass)
    {
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        return $this->db->get('admin');
    }
}
