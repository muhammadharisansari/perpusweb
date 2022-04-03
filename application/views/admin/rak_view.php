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
                                    <h3>Daftar Rak</h3>
                                </div>
                                <div class="col-4">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-grd-info btn-round btn-block" data-toggle="modal" data-target="#exampleModal">
                                        Tambah Rak
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="rak">
                                    <thead>
                                        <tr>
                                            <th>Lokasi Rak</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rak as $r) : ?>
                                            <tr>
                                                <td><b><?= $r->nomor_rak; ?></b> <small>(lemari/rak)</small></td>
                                                <td>
                                                    <div class="dropdown-info dropdown open">
                                                        <button class="btn btn-info dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Pilih</button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                            <a class="dropdown-item waves-light waves-effect" href="#" data-toggle="modal" data-target="#edit<?= $r->id_rak ?>">Edit</a>
                                                            <a class="dropdown-item waves-light waves-effect text-danger" href="<?= base_url() . 'rak/hapus/' . $r->id_rak ?>">Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Lokasi Rak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('rak/tambah') ?>" method="post" enctype="application/x-www-form-urlencoded">
                <div class="modal-body">

                    <div class="alert alert-warning fade show " role="alert">
                        <ol>
                            <li>Format penulisan lokasi rak adalah = nama lemari / nomor rak</li>
                            <li>Contoh <b>A1</b> = lemari <b>A</b>, rak nomor <b>1</b></li>
                        </ol>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        </button>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Lokasi rak baru :</label>
                        <div class="col-sm-8">
                            <input type="text" name="rak" class="form-control form-control-uppercase" required>
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
<?php foreach ($rak as $r) : ?>
    <div class="modal fade" id="edit<?= $r->id_rak; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Rak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('rak/edit/' . $r->id_rak) ?>" method="post" enctype="application/x-www-form-urlencoded">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Lokasi rak</label>
                            <div class="col-sm-9">
                                <input type="text" name="rak" value="<?= $r->nomor_rak; ?>" class="form-control form-control-uppercase" required>
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
        $('#rak').DataTable({
            "searching": true,
            "paging": true,
            // "order": [
            //     [0, "DESC"]
            // ]
        });
    });
</script>