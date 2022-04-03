<?php
defined('BASEPATH') or exit('No direct script access allowed');

class buku extends CI_Controller
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
        $data['buku'] = $this->buku_model->get('buku')->result();
        $data['kat']  = $this->buku_model->get_kat('kategori')->result();
        $data['rak']  = $this->buku_model->get_rak('rak')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/navbar');
        $this->load->view('admin/buku_view', $data);
        $this->load->view('admin/footer');
    }

    public function tambah_buku()
    {
        $data['kat']  = $this->buku_model->get_kat('kategori')->result();
        $data['rak']  = $this->buku_model->get_rak('rak')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/navbar');
        $this->load->view('admin/tambah_buku_view', $data);
        $this->load->view('admin/footer');
    }

    public function tambah_aksi()
    {
        if ($this->input->post('kategori') != NULL || $this->input->post('isbn') != NULL || $this->input->post('lokasi') != NULL) {

            $image = $this->input->post('image');
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = base64_decode($image, true);
            $filename = 'image_' . time() . '.jpeg';
            file_put_contents(FCPATH . '/assets/front/img/gallery/' . $filename, $image);

            $data = array(
                'isbn'          => $this->input->post('isbn'),
                'judul'         => $this->input->post('judul'),
                'penerbit'      => $this->input->post('penerbit'),
                'tahun_terbit'  => $this->input->post('tahun'),
                'kategori'      => $this->input->post('kategori'),
                'kuantitas'     => $this->input->post('kuantitas'),
                'lokasi'        => $this->input->post('lokasi'),
                'gambar'        => $filename,
            );
        }

        $res = $this->buku_model->insert($data);
        echo json_encode($res);
    }

    public function hapus($isbn)
    {
        $gambar = $this->input->post('gambar');
        $hapus = 'assets/front/img/gallery/' . $gambar;
        if (file_exists($hapus)) {
            unlink($hapus);
        }

        $this->buku_model->delete($isbn, 'buku');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
            <b>Berhasil !!</b> data dihapus
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
        redirect('buku');
    }

    public function detail($isbn)
    {
        $this->buku_model->detail($isbn, 'buku');
    }

    public function edit($isbn)
    {
        $kat    = $this->input->post('kat');
        $foto   = $_FILES['sampul'];

        if ($kat == NULL) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning fade show " role="alert">
            <b>GAGAL MENYIMPAN !!</b> Pilih kategori sebelum menyimpan
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
            redirect('buku');
        } else {

            if ($foto) {

                $config['upload_path']      = './assets/front/img/gallery';
                $config['allowed_types']    = 'jpg|png';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('sampul')) {
                    $gambar = $this->input->post('gambar');
                    $hapus = 'assets/front/img/gallery/' . $gambar;
                    if (file_exists($hapus)) {
                        unlink($hapus);
                    }
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('gambar', $userfile);
                } else {
                    echo 'gagal upload';
                }
            }

            $data = array(
                'judul'         => $this->input->post('judul'),
                'penerbit'      => $this->input->post('penerbit'),
                'tahun_terbit'  => $this->input->post('tahun'),
                'kategori'      => $this->input->post('kat'),
                'kuantitas'     => $this->input->post('kuantitas'),
                'lokasi'        => $this->input->post('lokasi')
            );
            // var_dump($data, $foto);
            // die();
            $this->buku_model->update($isbn, $data, 'buku');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success fade show " role="alert">
            <b>Berhasil !!</b> data diedit
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      </button>
                    </div>');
            redirect('buku');
        }
    }

    public function edit_capture($isbn)
    {
        $data['isbn'] = $this->buku_model->detail($isbn, 'buku')->result();
        $data['kat']  = $this->buku_model->get_kat('kategori')->result();
        $data['rak']  = $this->buku_model->get_rak('rak')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/navbar');
        $this->load->view('admin/edit_capture_view', $data);
        $this->load->view('admin/footer');
    }

    public function edit_capture_aksi()
    {
        if ($this->input->post('kategori') != NULL || $this->input->post('isbn') != NULL || $this->input->post('lokasi') != NULL) {

            $galama = $this->input->post('galama');
            $hapus = 'assets/front/img/gallery/' . $galama;
            if (file_exists($hapus)) {
                unlink($hapus);
            }

            $image = $this->input->post('image');
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = base64_decode($image, true);
            $filename = 'image_' . time() . '.jpeg';
            file_put_contents(FCPATH . '/assets/front/img/gallery/' . $filename, $image);

            $isbn = $this->input->post('isbn');
            $data = array(
                'judul'         => $this->input->post('judul'),
                'penerbit'      => $this->input->post('penerbit'),
                'tahun_terbit'  => $this->input->post('tahun'),
                'kategori'      => $this->input->post('kategori'),
                'kuantitas'     => $this->input->post('kuantitas'),
                'lokasi'        => $this->input->post('lokasi'),
                'gambar'        => $filename,
            );
        }

        $res = $this->buku_model->update($isbn, $data);
        echo json_encode($res);
    }
}
