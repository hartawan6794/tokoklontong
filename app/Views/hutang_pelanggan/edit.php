<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Edit Hutang Pelanggan</h2>
            <!-- my-3 = margin y 3 . jadi margin langsung atas bawah -->

            <!-- <//?= $validation->listErrors(); ?> -->



            <!-- dibawah ini bisa -->
            <? //php dd('user_id'); 
            ?>
            <? //php dd($dataUserDiedit['user_id']);
            ?>
            <form action="/hutang_pelanggan/update/<?= $dataHutangPelangganDiedit['hutang_id']; ?>" method="POST">
                <!-- <form action="/admin/update/3" method="POST"> -->
                <!-- <form action="/komik/update" method="POST"> -->
                <?= csrf_field(); ?>
                <!-- cross site resource forgery, mencegah pengisian data dari halaman selaen ini -->

                <div class="row mb-3">
                    <label for="hutang_nama" class="col-sm-2 col-form-label">Nama</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('hutang_nama')) ? 'is-invalid' : ''; ?>" id="hutang_nama" name="hutang_nama" autofocus value="<?= (old('hutang_nama')) ? old('hutang_nama') : $dataHutangPelangganDiedit['hutang_nama'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('hutang_nama'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="input_hutang_date" class="col-sm-2 col-form-label">Hutang Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control <?= ($validation->hasError('input_hutang_date')) ? 'is-invalid' : ''; ?>" id="input_hutang_date" name="input_hutang_date" value="<?= (old('input_hutang_date')) ? old('input_hutang_date') : $dataHutangPelangganDiedit['hutang_date'] ?>">

                        <div class="invalid-feedback">
                            <?= $validation->getError('input_hutang_date'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="hutang_nominal" class="col-sm-2 col-form-label">Hutang Nominal</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="number" class="form-control  <?= ($validation->hasError('hutang_nominal')) ? 'is-invalid' : ''; ?>" id="hutang_nominal" name="hutang_nominal" value="<?= (old('hutang_nominal')) ? old('hutang_nominal') : ($dataHutangPelangganDiedit['hutang_nominal'] / 1000) ?>">

                        <div class="invalid-feedback">
                            <?= $validation->getError('hutang_nominal'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="hutang_alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('hutang_alamat')) ? 'is-invalid' : ''; ?>" name="hutang_alamat" rows="2" value="" id="hutang_alamat"><?= (old('hutang_alamat')) ? old('hutang_alamat') : $dataHutangPelangganDiedit['hutang_alamat'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('hutang_alamat'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="hutang_telp" class="col-sm-2 col-form-label">Telp</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('hutang_telp')) ? 'is-invalid' : ''; ?>" id="hutang_telp" name="hutang_telp" autofocus value="<?= (old('hutang_telp')) ? old('hutang_telp') : $dataHutangPelangganDiedit['hutang_telp'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('hutang_telp'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="hutang_islunas" class="col-sm-2 col-form-label">Status Hutang</label>
                    <div class="form-check">
                        <input id="belum_lunas" name="hutang_islunas" type="radio" class="form-check-input" required value="0">
                        <label class="form-check-label" for="0">Belum Lunas</label>
                    </div>
                    <div class="form-check">
                        <input id="lunas" name="hutang_islunas" type="radio" class="form-check-input" required value="1">
                        <label class="form-check-label" for="1">Lunas</label>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="hutang_catatan" class="col-sm-2 col-form-label">Catatan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('hutang_catatan')) ? 'is-invalid' : ''; ?>" name="hutang_catatan" rows="2" value="" id="hutang_catatan"><?= (old('hutang_catatan')) ? old('hutang_catatan') : $dataHutangPelangganDiedit['hutang_catatan'] ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('hutang_catatan'); ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>



        </div>
    </div>
</div>
<?= $this->endSection(); ?>