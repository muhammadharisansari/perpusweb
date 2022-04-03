<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <div class="login-card card-block auth-body mr-auto ml-auto">
                    <form class="md-float-material" method="POST" action="<?= base_url('login/cek') ?>" enctype="application/x-www-form-urlencoded">
                        <div class="text-center">
                            <H3 class="text-danger">PERPUSTAKAAN SEKOLAH</H3>
                        </div>
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-left txt-primary">Sign In</h3>
                                </div>
                            </div>
                            <?php echo $this->session->flashdata('pesan') ?>
                            <hr />
                            <div class="input-group">
                                <input type="text" class="form-control" name="user" placeholder="Username">
                                <span class="md-line"></span>
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control" name="pass" placeholder="Password">
                                <span class="md-line"></span>
                            </div>

                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Masuk</button>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>