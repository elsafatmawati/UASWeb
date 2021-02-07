<!DOCTYPE html>
<html lang="en">

<?php
include 'koneksi.php'; // panggil perintah koneksi database

if (isset($_SESSION['id']) == 0) { /* Halaman ini tidak dapat diakses jika belum ada yang login */
    header('Location: halaman-login.php');
}

$session = $_SESSION['id'];
$data = $conn->prepare("SELECT * FROM user where id_user = $session");
$data->execute();
$user = $data->fetch();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Ubah Profile</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        Ubah Profile
                    </div>
                    <div class="card-body justify-content-center">
                        <form action="ubahprofile.php" method="POST">
                            <input type="hidden" class="form-control" name="ID" id="ID" value="<?php echo $user['id_user'] ?>" aria-describedby="emailHelp">

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input type="text" class="form-control" name="Username" value="<?php echo $user['username'] ?>" id="Username" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="text" class="form-control" name="Email" value="<?php echo $user['email'] ?>" id="Email" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" value="<?php echo $user['password'] ?>" name="Password" id="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>

                    </div>
                    <div class="card-footer text-muted">

                        @Copyright by 18111043_ElsaFatmawati_TIFRP18CIDA_UASWEB1

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>