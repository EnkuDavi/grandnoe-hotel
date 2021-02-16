<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Grand Noeri Hotel</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="<?= base_url();?>assets/css/heroic-features.css" rel="stylesheet">
  <script src="http://kit.fontawesome.com/e8dac964cf.js" crossorigin="anonymous"></script>


</head>

<body style="background-image: url('assets/dist/img/pexels-element.jpg');background-size:cover;">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">GrandNoeri</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <!-- <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul> -->
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4" style="background-color:yellow;">
      <h1 class="display-3"><img src="<?= base_url('assets/dist/img/logo.png') ;?>" alt="" style="width:100px;height:90px"> Grand Noeri Hotel</h1>
      <p class="lead">Jl. Pangkal Perjuangan By Pass Patung Udang RT 008 / RW 010, Tanjung Mekar Karawang</p>
      <a href="https://wa.me/628967142353" class="btn btn-success btn-lg"><i class="fab fa-whatsapp"></i> Hubungi Kami</a>
    </header>

    <!-- Page Features -->
    <div class="row text-center overflow-auto" style="max-height: 420px;">
    <?php foreach($kamar->result() as $key=>$data) :?>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100 shadow-lg rounded">
          <img class="card-img-top" src="<?= base_url('uploads/kamar/'.$data->foto) ;?>" style="height: 160px;" alt="">
          <div class="card-body">
            <h4 class="card-title"><?= $data->no_kamar ;?></h4>
            <div class="card-text text-left">
                <ul>
                    <li><?= $data->type ;?></li>
                    <li><?= $data->harga ;?> K</li>
                    <li>Fasilitas : <?= $data->fasilitas ;?></li>
                </ul>
            </div>
          </div>
          <div class="card-footer">
            <a href="https://wa.me/628967142353" class="btn btn-success"><i class="fab fa-whatsapp"></i> Pesan Sekarang</a>
          </div>
        </div>
      </div>
    <?php endforeach;?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Intan Pandini 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url() ;?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ;?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
