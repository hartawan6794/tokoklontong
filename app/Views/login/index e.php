<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif ?>

            <h2 class="my-3">Halaman Login</h2>
            <!-- my-3 = margin y 3 . jadi margin langsung atas bawah -->
            <br>
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url(); ?>/login/process">
                <?= csrf_field(); ?>
                <h1 class="h3 mb-3 fw-normal">Login</h1>
                <input type="text" name="username" placeholder="Masukkan Username" class="form-control" required autofocus>
                <input type="password" name="password" placeholder="Masukkan Password" class="form-control" required>
                <button type="submit" class="w-100 btn btn-lg btn-primary">Login</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>