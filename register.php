<?php
include 'koneksi.php';

if(isset($_POST['masuk'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];    
    $password = $_POST['password'];
    $hp = $_POST['hp'];
    $alamat =$_POST['alamat'];
    if ($nama && $email && $username && $password){
    
    $masuk = mysqli_query( $koneksi,"INSERT INTO tb_user(nama,email,username,password,hp,alamat,role)
     VALUES('$nama','$email','$username','$password','$hp','$alamat','pelanggan')" );
     if($masuk > 0){
        header("Location: profil.php");
     }else{
        header("Location: register.php");
     }
    }else{
     
    }
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="reg1.css">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
    </head>
    
    <body>
        <div class="filter">
        </div>
            <div class="container">
                <h1>Daftar Akun</h1>
                  <form method="post" enctype="multipart/form-data">
                    <label>Nama</label><br>
                    <input type="text" id="username" name="nama">
                    <label>Email</label><br>
                    <input type="text" id="email" name="email">
                    <label>Username</label><br>
                    <input type="text" id="username" name="username">
                      <label>Password</label><br>
                      <input type="text"
                     id="password" name="password"/><br>
                      <label>Hp</label><br>
                      <input type="text" id="hp" name="hp">
                      <label>Alamat</label><br>
                      <input type="text" id="alamat" name="alamat">
                      <div class="button">
                      <button class="btn-hover color-9"type="submit" name="masuk">Register</button>
                      </div>
                  </form>
            </div>      
    </body>
</html>