<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container"><a class="navbar-brand d-inline-flex" href="<?= base_url() ?>"><span class="text-1000 fs-3 fw-bold ms-2 text-gradient">Kembali</span></a>
    </div>
</nav>

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-0">
    <div class="container">
        <div class="row h-100 gx-2 mt-7">

            <?php foreach ($ada as $a) : ?>
                <div class="col-sm-6 col-lg-4 mb-4 mb-md-0 h-100 pb-4">
                    <div class="card card-span h-100 ">
                        <div class="position-relative">
                            <?php if ($a->gambar == NULL) { ?>
                                <img class="img-fluid rounded-3 w-100" src="<?= base_url() ?>assets/front/img/gallery/buku_jangan_dihapus.png" />
                            <?php } else { ?>
                                <img class="img-fluid rounded-3 w-100" src="<?= base_url() ?>assets/front/img/gallery/<?= $a->gambar; ?>" alt="<?= $a->judul; ?>" />
                            <?php } ?>
                            <div class="card-actions">
                                <div class="badge badge-foodwagon bg-primary p-2">
                                    <div class="d-flex flex-between-center">
                                        <div class="fw-normal fs-1 mt-2">
                                            <?php if ($a->kuantitas > 0) { ?>
                                                <p>Tersedia</p>
                                            <?php } else { ?>
                                                <p class="text-danger">Kosong</p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <h5 class="fw-bold text-1000 text-truncate"><?= $a->judul; ?></h5><span class="badge bg-soft-danger py-2 px-3"><span class="fs-1 text-danger"><?= $a->isbn; ?></span></span>
                        </div><a class="stretched-link" href="detail/<?= $a->isbn; ?>"></a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div><!-- end of .container-->
</section><!-- <section> close ============================-->
<!-- ============================================-->