<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container"><a class="navbar-brand d-inline-flex" href="<?= base_url() ?>"><span class="text-1000 fs-3 fw-bold ms-2 text-gradient">Kembali</span></a>
    </div>
</nav>
<!-- ============================================-->
<!-- <section> begin ============================-->
<?php foreach ($data as $d) : ?>
    <section class="pb-5 pt-8">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card card-span mb-3 shadow-lg">
                        <div class="card-body py-0">
                            <div class="row">
                                <div class="col-md-5 col-xl-6 col-xxl-6 g-0 order-0 order-md-1 p-4 p-lg-5 text-center">
                                    <?php if ($d->gambar != NULL) { ?>
                                        <img class="img-fluid w-60 fit-cover h-100 rounded-top rounded-md-end rounded-md-top-0" src="<?= base_url() ?>assets/front/img/gallery/<?= $d->gambar; ?>" alt="..." />
                                    <?php } else { ?>
                                        <img class="img-fluid w-60 fit-cover h-100 rounded-top rounded-md-end rounded-md-top-0" src="<?= base_url() ?>assets/front/img/gallery/buku_jangan_dihapus.png" alt="..." />
                                    <?php } ?>
                                </div>
                                <div class="col-md-7 col-xl-6 col-xxl-6" style="background-color: lavender;">
                                    <h2 class="card-title mt-xl-5 ">
                                        <span class="text-gradient"> <?= $d->judul; ?></span>
                                    </h2>
                                    <h4 class="text-gradient">Lokasi : <?= $d->lokasi ?> <small>(lemari/rak)</small></h4><br>

                                    <div class="row">
                                        <div class="col ">
                                            <?php if ($d->kuantitas > 0) { ?>
                                                <h5 class="text-dark"> Tersedia </h5>
                                            <?php } else { ?>
                                                <h5 class="text-dark"> Kosong </h5>
                                            <?php } ?>
                                        </div>
                                        <div class="col">
                                            <?php if ($d->kuantitas > 0) { ?>
                                                <h5 class="text-dark"> : <?= $d->kuantitas; ?></h5>
                                            <?php } else { ?>
                                                <h5 class="text-dark"> : <?= $d->kuantitas; ?></h5>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <h5 class="text-dark">Kategori</h5>
                                        </div>
                                        <div class="col">
                                            <h5 class="text-dark">: <?= $d->kategori; ?></h5>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <h5 class="text-dark">ISBN</h5>
                                        </div>
                                        <div class="col">
                                            <h5 class="text-dark">: <?= $d->isbn; ?></h5>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <h5 class="text-dark">Penerbit</h5>
                                        </div>
                                        <div class="col">
                                            <h5 class="text-dark">: <?= $d->penerbit; ?></h5>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <h5 class="text-dark">Tahun terbit</h5>
                                        </div>
                                        <div class="col">
                                            <h5 class="text-dark">: <?= $d->tahun_terbit; ?></h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end of .container-->
    </section><!-- <section> close ============================-->
<?php endforeach; ?>