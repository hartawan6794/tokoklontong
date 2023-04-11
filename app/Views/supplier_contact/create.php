<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Tambah Supplier Contact</h2>
            <form action="/supplier_contact/save" method="POST">
                <?= csrf_field(); ?>
                <!-- cross site resource forgery, mencegah pengisian data dari halaman selaen ini -->



                <div class="row mb-3">
                    <label for="supp_nama" class="col-sm-2 col-form-label">Nama</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('supp_nama')) ? 'is-invalid' : ''; ?>" id="supp_nama" name="supp_nama" autofocus value="<?= (old('supp_nama')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('supp_nama'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="supp_namaproduk" class="col-sm-2 col-form-label">Nama Produk</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('supp_namaproduk')) ? 'is-invalid' : ''; ?>" id="supp_namaproduk" name="supp_namaproduk" value="<?= (old('supp_namaproduk')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('supp_namaproduk'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="supp_jenisproduk" class="col-sm-2 col-form-label">Jenis Produk</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('supp_jenisproduk')) ? 'is-invalid' : ''; ?>" id="supp_jenisproduk" name="supp_jenisproduk" value="<?= (old('supp_jenisproduk')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('supp_jenisproduk'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="supp_catatanproduk" class="col-sm-2 col-form-label">Catatan Produk</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('supp_catatanproduk')) ? 'is-invalid' : ''; ?>" name="supp_catatanproduk" rows="2" value="" id="supp_catatanproduk"><?= old('supp_catatanproduk'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('supp_catatanproduk'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="supp_nomorwa" class="col-sm-2 col-form-label">No WA</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= ($validation->hasError('supp_nomorwa')) ? 'is-invalid' : ''; ?>" id="supp_nomorwa" name="supp_nomorwa" value="<?= (old('supp_nomorwa')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('supp_nomorwa'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="supp_telp1" class="col-sm-2 col-form-label">No Telp 1</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= ($validation->hasError('supp_telp1')) ? 'is-invalid' : ''; ?>" id="supp_telp1" name="supp_telp1" autofocus value="<?= (old('supp_telp1')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('supp_telp1'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="supp_telp2" class="col-sm-2 col-form-label">No Telp 2</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= ($validation->hasError('supp_telp2')) ? 'is-invalid' : ''; ?>" id="supp_telp2" name="supp_telp2" value="<?= (old('supp_telp2')) ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('supp_telp2'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="supp_catatantambahan" class="col-sm-2 col-form-label">Catatan Tambahan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('supp_catatantambahan')) ? 'is-invalid' : ''; ?>" name="supp_catatantambahan" rows="2" value="" id="supp_catatantambahan"><?= old('supp_catatantambahan'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('supp_catatantambahan'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="supp_alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('supp_alamat')) ? 'is-invalid' : ''; ?>" name="supp_alamat" rows="2" value="" id="supp_alamat"><?= old('supp_alamat'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('supp_alamat'); ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>





        </div>
    </div>
</div>
<?= $this->endSection(); ?>