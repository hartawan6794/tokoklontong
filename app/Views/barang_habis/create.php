<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Tambah Barang Habis</h2>

            <!-- <//?php if (!$tes_varsatu == null) { ?>
                <h1 class="mt-3">
                    Tes Var: <//?= $tes_varsatu; ?>
                </h1>
            <//?php } ?> -->

            <form action="/barang_habis/save" method="POST">
                <?= csrf_field(); ?>
                <!-- cross site resource forgery, mencegah pengisian data dari halaman selaen ini -->

                <div class="row mb-3">
                    <label for="habis_namabarang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="text" class="form-control 
                        <?= ($validation->hasError('habis_namabarang')) ? 'is-invalid' : ''; ?>" id="habis_namabarang" name="habis_namabarang" autofocus value=<?= old('habis_namabarang'); ?>>
                        <div class="invalid-feedback">
                            <?= $validation->getError('habis_namabarang'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="input_habis_date" class="col-sm-2 col-form-label">Habis Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control 
                        <?= ($validation->hasError('input_habis_date')) ? 'is-invalid' : ''; ?>" id="input_habis_date" name="input_habis_date" autofocus value="<?= old('input_habis_date'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('input_habis_date'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="habis_sudahdibeli" class="col-sm-2 col-form-label">Status Pembelian</label>
                    <div class="form-check">
                        <input id="terbeli" name="habis_sudahdibeli" type="radio" class="form-check-input" required value="1">
                        <label class="form-check-label" for="1">Terbeli</label>
                    </div>
                    <div class="form-check">
                        <input id="belum dibeli" name="habis_sudahdibeli" type="radio" class="form-check-input" required value="0">
                        <label class="form-check-label" for="0">Belum dibeli</label>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="habis_catatan" class="col-sm-2 col-form-label">Catatan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('habis_catatan')) ? 'is-invalid' : ''; ?>" name="habis_catatan" rows="2" value="" id="habis_catatan"><?= old('habis_catatan'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('habis_catatan'); ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>



        </div>
    </div>
</div>
<?= $this->endSection(); ?>