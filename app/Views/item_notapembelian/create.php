<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Tambah Item Pada Nota Pembelian: <?= $data_itemnota_notaid; ?></h2>
            <form action="/item_notapembelian/save/<?= $data_itemnota_notaid; ?>" method="POST">
                <!-- <//?php d("B"); ?> -->
                <?php d($data_itemnota_notaid); ?>
                <?= csrf_field(); ?>
                <!-- cross site resource forgery, mencegah pengisian data dari halaman selaen ini -->

                <input type="hidden" name="hidden_data_itemnota_notaid" value="<?= $data_itemnota_notaid; ?>">

                <div class="row mb-3">
                    <label for="input_item_date" class="col-sm-2 col-form-label">Item Nota Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control 
                        <?= ($validation->hasError('input_item_date')) ? 'is-invalid' : ''; ?>" id="input_item_date" name="input_item_date" autofocus value="<?= old('input_item_date'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('input_item_date'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="itemnota_namabarang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="text" class="form-control 
                        <?= ($validation->hasError('itemnota_namabarang')) ? 'is-invalid' : ''; ?>" id="itemnota_namabarang" name="itemnota_namabarang" value=<?= old('itemnota_namabarang'); ?>>
                        <div class="invalid-feedback">
                            <?= $validation->getError('itemnota_namabarang'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="itemnota_jumlahbarang" class="col-sm-2 col-form-label">Jumlah Barang</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="text" class="form-control 
                        <?= ($validation->hasError('itemnota_jumlahbarang')) ? 'is-invalid' : ''; ?>" id="itemnota_jumlahbarang" name="itemnota_jumlahbarang" value=<?= old('itemnota_jumlahbarang'); ?>>
                        <div class="invalid-feedback">
                            <?= $validation->getError('itemnota_jumlahbarang'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="itemnota_nominaltransaksi" class="col-sm-2 col-form-label">Nominal Transaksi</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="number" class="form-control 
                        <?= ($validation->hasError('itemnota_nominaltransaksi')) ? 'is-invalid' : ''; ?>" id="itemnota_nominaltransaksi" name="itemnota_nominaltransaksi" value=<?= old('itemnota_nominaltransaksi'); ?>>
                        <div class="invalid-feedback">
                            <?= $validation->getError('itemnota_nominaltransaksi'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="itemnota_catatan" class="col-sm-2 col-form-label">Catatan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('itemnota_catatan')) ? 'is-invalid' : ''; ?>" name="itemnota_catatan" rows="2" value="" id="itemnota_catatan"><?= old('itemnota_catatan'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('itemnota_catatan'); ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>





        </div>
    </div>
</div>
<?= $this->endSection(); ?>