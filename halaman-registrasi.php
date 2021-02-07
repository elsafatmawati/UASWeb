<!doctype html>
<html lang="en">


<?php
include 'koneksi.php'; // panggil perintah koneksi database

if (isset($_POST['Registrasi'])) { // mengecek apakah form variabelnya ada isinya

   $username = $_POST['username']; // isi varibel dengan mengambil data username pada form
   $password = $_POST['password']; // isi variabel dengan mengambil data password pada form
   $email = $_POST['email']; // isi varibel dengan mengambil data username pada form

   $data = $conn->prepare('INSERT INTO user (username,password,email) VALUES (?, ?, ?)');

   $data->bindParam(1, $username);
   $data->bindParam(2, $password);
   $data->bindParam(3, $email);
   $data->execute();
   echo "<script>alert('Registrasi Berhasil');</script>";
}
?>

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">

   <title>Halaman Registrasi</title>
</head>

<body>
   <div class="container mt-5">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card text-center">
               <div class="card-header">
                  Registrasi
               </div>
               <div class="card-body justify-content-center">

                  <form action="" method="POST">
                     <div class="row justify-content-center">

                        <div class="col-md-8">

                           <div class="form-group">
                              <label for="exampleInputEmail1">Username</label>
                              <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter username">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail2">Email address</label>
                              <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                           </div>
                           <p>Punya akun ? <a href="halaman-login.php">Login</a></p>
                           <div class="d-flex justify-content-around">
                              <a class="btn btn-outline-warning" href="halaman-utama.php">Back</a>
                              <button type="submit" class="btn btn-outline-dark" id="Registrasi" name="Registrasi">Registrasi</button>
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

</html>