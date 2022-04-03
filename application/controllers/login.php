<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{

    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/login_view');
        $this->load->view('admin/footer');
    }

    public function cek()
    {
        $user = $this->input->post('user');
        $pass = md5($this->input->post('pass'));

        $cek = $this->login_model->cek($user, $pass);
        if ($cek->num_rows() == 1) {
            foreach ($cek->result() as $ck) {
                $sess_data['username']         = $ck->username;

                $this->session->set_userdata($sess_data);
            }
            redirect('admin');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-danger fade show" role="alert">
                  Username atau password salah.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button>
                </div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
