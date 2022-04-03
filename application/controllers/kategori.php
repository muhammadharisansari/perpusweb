<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori extends CI_Controller
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
        $data['kat'] = $this->buku_model->get_kat('kategori')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/navbar');
        $this->load->view('admin/kat_view', $data);
        $this->load->view('admin/footer');
    }

    public function tambah()
    {
        $data = array(
            'kategori_buku' => $this->input->post('kat')
        );
        $this->buku_model->insert_kat($data, 'kategori');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
       <b>Berhasil !!</b> data ditambah            
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
        redirect('kategori');
    }

    public function edit($id_kategori)
    {
        $data = array(
            'kategori_buku' => $this->input->post('kat')
        );

        $this->buku_model->update_kat($id_kategori, $data, 'kategori');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
       <b>Berhasil !!</b> data dirubah            
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
        redirect('kategori');
    }

    public function hapus($id_kategori)
    {
        $this->buku_model->hapus($id_kategori, 'kategori');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
       <b>Berhasil !!</b> data dihapus            
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
        redirect('kategori');
    }
}
