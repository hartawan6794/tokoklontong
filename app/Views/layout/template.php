<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="<?= base_url('asset/css/bootstrap.min.css') ?>">


    <?= csrf_meta() ?>
    <!-- Google Font: Thai Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('asset/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="<?= base_url('asset/css/adminlte.min.css') ?>"> -->
    <!--<link rel="stylesheet" href="<?php /* echo base_url('asset/css/rtl/adminlte.rtl.min.css') */ ?>"> -->

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('asset/plugins/datatables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('asset/plugins/datatables/Responsive-2.2.9/css/responsive.bootstrap5.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('asset/plugins/datatables/StateRestore-1.1.1/css/stateRestore.bootstrap5.min.css') ?>">
    <!-- Dark style -->
    <!--<link rel="stylesheet" href="<?php /* echo base_url('asset/css/dark/adminlte-dark-addon.min.css')*/ ?>">  -->

    <!-- dibawah ini template nya css bikin sendiri -->
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <!-- dibawah ini khusus untuk coba nambah CDN jquery, u/ autocomplete -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->

    <!-- <script src="http://localhost:8080/coba_autocomplete/jquery-1.11.2.min.js"></script> -->

    <!-- dibawah ini khusus buat number separator hehehe -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script> -->
    <!-- <script src="/js/easy-number-separator.js"></script> -->

    <!-- bagian navbar -->
    <?php if (null != session()->get('username')) { ?>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled">Disabled</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        <a href="/logout" class="btn btn-outline-danger">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    <?php } ?>


    <!-- dibawah ini buat masukin isi konten masing2 page -->
    <?= $this->renderSection('content'); ?>



    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->


    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?= base_url('asset/js/jquery-3.6.0.min.js') ?>"></script>
    <!-- Bootstrap 5 with Popper.js-->
    <script src="<?= base_url('asset/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>

    <!-- Page Global Script -->
    <!-- Toggle Button -->
    <script src="<?= base_url('asset/js/bootstrap4-toggle.min.js') ?>"></script>



    <!-- DataTables Full Function -->
    <script src="<?= base_url("asset/plugins/datatables/DataTables-1.11.3/js/jquery.dataTables.min.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("asset/plugins/datatables/DataTables-1.11.3/js/dataTables.bootstrap5.min.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("asset/plugins/datatables/Buttons-2.0.1/js/dataTables.buttons.min.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("asset/plugins/datatables/JSZip-2.5.0/jszip.min.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("asset/plugins/datatables/Buttons-2.0.1/js/buttons.print.min.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("asset/plugins/datatables/Buttons-2.0.1/js/buttons.html5.min.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("asset/plugins/datatables/Responsive-2.2.9/js/dataTables.responsive.min.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url("asset/plugins/datatables/Responsive-2.2.9/js/responsive.bootstrap5.min.js"); ?>" type="text/javascript"></script>
    <script src="<?= base_url() ?>/asset/plugins/select2/js/select2.full.min.js"></script>

    <!-- PageScript-->
    <?= $this->renderSection("pageScript") ?>
    <!-- /PageScript-->

    <script>
        $(function() {
            $('#table1').DataTable({});
        });
    </script>
</body>

</html>