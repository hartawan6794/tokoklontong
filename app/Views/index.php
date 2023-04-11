<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<html lang="en">
<link rel="stylesheet" href="/css/chutama.css">

<head>



  <!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>


  <!-- Custom styles for this template -->
  <!-- <link href="carousel.css" rel="stylesheet"> -->
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Carousel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </header>

  <main>


    <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <br>


    <!-- Three columns of text below the carousel -->
    <div class="container marketing">

      <!-- <? //php if (session()->islogin) { 
            ?> -->
      <!-- <? //php if (null != session()->get('username')) { 
            ?> -->

      <!-- <//?php dd(session()->islogin); ?> -->

      <?php if (null != session()->get('username')) { ?>
        <div class="my-5">
          <h2>Username: <?= session()->get('username'); ?></h2>
          <br><br>
          <h2>pemilik?: <?= session()->get('user_isowner'); ?></h2>
          <br>
          <a href="/logout" class="btn btn-danger mt-3">Logout</a>
        </div>
      <?php } ?>


      <div class="row">
        <div class="col-lg-4 rounded-4 position-relative mt-3">
          <!-- biar bikin satu kotak div ini bisa di klik jadi link, pake konsep namanya  -->
          <!-- stretched links (cari aja di bootstrapnya) -->
          <a href="/supplier_contact" class="stretched-link"></a>
          <svg class="bd-placeholder-img rounded-circle mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <!-- <svg class="bd-placeholder-img rounded-circle mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2 class="fw-normal">Kontak Supplier</h2>
          <br>
          <p text-white>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4 bg-warning bg-gradient rounded-4 position-relative mt-3">
          <a href="<?=base_url('/nota_pembelian')?>" class="stretched-link"></a>
          <svg class="bd-placeholder-img rounded-circle mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2 class="fw-normal">Nota Pembelian</h2>
          <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4 rounded-4 position-relative mt-3">
          <a href="<?= base_url('/barang_habis')?>" class="stretched-link"></a>
          <svg class="bd-placeholder-img rounded-circle mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2 class="fw-normal">Barang Habis</h2>
          <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4 rounded-4 position-relative mt-3 bg-success bg-gradient">
          <a href="<?= base_url('/hutang_pelanggan')?>" class="stretched-link"></a>
          <svg class="bd-placeholder-img rounded-circle mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2 class="fw-normal">Hutang Pelanggan</h2>
          <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4 rounded-4 position-relative mt-3">
          <a href="<?= base_url('/omzet_harian')?>" class="stretched-link"></a>
          <svg class="bd-placeholder-img rounded-circle mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2 class="fw-normal">Omzet Harian</h2>
          <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
          <p><a class="btn btn-secondary" href="omzet/index">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4 rounded-4 position-relative bg-success bg-gradient mt-3">
          <a href="<?= base_url('/admin')?>" class="stretched-link"></a>
          <svg class="bd-placeholder-img rounded-circle mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2 class="fw-normal">Akun Pengguna</h2>
          <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4 rounded-4 position-relative bg-success bg-gradient mt-3">
          <a href="<?= base_url('/stok_barang')?>" class="stretched-link"></a>
          <svg class="bd-placeholder-img rounded-circle mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2 class="fw-normal">Stok Barang</h2>
          <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4 rounded-4 position-relative bg-success bg-gradient mt-3">
          <a href="<?= base_url('/nota_pelanggan')?>" class="stretched-link"></a>
          <svg class="bd-placeholder-img rounded-circle mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2 class="fw-normal">Nota Pelanggan</h2>
          <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4 rounded-4 position-relative bg-success bg-gradient mt-3">
          <a href="<?= base_url('/transaksi')?>" class="stretched-link"></a>
          <svg class="bd-placeholder-img rounded-circle mt-3" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Transaksi</title>
            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
          </svg>

          <h2 class="fw-normal">Transaki</h2>
          <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
          <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->




        <hr class="featurette-divider">


      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>&copy; 2017–2022 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
  </main>


  <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->


</body>


<?= $this->endSection(); ?>