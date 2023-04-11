<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Edit User</h2>
            <!-- my-3 = margin y 3 . jadi margin langsung atas bawah -->

            <!-- <//?= $validation->listErrors(); ?> -->



            <!-- dibawah ini bisa -->
            <? //php dd('user_id'); 
            ?>
            <? //php dd($dataUserDiedit['user_id']);
            ?>
            <form action="/admin/update/<?= $dataUserDiedit['user_id']; ?>" method="POST">
                <!-- <form action="/admin/update/3" method="POST"> -->
                <!-- <form action="/komik/update" method="POST"> -->
                <?= csrf_field(); ?>
                <!-- cross site resource forgery, mencegah pengisian data dari halaman selaen ini -->
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <!-- ctrl+D untuk melakukan edit code yang sama persis secara sekaligus -->
                    <div class="col-sm-10">
                        <!-- KALAU misal field judul itu yang terisi value nya cuma 1 kata, itu karena
                    value dari atribut value tidak di quote. harusna di quote biar bisa menampilkan full
                . tanpa quotes, maka sebuah spasi akan melakukan terminate the attribute value -->
                        <!-- Thats because you did not quote your attribute value, without quotes spaces
                 terminate the attribute value -->

                        <!-- dibawah ini bisa, itu sebelum pake "old" di atribut value -->

                        <input type="text" class="form-control 
                        <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" autofocus value="<?= (old('username')) ? old('username') : $dataUserDiedit['user_name'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" value="<?= (old('password')) ? old('password') : $dataUserDiedit['user_password'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input id="Pegawai" name="user_isowner" type="radio" class="form-check-input" required value="0">
                        <label class="form-check-label" for="0">Pegawai</label>
                    </div>
                    <div class="form-check">
                        <input id="Pemilik" name="user_isowner" type="radio" class="form-check-input" required value="1">
                        <label class="form-check-label" for="1">Pemilik</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>



        </div>
    </div>
</div>
<?= $this->endSection(); ?>