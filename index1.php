<?php
include 'koneksi.php';
session_start();
if (isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $login = mysqli_query($koneksi, "SELECT * from pembeli where username='$username' and password='$password' ");

  if($data = mysqli_fetch_array($login)){
    $_SESSION['username']= $data['username'];
    $_SESSION['password']= $data['password'];
    $_SESSION['nama']= $data['nama'];
    header('Location: index.php');
  }else{
    header('Location: login.php');
  }
}
?>