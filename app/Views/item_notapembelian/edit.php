<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Edit Item pada Nota Pembelian</h2>
            <!-- my-3 = margin y 3 . jadi margin langsung atas bawah -->

            <!-- <//?= $validation->listErrors(); ?> -->



            <!-- dibawah ini bisa -->

            <?php d($dataItemNotaDiedit); ?>

            <?php if (session()->getFlashdata('temp_data')) : ?>
                <?php $simpanan = session()->getFlashdata('temp_data'); ?>
                <?php d($simpanan); ?>
                <?php session()->setFlashdata('temp_data', $simpanan); ?>
            <?php endif ?>

            <form action="/item_notapembelian/update/<?= $data_item_id; ?>" method="POST">

                <input type="hidden" name="hidden_data_itemnota_notaid" value="<?= $data_itemnota_notaid ? $data_itemnota_notaid : $simpanan; ?>">
                <?php d($data_itemnota_notaid); ?>
                <!-- <input type="hidden" name="hidden_data_itemnota_notaid" value=<//?= $sementara; ?>> -->

                <!-- <form action="/admin/update/3" method="POST"> -->
                <!-- <form action="/komik/update" method="POST"> -->
                <?= csrf_field(); ?>
                <!-- cross site resource forgery, mencegah pengisian data dari halaman selaen ini -->
                <div class="row mb-3">
                    <label for="input_item_date" class="col-sm-2 col-form-label">Item Nota Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control 
                        <?= ($validation->hasError('input_item_date')) ? 'is-invalid' : ''; ?>" id="input_item_date" name="input_item_date" autofocus value="<?= (old('input_item_date')) ? old('input_item_date') : $dataItemNotaDiedit['itemnota_date'] ?>">
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
                        <?= ($validation->hasError('itemnota_namabarang')) ? 'is-invalid' : ''; ?>" id="itemnota_namabarang" name="itemnota_namabarang" value="<?= (old('itemnota_namabarang')) ? old('itemnota_namabarang') : $dataItemNotaDiedit['itemnota_namabarang'] ?>">
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
                        <?= ($validation->hasError('itemnota_jumlahbarang')) ? 'is-invalid' : ''; ?>" id="itemnota_jumlahbarang" name="itemnota_jumlahbarang" value="<?= (old('jumlahbarang')) ? old('itemnota_jumlahbarang') : $dataItemNotaDiedit['itemnota_jumlahbarang'] ?>">
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
                        <?= ($validation->hasError('itemnota_nominaltransaksi')) ? 'is-invalid' : ''; ?>" id="itemnota_nominaltransaksi" name="itemnota_nominaltransaksi" value="<?= (old('itemnota_nominaltransaksi')) ? old('itemnota_nominaltransaksi') : ($dataItemNotaDiedit['itemnota_nominaltransaksi']) / 1000 ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('itemnota_nominaltransaksi'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="itemnota_catatan" class="col-sm-2 col-form-label">Catatan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('itemnota_catatan')) ? 'is-invalid' : ''; ?>" name="itemnota_catatan" rows="2" value="" id="itemnota_catatan"><?= (old('itemnota_catatan')) ? old('itemnota_catatan') : $dataItemNotaDiedit['itemnota_catatan'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('itemnota_catatan'); ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>



        </div>
    </div>
</div>
<?= $this->endSection(); ?>