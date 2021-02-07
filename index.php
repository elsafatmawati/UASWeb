<?php

include 'koneksi.php';

$data = $conn->prepare('SELECT * FROM companies');
$data->execute();
$companies = $data->fetchAll();

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <title>Halaman Menu Utama</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

      <a class="navbar-brand" href="#">UAS</a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
      <div class="d-flex">
        <a href="halaman-registrasi.php" class="btn btn-success mr-5">Registrasi</a>
        <a href="halaman-login.php" class="btn btn-primary">Login</a>
      </div>
    </div>
  </nav>
  <!--  -->
  <div class="container">
    <!-- <hr>
    <div class="row justify-content-center">
      <div class="col-md-4">
        <h4 class="font-weight-bold text-center font-italic">FLASH SALE!</h4>
      </div>
    </div> -->
    <hr>
    <?php if ($companies > 0) { ?>
      <div class="row">
        <!-- <div class="card-deck mt-5 "> -->
        <?php for ($i = 0; $i < count($companies); $i++) { ?>
          <div class="col-sm-4 mt-3">
            <div class="card">
              <?php if (isset($companies[$i])) { ?>
                <img class="card-img-top" src="image/<?php echo $companies[$i]['image'] ?>" alt="Card image cap" height="350px" width="100%">
                <div class="card-body">
                  <a href="#" class="card-title h5"><?php echo $companies[$i]['company_name'] ?></a>
                  <p class="card-text"><?php echo $companies[$i]['about'] ?></p>
                  <a href="halaman-detail.php?id=<?php echo $companies[$i]['id_company'] ?>" class="btn btn-primary">DETAILS</a>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } ?>


  </div>
  <div class="row ">
    <div class="col-md-12 text-center">
      <p class="font-weight-bold">
        @Copyright by 18111043_ElsaFatmawati_TIFRP18CIDA_UASWEB1
      </p>
    </div>
  </div>

</body>
<script src="js/bootstrap.bundle.min.js"></script>

</html>