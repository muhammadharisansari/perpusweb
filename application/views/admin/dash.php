<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="ti-book bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">kuantitas Buku</span>
                                    <h4>
                                        <?= $buku; ?> buah
                                    </h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <a href="buku">
                                                Selengkapnya<i class="ti-angle-double-right"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="ti-export bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Dipinjam</span>
                                    <h4><?= $pinjam; ?> buah</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">
                                                Selengkapnya<i class="ti-angle-double-right"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Tersedia</span>
                                    <h4>
                                        <?= $sedia; ?> buah
                                    </h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal2">
                                                Selengkapnya<i class="ti-angle-double-right"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="ti-user bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Anggota</span>
                                    <h4><?= $peminjam; ?> orang</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <a href="<?= base_url('peminjam'); ?>">
                                                Selengkapnya<i class="ti-angle-double-right"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="ti-bookmark-alt bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Jumlah Judul</span>
                                    <h4><?= $judul; ?> judul</h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <a href="buku">
                                                Selengkapnya<i class="ti-angle-double-right"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal detail peminjaman-->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail buku dipinjam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container mt-3 mb-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="pinjam">
                            <thead>
                                <tr>
                                    <th>ISBN</th>
                                    <th>Judul</th>
                                    <th>Peminjam</th>
                                    <th>Status</th>
                                    <th>Tanggal dipinjam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($peminjaman as $b) : ?>
                                    <tr>
                                        <td><?= $b->isbn; ?></td>
                                        <td><?= $b->judul; ?></td>
                                        <td><?= $b->nama_peminjam; ?></td>
                                        <td><?= $b->status_peminjam; ?></td>
                                        <td><?= $b->tgl_pinjam; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal detail peminjaman-->
<div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail buku sedia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container mt-3 mb-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="pinjam2">
                            <thead>
                                <tr>
                                    <th>Sampul</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Penerbit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($buku_sedia as $b) : ?>
                                    <tr>
                                        <td><img width="50%" src="<?= base_url() . 'assets/front/img/gallery/' . $b->gambar; ?>" alt=""> </td>
                                        <td><?= $b->judul; ?></td>
                                        <td><?= $b->kategori; ?></td>
                                        <td><?= $b->penerbit; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#pinjam').DataTable({
            "searching": true,
            "paging": true,
            // "order": [
            //     [0, "DESC"]
            // ]
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#pinjam2').DataTable({
            "searching": true,
            "paging": true,
            // "order": [
            //     [0, "DESC"]
            // ]
        });
    });
</script>