<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="col-sm-12">
                    <div class="mt-2 mb-2">
                        <?php echo $this->session->flashdata('pesan') ?>
                    </div>
                    <!-- Basic Form Inputs card start -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row  justify-content-center ">
                                <div class="col-8">
                                    <h3>Daftar Buku</h3>
                                </div>
                                <div class="col-4">
                                    <!-- tmbol tambah buku -->
                                    <a href="buku/tambah_buku" class="btn btn-grd-info btn-round btn-block">
                                        Tambah buku
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="buku">
                                    <thead>
                                        <tr>
                                            <th hidden>ISBN</th>
                                            <th>Lokasi</th>
                                            <th>Sampul</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Terbit</th>
                                            <th>Penerbit</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($buku as $b) : ?>
                                            <tr>
                                                <td hidden><?= $b->isbn; ?></td>
                                                <td><?= $b->lokasi; ?></td>
                                                <td><img width="50%" src="<?= base_url() . 'assets/front/img/gallery/' . $b->gambar; ?>" alt=""> </td>
                                                <td><?= $b->judul; ?></td>
                                                <td><?= $b->kategori; ?></td>
                                                <td><?= $b->tahun_terbit; ?></td>
                                                <td><?= $b->penerbit; ?></td>
                                                <td>
                                                    <?php if ($b->kuantitas < 1) { ?>
                                                        <p class="text-danger">Kosong</p>
                                                    <?php } else { ?>
                                                        <p class="text-success">Tersedia</p>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown-info dropdown open">
                                                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Pilih</button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                                                            <a class="dropdown-item waves-light waves-effect text-success" href="" data-toggle="modal" data-target="#detail<?= $b->isbn ?>">Detail</a>

                                                            <a class="dropdown-item waves-light waves-effect text-primary" href="" data-toggle="modal" data-target="#edit<?= $b->isbn ?>">Edit</a>

                                                            <a class="dropdown-item waves-light waves-effect text-danger" href="#" data-toggle="modal" data-target="#hapus<?= $b->isbn ?>">Hapus</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Basic Form Inputs card end -->

            </div>
        </div>
    </div>
    <!-- Page body end -->
</div>

<!-- Modal detail-->
<?php foreach ($buku as $b) : ?>
    <div class="modal fade" id="detail<?= $b->isbn; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail data buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- buka row -->
                    <div class="row">
                        <div class="col-7">

                            <div class="row">
                                <div class="col-3 mb-2">
                                    <b> Kategori </b>
                                </div>
                                <div class="col-9">
                                    <?= $b->kategori; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 mb-2">
                                    <b> Judul </b>
                                </div>
                                <div class="col-9">
                                    <?= $b->judul; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 mb-2">
                                    <b> ISBN </b>
                                </div>
                                <div class="col-9">
                                    <?= $b->isbn; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 mb-2">
                                    <b> Penerbit </b>
                                </div>
                                <div class="col-9">
                                    <?= $b->penerbit; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 mb-2">
                                    <b> Tahun terbit </b>
                                </div>
                                <div class="col-9">
                                    <?= $b->tahun_terbit; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 mb-2">
                                    <b> Kuantitas </b>
                                </div>
                                <div class="col-9">
                                    <?= $b->kuantitas; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 mb-2">
                                    <b> Status </b>
                                </div>
                                <div class="col-9">
                                    <?php if ($b->kuantitas < 1) { ?>
                                        <p class="text-danger">Kosong</p>
                                    <?php } else { ?>
                                        <p class="text-success">Tersedia</p>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 mb-2">
                                    <b> Lokasi </b>
                                </div>
                                <div class="col-9">
                                    <?= $b->lokasi; ?>
                                </div>
                            </div>

                        </div>

                        <div class="col-5">
                            <img width="80%" src="<?= base_url() . 'assets/front/img/gallery/' . $b->gambar; ?>">
                        </div>
                        <!-- penutup row -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal edit-->
<?php foreach ($buku as $b) : ?>
    <div class="modal fade" id="edit<?= $b->isbn; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit data buku</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('buku/edit/' . $b->isbn) ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <input hidden type="text" value="<?= $b->gambar ?>" name="gambar">
                                        <select name="kat" class="form-control" required>
                                            <option hidden selected><?= $b->kategori; ?></option>
                                            <?php foreach ($kat as $k) : ?>
                                                <option value="<?= $k->kategori_buku; ?>"><?= $k->kategori_buku; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Judul buku</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="judul" class="form-control form-control-uppercase" value="<?= $b->judul; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">ISBN</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="isbn" class="form-control" value="<?= $b->isbn; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Penerbit</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="penerbit" class="form-control" value="<?= $b->penerbit; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tahun terbit</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="tahun" class="form-control" value="<?= $b->tahun_terbit; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kuantitas</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="kuantitas" class="form-control" value="<?= $b->kuantitas; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Lokasi</label>
                                    <div class="col-sm-9">
                                        <select name="lokasi" class="form-control" required>
                                            <option hidden selected><?= $b->lokasi; ?></option>
                                            <?php foreach ($rak as $r) : ?>
                                                <option value="<?= $r->nomor_rak; ?>"><?= $r->nomor_rak; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-warning">A1 = (lemari/rak)</small>
                                    </div>
                                </div>

                            </div>

                            <div class="col-5">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <img width="80%" src="<?= base_url() . 'assets/front/img/gallery/' . $b->gambar; ?>">
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <!-- <label class="col-sm-3 col-form-label">Sampul</label> -->
                                            <div class="col-sm-12">
                                                <input type="file" name="sampul" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a class="btn btn-primary" data-bs-toggle="modal" href="<?= base_url('buku/edit_capture/' . $b->isbn); ?>">Gunakan capture</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal hapus-->
<?php foreach ($buku as $b) : ?>
    <div class="modal fade" id="hapus<?= $b->isbn; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b> Hapus data buku</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() . 'buku/hapus/' . $b->isbn ?>" method="post" enctype="application/x-www-form-urlencoded">
                    <div class=" modal-body text-center">
                        <input type="text" hidden name="gambar" value="<?= $b->gambar; ?>">
                        <h5>Yakin ingin menghapus buku <?= $b->judul; ?> ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('buku/tambah') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <select name="kat" id="kat" class="form-control" required>
                                <option disabled selected>--pilih--</option>
                                <?php foreach ($kat as $k) : ?>
                                    <option value="<?= $k->kategori_buku; ?>"><?= $k->kategori_buku; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Judul buku</label>
                        <div class="col-sm-9">
                            <input type="text" name="judul" id="judul" class="form-control form-control-uppercase" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">ISBN</label>
                        <div class="col-sm-9">
                            <input type="number" name="isbn" id="isbn" class="form-control" required>
                            <small class="text-danger">*bersifat permanen, tidak bisa diedit</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Penerbit</label>
                        <div class="col-sm-9">
                            <input type="text" name="penerbit" id="penerbit" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tahun terbit</label>
                        <div class="col-sm-9">
                            <input type="number" name="tahun" id="tahun" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kuantitas</label>
                        <div class="col-sm-9">
                            <input type="number" name="kuantitas" id="kuantitas" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Sampul</label>
                        <div class="col-sm-9">
                            <input type="file" name="sampul" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Lokasi</label>
                        <div class="col-sm-9">
                            <select name="lokasi" id="lokasi" class="form-control" required>
                                <option disabled selected>--pilih--</option>
                                <?php foreach ($rak as $r) : ?>
                                    <option value="<?= $r->nomor_rak; ?>"><?= $r->nomor_rak; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-warning">1A1 = (lemari/bagian/rak) -> A(atas), T(tengah), B(bawah)</small>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-sm-9">
                            <div class="col" id="my_camera"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#buku').DataTable({
            "searching": true,
            "paging": true,
            "order": [
                [0, "DESC"]
            ]
        });
    });
</script>