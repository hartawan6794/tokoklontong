<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Tambah Omzet Harian Baru</h2>
            <form action="/omzet_harian/save" method="POST">
                <?= csrf_field(); ?>
                <!-- cross site resource forgery, mencegah pengisian data dari halaman selaen ini -->

                <div class="row mb-3">
                    <label for="input_omzet_date" class="col-sm-2 col-form-label">Omzet Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control 
                        <?= ($validation->hasError('input_omzet_date')) ? 'is-invalid' : ''; ?>" id="input_omzet_date" name="input_omzet_date" autofocus value="<?= old('input_omzet_date'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('input_omzet_date'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="omzet_nominal" class="col-sm-2 col-form-label">Omzet Nominal</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="number" class="form-control 
                        <?= ($validation->hasError('omzet_nominal')) ? 'is-invalid' : ''; ?>" id="omzet_nominal" name="omzet_nominal" value="<?= old('omzet_nominal'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('omzet_nominal'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="omzet_catatan" class="col-sm-2 col-form-label">Omzet Catatan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('omzet_catatan')) ? 'is-invalid' : ''; ?>" name="omzet_catatan" rows="2" value="" id="omzet_catatan"><?= old('omzet_catatan'); ?></textarea>

                        <div class="invalid-feedback">
                            <?= $validation->getError('omzet_catatan'); ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>





        </div>
    </div>
</div>
<?= $this->endSection(); ?>