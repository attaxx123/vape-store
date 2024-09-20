<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #343a40;
            padding: 1rem 2rem;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .breadcrumb {
            background-color: transparent;
            padding-left: 0;
        }
        .main-container {
            padding: 3rem 0;
        }
        .product-details {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .product-image img {
            max-width: 100%;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
        }
        .product-image img:hover {
            transform: scale(1.05);
        }
        .product-info h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: bold;
        }
        .product-info p {
            font-size: 1.2rem;
            color: #6c757d;
        }
        .price {
            font-size: 1.8rem;
            font-weight: bold;
            color: #007bff;
        }
        .add-to-cart-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .add-to-cart-btn:hover {
            background-color: #0056b3;
        }
        .related-products {
            margin-top: 4rem;
        }
        .related-products h3 {
            margin-bottom: 2rem;
        }
        .related-item {
            text-align: center;
        }
        .related-item img {
            max-width: 100%;
            border-radius: 8px;
            transition: transform 0.3s ease-in-out;
        }
        .related-item img:hover {
            transform: scale(1.05);
        }
        .rating {
            color: #ffc107;
        }
        .review-section {
            margin-top: 3rem;
        }
        .review-section h4 {
            margin-bottom: 1.5rem;
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 2rem 0;
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
        <main class="container mx-auto my-8 p-4 bg-white shadow-lg rounded-lg">

        <div class="container main-container">
        <div class="row product-details">
            <?php
            $id = $_GET['id'];
            $query = "SELECT * FROM produk WHERE id=$id";
            $hasil = mysqli_query($koneksi, $query);
            while($h = mysqli_fetch_array($hasil)){
            ?>
            <div class="col-md-6 product-image">
                <img height="400px" src="img/<?php echo $h['foto']; ?>" alt="<?php echo $h['nama']; ?>">
            </div>
            <div class="col-md-6 product-info">
                <h2><?php echo $h['nama']; ?></h2>
                <div class="rating">
                    ★★★★☆ (4.5)
                </div>
                <p><?php echo $h['deksripsi']; ?></p>
                <p class="price">Rp <?php echo number_format($h['harga']); ?></p>
                <form action="keranjang.php?id=<?= $h['id'] ?>" method="post">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" name="jumlah" class="form-control w-50 mb-3" value="1" min="1">
                    <input type="hidden" name="nama" value="<?php echo $h['nama']; ?>">
                    <input type="hidden" name="harga" value="<?php echo $h['harga']; ?>">
                    <input type="hidden" name="foto" value="<?php echo $h['foto']; ?>">
                    <button type="submit" name="add" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
            <?php } ?>
        </div>

        <div class="review-section">
            <h4>Customer Reviews</h4>
            <div class="review-item">
                <p><strong>John Doe:</strong> Great product, highly recommend!</p>
                <p><strong>Jane Smith:</strong> Good value for money.</p>
            </div>
        </div>
    </div>

        </main>


        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">VAPE STORE &copy;VapeStore.com</p></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
</body>
</html>