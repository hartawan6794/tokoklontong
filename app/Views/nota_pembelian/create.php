<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Tambah Nota Pembelian Baru</h2>
            <form action="/nota_pembelian/save" method="POST">
                <?= csrf_field(); ?>
                <!-- cross site resource forgery, mencegah pengisian data dari halaman selaen ini -->


                <div class="row mb-3">
                    <label for="input_nota_date" class="col-sm-2 col-form-label">Nota Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control 
                        <?= ($validation->hasError('input_nota_date')) ? 'is-invalid' : ''; ?>" id="input_nota_date" name="input_nota_date" autofocus value="<?= old('input_nota_date'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('input_nota_date'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nota_tempatbeli" class="col-sm-2 col-form-label">Tempat Pembelian</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <input type="text" class="form-control 
                        <?= ($validation->hasError('nota_tempatbeli')) ? 'is-invalid' : ''; ?>" id="nota_tempatbeli" name="nota_tempatbeli" value=<?= old('nota_tempatbeli'); ?>>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nota_tempatbeli'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nota_catatan" class="col-sm-2 col-form-label">Catatan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError('nota_catatan')) ? 'is-invalid' : ''; ?>" name="nota_catatan" rows="2" value="" id="nota_catatan"><?= old('nota_catatan'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nota_catatan'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>





        </div>
    </div>
</div>
<?= $this->endSection(); ?>