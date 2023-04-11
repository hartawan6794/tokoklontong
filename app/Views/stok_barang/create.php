<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Tambah Stok Barang</h2>

            <!-- <//?php if (!$tes_varsatu == null) { ?>
                <h1 class="mt-3">
                    Tes Var: <//?= $tes_varsatu; ?>
                </h1>
            <//?php } ?> -->

            <form action="/stok_barang/save" method="POST">
                <?= csrf_field(); ?>
                <!-- cross site resource forgery, mencegah pengisian data dari halaman selaen ini -->

                <div class="row mb-3">
                    <label for="stok_namabarang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="text" class="form-control 
                        <?= ($validation->hasError('stok_namabarang')) ? 'is-invalid' : ''; ?>" id="stok_namabarang" name="stok_namabarang" autofocus value=<?= old('stok_namabarang'); ?>>
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok_namabarang'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="stok_jumlah" class="col-sm-2 col-form-label">Jumlah Stok</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="number" class="form-control 
                        <?= ($validation->hasError('stok_jumlah')) ? 'is-invalid' : ''; ?>" id="stok_jumlah" name="stok_jumlah" autofocus value=<?= old('stok_jumlah'); ?>>
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok_jumlah'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="stok_satuan" class="col-sm-2 col-form-label">Satuan Barang</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="text" class="form-control 
                        <?= ($validation->hasError('stok_satuan')) ? 'is-invalid' : ''; ?>" id="stok_satuan" name="stok_satuan" autofocus value=<?= old('stok_satuan'); ?>>
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok_satuan'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="stok_harga" class="col-sm-2 col-form-label">Harga</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="number" class="form-control 
                        <?= ($validation->hasError('stok_harga')) ? 'is-invalid' : ''; ?>" id="stok_harga" name="stok_harga" autofocus value=<?= old('stok_harga'); ?>>
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok_harga'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="stok_deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('stok_deskripsi')) ? 'is-invalid' : ''; ?>" name="stok_deskripsi" rows="2" value="" id="stok_deskripsi"><?= old('stok_deskripsi'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok_deskripsi'); ?>
                        </div>
                    </div>
                </div>


                <!-- <div class="row mb-3">
                    <label for="input_habis_date" class="col-sm-2 col-form-label">Habis Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control 
                        <?= ($validation->hasError('input_habis_date')) ? 'is-invalid' : ''; ?>" id="input_habis_date" name="input_habis_date" autofocus value="<?= old('input_habis_date'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('input_habis_date'); ?>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="row mb-3">
                    <label for="habis_sudahdibeli" class="col-sm-2 col-form-label">Status Pembelian</label>
                    <div class="form-check">
                        <input id="terbeli" name="habis_sudahdibeli" type="radio" class="form-check-input" required value="1">
                        <label class="form-check-label" for="1">Terbeli</label>
                    </div>
                    <div class="form-check">
                        <input id="belum dibeli" name="habis_sudahdibeli" type="radio" class="form-check-input" required value="0">
                        <label class="form-check-label" for="0">Belum dibeli</label>
                    </div>
                </div> -->



                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>



        </div>
    </div>
</div>
<?= $this->endSection(); ?>