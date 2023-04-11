<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Tambah User Baru</h2>
            <form action="/admin/save" method="POST">
                <?= csrf_field(); ?>
                <!-- cross site resource forgery, mencegah pengisian data dari halaman selaen ini -->
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="text" class="form-control 
                        <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" autofocus value=<?= old('username'); ?>>
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" value="<?= old('password'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                        <!-- aisodfj -->
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input id="Pegawai" name="user_isowner" type="radio" class="form-check-input" checked required value="0">
                        <label class="form-check-label" for="0">Pegawai</label>
                    </div>
                    <div class="form-check">
                        <input id="Pemilik" name="user_isowner" type="radio" class="form-check-input" required value="1">
                        <label class="form-check-label" for="1">Pemilik</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>





        </div>
    </div>
</div>
<?= $this->endSection(); ?>