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

                                    <?php foreach ($peminjam as $p) : ?>
                                        <h3>
                                            Peminjam : <?= $p->nama; ?> / <?= $p->ket; ?>
                                        </h3>
                                    <?php endforeach; ?>

                                </div>
                                <div class="col-4">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-grd-info btn-round btn-block" data-toggle="modal" data-target="#exampleModal">
                                        Pilih buku
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="buku">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>ISBN</th>
                                            <th>Tanggal pinjam</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($peminjaman as $p) : ?>
                                            <tr>
                                                <td><?= $p->judul; ?></td>
                                                <td><?= $p->isbn; ?></td>
                                                <td><?= $p->tgl_pinjam; ?></td>
                                                <td>
                                                    <?php foreach ($peminjam as $jam) : ?>
                                                        <a href="<?= base_url('peminjam/kembalikan/' . $p->id_pinjam . '/' . $p->isbn . '/' . $jam->id); ?>" class="btn btn-grd-inverse btn-round">Kembalikan</a>
                                                    <?php endforeach; ?>
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
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container mt-3 mb-3">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="pinjam">
                        <thead>
                            <tr>
                                <th>Sampul</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Penerbit</th>
                                <th>Kuantitas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($buku as $b) : ?>
                                <tr>
                                    <td><img width="50%" src="<?= base_url() . 'assets/front/img/gallery/' . $b->gambar; ?>" alt=""> </td>
                                    <td><?= $b->judul; ?></td>
                                    <td><?= $b->kategori; ?></td>
                                    <td><?= $b->penerbit; ?></td>
                                    <td><?= $b->kuantitas; ?></td>
                                    <td>
                                        <?php foreach ($peminjam as $p) : ?>
                                            <div class="dropdown-info dropdown open">
                                                <?php if ($b->kuantitas > 0) { ?>
                                                    <a href="<?= base_url('peminjam/aksi_tx/' . $b->isbn . '/' . $p->id); ?>" class="btn btn-grd-success btn-round">Pinjam</a>
                                                <?php } else { ?>
                                                    <button class="btn btn-grd-danger btn-round btn-disabled disabled">kosong</button>
                                                <?php } ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {
        $('#buku').DataTable({
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
        $('#pinjam').DataTable({
            "searching": true,
            "paging": true,
            // "order": [
            //     [0, "DESC"]
            // ]
        });
    });
</script>