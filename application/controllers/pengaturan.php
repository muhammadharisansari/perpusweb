<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengaturan extends CI_Controller
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
        $this->load->view('admin/header');
        $this->load->view('admin/navbar');
        $this->load->view('admin/set');
        $this->load->view('admin/footer');
    }

    public function ubah_pw()
    {
        $lama = md5($this->input->post('pwlama'));

        $cekadmin = $this->admin_model->pw($lama, 'admin')->row();
        $where  = array(
            'id'    => $cekadmin->id,
            'pass'  => $cekadmin->password
        );
        $pwlama = $where['pass'];
        $where = $where['id'];

        if ($lama == $pwlama) {
            $data = array(
                'password' => md5($this->input->post('pwbaru'))
            );

            $this->admin_model->update($where, $data, 'admin');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
                      Update berhasil
                    </div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger fade show " role="alert">
                      Update gagal
                    </div>');
        }

        redirect('pengaturan');
    }
}
