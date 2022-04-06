<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="col-sm-12">
                    <!-- Basic Form Inputs card start -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="title">Edit capture buku</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-block">
                            <h4 class="sub-title">Form edit capture buku</h4>
                            <?php foreach ($isbn as $i) : ?>
                                <form id="tambah">
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">ISBN</label>
                                            <div class="col-sm-9">
                                                <input type="number" value="<?= $i->isbn; ?>" name="isbn" id="isbn" class="form-control" readonly>
                                                <small class="text-danger">*bersifat permanen, tidak bisa diedit</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Kategori</label>
                                            <div class="col-sm-9">
                                                <select name="kat" id="kategori" class="form-control" required>
                                                    <option hidden selected><?= $i->kategori; ?></option>
                                                    <?php foreach ($kat as $k) : ?>
                                                        <option value="<?= $k->kategori_buku; ?>"><?= $k->kategori_buku; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Judul buku</label>
                                            <div class="col-sm-9">
                                                <input type="text" value="<?= $i->judul; ?>" name="judul" id="judul" class="form-control " required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Penerbit</label>
                                            <div class="col-sm-9">
                                                <input type="text" value="<?= $i->penerbit; ?>" name="penerbit" id="penerbit" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tahun terbit</label>
                                            <div class="col-sm-9">
                                                <input type="number" value="<?= $i->tahun_terbit; ?>" name="tahun" min="1000" max="9999" id="tahun" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Kuantitas</label>
                                            <div class="col-sm-9">
                                                <input type="number" value="<?= $i->kuantitas ?>" name="kuantitas" id="kuantitas" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Lokasi</label>
                                            <div class="col-sm-9">
                                                <select name="lokasi" id="lokasi" class="form-control" required>
                                                    <option hidden selected><?= $i->lokasi; ?></option>
                                                    <?php foreach ($rak as $r) : ?>
                                                        <option value="<?= $r->nomor_rak; ?>"><?= $r->nomor_rak; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small class="text-warning">A1 = (lemari/rak) </small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Sampul lama</label>
                                            <div class="col-sm-9">
                                                <input type="hidden" value="<?= $i->gambar ?>" name="galama" id="galama" class="form-control" required>
                                                <img width="72%" src="<?= base_url() . 'assets/front/img/gallery/' . $i->gambar; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="col-sm-3 col-form-label">Ambil sampul baru</label>
                                            <div class="col-sm-9 ">
                                                <div class="text-center" id="my_camera"></div>
                                                <small class="text-danger">*Usahakan gambar jelas dan tulisan terbaca</small>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        <div class="form-group row justify-content-center ">
                                            <div class="col mt-1">
                                                <div id="response"></div>
                                            </div>
                                            <div class="col text-center">
                                                <div id="result" class=" bg-light" style="border: honeydew;"></div>
                                                <input hidden type="text" class="image">
                                            </div>
                                        </div>
                                </form>
                            <?php endforeach; ?>
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
<!-- <div id="styleSelector"> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
<script language="JavaScript">
    Webcam.set({
        width: 480,
        height: 360,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach('#my_camera');
</script>

<!-- Code to handle taking the snapshot and displaying it locally -->
<script type="text/javascript">
    $('#tambah').on('submit', function(event) {


        event.preventDefault();
        var image = '';
        var galama = $('#galama').val();
        var isbn = $('#isbn').val();
        var kategori = $('#kategori').val();
        var judul = $('#judul').val();
        var penerbit = $('#penerbit').val();
        var tahun = $('#tahun').val();
        var kuantitas = $('#kuantitas').val();
        var lokasi = $('#lokasi').val();
        Webcam.snap(function(data_uri) {
            image = data_uri;
            //untuk capture
            $(".image").val(data_uri);
            document.getElementById('result').innerHTML = '<img src="' + data_uri + '">';
        });
        $.ajax({
                url: '<?php echo site_url("buku/edit_capture_aksi"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    galama: galama,
                    isbn: isbn,
                    kategori: kategori,
                    judul: judul,
                    penerbit: penerbit,
                    tahun: tahun,
                    kuantitas: kuantitas,
                    lokasi: lokasi,
                    image: image
                },
            })

            .done(function(data) {
                if (data != 0) {
                    // alert('insert data sukses');
                    $("#response").html('<div class ="alert alert-success"><b>Berhasil disimpan !!</b> Sampul buku ' + judul + ' dan datanya. silahkan cek di daftar buku</div>')
                    $('#tambah')[0].reset();
                }
            })
            .fail(function() {
                console.log("Error");
            })
            .always(function() {
                console.log("complete");
            });

    });
</script>