<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


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

        // date_default_timezone_set('Asia/Singapore'); sudah diatur di config.php
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

    public function deleteAll()
    {
        $pilih = $this->input->post('dipilih');
        if ($pilih == NULL) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning fade show " role="alert">
            <strong>Tidak ada data yang dipilih</strong>
                    </div>');
            redirect('peminjam');
        }

        for ($i = 0; $i < sizeof($pilih); $i++) {
            $this->db->where('id', $pilih[$i])->delete('peminjam');
        }
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
            <strong>Data berhasil dihapus</strong>
                    </div>');
        redirect('peminjam');
    }

    public function importExcel()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/navbar');
        $this->load->view('admin/i_excel_peminjam_view');
        $this->load->view('admin/footer');
    }

    public function dExcelFile()
    {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Format data peminjam baru.xlsx"');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'NAMA');
        $sheet->setCellValue('B1', 'STATUS');
        $sheet->setCellValue('C1', 'KETERANGAN');

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    public function uploadFileExcel()
    {
        $file       = $_FILES['file']['name'];
        $extension  = pathinfo($file, PATHINFO_EXTENSION);
        if ($extension == 'csv') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        }
        if ($extension == 'xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet    = $reader->load($_FILES['file']['tmp_name']);
        $sheetdata      = $spreadsheet->getActiveSheet()->toArray();
        $sheetcount     = count($sheetdata);
        if ($sheetcount > 1) {
            $data = [];
            for ($i = 1; $i < $sheetcount; $i++) {
                $nama           = $sheetdata[$i][0];
                $status         = $sheetdata[$i][1];
                $ket            = $sheetdata[$i][2];
                $data[] = array(
                    'nama'              => $nama,
                    'status'            => $status,
                    'ket'               => $ket
                );
            }
            $cek = $this->peminjam_model->insert_batch($data);
            if ($cek) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
            <strong>Data berhasil diimport</strong>
                    </div>');
                redirect('peminjam');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger fade show " role="alert">
            <strong>Data gagal diimport</strong>
                    </div>');
                redirect('peminjam');
            }
        }
    }

    public function exportDataExcel()
    {
        //fetch data
        $listPeminjam = $this->peminjam_model->list_peminjam();
        // foreach ($listPeminjam as $p) {
        //     echo $p->nama .
        //         '<br>';
        //     echo $p->status .
        //         '<br>';
        //     echo $p->total_dipinjam .
        //         '<br>';
        //     echo $p->ket . '<br>';
        // }
        // exit();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data peminjam perpus.xlsx"');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'NAMA');
        $sheet->setCellValue('B1', 'STATUS');
        $sheet->setCellValue('C1', 'TOTAL DIPINJAM');
        $sheet->setCellValue('D1', 'KETERANGAN');

        $row = 2;
        foreach ($listPeminjam as $p) {
            $sheet->setCellValue('A' . $row, $p->nama);
            $sheet->setCellValue('B' . $row, $p->status);
            $sheet->setCellValue('C' . $row, $p->total_dipinjam);
            $sheet->setCellValue('D' . $row, $p->ket);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }
}
