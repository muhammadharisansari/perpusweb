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
                                    <h3 class="title">Tambah buku</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-block">
                            <h4 class="sub-title">Form tambah buku</h4>
                            <form id="tambah">
                                <div class="modal-body">
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Ambil Gambar Sampul</label>
                                        <div class="col-sm-6 ">
                                            <div class="text-center" id="my_camera"></div>
                                            <input hidden type="text" name="image" id="img">
                                            <button type="button" class=" btn btn-success" id="snap">Tangkap layar</button>
                                            <button style="display: none;" type="button" class=" btn btn-danger" id="ulang">ambil ulang</button>
                                            <small class="text-danger">*Usahakan gambar jelas dan tulisan terbaca</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">ISBN</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="isbn" id="isbn" class="form-control" required>
                                            <small class="text-danger">*bersifat permanen, tidak bisa diedit</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Kategori</label>
                                        <div class="col-sm-9">
                                            <select name="kat" id="kategori" class="form-control" required>
                                                <option disabled selected>--pilih--</option>
                                                <?php foreach ($kat as $k) : ?>
                                                    <option value="<?= $k->kategori_buku; ?>"><?= $k->kategori_buku; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Judul buku</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="judul" id="judul" class="form-control " required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Penerbit</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="penerbit" id="penerbit" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tahun terbit</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="tahun" min="1000" max="9999" id="tahun" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Kuantitas</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="kuantitas" id="kuantitas" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Lokasi</label>
                                        <div class="col-sm-9">
                                            <select name="lokasi" id="lokasi" class="form-control" required>
                                                <option disabled selected>--pilih--</option>
                                                <?php foreach ($rak as $r) : ?>
                                                    <option value="<?= $r->nomor_rak; ?>"><?= $r->nomor_rak; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-warning">A1 = (lemari/rak) </small>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" style="display: none;" id="simpan" class="btn btn-primary">Tambah</button>
                                        <button type="reset" class="btn btn-danger">Reset data</button>
                                    </div>
                                    <div class="form-group row justify-content-center ">
                                        <div class="col mt-1">
                                            <div id="response"></div>
                                        </div>
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
<!-- <div id="styleSelector"> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
<script language="JavaScript">
    function kameraPlay() {
        Webcam.set({
            width: 480,
            height: 360,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');
    }
    kameraPlay();

    // untuk capture gambar
    $('#snap').on('click', function(event) {
        event.preventDefault();
        Webcam.snap(function(data_uri) {
            image = data_uri;
            $("#img").val(data_uri);
            document.getElementById('my_camera').innerHTML = '<img id="ubah" src="' + data_uri + '">';
            document.getElementById('snap').setAttribute('style', 'display:none;');
            document.getElementById('ulang').setAttribute('style', '');
            document.getElementById('simpan').setAttribute('style', '');
        });
    });

    // untuk mengambil ulang gambar
    $('#ulang').on('click', function(event) {
        document.getElementById('img').value = '';

        kameraPlay();

        document.getElementById('snap').setAttribute('style', '');
        document.getElementById('ulang').setAttribute('style', 'display:none;');
        document.getElementById('simpan').setAttribute('style', 'display:none;');
    });

    // untuk kirim data ke controller
    $('#tambah').on('submit', function(e) {
        e.preventDefault();
        var image = '';
        var isbn = $('#isbn').val();
        var kategori = $('#kategori').val();
        var judul = $('#judul').val();
        var penerbit = $('#penerbit').val();
        var tahun = $('#tahun').val();
        var kuantitas = $('#kuantitas').val();
        var lokasi = $('#lokasi').val();

        Webcam.snap(function(data_uri) {
            image = data_uri;
        });

        $.ajax({
                url: '<?php echo site_url("buku/tambah_aksi"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
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
                    console.log('berhasil');
                    $("#response").html('<div class ="alert alert-success"><b>Berhasil disimpan !!</b> Sampul buku ' + judul + ' dan datanya. silahkan cek di daftar buku</div>')
                    $('#tambah')[0].reset();
                    document.getElementById('ubah').innerHTML = '<div class="text-center" id="my_camera"></div>';
                    document.getElementById('snap').setAttribute('style', '');
                    document.getElementById('ulang').setAttribute('style', 'display:none;');
                    document.getElementById('simpan').setAttribute('style', 'display:none;');

                    kameraPlay();
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