<?php
defined('BASEPATH') or exit('No direct script access allowed');

class front extends CI_Controller
{

    public function index()
    {
        $this->load->view('template_front/header_front');
        $this->load->view('pencarian');
        $this->load->view('template_front/footer_front');
    }

    public function hasil()
    {
        $hasil = $this->input->post('cari');
        // var_dump($hasil);
        // die;
        $ada['ada'] = $this->cari_model->cari($hasil)->result();
        $this->load->view('template_front/header_front');
        $this->load->view('data_pencarian', $ada);
        $this->load->view('template_front/footer_front');
    }

    public function detail($isbn)
    {
        $data['data'] = $this->cari_model->detail($isbn)->result();

        $this->load->view('template_front/header_front');
        $this->load->view('detail', $data);
        $this->load->view('template_front/footer_front');
    }
}
