<?php
defined('BASEPATH') or exit('No direct script access allowed');

class peminjam extends CI_Controller
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
        $data['peminjam'] = $this->peminjam_model->get('peminjam')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/navbar');
        $this->load->view('admin/peminjam_view', $data);
        $this->load->view('admin/footer');
    }

    public function tambah()
    {
        $data = array(
            'nama'      => $this->input->post('peminjam'),
            'status'    => $this->input->post('status'),
            'ket'       => $this->input->post('ket'),
        );
        $this->peminjam_model->tambah($data, 'peminjam');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
        <b>Berhasil!!</b> data ditambah
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
        redirect('peminjam');
    }

    public function edit($id)
    {
        $data = array(
            'nama'      => $this->input->post('nama'),
            'status'    => $this->input->post('status'),
            'ket'       => $this->input->post('ket'),
        );
        $this->peminjam_model->edit($id, $data, 'peminjam');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
        <b>Berhasil!!</b> data ditambah
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
        redirect('peminjam');
    }

    public function hapus($id)
    {
        $this->peminjam_model->hapus($id, 'peminjam');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
        <b>Berhasil!!</b> data dihapus
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
        redirect('peminjam');
    }

    public function transaksi($id)
    {
        $data['buku']       = $this->transaksi_model->get_buku()->result();
        $data['peminjaman'] = $this->transaksi_model->get_peminjaman($id, 'peminjaman')->result();
        $data['peminjam']   = $this->transaksi_model->get_peminjam($id, 'peminjam')->result();

        $this->load->view('admin/header');
        $this->load->view('admin/navbar');
        $this->load->view('admin/tx_view', $data);
        $this->load->view('admin/footer');
    }

    public function aksi_tx($isbn, $id)
    {
        // pembuka update kuantitas buku
        $kurangi = $this->transaksi_model->ambil_buku($isbn, 'buku')->row();
        $kurangi = array(
            'kuantitas' => $kurangi->kuantitas
        );
        $jumlah = $kurangi['kuantitas'] - 1;
        if ($jumlah < 0) {
            $jumlah = 0;
        }
        $jumlah = array('kuantitas' => $jumlah);
        $this->transaksi_model->update_buku($isbn, $jumlah, 'buku');
        // penutup update kuantitas buku

        // pembuka update total dipinjam
        $tambahi = $this->transaksi_model->ambil_orang($id, 'peminjam')->row();
        $tambahi = array(
            'total' => $tambahi->total_dipinjam
        );
        $jumlah = $tambahi['total'] + 1;

        $jumlah = array('total_dipinjam' => $jumlah);
        $this->transaksi_model->update_pinjam($id, $jumlah, 'peminjam');
        // penutup update total dipinjam

        date_default_timezone_set('Asia/Singapore');
        $tanggal = date('d-m-Y / h:i:s a');
        //data buku
        $databuku = $this->transaksi_model->ambil_buku($isbn, 'buku')->row();
        $databuku = array(
            'judul' => $databuku->judul
        );
        $judul = $databuku['judul'];
        //data peminjam
        $datapeminjam = $this->transaksi_model->ambil_orang($id, 'peminjam')->row();
        $datapeminjam = array(
            'nama'      => $datapeminjam->nama,
            'status'    => $datapeminjam->status
        );
        $nama   = $datapeminjam['nama'];
        $status = $datapeminjam['status'];

        $data = array(
            'isbn'              => $isbn,
            'judul'             => $judul,
            'id_peminjam'       => $id,
            'nama_peminjam'     => $nama,
            'status_peminjam'   => $status,
            'tgl_pinjam'        => $tanggal
        );
        $this->transaksi_model->transaksi($data, 'peminjaman');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
        <b>Berhasil!!</b> data ditambah
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
        redirect('peminjam/transaksi/' . $id);
    }

    public function kembalikan($id_pinjam, $isbn, $id)
    {
        // pembuka update kuantitas buku
        $kurangi = $this->transaksi_model->ambil_buku($isbn, 'buku')->row();
        $kurangi = array(
            'kuantitas' => $kurangi->kuantitas
        );
        $jumlah = $kurangi['kuantitas'] + 1;
        if ($jumlah < 0) {
            $jumlah = 0;
        }
        $jumlah = array('kuantitas' => $jumlah);
        $this->transaksi_model->update_buku($isbn, $jumlah, 'buku');
        // penutup update kuantitas buku

        // pembuka update total dipinjam
        $tambahi = $this->transaksi_model->ambil_orang($id, 'peminjam')->row();
        $tambahi = array(
            'total' => $tambahi->total_dipinjam
        );
        $jumlah = $tambahi['total'] - 1;

        $jumlah = array('total_dipinjam' => $jumlah);
        $this->transaksi_model->update_pinjam($id, $jumlah, 'peminjam');
        // penutup update total dipinjam

        $this->transaksi_model->kembalikan($id_pinjam, 'peminjaman');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
        <b>Berhasil!!</b> buku dikembalikan
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
        redirect('peminjam/transaksi/' . $id);
    }
}
