<?php

include 'koneksi.php';

if (isset($_SESSION['id']) == 0) { /* Halaman ini tidak dapat diakses jika belum ada yang login */
  header('Location: halaman-login.php');
}

$id_user = $_SESSION['id'];
$data = $conn->prepare("SELECT username FROM user WHERE id_user =$id_user");
$data->execute();
$user = $data->fetch();

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
          <a class="nav-link" href="halaman-menu-utama.php">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="halaman-ubah-profile.php">Ubah Profile</a>
        </li>
      </ul>
      <p class="font-weight-bold">Hi, <?php echo $user['username'] ?></p>
      <a href="logout.php" class="btn btn-danger ml-3">Logout</a>

    </div>
  </nav>
  <!--  -->
  <div class="container">
    <a href="form-tambah-company.php" class="btn btn-success">ADD COMPANY</a>
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
                  <a href="halaman-ubah-detail.php?id=<?php echo $companies[$i]['id_company'] ?>" class="btn btn-primary">EDIT DETAILS</a>
                  <a href="hapuscompany.php?id=<?php echo $companies[$i]['id_company'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">DELETE</a>
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