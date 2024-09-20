
<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
$total = 0;

$id_user = $_SESSION['id_user'];

if(isset($id_user)){
    if (isset($_POST['add'])){
        
        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'], 'id');
            if(!in_array($_GET["id"], $item_array_id)){
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'id' => $_GET['id'],
                    'nama' => $_POST['nama'],
                    'harga' => $_POST['harga'],
                    'foto' => $_POST['foto'],
                    'jumlah' => $_POST['jumlah'],
                );

                $_SESSION['cart'] [$count] = $item_array;
                echo "<script>
                alert('berhasil dimasukkan ke keranjang');
                </script>";
            }else {
                echo"<script>
                alert('sudah ada di keranjang');
                </script>";
         }
        }else{
            $item_array = array(
                'id' => $_GET['id'],
                'nama' => $_POST['nama'],
                'harga' => $_POST['harga'],
                'foto' => $_POST['foto'],
                'jumlah' => $_POST['jumlah'],
            );

            $_SESSION['cart'] [0] = $item_array;
            echo "<script>
            alert('berhasil dimasukkan ke keranjang');
            </script>";
        }
    }
    if(isset($_GET['aksi'])){
        if($_GET['aksi'] == 'hapus'){
            foreach($_SESSION['cart'] as $key => $value){
                if($value['id'] == $_GET['id']){
                    unset($_SESSION['cart'] [$key]);
                    echo"<script>alert('produk dihapus dari keranjang');</script>";
                    echo"<script>window.location = 'keranjang.php';</script>";
                }
            }
        }else if ($_GET['aksi'] == 'beli'){
            foreach($_SESSION['cart'] as $key => $value){
                $total = $total + ($value["jumlah"] * $value['harga']);
            }

            $query = mysqli_query($koneksi, "INSERT INTO tb_transaksi(tanggal,id_pelanggan,total) VALUES ('". date("Y-m-d") . "','$id_user','$total')");
            $id_transaksi = mysqli_insert_id($koneksi);
            
            foreach($_SESSION['cart'] as $key => $value){
                $id_produk = $value['id'];
                $jumlah = $value['jumlah'];
                $sql = "INSERT INTO tb_detail(id_transaksi,id_produk,jumlah) VALUES ('$id_transaksi','$id_produk','$jumlah')";
                $res = mysqli_query($koneksi, $sql);

                if ($res > 0){
                    unset($_SESSION['cart']);

                    echo "<script>
                    alert('terimakasih sudah berbelanja');
                    </script>";

                    echo "<script>
                    window.location = 'cetak.php?id=". $id_transaksi."';
                    </script>";
                }
            }
        }
    }
}else{
    echo "<script>
    alert('login dulu');
    </script>";
    echo "<script>
   document.location.href = 'login.php';
    </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Keranjang Belanja</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .navbar {
            border-bottom: 1px solid #eaeaea;
        }
        .cart-container {
            max-width: 800px;
            margin: 40px auto;
        }
        .cart-header {
            font-size: 24px;
            font-weight: bold;
            padding-bottom: 20px;
            text-align: center;
            color: #343a40;
        }
        .cart-item {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .cart-item img {
            width: 200px;
            border-radius: 12px;
            object-fit: cover;
        }
        .cart-item h5 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .cart-item p {
            margin: 0;
            font-size: 14px;
            color: #666;
        }
        .cart-item-price {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
        }
        .cart-total {
            font-size: 22px;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
            color: #343a40;
        }
        .btn-checkout {
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
        }
        .btn-checkout:hover {
            background-color: #218838;
        }
        .btn-remove {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
        }
        .btn-remove:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-light shadow-sm">
    <div class="container px-4 px-lg-9">
        <a class="navbar-brand text-uppercase text-black fw-bold" href="#!">Vape <span class="text-red">Store</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link active text-black fw-semibold" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black fw-semibold" href="keranjang.php">Keranjang</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-black fw-semibold" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#">Liquid</a></li>
                        <li><a class="dropdown-item" href="podmod.php">Pod Mod</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <a href="profil.php" class="btn btn-outline-black me-2">
                    <i class="fa-solid fa-user"></i>
                </a>
                <button class="btn btn-outline-black position-relative" type="submit" formaction="keranjang.php">
                    <i class="bi-cart-fill me-1"></i>
                    <span class="badge bg-danger text-white position-absolute top-0 start-100 translate-middle rounded-pill"><?php echo count($_SESSION['cart']); ?></span>
                </button>
            </form>
        </div>
    </div>
</nav>

    <div class="cart-container">
        <div class="cart-header">Keranjang Belanja</div>
        <div class="cart-items">
            <?php if (!empty($_SESSION['cart'])) { ?>
                <?php foreach ($_SESSION['cart'] as $value) { ?>
                    <div class="cart-item">
                        <img src="img/<?php echo $value['foto']; ?>" alt="">
                        <div>
                            <h5><?php echo $value['nama']; ?></h5>
                            <p>Jumlah: <?php echo $value['jumlah']; ?></p>
                            <p class="cart-item-price"><?php echo number_format($value['harga'] * $value['jumlah']); ?></p>
                        </div>
                        <a href="keranjang.php?aksi=hapus&id=<?php echo $value['id']; ?>" class="btn-remove">Hapus</a>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="text-center">Keranjang kosong</div>
            <?php } ?>
        </div>

        <div class="cart-total">
            Total: <?php 
            $total = 0;
            foreach ($_SESSION['cart'] as $value) {
                $total += $value['harga'] * $value['jumlah'];
            }
            echo number_format($total); ?>
        </div>

        <div class="text-end mt-4">
            <a href="keranjang.php?aksi=beli" class="btn-checkout">Checkout</a>
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
