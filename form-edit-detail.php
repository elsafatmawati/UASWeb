<!DOCTYPE html>
<html lang="en">
<?php

include 'koneksi.php';

if (isset($_SESSION['id']) == 0) { /* Halaman ini tidak dapat diakses jika belum ada yang login */
    header('Location: halaman-login.php');
}

$id = $_GET['id'];
$id_company = $_GET['id_company'];

$data = $conn->prepare("SELECT * FROM detail WHERE detail.id_detail = $id");
$data->execute();
$detail = $data->fetch();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-left">
                    <div class="card-header">
                        UBAH DETAIL
                    </div>
                    <div class="card-body justify-content-center">
                        <form action="ubahdetail.php?id=<?php echo $id ?>" name="" method="POST">
                            <input type="hidden" class="form-control" name="id_company" id="id_company" value="<?php echo $id_company ?>" aria-describedby="emailHelp" placeholder="Sejarah">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul</label>
                                <input type="text" class="form-control" value="<?php echo $detail['tittle'] ?>" name="tittle" id="tittle" aria-describedby="emailHelp" placeholder="Sejarah">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi</label>
                                <input type="text" class="form-control" value="<?php echo $detail['desc'] ?>" name="desc" id="desc" placeholder="Perusahaan ini berdiri sejak.....">
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<div class="row ">
    <div class="col-md-12 text-center">
        <p class="font-weight-bold">@Copyright by 18111043_ElsaFatmawati_TIFRP18CIDA_UASWEB1</p>
    </div>
</div>

</html>