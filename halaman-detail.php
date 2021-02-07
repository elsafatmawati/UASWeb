<!doctype html>
<html lang="en">

<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = $conn->prepare("SELECT * FROM companies WHERE id_company = $id");
$data->execute();
$companies = $data->fetch();

$data = $conn->prepare('SELECT * FROM detail INNER JOIN companies ON detail.id_company = companies.id_company WHERE companies.id_company = :id');
$data->bindParam(':id', $id);
$data->execute();
$details = $data->fetchAll();

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Halaman Detail</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">UAS</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home </a>
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <img class="card-img-top" src="image/<?php echo $companies['image'] ?>" alt="Card image cap" height="350px" width="100%">
            </div>
            <div class="col-md-8">
                <?php if ($companies) { ?>
                    <h1><?php echo $companies['company_name'] ?></h1>
                    <h5 class="mt-5">About :</h5>
                    <p><?php echo $companies['about'] ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <hr>
                <h2 style="color: orangered;">COMPANY INFORMATION</h2>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <?php if ($details > 0) { ?>
                            <?php foreach ($details as $detail) { ?>
                                <h3><?php echo $detail['tittle'] ?></h3>
                                <p><?php echo $detail['desc'] ?></p>
                                <hr>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
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