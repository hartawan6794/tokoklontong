<?= $this->extend('layout/template'); ?>
<? //php session_start(); 
?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">

        <!-- <? //= dd($_SESSION['username']); 
                ?> -->
        <!-- <? //= dd(session()->session_id); 
                ?> -->
        <!-- <? //= dd(session()->get('username')); 
                ?> -->
        <!-- <? //php if (null != session()->get('username')) { 
                ?> -->

        <?php if (session()->islogin) { ?>
            <div class="my-5">
                <h2>Username: <?= session()->get('username'); ?></h2>
                <br><br>
                <h2>pemilik?: <?= session()->get('user_isowner'); ?></h2>
                <br>
                <a href="/logout" class="btn btn-danger mt-3">Logout</a>
            </div>
        <?php } ?>


        <br>
        <div class="col-6">
            <!-- <form action="/komik/pencarian" method="POST"> -->
            <!-- method kalau gaditulis mau pakai tipe apa, pasti akan menjadi sebuah method GET -->

            <!-- sebenernya pake tag yang dibawah ini -->
            <!-- 
                <form action="" method="post">
             -->

            <!-- actionnya dikosongkan karena ingin memakai didalam controller yang sama, yaitu 
             controller Komik -->
            <form>
                <div class="input-group mb-3">
                    <input type="text" name="keyword" class="form-control" placeholder="Masukkan input pencarian disini cuyyy" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari Cuy</button>
                </div>
            </form>
        </div>
        <br>

    </div>

    <div class="row">
        <div class="col">
            <a href="/admin/create" class="btn btn-primary mt-3">Tambah User</a>
            <a href="/login" class="btn btn-success mt-3">Login</a>
            <a href="/" class="btn btn-primary mt-3">Home</a>

            <h1 class="mt-3">
                Daftar User
            </h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif ?>
            <!-- mb is margin bottom -->

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Status User</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_row as $u) : ?>
                        <tr>
                            <td><?= $u['user_id']; ?></td>
                            <td><?= $u['user_name']; ?></td>
                            <td><?= $u['user_isowner']; ?></td>
                            <td>
                                <form action="/admin/edit/<?= $u['user_id']; ?>" method="get" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="post">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="/admin/<?= $u['user_id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- dibawah ini untuk menampilkan pager nya secara dg pengaturan default dari CI nya -->
            <!-- <//?=$pager->links(); ?> -->


            <!-- dibawah ini pager tapi dengan tampilan yang telah dibuat di views\pagers\komik_pagination -->
            <!-- parameter (a, b) . a=nama tabel, b=nama file paginationnya -->
            <!-- <div scope="row">
                <//?= $pager->links('komik', 'komik_pagination'); ?>
            </div> -->

        </div>
    </div>
</div>
<?= $this->endSection(); ?>