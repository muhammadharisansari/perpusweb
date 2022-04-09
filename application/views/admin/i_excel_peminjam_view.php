<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="container mt-3">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Upload File Excel Data Peminjam</h3>
                                </div>
                                <form method="POST" action="<?= base_url('peminjam/uploadFileExcel'); ?>" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group text-center">
                                            <a href="<?= base_url('peminjam/dExcelFile'); ?>" target="_blank" class="btn btn-info">Download sample file excel</a>
                                            <a href="<?= base_url('peminjam/exportDataExcel'); ?>" target="_blank" class="btn btn-success" target="_blank">Export data dengan excel</a>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label class="col-form-label text-md-left">Upload File</label>
                                                        <input type="file" class="form-control" name="file" accept=".csv, .xls, .xlsx" required>
                                                        <div class="mt-1">
                                                            <span class="text-secondary">File yang diterima : .xls, .xlsx, .csv</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary">Upload</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>