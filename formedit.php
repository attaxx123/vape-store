<?php

include("koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: admin.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM produk WHERE id=$id";
$query = mysqli_query($koneksi, $sql);
$produk = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form method="post" enctype="multipart/form-data">
      <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">nama produk</label>
    <input type="text" name="nama_produk"class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">harga</label>
    <input type="text" name="harga" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">stok</label>
    <input type="text" name="stok" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">jenis</label>
    <select name="jenis" class="form-select" aria-label="Default select example">
  <option selected>Open this select menu :</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">foto</label>
  <div class="input-group mb-3">
  <input type="file" name="foto"class="form-control" id="inputGroupFile02">
  <label class="input-group-text" for="inputGroupFile02">upload</label>
</div>
    
  </div>
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">deksripsi</label>
  <textarea class="form-control" name="deksripsi"id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
  <div class="mb-3 form-check">
    <input type="checkbox" name="check_me_out" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="tambah"class="btn btn-primary">tambah</button>
</form>
</body>
</html>