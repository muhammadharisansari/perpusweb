<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-danger fade show " role="alert">
                      Mohon maaf, silahkan login terlebih dahulu
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
            redirect('login');
        }
    }

    public function index()
    {
        $buku = $this->admin_model->hitung_buku()->result();
        foreach ($buku as $b) {
            $data['buku'] = $b->total;
        }

        $data['buku_sedia'] = $this->admin_model->get_sedia()->result();
        $data['judul']      = $this->admin_model->hitung_judul()->num_rows();
        $data['pinjam']     = $this->admin_model->get_pinjam()->num_rows();
        $data['sedia']      = $data['buku'] - $data['pinjam'];
        $data['peminjaman'] = $this->admin_model->get_pinjam()->result();
        $data['peminjam']   = $this->admin_model->get_peminjam()->num_rows();

        $this->load->view('admin/header');
        $this->load->view('admin/navbar');
        $this->load->view('admin/dash', $data);
        $this->load->view('admin/footer');
    }
}
