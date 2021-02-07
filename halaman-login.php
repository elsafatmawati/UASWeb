<!doctype html>
<html lang="en">

<?php
include 'koneksi.php'; // panggil perintah koneksi database 
// if (!isset($_SESSION['email']) == 0) { // cek session apakah kosong(belum login) maka alihkan ke index.php
//   header('Location: halaman-utama.php');
// }


if (isset($_POST['login'])) { // mengecek apakah form variabelnya ada isinya
  $email = $_POST['email']; // isi varibel dengan mengambil data username pada form
  $password = $_POST['password']; // isi variabel dengan mengambil data password pada form

  try {
    $sql = "SELECT * FROM user WHERE email = :email AND password = :password"; // buat queri select
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute(); // jalankan query
    $id = $stmt->fetch();
    $count = $stmt->rowCount(); // mengecek row
    if ($count == 1) { // jika rownya ada 
      $_SESSION['id'] = $id['id_user']; // set sesion dengan variabel username
      header("Location: halaman-menu-utama.php"); // lempar variabel ke tampilan index.php
      return;
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Halaman Login</title>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card text-center">
          <div class="card-header">
            Login
          </div>
          <div class="card-body justify-content-center">

            <form name="form" method="POST">
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                  </div>

                  <p>Tidak punya akun ? <a href="halaman-registrasi.php">Register</a></p>
                  <div class="d-flex justify-content-around">
                    <a class="btn btn-outline-warning" href="halaman-utama.php">Back</a>
                    <button type="submit" class="btn btn-outline-dark" name="login" value="login" id="login">Login</button>
                  </div>
                </div>
              </div>
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
<script src="js/bootstrap.bundle.min.js"></script>
<script language="javascript">
  var login = document.getElementById("login");
  login.addEventListener("click", () => {
    var email = document.forms["form"]["email"].value;
    var password = document.forms["form"]["password"].value;

    if (email != "" && password != "") {
      window.location.replace("halaman-menu-utama.php");
    } else {
      alert("Email dan password salah!");
    }
  });
</script>

</html>