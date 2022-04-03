<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rak extends CI_Controller
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
        $data['rak'] = $this->buku_model->get_rak('kategori')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/navbar');
        $this->load->view('admin/rak_view', $data);
        $this->load->view('admin/footer');
    }

    public function tambah()
    {
        $data = array(
            'nomor_rak' => $this->input->post('rak')
        );
        $this->buku_model->insert_rak($data, 'rak');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
       <b>Berhasil !!</b> data ditambah            
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
        redirect('rak');
    }

    public function edit($id_rak)
    {
        $data = array(
            'nomor_rak' => $this->input->post('rak')
        );

        $this->buku_model->update_rak($id_rak, $data, 'rak');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
       <b>Berhasil !!</b> data dirubah            
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
        redirect('rak');
    }

    public function hapus($id_rak)
    {
        $this->buku_model->hapus_rak($id_rak, 'rak');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
       <b>Berhasil !!</b> data dihapus            
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
        redirect('rak');
    }
}
