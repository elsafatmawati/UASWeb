<!doctype html>
<html lang="en">

<?php
include 'koneksi.php';

if (isset($_SESSION['id']) == 0) { /* Halaman ini tidak dapat diakses jika belum ada yang login */
    header('Location: halaman-login.php');
}


$id = $_GET['id'];
$data = $conn->prepare("SELECT * FROM companies WHERE id_company = $id");
$data->execute();
$companies = $data->fetch();

$id_user = $_SESSION['id'];
$data = $conn->prepare("SELECT username FROM user WHERE id_user =$id_user");
$data->execute();
$user = $data->fetch();

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
                    <a class="nav-link" href="halaman-menu-utama.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="halaman-ubah-profile.php">Ubah Profile</a>
                </li>
            </ul>
            <p class="font-weight-bold">Hi, <?php echo $user['username'] ?></p>
            <a href="logout.php" class="btn btn-danger ml-3">Logout</a>

        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <img class="card-img-top" src="image/<?php echo $companies['image'] ?>" alt="Card image cap" height="350px" width="100%">
            </div>
            <div class="col-md-8">
                <?php if ($companies) { ?>
                    <h1><?php echo $companies['company_name'] ?>
                        <a href="form-edit-company.php?id=<?php echo $id ?>" class="btn btn-primary " style="float: right;">EDIT</a>
                    </h1>
                    <h5 class="mt-5">About :</h5>
                    <p><?php echo $companies['about'] ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <hr>
                <h2 style="color: orangered;">COMPANY INFORMATION <a href="form-tambah-detail.php?id=<?php echo $id ?>" class="btn btn-success btn-sm" style="float: right;">ADD INFORMATION</a></h2>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-stripped table-hover datatab">
                            <?php if ($details > 0) { ?>
                                <?php foreach ($details as $detail) { ?>
                                    <h3>
                                        <?php echo $detail['tittle'] ?>
                                        <div style="float: right;">
                                            <a href="form-edit-detail.php?id=<?php echo $detail['id_detail'] ?>&id_company=<?php echo $id ?>" class="btn btn-warning btn-sm">EDIT</a>
                                            <a href="hapusdetail.php?id=<?php echo $detail['id_detail'] ?>&id_company=<?php echo $id ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">DELETE</a>
                                        </div>
                                    </h3>
                                    <p><?php echo $detail['desc'] ?> </p>
                                    <hr>
                                <?php } ?>
                            <?php } ?>
                        </table>
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