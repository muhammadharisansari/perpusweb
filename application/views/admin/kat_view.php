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
                                    <h3>Daftar Kategori</h3>
                                </div>
                                <div class="col-4">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-grd-info btn-round btn-block" data-toggle="modal" data-target="#exampleModal">
                                        Tambah Kategori
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="kat">
                                    <thead>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kat as $k) : ?>
                                            <tr>
                                                <td><?= $k->kategori_buku; ?></td>
                                                <td>
                                                    <div class="dropdown-info dropdown open">
                                                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Pilih</button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                            <a class="dropdown-item waves-light waves-effect" href="#" data-toggle="modal" data-target="#edit<?= $k->id_kategori ?>">Edit</a>
                                                            <a class="dropdown-item waves-light waves-effect text-danger" href="<?= base_url() . 'kategori/hapus/' . $k->id_kategori ?>">Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kategori/tambah') ?>" method="post" enctype="application/x-www-form-urlencoded">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kategori baru</label>
                        <div class="col-sm-9">
                            <input type="text" name="kat" class="form-control form-control-uppercase" required>
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
<?php foreach ($kat as $k) : ?>
    <div class="modal fade" id="edit<?= $k->id_kategori; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('kategori/edit/' . $k->id_kategori) ?>" method="post" enctype="application/x-www-form-urlencoded">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <input type="text" name="kat" value="<?= $k->kategori_buku; ?>" class="form-control form-control-uppercase" required>
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
        $('#kat').DataTable({
            "searching": true,
            "paging": true,
            // "order": [
            //     [0, "DESC"]
            // ]
        });
    });
</script>