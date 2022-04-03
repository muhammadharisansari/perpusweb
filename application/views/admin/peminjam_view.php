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
                                    <h3>Daftar Peminjam</h3>
                                </div>
                                <div class="col-4">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-grd-info btn-round btn-block" data-toggle="modal" data-target="#exampleModal">
                                        Tambah Peminjam
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="peminjam">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Total dipinjam</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($peminjam as $p) : ?>
                                            <tr>
                                                <td><?= $p->nama; ?></td>
                                                <td><?= $p->status; ?></td>
                                                <td><?= $p->ket; ?></td>
                                                <td><?= $p->total_dipinjam; ?></td>
                                                <td>
                                                    <div class="dropdown-info dropdown open">
                                                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Pilih</button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                            <a class="dropdown-item waves-light waves-effect" href="<?= base_url('peminjam/transaksi/' . $p->id); ?>">Peminjaman</a>
                                                            <a class="dropdown-item waves-light waves-effect" href="#" data-toggle="modal" data-target="#edit<?= $p->id ?>">Edit</a>

                                                            <?php if ($p->total_dipinjam == 0) { ?>
                                                                <a class="dropdown-item waves-light waves-effect text-danger" href="<?= base_url() . 'peminjam/hapus/' . $p->id ?>">Hapus</a>
                                                            <?php } else {  ?>
                                                                <a class="dropdown-item waves-light waves-effect btn btn-disabled btn-square disabled" href="<?= base_url() . 'peminjam/hapus/' . $p->id ?>">Hapus</a>
                                                            <?php } ?>
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



<!-- Modal tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peminjam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('peminjam/tambah') ?>" method="post" enctype="application/x-www-form-urlencoded">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama peminjam</label>
                        <div class="col-sm-9">
                            <input type="text" name="peminjam" class="form-control form-control-uppercase" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select name="status" class="form-control" required>
                                <option value="siswa">Siswa</option>
                                <option value="guru">Guru</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <input type="text" name="ket" class="form-control form-control-uppercase" required>
                            <small class="text-danger">kelas berapa / guru apa / lainnya</small>
                        </div>
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

<!-- Modal edit-->
<?php foreach ($peminjam as $p) : ?>
    <div class="modal fade" id="edit<?= $p->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit data peminjam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('peminjam/edit/' . $p->id) ?>" method="post" enctype="application/x-www-form-urlencoded">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" value="<?= $p->nama; ?>" class="form-control form-control-uppercase" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select name="status" class="form-control" required>
                                    <option class="text-success" hidden selected><?= $p->status; ?></option>
                                    <option value="siswa">Siswa</option>
                                    <option value="guru">Guru</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" name="ket" class="form-control form-control-uppercase" value="<?= $p->ket; ?>" required>
                                <small class="text-danger">kelas berapa / guru apa / lainnya</small>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#peminjam').DataTable({
            "searching": true,
            "paging": true,
            // "order": [
            //     [0, "DESC"]
            // ]
        });
    });
</script>