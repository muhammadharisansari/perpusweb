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
                            <h3>Pengaturan</h3>
                        </div>
                        <div class="card-block">

                            <h4 class="sub-title">Form ubah password admin</h4>
                            <form action="<?= base_url('pengaturan/ubah_pw') ?>" method="post" enctype="application/x-www-form-urlencoded">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password lama</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="pwlama" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password baru</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="pwbaru" class="form-control">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-round btn-grd-primary" type="submit">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- Basic Form Inputs card end -->

                </div>
            </div>
        </div>
        <!-- Page body end -->
    </div>
</div>
<!-- Main-body end -->
<div id="styleSelector">