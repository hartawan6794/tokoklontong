<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Edit Stok Barang</h2>
            <!-- my-3 = margin y 3 . jadi margin langsung atas bawah -->

            <!-- <//?= $validation->listErrors(); ?> -->



            <!-- dibawah ini bisa -->
            <? //php dd('user_id'); 
            ?>
            <? //php dd($dataUserDiedit['user_id']);
            ?>
            <form action="/stok_barang/update/<?= $dataStokBarangDiedit['stok_id']; ?>" method="POST">
                <!-- <form action="/admin/update/3" method="POST"> -->
                <!-- <form action="/komik/update" method="POST"> -->
                <?= csrf_field(); ?>
                <!-- cross site resource forgery, mencegah pengisian data dari halaman selaen ini -->

                <div class="row mb-3">
                    <label for="stok_namabarang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="text" class="form-control 
                        <?= ($validation->hasError('stok_namabarang')) ? 'is-invalid' : ''; ?>" id="stok_namabarang" name="stok_namabarang" autofocus value=<?= (old('stok_namabarang')) ? old('stok_namabarang') : $dataStokBarangDiedit['stok_namabarang']  ?>>
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
                        <?= ($validation->hasError('stok_jumlah')) ? 'is-invalid' : ''; ?>" id="stok_jumlah" name="stok_jumlah" value=<?= (old('stok_jumlah')) ? old('stok_jumlah') : $dataStokBarangDiedit['stok_jumlah']  ?>>
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
                        <?= ($validation->hasError('stok_satuan')) ? 'is-invalid' : ''; ?>" id="stok_satuan" name="stok_satuan" value=<?= (old('stok_satuan')) ? old('stok_satuan') : $dataStokBarangDiedit['stok_satuan']  ?>>
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
                        <?= ($validation->hasError('stok_harga')) ? 'is-invalid' : ''; ?>" id="stok_harga" name="stok_harga" autofocus value=<?= (old('stok_harga')) ? old('stok_harga') : $dataStokBarangDiedit['stok_harga']  ?>>
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok_harga'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="stok_deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('stok_deskripsi')) ? 'is-invalid' : ''; ?>" name="stok_deskripsi" rows="2" value="" id="stok_deskripsi"><?= (old('stok_deskripsi')) ? old('stok_deskripsi') : $dataStokBarangDiedit['stok_deskripsi'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok_deskripsi'); ?>
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>



        </div>
    </div>
</div>
<?= $this->endSection(); ?>